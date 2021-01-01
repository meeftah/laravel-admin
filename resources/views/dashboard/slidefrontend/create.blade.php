@extends('layouts.admin')

@section('title', 'Tambah Slide')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.slidefrontend.index') }}">Gambar Slide</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Tambah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Tambah Gambar Slide</h4>
    <p class="mg-b-0">Tambah Slide baru</p>
</div>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.slidefrontend.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-control-label">Nama: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                            name="name" placeholder="Masukkan nama pegguna" value="{{ old('name', null) }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                            name="email" placeholder="Masukkan email dengan format yang benar"
                            value="{{ old('email', null) }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                        <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            name="password" placeholder="Masukkan password minimal 6 karakter">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Konfirmasi Password: <span class="tx-danger">*</span></label>
                        <input type="password"
                            class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                            name="password_confirmation" placeholder="Ulangi password">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-control-label">Peran: <span class="tx-danger">*</span></label>
                        <select class="form-control select2-show-search {{ $errors->has('role') ? 'is-invalid' : '' }}"
                            id="role" name="role" data-placeholder="Pilih Peran">
                            <option></option>
                            @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-layout-footer text-center mt-4">
                        <button class="btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link href="{{ asset('assets/dashboard/lib/select2/css/select2.min.css') }}" rel="stylesheet">
<style>
    .input-validation-error~.select2 .select2-selection {
        border: 1px solid red;
    }
</style>
@endpush

@push('scripts')
<script src="{{ asset('assets/dashboard/lib/select2/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function () {
            'use strict';
            $('.select2').select2({
                minimumResultsForSearch: Infinity
            });
        });
</script>
@endpush