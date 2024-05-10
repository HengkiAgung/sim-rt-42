<?php

namespace App\Imports;

use App\Models\Citizen;
use App\Models\Family;
use App\Models\Hallway;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class FamiliesImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection->groupBy('domisili'), $collection[0]);
        foreach ($collection->groupBy('domisili') as $key => $families) {
            if($families->filter()->isNotEmpty()) {
                $family_coll = null;
                foreach ($families as $key => $family) {
                    if(array_filter($family->toArray())) {
                        $citizen = Citizen::where('nik', $family['nik'])->first();
                        if (!$key > 0) {
                            if ($citizen) {
                                $family_head = $citizen->name;
                            } else {
                                $hallway = null;
                                if (array_key_exists('lorong', $family->toArray())) {
                                    $hallway = Hallway::where('name', $family['lorong'])->first()->id;
                                }
                                $citizen = Citizen::create([
                                    'nik' => $family['nik'],
                                    'name' => $family['nama'],
                                    'birthplace' => $family['tempat_lahir'],
                                    'birthdate' => Date::excelToDateTimeObject($family['tanggal_lahir']),
                                    'gender' => $family['jenis_kelamin'],
                                    'blood_type' => $family['golongan_darah'],
                                    'address_domisili' => $family['domisili'],
                                    'address_ktp' => $family['domisili_ktp'],
                                    'rt' => $family['rt'],
                                    'rw' => $family['rw'],
                                    'sub_district' => $family['kelurahan'],
                                    'district' => $family['kecamatan'],
                                    'city' => $family['kota'],
                                    'religion' => $family['agama'],
                                    'marital_status' => $family['status_pernikahan'],
                                    'work' => $family['pekerjaan'],
                                    'nationality' => $family['kewarganegaraan'],
                                    'citizen_status' => $family['status_warga'],
                                    'hallway_id' => $hallway
                                ]);
                                $family_head = $citizen->name;
                            }

                            $family_coll = Family::create([
                                "head_of_family" => $family_head,
                                "card_number" => $family['no_kk'],
                                "address" => $family['domisili'],
                                "rt" => $family['rt'],
                                "rw" => $family['rw'],
                                "sub_district" => $family['kelurahan'],
                                "district" => $family['kecamatan'],
                                "city" => $family['kota'],
                            ]);

                            $citizen->update([
                                'family_id' => $family_coll->id
                            ]);
                        }
                        $citizen->update([
                            'family_id' => $family_coll->id
                        ]);
                    }
                }
            }
        }
    }
}
