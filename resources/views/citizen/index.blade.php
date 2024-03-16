@extends('layouts.app')
@section('title-apps', 'Citizen')
{{-- @section('sub-title-apps', 'Organization') --}}

@section('navbar')
    @include('layouts.navbar.navbar')
@endsection

@section('toolbar')
    @include('layouts.navbar.toolbar')
@endsection

@section('content')
    <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0">
                    <h5 class="modal-title h4">Tambah Warga</h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body mb-7">
                    <form id="modal_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">NIK</span>
                                </label>
                                <input type="text" :value="old('nik')" required autofocus placeholder="NIK" name="nik"
                                    class="form-control form-control-solid  @error('nik') is-invalid @enderror" />
                                @error('nik')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Nama Lengkap</span>
                                </label>
                                <input type="text" :value="old('name')" placeholder="Nama Lengkap" name="name"
                                    autocomplete="current-name"
                                    class="form-control form-control-solid  @error('name') is-invalid @enderror" />
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Tempat Lahir</span>
                                </label>
                                <input type="text" :value="old('tempat_lahir')" placeholder="Tempat Lahir"
                                    name="tempat_lahir" autocomplete="current-tempat-lahir"
                                    class="form-control form-control-solid  @error('tempat_lahir') is-invalid @enderror" />
                                @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Tanggal Lahir</span>
                                </label>
                                <input type="date" placeholder="Tanggal Lahir" name="tanggal_lahir"
                                    class="form-control form-control-solid  @error('tanggal_lahir') is-invalid @enderror" />
                                @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Jenis Kelamin</span>
                                </label>
                                <select name="gender"
                                    class="form-control form-control-solid @error('gender') is-invalid @enderror">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Golongan Darah</span>
                                </label>
                                <select name="blood_type"
                                    class="form-control form-control-solid @error('blood_type') is-invalid @enderror">
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                @error('blood_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Alamat</span>
                                </label>
                                <input type="text" :value="old('address_domisili')" placeholder="Alamat"
                                    name="address_domisili" autocomplete="current-address_domisili"
                                    class="form-control form-control-solid  @error('address_domisili') is-invalid @enderror" />
                                @error('address_domisili')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Alamat (Sesuai KTP)</span>
                                </label>
                                <input type="text" :value="old('address_ktp')" placeholder="Alamat sesuai KTP"
                                    name="address_ktp" autocomplete="current-address-ktp"
                                    class="form-control form-control-solid  @error('address_ktp') is-invalid @enderror" />
                                @error('address_ktp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">RT</span>
                                </label>
                                <input type="number" :value="old('rt')" placeholder="0" name="rt"
                                    autocomplete="current-rt"
                                    class="form-control form-control-solid  @error('rt') is-invalid @enderror" />
                                @error('rt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">RW</span>
                                </label>
                                <input type="number" :value="old('rw')" placeholder="0" name="rw"
                                    autocomplete="current-rw"
                                    class="form-control form-control-solid  @error('rw') is-invalid @enderror" />
                                @error('rw')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Kelurahan</span>
                                </label>
                                <input type="text" :value="old('district')" placeholder="Kelurahan" name="district"
                                    autocomplete="current-district"
                                    class="form-control form-control-solid  @error('district') is-invalid @enderror" />
                                @error('district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Kecamatan</span>
                                </label>
                                <input type="text" :value="old('sub_district')" placeholder="Kelurahan"
                                    name="sub_district" autocomplete="current-sub-district"
                                    class="form-control form-control-solid  @error('sub_district') is-invalid @enderror" />
                                @error('sub_district')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Kota</span>
                                </label>
                                <input type="text" :value="old('Kota')" placeholder="Kelurahan" name="Kota"
                                    autocomplete="current-kota"
                                    class="form-control form-control-solid  @error('Kota') is-invalid @enderror" />
                                @error('Kota')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Agama</span>
                                </label>
                                <select name="religion"
                                    class="form-control form-control-solid @error('religion') is-invalid @enderror">
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                @error('religion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Status Pernikahan</span>
                                </label>
                                <select name="martial_status"
                                    class="form-control form-control-solid @error('martial_status') is-invalid @enderror">
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                                @error('martial_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Pekerjaan</span>
                                </label>
                                <input type="text" :value="old('work')" placeholder="Pekerjaan" name="work"
                                    autocomplete="current-work"
                                    class="form-control form-control-solid  @error('work') is-invalid @enderror" />
                                @error('work')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Kewarganegaraan</span>
                                </label>
                                <input type="text" :value="old('nationality')" placeholder="Kelurahan"
                                    name="nationality" autocomplete="current-nationality"
                                    class="form-control form-control-solid  @error('nationality') is-invalid @enderror" />
                                @error('nationality')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Status Warga</span>
                                </label>
                                <select name="citizen_status"
                                    class="form-control form-control-solid @error('citizen_status') is-invalid @enderror">
                                    <option value="Mengontrak">Mengontrak</option>
                                    <option value="Kost">Kost</option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Rumah Dinas">Rumah Dinas</option>
                                    <option value="Rumah Susun">Rumah Susun</option>
                                    <option value="Rumah Toko">Rumah Toko</option>
                                    <option value="Sewa">Sewa</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                                @error('citizen_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Foto KTP</span>
                                </label>
                                <input type="file" name="ktp_file"
                                    class="form-control form-control-solid  @error('ktp_file') is-invalid @enderror" />
                                @error('ktp_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Pekerjaan</span>
                                </label>
                                <input type="file" name="pic_file"
                                    class="form-control form-control-solid  @error('pic_file') is-invalid @enderror" />
                                @error('pic_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center mt-9">
                            <button type="reset" id="modal_cancel" class="btn btn-sm btn-light me-3 w-lg-200px"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="modal_submit" class="btn btn-sm btn-info w-lg-200px">
                                <span class="indicator-label">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-n20">
        <div class="col-lg-12 mt-n20">
            <div class="row justify-content-center mt-md-n20">
                <div class="col-lg-9 mt-md-n14">
                    <div class="card p-10">
                        contoh penggunaan template <br>
                        <a href="#modal" data-bs-toggle="modal" class="btn btn-info btn-sm me-3 btn_tambah_job_level"><i
                                class="fa-solid fa-plus"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@push('js')
    <script>
        submitForm({formId: 'modal', ajaxLink: '/citizen/store'})
    </script>
@endpush
