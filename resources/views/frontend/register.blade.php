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
            <p>Pastikan nomor hanpond dan email yang diinput merupakan nomor whatsApp dan email yang aktif,<br> untuk mendapatkan notifikasi pemberitahuan bahwa akun anda benar sudah terdaftar di sistem kami ^-^</p>
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
            <div class="row bg-primary">
                <div class="col-lg-10 col-md-8 pt-5 pl-5 pr-5 pb-5">
                    <div class="register-form">
                        <h4>Formulir Pembuatan Akun</h4>
                        <form>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="name" placeholder="First Name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="name" placeholder="Last Name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="name" placeholder="Phone" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style mb-20">
                                        <input name="name" placeholder="Email" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="contact-form-style">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-form-style">
                                        <button type="submit" class="submit default-btn">D A F T A R</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="register-1" class="mouse-bg"></div>
    <div id="register-2" class="mouse-bg"></div>
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