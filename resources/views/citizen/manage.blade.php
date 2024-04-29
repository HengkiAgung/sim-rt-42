@extends('layouts.app')
@section('title-apps', 'Settings')
@section('sub-title-apps', 'Organization')

@section('navbar')
    @include('layouts.navbar.navbar')
@endsection

@section('toolbar')
    @include('layouts.navbar.toolbar')
@endsection

@section('content')
    <div class="justify-content-center mt-n20">
        <form action="{{ route('citizen.update', $citizen->id) }}" id="form-citizen" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-3 mt-n20 mb-5">
                    <div class="row gap-5">
                        <div class="col-12">
                            <div class="card card-flush py-4">
                                <!--begin::Card header-->
                                <div class="card-header">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>Foto Warga</h2>
                                    </div>
                                    <!--end::Card title-->
                                </div>
                                <!--end::Card header-->

                                <!--begin::Card body-->
                                <div class="card-body text-center pt-0">

                                    <div class="image-input image-input-outline image-input-placeholder mb-3"
                                        data-kt-image-input="true">
                                        <div class="image-input-wrapper w-150px h-150px"
                                            style="background-image: url(&quot;{{ asset('file/pic/'.$citizen->pic_file) }}&quot;);">
                                        </div>

                                        <label
                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                            aria-label="Change avatar" data-bs-original-title="Change avatar"
                                            data-kt-initialized="1">
                                            <i class="fa fa-pen"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                            <input type="file" name="pic_file"
                                                 @error('pic_file') is-invalid @enderror
                                                accept=".png,.jpg,.jpeg" />
                                            <input type="hidden" name="avatar_remove" value="0">
                                        </label>

                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar" data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                            <i class="fa fa-times"><span class="path1"></span><span class="path2"></span></i>            </span>

                                    </div>

                                    <div class="text-muted fs-7"> Only *.png, *.jpg and
                                        *.jpeg image files are accepted</div>
                                    @if ($citizen->pic_file)
                                    <div><a href="{{ asset('file/pic/'.$citizen->pic_file) }}" target="_blank">Lihat File</a></div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="justify-content-center mt-md-n20">
                        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

                            <div class="d-flex flex-column gap-7 gap-lg-10">

                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Ubah Data</h2>
                                        </div>
                                    </div>

                                    <div class="card-body pt-0">
                                        @if (session()->has('success'))
                                        <div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10">
                                            <div class="d-flex flex-column justify-content-center pe-0 pe-sm-10 text-white">
                                                <span>{{ session()->get('success') }}</span>
                                            </div>
                                            <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                                                <i class="fa fa-times text-white"><span class="path1"></span><span class="path2"></span></i>
                                            </button>
                                        </div>
                                        @endif
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="required fw-bold">NIK</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->nik }}" required maxlength="200"
                                                    autofocus placeholder="NIK" name="nik"
                                                    class="form-control form-control-solid  @error('nik') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="required fw-bold">Nama Lengkap</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->name }}" required maxlength="200"
                                                    required placeholder="Nama Lengkap" name="name"
                                                    autocomplete="current-name"
                                                    class="form-control form-control-solid  @error('name') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="required fw-bold">Tempat Lahir</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->birthplace }}" required maxlength="200"
                                                    placeholder="Tempat Lahir" name="birthplace"
                                                    autocomplete="current-birthplace"
                                                    class="form-control form-control-solid  @error('birthplace') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="required fw-bold">Tanggal Lahir</span>
                                                </label>
                                                <input type="date" value="{{ $citizen->birthdate }}" required
                                                    placeholder="Tanggal Lahir" name="birthdate"
                                                    class="form-control form-control-solid  @error('birthdate') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="required fw-bold">Jenis Kelamin</span>
                                                </label>
                                                <select name="gender"
                                                    class="form-control form-control-solid @error('gender') is-invalid @enderror"
                                                    required>
                                                    <option value="L" {{ $citizen->gender == 'L' ? 'selected' : '' }}>Laki-Laki</option>
                                                    <option value="P" {{ $citizen->gender == 'P' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="required fw-bold">Golongan Darah</span>
                                                </label>
                                                <select name="blood_type"
                                                    class="form-control form-control-solid @error('blood_type') is-invalid @enderror"
                                                    required>
                                                    <option value="A" {{ $citizen->blood_type == 'A' ? 'selected' : '' }}>A</option>
                                                    <option value="B" {{ $citizen->blood_type == 'B' ? 'selected' : '' }}>B</option>
                                                    <option value="AB" {{ $citizen->blood_type == 'AB' ? 'selected' : '' }}>AB</option>
                                                    <option value="O" {{ $citizen->blood_type == 'O' ? 'selected' : '' }}>O</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">Alamat</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->address_domisili }}"                                                     maxlength="200" placeholder="Alamat" name="address_domisili"
                                                    autocomplete="current-address_domisili"
                                                    class="form-control form-control-solid  @error('address_domisili') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">Alamat (Sesuai KTP)</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->address_ktp }}" maxlength="200"
                                                    placeholder="Alamat sesuai KTP" name="address_ktp"
                                                    autocomplete="current-address-ktp"
                                                    class="form-control form-control-solid  @error('address_ktp') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">RT</span>
                                                </label>
                                                <input type="number" value="{{ $citizen->rt }}" placeholder="0"
                                                    name="rt" autocomplete="current-rt"
                                                    class="form-control form-control-solid  @error('rt') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">RW</span>
                                                </label>
                                                <input type="number" value="{{ $citizen->rw }}" placeholder="0"
                                                    name="rw" autocomplete="current-rw"
                                                    class="form-control form-control-solid  @error('rw') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">Kelurahan</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->district }}" maxlength="200"
                                                    placeholder="Kelurahan" name="district"
                                                    autocomplete="current-district"
                                                    class="form-control form-control-solid  @error('district') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">Kecamatan</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->sub_district }}"                                                     maxlength="200" placeholder="Kelurahan" name="sub_district"
                                                    autocomplete="current-sub-district"
                                                    class="form-control form-control-solid  @error('sub_district') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">Kota</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->city }}" maxlength="200"
                                                    placeholder="Kota" name="city" autocomplete="current-city"
                                                    class="form-control form-control-solid  @error('city') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">Agama</span>
                                                </label>
                                                <select name="religion"
                                                    class="form-control form-control-solid @error('religion') is-invalid @enderror"

                                                    <option value="Islam" {{ $citizen->religion == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                    <option value="Kristen" {{ $citizen->religion == 'Kristen' ? 'selected' : '' }}>Kristen</option>
                                                    <option value="Katolik" {{ $citizen->religion == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                    <option value="Hindu" {{ $citizen->religion == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Budha" {{ $citizen->religion == 'Budha' ? 'selected' : '' }}>Budha</option>
                                                    <option value="Konghucu" {{ $citizen->religion == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">Status Pernikahan</span>
                                                </label>
                                                <select name="martial_status"
                                                    class="form-control form-control-solid @error('martial_status') is-invalid @enderror"

                                                    <option value="Belum Kawin" {{ $citizen->marital_status == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                                                    <option value="Kawin" {{ $citizen->marital_status == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                                    <option value="Cerai Hidup" {{ $citizen->marital_status == 'Cerai Hidup' ? 'selected' : '' }}>Cerai Hidup</option>
                                                    <option value="Cerai Mati" {{ $citizen->marital_status == 'Cerai Mati' ? 'selected' : '' }}>Cerai Mati</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">Pekerjaan</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->work }}" maxlength="200"
                                                    placeholder="Pekerjaan" name="work" autocomplete="current-work"
                                                    class="form-control form-control-solid  @error('work') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="fw-bold">Kewarganegaraan</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->nationality }}"                                                     maxlength="200" placeholder="Kelurahan" name="nationality"
                                                    autocomplete="current-nationality"
                                                    class="form-control form-control-solid  @error('nationality') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="required fw-bold">Status Warga</span>
                                                </label>
                                                <select name="citizen_status"
                                                    class="form-control form-control-solid @error('citizen_status') is-invalid @enderror"
                                                    required>
                                                    <option value="Mengontrak" {{ $citizen->citizen_status == 'Mengontrak' ? 'selected' : '' }}>Mengontrak</option>
                                                    <option value="Kost" {{ $citizen->citizen_status == 'Kost' ? 'selected' : '' }}>Kost</option>
                                                    <option value="Milik Sendiri" {{ $citizen->citizen_status == 'Milik Sendiri' ? 'selected' : '' }}>Milik Sendiri</option>
                                                    <option value="Rumah Dinas" {{ $citizen->citizen_status == 'Rumah Dinas' ? 'selected' : '' }}>Rumah Dinas</option>
                                                    <option value="Rumah Susun" {{ $citizen->citizen_status == 'Rusun Susun' ? 'selected' : '' }}>Rumah Susun</option>
                                                    <option value="Rumah Toko" {{ $citizen->citizen_status == 'Rumah Toko' ? 'selected' : '' }}>Rumah Toko</option>
                                                    <option value="Sewa" {{ $citizen->citizen_status == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                                                    <option value="Lainnya" {{ $citizen->citizen_status == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Data Penyewa <sup><small class="text-danger">(Harap diisi apabila status warga menyewa)</small></sup></h2>
                                        </div>
                                    </div>

                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="required fw-bold">Nama Penyewa</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->tenant_name }}" required maxlength="200"
                                                    autofocus placeholder="Nama Penyewa" name="tenant_name"
                                                    class="form-control form-control-solid  @error('tenant_name') is-invalid @enderror" />
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                    <span class="required fw-bold">Nomor Telpon Penyewa</span>
                                                </label>
                                                <input type="text" value="{{ $citizen->tenant_phone_number }}" required maxlength="200"
                                                    required placeholder="08xxxxxx" name="tenant_phone_number"
                                                    autocomplete="current-tenant_phone_number"
                                                    class="form-control form-control-solid  @error('tenant_phone_number') is-invalid @enderror" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="d-flex justify-content-end">
                                <a href="{{ route('citizen.index') }}"
                                    id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">
                                    Kembali
                                </a>

                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">
                                        Simpan
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>
    </div>
@endsection

@push('js')
<script>
    $(document).ready(function (){
        $(`#form-citizen`).validate({
            rules: {
                ktp_file: {
                    accept: 'image/jpg,image/jpeg,image/png'
                },
                pic_file: {
                    accept: 'image/jpg,image/jpeg,image/png'
                }
            }
            submitHandler: function(form) {
                form.submit()
            }
        });
    })
</script>

@endpush
