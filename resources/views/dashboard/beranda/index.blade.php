@extends('layouts.admin')

@section('title', 'Beranda')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.home') }}">Beranda</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Beranda</h4>
    <p class="mg-b-0">Halaman beranda {{ config('app.name') }}</p>
</div>
@endsection

{{-- Tampilan untuk Calon Siswa TK, SD, SMP, SMA --}}
@hasanyrole('Calon Siswa TK|Calon Siswa SD|Calon Siswa SMP|Calon Siswa SMA')
@section('content')
@if (auth()->user()->getStatusCasisKu() == config('status_ppdb.calon_siswa.terdaftar'))
@include('dashboard.calonsiswa.status.terdaftar')
@elseif (auth()->user()->getStatusCasisKu() == config('status_ppdb.calon_siswa.nonaktif'))
@include('dashboard.calonsiswa.status.nonaktif')
@elseif (auth()->user()->getStatusCasisKu() == config('status_ppdb.calon_siswa.terverifikasi'))
@include('dashboard.calonsiswa.status.terverifikasi')
@endif
@endsection
@endhasanyrole