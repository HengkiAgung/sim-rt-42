<?php

namespace App\Imports;

use App\Models\Citizen;
use App\Models\Hallway;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class CitizenImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $hallway = null;
        if ($row['lorong']) {
            $hallway = Hallway::where('name', $row['lorong'])->first()->id;
        }

        return new Citizen([
            'nik' => $row['nik'],
            'name' => $row['nama'],
            'birthplace' => $row['tempat_lahir'],
            'birthdate' => Date::excelToDateTimeObject($row['tanggal_lahir']),
            'gender' => $row['jenis_kelamin'],
            'blood_type' => $row['golongan_darah'],
            'address_domisili' => $row['domisili'],
            'address_ktp' => $row['domisili_ktp'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'sub_district' => $row['kelurahan'],
            'district' => $row['kecamatan'],
            'city' => $row['kota'],
            'religion' => $row['agama'],
            'marital_status' => $row['status_pernikahan'],
            'work' => $row['pekerjaan'],
            'nationality' => $row['kewarganegaraan'],
            'citizen_status' => $row['status_warga'],
            'hallway_id' => $hallway
        ]);
    }
}
