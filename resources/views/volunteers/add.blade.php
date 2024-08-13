@extends('layouts.master')
@section('css')
@livewireScripts
@endsection
@section('content')
<div class="app-content content ">
<div class="content-overlay"></div>
<div class="header-navbar-shadow"></div>
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="col-12">
                <h2 class="fw-normal">المتطوعين</h2>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-slash">
                    <li class="breadcrumb-item"><a href="#">الرئيسية</a></li>
                    <li class="breadcrumb-item" aria-current="page">المتطوعين</li>
                    <li class="breadcrumb-item active" aria-current="page">الكل</li>
                </ol>
            </nav>
        </div>
        
        <div class="content-body">
        <section id="basic-vertical-layouts">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">Vertical Form</h4>
                    </div>
                    <div class="card-body">
                    <form class="form form-vertical">
                        <div class="row">
                        <div class="col-12">
                            <div class="mb-1">
                            <label class="form-label" for="first-name-vertical">First Name</label>
                            <input type="text" id="first-name-vertical" class="form-control" name="fname" placeholder="First Name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                            <label class="form-label" for="email-id-vertical">Email</label>
                            <input type="email" id="email-id-vertical" class="form-control" name="email-id" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                            <label class="form-label" for="contact-info-vertical">Mobile</label>
                            <input type="number" id="contact-info-vertical" class="form-control" name="contact" placeholder="Mobile">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                            <label class="form-label" for="password-vertical">Password</label>
                            <input type="password" id="password-vertical" class="form-control" name="contact" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="customCheck3">
                                <label class="form-check-label" for="customCheck3">Remember me</label>
                            </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="reset" class="btn btn-primary me-1 waves-effect waves-float waves-light">Submit</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                        </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            </section>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
@livewireScriptConfig 
<script src="{{asset("app-assets/js/scripts/forms/form-tooltip-valid.min.js")}}"></script>
@endsection
@push('scripts')
@endpush

