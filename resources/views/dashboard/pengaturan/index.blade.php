@extends('layouts.admin')

@section('title', 'Pengaturan')

@section('breadcrumb')
<div class="br-pageheader pd-y-15 pd-l-20">
    <nav class="breadcrumb pd-0 mg-0 tx-12">
        <a class="breadcrumb-item" href="{{ route('dashboard.pengaturan.index') }}">Pengaturan</a>
    </nav>
</div>
@endsection

@section('content-header')
<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
    <h4 class="tx-gray-800 mg-b-5">Pengaturan</h4>
    <p class="mg-b-0">Halaman pengaturan PPDB Online</p>
</div>
@endsection

@section('content')
<div class="row mg-t-20">
    <div class="col-sm-5">
        <div class="bg-white rounded shadow-base overflow-hidden">
            <div class="pd-x-20 pd-t-20 pd-b-20 d-flex align-items-center">
                <div class="mr-3">
                    <button type="button" class="btn btn-primary btn-icon" title="UBAH">
                        <div><i class="fa fa-eye"></i></div>
                    </button>
                    <button type="button" class="btn btn-warning btn-icon" title="UBAH">
                        <div><i class="fa fa-pencil"></i></div>
                    </button>
                </div>
                <i class="ion ion-ios-book tx-80 lh-0 tx-success op-5"></i>
                <div class="mg-l-20">
                    <p class="tx-10 tx-spacing-1 tx-mont tx-medium tx-uppercase mg-b-10">
                        Tahun Ajaran <span class="square-8 bg-success ml-2 mg-r-5 rounded-circle"></span> Aktif
                    </p>
                    <p class="tx-32 tx-inverse tx-lato tx-black mg-b-0 lh-1 text-success">2021 / 2022</p>
                    <span class="tx-12 tx-roboto tx-gray-600">Periode: 4 Januari 2021 - 4 Maret 2021</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mg-t-20">
    <div class="col-md-5">
        <div class="card shadow-base bd-0">
            <div class="card-header bg-transparent pd-20">
                <h6 class="card-title tx-uppercase tx-12 mg-b-0">Pengaturan Unit Sekolah</h6>
            </div><!-- card-header -->
            <table class="table mg-b-0 tx-12" style="width: 100%">
                <thead>
                    <tr class="tx-10">
                        <th class="text-center">Nama Unit</th>
                        <th class="text-center">Kuota</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unit as $item)
                    <tr>
                        <td class="pl-5">
                            <span class="tx-inverse tx-14 tx-medium d-block">{{ $item->nm_unit }}</span>
                        </td>
                        <td class="text-center">
                            <span class="tx-inverse tx-14 tx-medium d-block">{{ $item->kuota }}</span>
                        </td>
                        <td class="tx-12">
                            <span class="square-8 {{ $item->status ? 'bg-success' : 'bg-danger' }} mg-r-5 rounded-circle"></span> {{ $item->status ? 'Aktif' : 'Tidak Aktif' }}
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-icon" title="UBAH">
                                <div><i class="fa fa-pencil"></i></div>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div><!-- card -->
    </div>
</div>
@endsection