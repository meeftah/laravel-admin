@extends('dashboard.layouts.admin')

@section('title', 'Tambah Daftar Info Tambahan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.info-tambahan.index') }}">Info Tambahan</a>
        <a class="breadcrumb-item" href="{{ route('dashboard.info-tambahan-daftar.index', $infoTambahan->id) }}">Daftar {{ $infoTambahan->judul }}</a>
        <a class="breadcrumb-item" href="javascript: void(0);">Tambah</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Tambah Daftar Info Tambahan</h4>
    <p class="mg-b-0">Tambah daftar info tambahan baru</p>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.info-tambahan-daftar.store', $infoTambahan->id) }}" method="POST">
                    @csrf
                    @include('dashboard.infotambahandaftar.form', ['edit' => false])
                    <div class="form-layout-footer mt-4">
                        <button type="submit" class="btn btn-success col-md-3">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection