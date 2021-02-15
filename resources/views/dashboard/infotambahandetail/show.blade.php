@extends('dashboard.layouts.admin')

@section('title', 'Detail Daftar Info Tambahan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('dashboard.info-tambahan.index') }}">Info Tambahan</a>
    <a class="breadcrumb-item"
      href="{{ route('dashboard.info-tambahan-daftar.index', $infoTambahanDaftar->id_info_tambahan) }}">
      Daftar {{ App\Models\InfoTambahan::getDataById($infoTambahanDaftar->id_info_tambahan)->judul }}
    </a>
    <a class="breadcrumb-item" href="javascript: void(0);">Detail {{ $infoTambahanDaftar->judul }}</a>
  </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
  <h4 class="tx-gray-800 mg-b-5">Detail {{ $infoTambahanDaftar->judul }}</h4>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="widget-2">
      <div class="card shadow-base overflow-hidden">
        <div class="card-body">
          tabel
        </div>
      </div>
    </div>
  </div>
</div>
@endsection