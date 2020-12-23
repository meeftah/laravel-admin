@extends('layouts.admin')

@section('title', 'Ubah Data Virtual Account TKIT')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.va.tk.index') }}">Virtual Account TKIT</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Ubah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Data Virtual Account TKIT</h4>
    <p class="mg-b-0">Ubah data Virtual Account TKIT {{ $vatk->va }}</p>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.va.tk.update', $vatk->id_va_tk) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Virtual Account: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('va') ? 'is-invalid' : '' }}" type="text"
                            name="va" placeholder="Masukkan Virtual Account" value="{{ old('va', $vatk->va) }}">
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
                            name="kode_nama" placeholder="Masukkan Kode Nama" value="{{ old('kode_nama', $vatk->kode_nama) }}">
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
                            name="status" placeholder="Masukkan data status" value="{{ old('status', $vatk->status) }}">
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