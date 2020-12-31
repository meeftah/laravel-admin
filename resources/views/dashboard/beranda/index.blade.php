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

@hasanyrole('Calon Siswa TK|Calon Siswa SD|Calon Siswa SMP|Calon Siswa SMA')
@section('content')
<div class="card">
    <div class="card-body">
        <div class="text-justify">
            <div>
                <p>
                    Anda telah berhasil membuat akun PPDB Online Al-Fityan Kubu Raya, namun
                    untuk melanjutkan ke tahap pengisian data, Anda diwajibkan untuk membayar
                    uang formulir
                </p>
            </div>
            <hr>
            <div>
                <h4 class="text-danger">PERINGATAN!</h4>
                <p>
                    <strong>Kode Virtual Account (VA)</strong>
                    Anda hanya berlaku <strong class="text-danger">2x24 jam</strong> setelah pembuatan akun.
                    Jika telah kadaluwarsa maka VA akan langsung berstatus <strong class="text-danger">hangus</strong>
                    (VA tidak dapat lagi digunakan untuk transaksi pembayaran), jadi pastikan sebelum
                    <strong class="text-danger">waktu habis</strong> Anda telah mentransfer sesuai dengan data
                    pembayaran.
                </p>
                <p>
                    Jika dalam waktu <strong class="text-danger">30 menit</strong> terakhir sebelum
                    waktu kode VA Anda kadaluwarsa akun anda belum terverifikasi oleh Admin setelah
                    melakukan pembayaran, segera <strong>menghubungi Admin</strong> untuk
                    verifikasi pembayaran Anda. Jika Anda
                    <strong class="text-danger">mentransfer lewat dari waktu kadaluwarsa</strong>,
                    maka <strong>bukan menjadi tanggung jawab Al-Fityan Kubu Raya</strong>.
                </p>
            </div>
        </div>
    </div>
</div>
<div class="card mt-4">
    <div class="card-body">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td class="fitwidth">Username</td>
                            <td width="10px">:</td>
                            <td>Nama Calon Siswa</td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Kode Virtual Account (VA)</td>
                            <td width="10px">:</td>
                            <td>KODE VA</td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Nama Pembayaran</td>
                            <td width="10px">:</td>
                            <td>KODE NAMA</td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Bank Pembayaran</td>
                            <td width="10px">:</td>
                            <td>BNI Syariah</td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Tanggal Terakhir Pembayaran</td>
                            <td width="10px">:</td>
                            <td>
                                {{-- {{ (new \Carbon\Carbon($getExpiredDate))->translatedFormat('l, d F Y') }}
                                ,
                                pukul {{ (new \Carbon\Carbon($getExpiredDate))->translatedFormat('H:i') }}
                                WIB --}}
                            </td>
                        </tr>
                        <tr>
                            <td class="fitwidth">Total Pembayaran</td>
                            <td width="10px">:</td>
                            <td><b class="text-danger">Rp 300.000,-</b></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <hr>
            <h4>Melalui Transfer ATM BNI/BNI Syariah</h4>
            <ol>
                <li>Pilih <strong>Menu Lain > Transfer</strong></li>
                <li>Pilih rekening asal dan pilih rekening tujuan ke rekening BNI</li>
                <li>Masukkan nomor rekening dengan nomor Virtual Account Anda
                    {{-- <strong class="text-danger">{{ $va->kode_va }}</strong> --}}
                    dan pilih <strong>Benar</strong>
                </li>
                <li>Masukkan jumlah pembayaran sebesar
                    <strong class="text-danger">Rp 300.000,-</strong>
                    dan pilih <strong>Benar</strong>
                </li>
                <li>Periksa data di layar. Pastikan <strong>Total Pembayaran</strong> benar.
                    Apabila data sudah benar, pilih <strong>Ya</strong>
                </li>
            </ol>
            <h4>Melalui Transfer ATM Bersama</h4>
            <ol>
                <li>Pilih <strong>Menu Lain > Transfer</strong></li>
                <li>Pilih rekening tujuan ke rekening <strong>Bank Lain</strong></li>
                <li>Masukkan nomor rekening dengan nomor Virtual Account Anda disertai kode Bank BNI
                    <strong class="text-info">009</strong>
                    {{-- <strong class="text-danger">{{ $va->kode_va }}</strong> --}}
                    dan pilih <strong>Benar</strong>
                </li>
                <li>Masukkan jumlah pembayaran sebesar
                    <strong class="text-danger">Rp 300.000,-</strong>
                    dan pilih <strong>Benar</strong>
                </li>
                <li>Periksa data di layar. Pastikan <strong>Total Pembayaran</strong> benar.
                    Apabila data sudah benar, pilih <strong>Ya</strong>
                </li>
            </ol>
            <h4>Melalui Transfer mBanking</h4>
            <ol>
                <li>Pilih <strong>Transfer > Antar Rekening BNI</strong></li>
                <li>Pilih <strong>Rekening Tujuan > Input Rekening Baru</strong>.
                    Masukkan nomor rekening dengan nomor Virtual Account Anda
                    {{-- <strong class="text-danger">{{ $va->kode_va }}</strong> --}}
                    dan klik <strong>Lanjut</strong>, kemudian klik <strong>Lanjut</strong> lagi.
                </li>
                <li>Masukkan jumlah pembayaran sebesar
                    <strong class="text-danger">Rp 300.000,-</strong>
                    lalu klik <strong>Lanjutkan</strong>
                </li>
                <li>Periksa detail konfirmasi. Pastikan <strong>Total Pembayaran</strong> benar.
                    Jika benar, masukkan password transaksi dan klik <strong>Lanjut</strong>
                </li>
            </ol>
            <hr>
            <div class="text-right printoff">
                <button id="print" class="btn btn-default btn-outline" type="button">
                    <span><i class="fa fa-print"></i> CETAK</span>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    td.fitwidth {
        width: 1px;
        white-space: nowrap;
    }
</style>
@endpush
@endhasanyrole