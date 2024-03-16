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
    <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="modal-body mx-5 mx-lg-15 mb-7">
                    <form id="modal_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        enctype="multipart/form-data">
                        contoh modal
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
