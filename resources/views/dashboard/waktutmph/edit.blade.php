@extends('layouts.admin')

@section('title', 'Ubah Data Waktu Tempuh')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.waktutmph.index') }}">Waktu Tempuh</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Ubah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Data Waktu Tempuh</h4>
    <p class="mg-b-0">Ubah data {{ $waktutmph->waktutmph }}</p>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.waktutmph.update', $waktutmph->id_waktutmph) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Kode: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text"
                            name="kode" placeholder="Masukkan kode" value="{{ old('kode', $waktutmph->kode) }}">
                        @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Waktu Tempuh: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('waktutmph') ? 'is-invalid' : '' }}" type="text"
                            name="waktutmph" placeholder="Masukkan data waktu tempuh"
                            value="{{ old('waktutmph', $waktutmph->waktutmph) }}">
                        @error('waktutmph')
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