@extends('dashboard.layouts.admin')

@section('title', 'Ubah Daftar Info Tambahan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.info-tambahan.index') }}">Info Tambahan</a>
        <a class="breadcrumb-item"
            href="{{ route('dashboard.info-tambahan-daftar.index', $infoTambahanDaftar->id_info_tambahan) }}">
            Daftar {{ App\Models\InfoTambahan::getDataById($infoTambahanDaftar->id_info_tambahan)->judul }}
        </a>
        <a class="breadcrumb-item" href="javascript: void(0);">Ubah {{ $infoTambahanDaftar->judul }}</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Ubah Daftar Info Tambahan</h4>
    <p class="mg-b-0">Ubah info tambahan <b>{{ $infoTambahanDaftar->judul }}</b></p>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('dashboard.info-tambahan-daftar.update', $infoTambahanDaftar->id) }}"
                    method="POST">
                    @method('PUT')
                    @csrf
                    @include('dashboard.infotambahandaftar.form', ['edit' => true, 'data' => $infoTambahanDaftar,
                    'id_info_tambahan' => $infoTambahanDaftar->id_info_tambahan])
                    <div class="form-layout-footer mt-4">
                        <button class="btn btn-warning col-md-3">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection