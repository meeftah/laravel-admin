@extends('frontend.layouts.app')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95"
        style="background-image:url({{ asset('assets/frontend/img/bg/headerreg.jpg') }});">
        <div class="container">
            <h2>Pendaftaran PPDB Online Al-Fityan Kubu Raya</h2>
        </div>
    </div>
</div>
<div class="register-area bg-img pt-130 pb-130"
    style="background-image:url({{ asset('assets/frontend/img/bg/bg-8.jpg') }});">
    <div class="container">
        <div class="section-title-2 mb-75">
            <h2>Informasi <span>Penting !!!</span></h2>
            <p>Pastikan nomor handphone dan email yang diinput merupakan nomor whatsApp dan email yang aktif,<br> untuk mendapatkan notifikasi pemberitahuan bahwa akun anda benar sudah terdaftar di sistem kami ^-^</p>
        </div>
        <div class="register-wrap">
            <div id="register-3" class="mouse-bg d-none d-md-block">
                <div class="winter-banner">
                    <img src="{{ asset('assets/frontend/img/banner/regi-6.png') }}" alt="">
                    <div class="winter-content">
                        <span>TAHUN AJARAN</span>
                        <h3 style="font-size: 30pt">2021/2022</h3>
                    </div>
                </div>
            </div>
            <div class="row bg-primary rounded">
                <div class="col-lg-12 col-md-8 pt-5 pl-5 pr-5 pb-5">
                    <div class="register-form">
                        <h4>Formulir Pembuatan Akun</h4>
                        <form action="{{ route('frontend.register') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label text-white">Username: <span
                                        class="text-warning">*</span></label>
                                <input class="form-control {{ $errors->has('username') ? 'is-invalid' : '' }}"
                                    type="text" name="username" placeholder="Masukkan usernama pegguna"
                                    value="{{ old('username', null) }}">
                                @error('username')
                                <span class="text-warning" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-white">Email: <span
                                        class="text-warning">*</span></label>
                                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text"
                                    name="email" placeholder="Masukkan email dengan format yang benar"
                                    value="{{ old('email', null) }}">
                                @error('email')
                                <span class="text-warning" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-white">No WhatsApp: <span
                                        class="text-warning">*</span></label>
                                <input class="form-control {{ $errors->has('nohp') ? 'is-invalid' : '' }}" type="text"
                                    name="nohp" placeholder="Masukkan no whatsapp Anda dengan benar"
                                    value="{{ old('nohp', null) }}"
                                    oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                                @error('nohp')
                                <span class="text-warning" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-white">Pendaftaran:
                                    <span class="text-warning">*</span>
                                </label>
                                <select name="id_status_pendaftaran" class="form-control {{ $errors->has('id_status_pendaftaran') ? 'is-invalid' : '' }}">
                                    <option value="" disabled selected>Pilih Pendaftaran</option>
                                    @foreach ($statusPendaftaran as $item)
                                    <option value="{{ $item->id_status_pendaftaran }}">
                                        {{ strtoupper($item->status) }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('id_status_pendaftaran')
                                <span class="text-warning" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-white">Unit:
                                    <span class="text-warning">*</span>
                                </label>
                                <select name="id_unit" class="form-control {{ $errors->has('id_unit') ? 'is-invalid' : '' }}">
                                    <option value="" disabled selected>Pilih Unit</option>
                                    @foreach ($unit as $item)
                                    <option value="{{ $item->id_unit }}">
                                        {{ strtoupper($item->nm_unit) }}
                                    </option>
                                    @endforeach
                                </select>
                                @error('id_unit')
                                <span class="text-warning" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-white">Password: <span
                                        class="text-warning">*</span></label>
                                <input type="password"
                                    class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                    name="password" placeholder="Masukkan password minimal 6 karakter">
                                @error('password')
                                <span class="text-warning" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-control-label text-white">Konfirmasi Password: <span
                                        class="text-warning">*</span></label>
                                <input type="password"
                                    class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                    name="password_confirmation" placeholder="Ulangi password">
                                @error('password_confirmation')
                                <span class="text-warning" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-layout-footer mt-4">
                                <div class="contact-form-style">
                                    <button class="submit default-btn" type="submit">D A F T A R</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .section-title-2 h2 {
        color: #000 !important;
    }
    .section-title-2 p {
        color: crimson !important;
    }
</style>
@endpush