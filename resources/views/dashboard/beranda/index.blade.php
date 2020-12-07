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
    <p class="mg-b-0">Halaman beranda PPDB Al-Fityan Kubu Raya</p>
</div>
@endsection