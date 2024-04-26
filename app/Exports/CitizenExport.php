<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Cell\DataValidation;

class CitizenExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */

    protected  $users;
    protected  $selects;
    protected  $row_count;
    protected  $column_count;

    public function __construct()
    {
        $gender = ['L', 'P'];
        $blood_type = ['A', 'B', 'AB', 'O'];
        $religion = ['Islam','Kristen','Katolik','Hindu','Budha','Konghucu'];
        $martial_status = ['Belum Kawin','Kawin','Cerai Hidup','Cerai Mati'];
        $citizen_status = ['Mengontrak','Kost','Milik Sendiri','Rumah Dinas','Rumah Susun','Rumah Toko','Sewa','Lainnya'];

        $selects=[
            ['columns_name'=>'E','options'=>$gender],
            ['columns_name'=>'F','options'=>$blood_type],
            ['columns_name'=>'N','options'=>$religion],
            ['columns_name'=>'O','options'=>$martial_status],
            ['columns_name'=>'R','options'=>$citizen_status],
        ];
        $this->selects=$selects;
        $this->row_count=50;
        $this->column_count=18;
    }

    public function collection()
    {
        return collect([]);
    }

    public function headings(): array
    {
        return [
            'NIK',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Golongan Darah',
            'Domisili',
            'Domisili KTP',
            'RT',
            'RW',
            'Kelurahan',
            'Kecamatan',
            'Kota',
            'Agama',
            'Status Pernikahan',
            'Pekerjaan',
            'Kewarganegaraan',
            'Status Warga',
        ];
    }

    public function registerEvents(): array
    {
        return [
            // handle by a closure.
            AfterSheet::class => function(AfterSheet $event) {
                $row_count = $this->row_count;
                $column_count = $this->column_count;
                foreach ($this->selects as $select){
                    $drop_column = $select['columns_name'];
                    $options = $select['options'];
                    // set dropdown list for first data row
                    $validation = $event->sheet->getCell("{$drop_column}2")->getDataValidation();
                    $validation->setType(DataValidation::TYPE_LIST );
                    $validation->setErrorStyle(DataValidation::STYLE_INFORMATION );
                    $validation->setAllowBlank(false);
                    $validation->setShowInputMessage(true);
                    $validation->setShowErrorMessage(true);
                    $validation->setShowDropDown(true);
                    $validation->setErrorTitle('Input error');
                    $validation->setError('Value is not in list.');
                    $validation->setPromptTitle('Pick from list');
                    $validation->setPrompt('Please pick a value from the drop-down list.');
                    $validation->setFormula1(sprintf('"%s"',implode(',',$options)));

                    // clone validation to remaining rows
                    for ($i = 3; $i <= $row_count; $i++) {
                        $event->sheet->getCell("{$drop_column}{$i}")->setDataValidation(clone $validation);
                    }
                    // set columns to autosize
                    for ($i = 1; $i <= $column_count; $i++) {
                        $column = Coordinate::stringFromColumnIndex($i);
                        $event->sheet->getColumnDimension($column)->setAutoSize(true);
                    }
                }

            },
        ];
    }
}
