@extends('layouts.app')
@section('title-apps', 'Keluarga')
{{-- @section('sub-title-apps', 'Organization') --}}

@section('navbar')
    @include('layouts.navbar.navbar')
@endsection

@section('toolbar')
    @include('layouts.navbar.toolbar')
@endsection

@section('content')
    <div class="modal fade" id="modal_create_family" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0">
                    <h5 class="modal-title h4">Tambah Keluarga</h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body mb-7">
                    <form id="form_craete_family" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Kepala Keluarga</span>
                                </label>
                                <input type="text" required autofocus placeholder="Kepala Keluarga" name="head_of_family"
                                    id="head_of_family" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Nomor KK</span>
                                </label>
                                <input type="text" required autofocus placeholder="Nomor KK" name="card_number"
                                    id="card_number" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Alamat</span>
                                </label>
                                <input type="text" required autofocus placeholder="Alamat" name="address" id="address"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Nomor HP</span>
                                </label>
                                <input type="number" required autofocus placeholder="Nomor HP" name="phone"
                                    id="phone" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">RT</span>
                                </label>
                                <input type="number" autofocus placeholder="RT" name="rt" id="rt"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">RW</span>
                                </label>
                                <input type="number" autofocus placeholder="RW" name="rw" id="rw"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kota</span>
                                </label>
                                <input type="text" autofocus placeholder="Kota" name="city" id="city"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kecamatan</span>
                                </label>
                                <input type="text" autofocus placeholder="Kecamatan" name="sub_district"
                                    id="sub_district" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Keluarahan</span>
                                </label>
                                <input type="text" autofocus placeholder="Keluarahan" name="district" id="district"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kode POS</span>
                                </label>
                                <input type="text" autofocus placeholder="Kode POS" name="postal_code" id="postal_code"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Provinsi</span>
                                </label>
                                <input type="text" autofocus placeholder="Provinsi" name="province" id="province"
                                    class="form-control form-control-solid" />
                            </div>
                        </div>
                        <div class="text-center mt-9">
                            <button type="reset" id="form_craete_family_cancel"
                                class="btn btn-sm btn-light me-3 w-lg-200px" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="form_craete_family_submit" class="btn btn-sm btn-info w-lg-200px">
                                <span class="indicator-label">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_edit_family" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0">
                    <h5 class="modal-title h4">Perbaharui Keluarga</h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body mb-7">
                    <form id="form_edit_family" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Kepala Keluarga</span>
                                </label>
                                <input type="text" required autofocus placeholder="Kepala Keluarga"
                                    name="head_of_family" id="edit_head_of_family"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Nomor KK</span>
                                </label>
                                <input type="text" required autofocus placeholder="Nomor KK" name="card_number"
                                    id="edit_card_number" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Alamat</span>
                                </label>
                                <input type="text" required autofocus placeholder="Alamat" name="address"
                                    id="edit_address" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Nomor HP</span>
                                </label>
                                <input type="number" required autofocus placeholder="Nomor HP" name="phone"
                                    id="edit_phone" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">RT</span>
                                </label>
                                <input type="number" autofocus placeholder="RT" name="rt" id="edit_rt"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">RW</span>
                                </label>
                                <input type="number" autofocus placeholder="RW" name="rw" id="edit_rw"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kota</span>
                                </label>
                                <input type="text" autofocus placeholder="Kota" name="city" id="edit_city"
                                    class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kecamatan</span>
                                </label>
                                <input type="text" autofocus placeholder="Kecamatan" name="sub_district"
                                    id="edit_sub_district" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Keluarahan</span>
                                </label>
                                <input type="text" autofocus placeholder="Keluarahan" name="district"
                                    id="edit_district" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Kode POS</span>
                                </label>
                                <input type="text" autofocus placeholder="Kode POS" name="postal_code"
                                    id="edit_postal_code" class="form-control form-control-solid" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="fw-bold">Provinsi</span>
                                </label>
                                <input type="text" autofocus placeholder="Provinsi" name="province"
                                    id="edit_province" class="form-control form-control-solid" />
                            </div>
                        </div>
                        <div class="text-center mt-9">
                            <button type="reset" id="form_edit_family_cancel"
                                class="btn btn-sm btn-light me-3 w-lg-200px" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="form_edit_family_submit" class="btn btn-sm btn-info w-lg-200px">
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
                                <h4>Keluarga</h4>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <div>
                                    <a href="#modal_create_family" data-bs-toggle="modal"
                                        class="btn btn-info btn-sm me-3 modal_create_family"><i
                                            class="fa-solid fa-plus"></i> Tambah Keluarga
                                    </a>
                                </div>
                            </div>
                            <div id="kt_table_customer_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table id="table_family"
                                        class="table align-top table-striped border table-rounded gy-5">
                                        <thead>
                                            <tr class="fw-bold fs-7 text-gray-500 text-uppercase">
                                                <th>#</th>
                                                <th>Kepala Keluarga</th>
                                                <th>Nomor KK</th>
                                                <th>Alamat</th>
                                                <th>Total Anggota Keluarga</th>
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
        const fillForm = (
            id,
            head_of_family,
            card_number,
            address,
            phone,
            rt,
            rw,
            sub_district,
            district,
            city,
            postal_code,
            province
        ) => {
            $('#id').val(id);
            $('#edit_head_of_family').val(head_of_family);
            $('#edit_card_number').val(card_number);
            $('#edit_address').val(address);
            $('#edit_phone').val(phone);
            $('#edit_rt').val(rt);
            $('#edit_rw').val(rw);
            $('#edit_sub_district').val(sub_district);
            $('#edit_district').val(district);
            $('#edit_city').val(city);
            $('#edit_postal_code').val(postal_code);
            $('#edit_province').val(province);
        }

        const deleteFamily = (id) => {
            Swal.fire({
                title: 'Apakah Anda yakin menghapus Keluarga ini?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Tidak, Batalkan!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('family.delete') }}",
                        type: 'POST',
                        data: {
                            id: id
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            toastr.success("Keluarga Berhasil Dihapus", 'Selamat 🚀 !');
                            tableFamily.ajax.reload();
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
            tableFamily = $('#table_family').DataTable({
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
                    url: "{{ route('family.get.datatable') }}",
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
                        data: 'head_of_family'
                    },
                    {
                        data: 'card_number'
                    },
                    {
                        data: 'address'
                    },
                    {
                        data: 'total_family'
                    },
                    {
                        data: 'action',
                        searchable: false,
                        orderable: false,
                    }
                ],

            });

            $('#form_craete_family').submit(function(event) {
                event.preventDefault();
                var formData = new FormData($('#form_craete_family')[0]);

                $.ajax({
                    url: "{{ route('family.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        $(`#form_craete_family_submit`).attr('disabled', 'disabled');
                        $('#form_craete_family_submit').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                        );
                    },
                    success: function(data) {
                        toastr.success("Keluarga Berhasil Ditambahkan", 'Selamat 🚀 !');
                        $(`#form_craete_family_submit`).removeAttr('disabled', 'disabled');
                        $('#form_craete_family_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        $('#modal_create_family').modal('hide');
                        tableFamily.ajax.reload();
                    },
                    error: function(xhr, status, errorThrown) {
                        $(`#form_craete_family_submit`).removeAttr('disabled', 'disabled');
                        $('#form_craete_family_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        const data = JSON.parse(xhr.responseText);
                        toastr.error(data.message, 'Opps!');

                    }
                });
            });

            $('#form_edit_family').submit(function(event) {
                event.preventDefault();
                var formData = new FormData($('#form_edit_family')[0]);

                $.ajax({
                    url: "{{ route('family.update') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        $(`#form_edit_family_submit`).attr('disabled', 'disabled');
                        $('#form_edit_family_submit').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                        );
                    },
                    success: function(data) {
                        toastr.success("Keluarga Berhasil Ditambahkan", 'Selamat 🚀 !');
                        $(`#form_edit_family_submit`).removeAttr('disabled', 'disabled');
                        $('#form_edit_family_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        $('#modal_edit_family').modal('hide');
                        tableFamily.ajax.reload();
                    },
                    error: function(xhr, status, errorThrown) {
                        $(`#form_edit_family_submit`).removeAttr('disabled', 'disabled');
                        $('#form_edit_family_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        const data = JSON.parse(xhr.responseText);
                        toastr.error(data.message, 'Opps!');

                    }
                });
            });
        });
    </script>
@endsection
