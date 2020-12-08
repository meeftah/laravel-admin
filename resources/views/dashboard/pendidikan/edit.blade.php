@extends('layouts.admin')

@section('title', 'Ubah Data Pendidikan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.pendidikan.index') }}">Pendidikan</a>
        <a class="breadcrumb-item" href="#">Ubah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Data Pendidikan</h4>
    <p class="mg-b-0">Ubah data pendidikan {{ $pendidikan->pendidikan }}</p>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.pendidikan.update', $pendidikan->id_pendidikan) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Kode: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('kode') ? 'is-invalid' : '' }}" type="text"
                            name="kode" placeholder="Masukkan kode" value="{{ old('kode', $pendidikan->kode) }}">
                        @error('kode')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Pendidikan: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('pendidikan') ? 'is-invalid' : '' }}" type="text"
                            name="pendidikan" placeholder="Masukkan data pendidikan"
                            value="{{ old('pendidikan', $pendidikan->pendidikan) }}">
                        @error('pendidikan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-layout-footer">
                        <button class="btn btn-warning col-12">Ubah</button>
                    </div><!-- form-layout-footer -->
                </div>
            </div>
        </form>
    </div>
</div>
@endsection