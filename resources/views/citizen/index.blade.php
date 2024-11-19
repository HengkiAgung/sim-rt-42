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
                                <input type="number" :value="old('nik')" required maxlength="200" autofocus
                                    placeholder="NIK" name="nik"
                                    class="form-control form-control-solid  @error('nik') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Nama Lengkap</span>
                                </label>
                                <input type="text" :value="old('name')" required maxlength="200" required
                                    placeholder="Nama Lengkap" name="name" autocomplete="current-name"
                                    class="form-control form-control-solid  @error('name') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Tempat Lahir</span>
                                </label>
                                <input type="text" :value="old('birthplace')" required maxlength="200"
                                    placeholder="Tempat Lahir" name="birthplace" autocomplete="current-birthplace"
                                    class="form-control form-control-solid  @error('birthplace') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Tanggal Lahir</span>
                                </label>
                                <input type="date" :value="old('birthdate')" required placeholder="Tanggal Lahir"
                                    name="birthdate"
                                    class="form-control form-control-solid  @error('birthdate') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Jenis Kelamin</span>
                                </label>
                                <select name="gender"
                                    class="form-control form-control-solid @error('gender') is-invalid @enderror" required>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Golongan Darah</span>
                                </label>
                                <select name="blood_type"
                                    class="form-control form-control-solid @error('blood_type') is-invalid @enderror"
                                    required>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="AB">AB</option>
                                    <option value="O">O</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Alamat</span>
                                </label>
                                <input type="text" :value="old('address_domisili')" maxlength="200" placeholder="Alamat"
                                    name="address_domisili" autocomplete="current-address_domisili"
                                    class="form-control form-control-solid  @error('address_domisili') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Alamat (Sesuai KTP)</span>
                                </label>
                                <input type="text" :value="old('address_ktp')" maxlength="200"
                                    placeholder="Alamat sesuai KTP" name="address_ktp" autocomplete="current-address-ktp"
                                    class="form-control form-control-solid  @error('address_ktp') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">RT</span>
                                </label>
                                <input type="number" :value="old('rt')" placeholder="0" name="rt"
                                    autocomplete="current-rt"
                                    class="form-control form-control-solid  @error('rt') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">RW</span>
                                </label>
                                <input type="number" :value="old('rw')" placeholder="0" name="rw"
                                    autocomplete="current-rw"
                                    class="form-control form-control-solid  @error('rw') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kelurahan</span>
                                </label>
                                <input type="text" :value="old('district')" maxlength="200" placeholder="Kelurahan"
                                    name="district" autocomplete="current-district"
                                    class="form-control form-control-solid  @error('district') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kecamatan</span>
                                </label>
                                <input type="text" :value="old('sub_district')" maxlength="200"
                                    placeholder="Kelurahan" name="sub_district" autocomplete="current-sub-district"
                                    class="form-control form-control-solid  @error('sub_district') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kota</span>
                                </label>
                                <input type="text" :value="old('city')" maxlength="200" placeholder="Kota"
                                    name="city" autocomplete="current-city"
                                    class="form-control form-control-solid  @error('city') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Agama</span>
                                </label>
                                <select name="religion"
                                    class="form-control form-control-solid @error('religion') is-invalid @enderror"
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Status Pernikahan</span>
                                </label>
                                <select name="martial_status"
                                    class="form-control form-control-solid @error('martial_status') is-invalid @enderror"
                                    <option value="Belum Kawin">Belum Kawin</option>
                                    <option value="Kawin">Kawin</option>
                                    <option value="Cerai Hidup">Cerai Hidup</option>
                                    <option value="Cerai Mati">Cerai Mati</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Pekerjaan</span>
                                </label>
                                <input type="text" :value="old('work')" maxlength="200" placeholder="Pekerjaan"
                                    name="work" autocomplete="current-work"
                                    class="form-control form-control-solid  @error('work') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kewarganegaraan</span>
                                </label>
                                <input type="text" :value="old('nationality')" maxlength="200"
                                    placeholder="Kelurahan" name="nationality" autocomplete="current-nationality"
                                    class="form-control form-control-solid  @error('nationality') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Status Warga</span>
                                </label>
                                <select name="citizen_status"
                                    class="form-control form-control-solid @error('citizen_status') is-invalid @enderror"
                                    required>
                                    <option value="Mengontrak">Mengontrak</option>
                                    <option value="Kost">Kost</option>
                                    <option value="Milik Sendiri">Milik Sendiri</option>
                                    <option value="Rumah Dinas">Rumah Dinas</option>
                                    <option value="Rumah Susun">Rumah Susun</option>
                                    <option value="Rumah Toko">Rumah Toko</option>
                                    <option value="Sewa">Sewa</option>
                                    <option value="Lainnya">Lainnya</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Lorong</span>
                                </label>
                                <select name="hallway_id"
                                    class="form-control form-control-solid @error('hallway_id') is-invalid @enderror">
                                    <option value="">Pilih Lorong</option>
                                    @foreach ($hallways as $hallway)
                                        <option value="{{ $hallway->id }}">{{ $hallway->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Foto Profil</span>
                                </label>
                                <input type="file" name="pic_file"
                                    class="form-control form-control-solid  @error('pic_file') is-invalid @enderror"
                                    accept="image/*" />
                            </div>

                            <h4 class="mt-3">Data Penyewa <sup><small class="text-danger">(Harap diisi apabila status
                                        warga menyewa)</small></sup></h4>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Nama Penyewa</span>
                                </label>
                                <input type="text" :value="old('tenant_name')" maxlength="200"
                                    placeholder="Nama Penyewa" name="tenant_name" autocomplete="current-tenant_name"
                                    class="form-control form-control-solid  @error('tenant_name') is-invalid @enderror" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Nomor Telpon Penyewa</span>
                                </label>
                                <input type="text" :value="old('tenant_phone_number')" maxlength="200"
                                    placeholder="08xxxx" name="tenant_phone_number"
                                    autocomplete="current-tenant_phone_number"
                                    class="form-control form-control-solid  @error('tenant_phone_number') is-invalid @enderror" />
                            </div>
                        </div>
                        <div class="text-center mt-9">
                            <button type="reset" id="modal_cancel" class="btn btn-sm btn-light me-3 w-lg-200px"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-sm btn-info w-lg-200px">
                                <span class="indicator-label">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-import" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0">
                    <h5 class="modal-title h4">Tambah Warga</h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body mb-7">
                    <form action="{{ route('citizen.import') }}" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data" method="POST">
                        @csrf
                        <label class="d-flex align-items-center fs-6 form-label mb-2">
                            <span class="required fw-bold">File Excel</span>
                        </label>
                        <input type="file" name="file"
                            class="form-control form-control-solid  @error('pic_file') is-invalid @enderror"
                            accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel"
                            required />
                        <label class="d-flex align-items-center fs-6 form-label mt-5">
                            <span class="fw-bold"><a href="{{ route('citizen.export') }}">Download Template</a></span>
                        </label>
                        <div class="text-center mt-9">
                            <button type="submit" class="btn btn-sm btn-info w-lg-200px">
                                <span class="indicator-label">Import</span>
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
                <div class="col-lg-12 mt-md-n14">
                    <div class="card p-4">
                        <div class="row">
                            <div class="col-lg-6 mb-9">
                                <h4>Warga</h4>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <div>
                                    <a href="#modal" data-bs-toggle="modal" class="btn btn-info btn-sm me-3">
                                        <i class="fa-solid fa-plus"></i> Tambah Warga</a>
                                    <a href="#modal-import" data-bs-toggle="modal" class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-file-excel"></i> Import Warga </a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label for="filter-gender"> Filter Gender :</label>
                                <select data-column="6" class="form-control col-sm-4 filter-gender"
                                    placeholder="Filter Gender">
                                    <option value=""> Pilih Gender </option>
                                    <option value="L"> Laki-laki </option>
                                    <option value="P"> Perempuan </option>
                                </select>
                            </div>
                            <div id="kt_table_customer_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer mt-4">
                                @if (session()->has('success'))
                                    <div
                                        class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10">
                                        <div class="d-flex flex-column justify-content-center pe-0 pe-sm-10 text-white">
                                            <span>{{ session()->get('success') }}</span>
                                        </div>
                                        <button type="button"
                                            class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                                            data-bs-dismiss="alert">
                                            <i class="fa fa-times text-white"><span class="path1"></span><span
                                                    class="path2"></span></i>
                                        </button>
                                    </div>
                                @endif
                                <div class="table-responsive">
                                    <table id="table" class="table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NIK</th>
                                                <th>Nama Lengkap</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Umur</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Lorong</th>
                                                <th>Alamat Domisili</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        generateDatatable({
            tableName: 'citizenTable',
            ajaxLink: '/citizen/get/datatable',
            columnData: [{
                    data: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    "data": 'nik'
                },
                {
                    "data": 'name'
                },
                {
                    "data": 'birthplace'
                },
                {
                    "data": 'birthdate'
                },
                {
                    "data": 'age'
                },
                {
                    "data": 'gender'
                },
                {
                    "data": 'hallway'
                },
                {
                    "data": 'address_domisili'
                },
                {
                    data: null,
                    render: function(data, type, row, meta) {
                        return `
                                        <div class="btn-edit">
                                            <a href="/citizen/${row.id}/manage" class="dropdown-item py-2"><i class="fa fa-gear"></i> Manage</a>
                                        </div>

                                        <button class="dropdown-item py-2" onclick="deleteCitizen(${row.id})"><i class="fa fa-trash"></i> Delete</button>
                                    `
                    }
                }
            ],
            elementName: '#table'
        })

        submitForm({
            formId: 'modal',
            ajaxLink: '/citizen/store',
            successCallback: () => {
                window['citizenTable'].ajax.reload()
            }
        })
        const deleteCitizen = (id) => {
            if (confirm("Apakah Anda yakin menghapus Warga ini?") == true) {
                console.log(true);
                $.ajax({
                    url: `/citizen/${id}/delete`,
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    success: function(res) {
                        alert(res.status);
                        window['citizenTable'].ajax.reload()
                    }
                })
            }
        }

        $('.filter-gender').change(function() {
            window['citizenTable'].column($(this).data('column')).search($(this).val()).draw();
        });
    </script>
@endpush
