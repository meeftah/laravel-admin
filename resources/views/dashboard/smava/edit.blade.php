@extends('layouts.admin')

@section('title', 'Ubah Data Virtual Account SMAIT')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.smava.index') }}">Virtual Account SMAIT</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Ubah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Data Virtual Account SMAIT</h4>
    <p class="mg-b-0">Ubah data Virtual Account SMAIT {{ $smava->smava }}</p>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.smava.update', $smava->id_smava) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Virtual Account: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('smava') ? 'is-invalid' : '' }}" type="text"
                            name="smava" placeholder="Masukkan smava" value="{{ old('smava', $smava->smava) }}">
                        @error('smava')
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
                            name="kode_nama" placeholder="Masukkan kode_nama" value="{{ old('kode_nama', $smava->kode_nama) }}">
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
                            name="status" placeholder="Masukkan data status" value="{{ old('status', $smava->status) }}">
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