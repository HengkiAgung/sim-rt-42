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
    <div class="row justify-content-center mt-n20">
        <div class="col-lg-12 mt-n20">
            <div class="row justify-content-center mt-md-n20">
                <div class="col-lg-9 mt-md-n14">
                    <div class="card p-10">
                        dashboard <br>
                        <a href="#modal" data-bs-toggle="modal" class="btn btn-info btn-sm me-3 btn_tambah_job_level"><i
                                class="fa-solid fa-plus"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
