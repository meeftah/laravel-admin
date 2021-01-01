@extends('frontend.layouts.app')

@section('title', 'Beranda')

@section('content')
<div class="slider-area">
    <div class="slider-active owl-carousel">
        @foreach ($slide as $item)
        <div class="single-slider slider-height-2 bg-img align-items-center d-flex slider-overlay2-1 default-overlay" style="background-image:url({{ $item->gambar }});">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                        <div class="slider-content slider-content-2 slider-animated-2 text-center">
                            @if($item->judul)<h1 class="animated">{{ $item->judul }}</h1>@endif
                            @if($item->deskripsi)<p class="animated">{{ $item->deskripsi }}</p>@endif
                            @if($item->url)
                            <div class="slider-btn">
                                <a class="animated default-btn" href="{{ $item->url }}">{{ $item->url_teks ?? 'Selengkapnya' }}</a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="about-us pt-70 pb-100" style="background-image:url({{ asset('assets/frontend/img/bg/bg-8.jpg') }});">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="about-content">
                    <div class="section-title section-title-green">
                        <h2>Sistem PPDB Online</h2>
                        <p>Informasi terkait PPDB Online Al-Fityan Kubu Raya</p>
                    </div>
                    <p>Website ini adalah sistem informasi PPDB Online Al-Fityan Kubu Raya yang dipersiapkan untuk menerima peserta didik baru 2021/2022. <br>Untuk petunjuk lebih lanjut terkait Pendaftaran Online silahkan untuk mengikuti video tutorial disamping :) </p>
                    {{-- <div class="about-btn mt-45">
                        <a class="default-btn" href="about-us.html">ABOUT US</a>
                    </div> --}}
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="about-img default-overlay">
                    <img src="{{ asset('assets/frontend/img/banner/viedo.jpg') }}" alt="">
                    <a class="video-btn video-popup" href="https://www.youtube.com/watch?v=aAu3UKwMOi0">
                        <img class="animated" src="{{ asset('assets/frontend/img/icon-img/video.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="achievement-area pt-20 pb-10">
    <div class="container">
        <div class="section-title mb-45">
            <h2>Kuota Siswa Baru</h2>
            <p>Total penerimaan siswa/i di masing-masing unit</p>
        </div>
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-count mb-30 count-one">
                    <div class="count-img">
                        <img src="{{ asset('assets/frontend/img/icon-img/achieve-2.png') }}" alt="">
                    </div>
                    <div class="count-content">
                        <h2 class="count">25</h2>
                        <span>TKIT</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
                <div class="single-count mb-30 count-two">
                    <div class="count-img">
                        <img src="{{ asset('assets/frontend/img/icon-img/achieve-2.png') }}" alt="">
                    </div>
                    <div class="count-content">
                        <h2 class="count">54</h2>
                        <span>SDIT</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-3 col-md-6 col-sm-6">
                <div class="single-count mb-30 count-three">
                    <div class="count-img">
                        <img src="{{ asset('assets/frontend/img/icon-img/achieve-2.png') }}" alt="">
                    </div>
                    <div class="count-content">
                        <h2 class="count">128</h2>
                        <span>SMPIT</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-md-6 col-sm-6">
                <div class="single-count mb-30 count-four">
                    <div class="count-img">
                        <img src="{{ asset('assets/frontend/img/icon-img/achieve-2.png') }}" alt="">
                    </div>
                    <div class="count-content">
                        <h2 class="count">64</h2>
                        <span>SMAIT</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="teacher-area pt-130 pb-100" style="background-image:url({{ asset('assets/frontend/img/bg/bg-3.jpg') }});">
    <div class="container">
        <div class="section-title mb-75">
            <h2>Best <span>Teacher</span></h2>
            <p>tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim <br>veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip </p>
        </div>
        <div class="custom-row">
            <div class="custom-col-5">
                <div class="single-teacher mb-30">
                    <div class="teacher-img">
                        <img src="{{ asset('assets/frontend/img/teacher/teacher-1.jpg') }}" alt="">
                    </div>
                    <div class="teacher-content-visible">
                        <h4>Robi Khan</h4>
                        <h5>Lecturer</h5>
                    </div>
                    <div class="teacher-content-wrap">
                        <div class="teacher-content">
                            <h4>Fawd Khan</h4>
                            <h5>Lecturer</h5>
                            <p>Tempor incididunt magna aliqua.</p>
                            <div class="teacher-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="youtube-play" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-col-5">
                <div class="single-teacher mb-30">
                    <div class="teacher-img">
                        <img src="{{ asset('assets/frontend/img/teacher/teacher-2.jpg') }}" alt="">
                    </div>
                    <div class="teacher-content-visible">
                        <h4>Jui Khan</h4>
                        <h5>Lecturer</h5>
                    </div>
                    <div class="teacher-content-wrap">
                        <div class="teacher-content">
                            <h4>Fawd Khan</h4>
                            <h5>Lecturer</h5>
                            <p>Tempor incididunt magna aliqua.</p>
                            <div class="teacher-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="youtube-play" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-col-5">
                <div class="single-teacher mb-30">
                    <div class="teacher-img">
                        <img src="{{ asset('assets/frontend/img/teacher/teacher-3.jpg') }}" alt="">
                    </div>
                    <div class="teacher-content-visible">
                        <h4>Fawd Khan</h4>
                        <h5>Lecturer</h5>
                    </div>
                    <div class="teacher-content-wrap">
                        <div class="teacher-content">
                            <h4>Fawd Khan</h4>
                            <h5>Lecturer</h5>
                            <p>Tempor incididunt magna aliqua.</p>
                            <div class="teacher-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="youtube-play" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-col-5">
                <div class="single-teacher mb-30">
                    <div class="teacher-img">
                        <img src="{{ asset('assets/frontend/img/teacher/teacher-4.jpg') }}" alt="">
                    </div>
                    <div class="teacher-content-visible">
                        <h4>Fawd Khan</h4>
                        <h5>Lecturer</h5>
                    </div>
                    <div class="teacher-content-wrap">
                        <div class="teacher-content">
                            <h4>Fawd Khan</h4>
                            <h5>Lecturer</h5>
                            <p>Tempor incididunt magna aliqua.</p>
                            <div class="teacher-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="youtube-play" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="custom-col-5">
                <div class="single-teacher mb-30">
                    <div class="teacher-img">
                        <img src="{{ asset('assets/frontend/img/teacher/teacher-5.jpg') }}" alt="">
                    </div>
                    <div class="teacher-content-visible">
                        <h4>Jui Khan</h4>
                        <h5>Lecturer</h5>
                    </div>
                    <div class="teacher-content-wrap">
                        <div class="teacher-content">
                            <h4>Fawd Khan</h4>
                            <h5>Lecturer</h5>
                            <p>Tempor incididunt magna aliqua.</p>
                            <div class="teacher-social">
                                <ul>
                                    <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="youtube-play" href="#"><i class="fa fa-youtube-play"></i></a></li>
                                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="brand-logo-area pt-70 pb-70">
    <div class="container">
        <div class="brand-logo-active owl-carousel">
            <div class="single-brand-logo">
                <a href="#"><img src="{{ asset('assets/frontend/img/brand-logo/1.png') }}" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ asset('assets/frontend/img/brand-logo/2.png') }}" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ asset('assets/frontend/img/brand-logo/3.png') }}" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ asset('assets/frontend/img/brand-logo/4.png') }}" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ asset('assets/frontend/img/brand-logo/5.png') }}" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ asset('assets/frontend/img/brand-logo/6.png') }}" alt=""></a>
            </div>
            <div class="single-brand-logo">
                <a href="#"><img src="{{ asset('assets/frontend/img/brand-logo/2.png') }}" alt=""></a>
            </div>
        </div>
    </div>
</div> --}}
@endsection