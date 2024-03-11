<?php

namespace App;

class Constants {
    /**
     * @var array[l, p]
     */
    public const GENDER = ['L', 'P'];

    /**
     * @var array[A, B, AB, O]
     */
    public const BLOOD_TYPE = ['A', 'B', 'AB', 'O'];

    /**
     * @var array[Belum Kawin,
     *   Kawin,
     *   Cerai Hidup,
     *   Cerai Mati,]
     */
    public const MARITAL_STATUS = ['Belum Kawin', 'Kawin', 'Cerai Hidup', 'Cerai Mati'];

    /**
     * @var array[Islam,
     *   Kristen,
     *   Katolik,
     *   Hindu,
     *   Budha,
     *   Konghucu,]
     */
    public const RELIGION = ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu'];

    /**
     * @var array[Mengontrak,
     *   Kost,
     *   Milik Sendiri,
     *   Rumah Dinas,
     *   Rumah Susun,
     *   Rumah Toko,
     *   Sewa,
     *   Lainnya,]
     */
    public const CITIZEN_STATUS = ['Mengontrak', 'Kost', 'Milik Sendiri', 'Rumah Dinas', 'Rumah Susun', 'Rumah Toko', 'Sewa', 'Lainnya'];
}
