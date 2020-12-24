@extends('frontend.layouts.app')

@section('title', 'Pendaftaran PPDB')

@section('content')
<div class="breadcrumb-area">
    <div class="breadcrumb-top default-overlay bg-img breadcrumb-overly-3 pt-100 pb-95" style="background-image:url({{ asset('assets/frontend/img/bg/breadcrumb-bg-3.jpg') }});">
        <div class="container">
            <h2>Pendaftaran PPDB Online Al-Fityan Kubu Raya</h2>
            <p>Formulir pendaftaran</p>
        </div>
    </div>
</div>
<div class="register-area bg-img pt-130 pb-130" style="background-image:url({{ asset('assets/frontend/img/slider/slider-bg.jpg') }});">
    <div class="container">
        <div class="section-title-2 mb-75 white-text">
            <h2>Daftar <span>Sekarang</span></h2>
            <p>Winter Admission Is Going On. We are announcing  Special discount for winter batch 2019.</p>
        </div>
        <div class="register-wrap">
            <div id="register-3" class="mouse-bg">
                <div class="winter-banner">
                    <img src="{{ asset('assets/frontend/img/banner/regi-1.png') }}" alt="">
                    <div class="winter-content">
                        <span>TAHUN AJARAN</span>
                        <h3 style="font-size: 30pt">2021/2022</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-8">
                    <div class="register-form">
                        <h4>Get A free Registration</h4>
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
                                    <div class="contact-form-style mb-20">
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="mb-20">
                                        <button type="submit" class="default-btn">D A F T A R</button>
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