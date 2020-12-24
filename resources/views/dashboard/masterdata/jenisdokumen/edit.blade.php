@extends('layouts.admin')

@section('title', 'Ubah Data Jenis Dokumen')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.jenisdokumen.index') }}">Jenis Dokumen</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Ubah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Data Jenis Dokumen</h4>
    <p class="mg-b-0">Ubah data Jenis Dokumen {{ $jenisdokumen->jenisdokumen }}</p>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('dashboard.jenisdokumen.update', $jenisdokumen->id_jenisdokumen) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">

                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">jenis dokumen: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('jenisdokumen') ? 'is-invalid' : '' }}" type="text"
                            name="jenisdokumen" placeholder="Masukkan data jenis dokumen"
                            value="{{ old('jenisdokumen', $jenisdokumen->jenisdokumen) }}">
                        @error('jenisdokumen')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">unit: <span class="tx-danger">*</span></label>
                        <input class="form-control {{ $errors->has('unit') ? 'is-invalid' : '' }}" type="text"
                            name="unit" placeholder="Masukkan unit" value="{{ old('unit', $jenisdokumen->unit) }}">
                        @error('unit')
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