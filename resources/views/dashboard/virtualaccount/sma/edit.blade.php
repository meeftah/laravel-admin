@extends('layouts.admin')

@section('title', 'Ubah Data Virtual Account SMAIT')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.va.sma.index') }}">Virtual Account SMAIT</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Ubah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Data Virtual Account SMAIT</h4>
    <p class="mg-b-0">Ubah data Virtual Account SMAIT {{ $vasma->va }}</p>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.va.sma.update', $vasma->id_va_sma) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Virtual Account: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('va') ? 'is-invalid' : '' }}" type="text"
                            name="va" placeholder="Masukkan VA" value="{{ old('va', $vasma->va) }}">
                        @error('va')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Kode Nama: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('kode_nama') ? 'is-invalid' : '' }}" type="text"
                            name="kode_nama" placeholder="Masukkan kode_nama" value="{{ old('kode_nama', $vasma->kode_nama) }}">
                        @error('kode_nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Status: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" type="text"
                            name="status" placeholder="Masukkan data status" value="{{ old('status', $vasma->status) }}">
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-2">
                    <div class="form-layout-footer">
                        <button class="btn btn-warning col-12">Ubah</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
</div>
@endsection