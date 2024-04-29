@extends('layouts.app')
@section('title-apps', 'Lorong')
{{-- @section('sub-title-apps', 'Organization') --}}

@section('navbar')
    @include('layouts.navbar.navbar')
@endsection

@section('toolbar')
    @include('layouts.navbar.toolbar')
@endsection

@section('content')
    <div class="modal fade" id="modal_create_hallway" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0">
                    <h5 class="modal-title h4">Tambah Lorong</h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body mb-7">
                    <form id="form_create_hallway" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Nama Lorong</span>
                                </label>
                                <input type="text" :value="old('name')" required maxlength="200" autofocus
                                    placeholder="name" name="name" id="name"
                                    class="form-control form-control-solid  @error('name') is-invalid @enderror" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="d-flex align-items-center  form-label mb-2">
                                    <span class="required fw-bold">Penanggung Jawab</span>
                                </label>
                                <select class="form-select form-select-md form-select-solid" data-control="select2" required
                                    id="chief_id" name="chief_id" data-dropdown-parent="#modal_create_hallway">
                                    <option value="" selected hidden disabled>Pilih Penanggung Jawab</option>
                                    @foreach ($dataCitizen as $dc)
                                        <option value="{{ $dc->id }}">{{ $dc->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center mt-9">
                            <button type="reset" id="form_create_hallway_cancel"
                                class="btn btn-sm btn-light me-3 w-lg-200px" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="form_create_hallway_submit" class="btn btn-sm btn-info w-lg-200px">
                                <span class="indicator-label">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal_edit_hallway" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-md modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0">
                    <h5 class="modal-title h4">Perbaharui Lorong</h5>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body mb-7">
                    <form id="form_edit_hallway" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label class="d-flex align-items-center fs-6 form-label mb-2">
                                    <span class="required fw-bold">Nama Lorong</span>
                                </label>
                                <input type="text" :value="old('name')" required maxlength="200" autofocus
                                    placeholder="name" name="name" id="edit_name"
                                    class="form-control form-control-solid  @error('name') is-invalid @enderror" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <label class="d-flex align-items-center  form-label mb-2">
                                    <span class="required fw-bold">Penanggung Jawab</span>
                                </label>
                                <select class="form-select form-select-md form-select-solid" data-control="select2" required
                                    id="edit_chief_id" name="chief_id" data-dropdown-parent="#modal_edit_hallway">
                                    <option value="" selected hidden disabled>Pilih Penanggung Jawab</option>
                                    @foreach ($dataCitizen as $dc)
                                        <option value="{{ $dc->id }}">{{ $dc->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="text-center mt-9">
                            <button type="reset" id="form_edit_hallway_cancel"
                                class="btn btn-sm btn-light me-3 w-lg-200px" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" id="form_edit_hallway_submit" class="btn btn-sm btn-info w-lg-200px">
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
                                <h4>Lorong</h4>
                            </div>
                            <div class="col-lg-6 d-flex justify-content-end">
                                <div>
                                    <a href="#modal_create_hallway" data-bs-toggle="modal"
                                        class="btn btn-info btn-sm me-3 modal_create_hallway"><i
                                            class="fa-solid fa-plus"></i> Tambah Lorong
                                    </a>
                                </div>
                            </div>
                            <div id="kt_table_customer_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table id="table_halways"
                                        class="table align-top table-striped border table-rounded gy-5">
                                        <thead>
                                            <tr class="fw-bold fs-7 text-gray-500 text-uppercase">
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Penanggung Jawab</th>
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
@endsection

@push('js')
    <script>
        let tableHalways;

        const fillForm = (id, name, chief_id) => {
            $('#id').val(id);
            $('#edit_name').val(name);
            $('#edit_chief_id').val(chief_id).trigger('change');
        }

        const deleteHallway = (id) => {
            Swal.fire({
                title: 'Apakah Anda yakin menghapus Lorong ini?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Tidak, Batalkan!',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('hallways.delete') }}",
                        type: 'POST',
                        data: {
                            id: id
                        },
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            toastr.success("Lorong Berhasil Dihapus", 'Selamat 🚀 !');
                            tableHalways.ajax.reload();
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
            tableHalways = $('#table_halways').DataTable({
                processing: true,
                serverSide: true,
                retrieve: true,
                deferRender: true,
                responsive: false,
                aaSorting: [],
                buttons: [{
                    extend: 'excel',
                    className: 'btn btn-light-success btn-sm ms-3',
                    title: 'Data Lorong',
                }, ],
                ajax: {
                    url: "{{ route('hallways.get.datatable') }}",
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
                        data: 'name'
                    },
                    {
                        data: 'chief'
                    },
                    {
                        data: 'action',
                        searchable: false,
                        orderable: false,
                    }
                ],

            });

            $('#form_create_hallway').submit(function(event) {
                event.preventDefault();
                var formData = new FormData($('#form_create_hallway')[0]);

                $.ajax({
                    url: "{{ route('hallways.store') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        $(`#form_create_hallway_submit`).attr('disabled', 'disabled');
                        $('#form_create_hallway_submit').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                            );
                    },
                    success: function(data) {
                        toastr.success("Lorong Berhasil Ditambahkan", 'Selamat 🚀 !');
                        $(`#form_create_hallway_submit`).removeAttr('disabled', 'disabled');
                        $('#form_create_hallway_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        $('#modal_create_hallway').modal('hide');
                        tableHalways.ajax.reload();
                    },
                    error: function(xhr, status, errorThrown) {
                        $(`#form_create_hallway_submit`).removeAttr('disabled', 'disabled');
                        $('#form_create_hallway_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        const data = JSON.parse(xhr.responseText);
                        toastr.error(data.message, 'Opps!');

                    }
                });
            });

            $('#form_edit_hallway').submit(function(event) {
                event.preventDefault();
                var formData = new FormData($('#form_edit_hallway')[0]);

                $.ajax({
                    url: "{{ route('hallways.update') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    beforeSend: function() {
                        $(`#form_edit_hallway_submit`).attr('disabled', 'disabled');
                        $('#form_edit_hallway_submit').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                            );
                    },
                    success: function(data) {
                        toastr.success("Lorong Berhasil Ditambahkan", 'Selamat 🚀 !');
                        $(`#form_edit_hallway_submit`).removeAttr('disabled', 'disabled');
                        $('#form_edit_hallway_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        $('#modal_edit_hallway').modal('hide');
                        tableHalways.ajax.reload();
                    },
                    error: function(xhr, status, errorThrown) {
                        $(`#form_edit_hallway_submit`).removeAttr('disabled', 'disabled');
                        $('#form_edit_hallway_submit').html(
                            '<span class="indicator-label">Simpan</span>');
                        const data = JSON.parse(xhr.responseText);
                        toastr.error(data.message, 'Opps!');

                    }
                });
            });
        });
    </script>
@endpush
