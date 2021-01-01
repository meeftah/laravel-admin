@extends('layouts.admin')

@section('title', 'Ubah Data Tempat Tinggal Saat Ini')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.tempattinggal.index') }}">Tempat Tinggal Saat Ini</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Ubah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Data Tempat Tinggal Saat Ini</h4>
    <p class="mg-b-0">Ubah data Tempat Tinggal Saat Ini {{ $tempattinggal->tempattinggal }}</p>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.tempattinggal.update', $tempattinggal->id_tempattinggal) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Kode: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text"
                            name="kode" placeholder="Masukkan kode" value="{{ old('kode', $tempattinggal->kode) }}">
                        @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">tempat tinggal: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('tempattinggal') ? 'is-invalid' : '' }}" type="text"
                            name="tempattinggal" placeholder="Masukkan data tempattinggal"
                            value="{{ old('tempattinggal', $tempattinggal->tempattinggal) }}">
                        @error('tempattinggal')
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