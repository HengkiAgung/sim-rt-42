@extends('layouts.app')
@section('title-apps', 'Detail Keluarga')
@section('sub-title-apps', 'Keluarga')

@section('navbar')
    @include('layouts.navbar.navbar')
@endsection

@section('toolbar')
    @include('layouts.navbar.toolbar')
@endsection

@section('content')
    <div class="modal fade" id="modal_assign_family" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0">
                    <h5 class="modal-title h4">Tambah Warga</h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body mb-7">
                    <form id="form_assign_family" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data">
                        <select class="form-select form-select-md form-select-solid" data-control="select2" required
                            id="citizen_id" name="citizen_id" data-dropdown-parent="#modal_assign_family">
                            <option value="" selected hidden disabled>Pilih Warga</option>
                            @foreach ($citizens as $dc)
                                <option value="{{ $dc->id }}">{{ $dc->name }}</option>
                            @endforeach
                        </select>
                        <div class="text-center mt-9">
                            <button type="reset" id="form_assign_family_cancel"
                                class="btn btn-sm btn-light me-3 w-lg-200px" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="form_assign_family_submit" class="btn btn-sm btn-info w-lg-200px">
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
                <div class="col-lg-12 mt-md-n14">
                    <div class="card p-10">
                        <div class="row">
                            <div class="col-lg-6 mb-9">
                                <h4>Detail Keluarga</h4>
                            </div>
                            <div id="kt_table_customer_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="required fw-bold">Kepala Keluarga</span>
                                            </label>
                                            <input type="text" required autofocus placeholder="Kepala Keluarga"
                                                name="head_of_family" value="{{ $family->head_of_family }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="required fw-bold">Nomor KK</span>
                                            </label>
                                            <input type="text" required autofocus placeholder="Nomor KK"
                                                name="card_number" value="{{ $family->card_number }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="required fw-bold">Alamat</span>
                                            </label>
                                            <input type="text" required autofocus placeholder="Alamat" name="address"
                                                value="{{ $family->address }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="required fw-bold">Nomor HP</span>
                                            </label>
                                            <input type="number" required autofocus placeholder="Nomor HP" name="phone"
                                                value="{{ $family->phone }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="fw-bold">RT</span>
                                            </label>
                                            <input type="number" autofocus placeholder="RT" name="rt"
                                                value="{{ $family->rt }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="fw-bold">RW</span>
                                            </label>
                                            <input type="number" autofocus placeholder="RW" name="rw"
                                                value="{{ $family->rw }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="fw-bold">Kota</span>
                                            </label>
                                            <input type="text" autofocus placeholder="Kota" name="city"
                                                value="{{ $family->city }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="fw-bold">Kecamatan</span>
                                            </label>
                                            <input type="text" autofocus placeholder="Kecamatan" name="sub_district"
                                                value="{{ $family->sub_district }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="fw-bold">Keluarahan</span>
                                            </label>
                                            <input type="text" autofocus placeholder="Keluarahan" name="district"
                                                value="{{ $family->district }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="fw-bold">Kode POS</span>
                                            </label>
                                            <input type="text" autofocus placeholder="Kode POS" name="postal_code"
                                                value="{{ $family->postal_code }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="d-flex align-items-center fs-6 form-label mb-2">
                                                <span class="fw-bold">Provinsi</span>
                                            </label>
                                            <input type="text" autofocus placeholder="Provinsi" name="province"
                                                value="{{ $family->province }}" readonly
                                                class="form-control form-control-solid" />
                                        </div>
                                    </div>
                                </div>
                                {{-- separator --}}
                                <div class="separator separator-dashed my-10"></div>
                                {{-- button assign citizen --}}
                                <div class="d-flex justify-content-start">
                                    <a href="#modal_assign_family" data-bs-toggle="modal" class="btn btn-primary btn-sm">Tambah Warga</a>
                                </div>

                                <div class="table-responsive">
                                    <table id="table_family_member"
                                        class="table align-top table-striped border table-rounded gy-5">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>NIK</th>
                                                <th>Nama Lengkap</th>
                                                <th>Tempat Lahir</th>
                                                <th>Tanggal Lahir</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Alamat Domisili</th>
                                                <th>Aksi</th>
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

    <script>
        const deleteMember = (id) => {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-active-light'
                },
                buttonsStyling: false
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('family.delete-member') }}",
                        type: 'POST',
                        data: {
                            id: id
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            toastr.success("Warga Berhasil Dihapus", 'Selamat 🚀 !');
                            tableFamilyMember.ajax.reload();
                        },
                        error: function(xhr, status, errorThrown) {
                            const data = JSON.parse(xhr.responseText);
                            toastr.error(data.message, 'Opps!');
                        }
                    });
                }
            });
        }


        $(document).ready(function() {
            tableFamilyMember = $('#table_family_member').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                deferRender: true,
                responsive: false,
                aaSorting: [],
                buttons: [{
                    extend: 'excel',
                    className: 'btn btn-light-success btn-sm ms-3',
                    title: 'Data Keluarga',
                }, ],
                ajax: {
                    url: "{{ route('family.get-member.datatable') }}",
                    data: {
                        id: "{{ $family->id }}"
                    }
                },
                language: {
                    "lengthMenu": "Show _MENU_",
                    "emptyTable": "Tidak ada data terbaru 📁",
                    "zeroRecords": "Data tidak ditemukan 😞",
                },
                dom: "<'row mb-2'" +
                    "<'col-12 col-lg-6 d-flex align-items-center justify-content-start'l B>" +
                    "<'col-12 col-lg-6 d-flex align-items-center justify-content-lg-end justify-content-start 'f>" +
                    ">" +

                    "<'table-responsive'tr>" +

                    "<'row'" +
                    "<'col-12 col-lg-5 d-flex align-items-center justify-content-center justify-content-lg-start'i>" +
                    "<'col-12 col-lg-7 d-flex align-items-center justify-content-center justify-content-lg-end'p>" +
                    ">",

                columns: [{
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
                        "data": 'gender'
                    },
                    {
                        "data": 'address_domisili'
                    },
                    {
                        data: 'action',
                        searchable: false,
                        orderable: false,
                    }
                ],

            });

            $('#form_assign_family').submit(function(event) {
                event.preventDefault();
                var formData = new FormData($('#assign_family')[0]);

                $.ajax({
                    url: "{{ route('family.assign-citizen') }}",
                    type: 'POST',
                    data: {
                        family_id: "{{ $family->id }}",
                        citizen_id: $('#citizen_id').val(),
                    },
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        $(`#form_assign_family_submit`).attr('disabled', 'disabled');
                        $('#form_assign_family_submit').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                        );
                    },
                    success: function(data) {
                        toastr.success("Warga Berhasil Ditambahkan", 'Selamat 🚀 !');
                        $(`#form_assign_family_submit`).removeAttr('disabled', 'disabled');
                        $('#form_assign_family_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        $('#modal_assign_family').modal('hide');
                        tableFamilyMember.ajax.reload();
                    },
                    error: function(xhr, status, errorThrown) {
                        $(`#form_assign_family_submit`).removeAttr('disabled', 'disabled');
                        $('#form_assign_family_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        const data = JSON.parse(xhr.responseText);
                        toastr.error(data.message, 'Opps!');

                    }
                });
            });
        });
    </script>
@endsection
