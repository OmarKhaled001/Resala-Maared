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
            <a href="{{route('addVol')}}" type="button" class="btn btn-primary waves-effect waves-float waves-light">إضافة متطوع</a>

            <section id="basic-datatable">
                <div class="row">
                        @livewire('all-vol')
                </div>
            </section>
        </div>
    </div>
</div>
</div>
@endsection

@section('js')
@livewireScriptConfig 
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script> 
@endsection
@push('scripts')
@endpush

