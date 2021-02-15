@extends('dashboard.layouts.admin')

@section('title', 'Detail Info Tambahan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
  <nav class="breadcrumb pd-0 mg-0 tx-12">
    <a class="breadcrumb-item" href="{{ route('dashboard.info-tambahan.index') }}">Info Tambahan</a>
    <a class="breadcrumb-item" href="javascript: void(0);">Daftar Info {{ $infoTambahan->judul }}</a>
  </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-inline-flex align-items-center">
  @if ($infoTambahan->ikon) <img src="{{ url($infoTambahan->ikon) }}" alt="ikon" width="100px"> @endif
  <h4 class="tx-gray-800 mg-l-20">Daftar Info {{ $infoTambahan->judul }}</h4>
</div>
@endsection

@section('content')
<div class="row">
  <div class="col-12">
    <div class="widget-2">
      <div class="card shadow-base overflow-hidden">
        <div class="card-body">
          <div>
            @if ($infoTambahan->deskripsi) <p>{!! $infoTambahan->deskripsi !!}</p> @endif
          </div>
          @if ($infoTambahan->infoTambahanDaftar)
          <div id="accordion" class="accordion" role="tablist" aria-multiselectable="true">
            @foreach ($infoTambahan->infoTambahanDaftar as $item)
            <div class="card">
              <div class="card-header" role="tab" id="heading-{{ $item->id }}">
                <h6 class="mg-b-0" style="width: 100%">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse-{{ $item->id }}"
                    aria-expanded="false" aria-controls="collapse-{{ $item->id }}" class="tx-gray-800 transition">
                    {{ $item->judul }}
                  </a>
                </h6>
              </div>
              <div id="collapse-{{ $item->id }}" class="collapse" role="tabpanel"
                aria-labelledby="heading-{{ $item->id }}">
                <div class="card-block pd-20">
                  {{ $item->judul }}
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection