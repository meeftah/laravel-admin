<header class="header-area">
    <div class="header-bottom sticky-bar clearfix">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-4">
                    <div class="logo mt-3">
                        <a href="{{ route('frontend.beranda') }}">
                            <img alt="" src="{{ asset('assets/common/logo-text.png') }}" height="50px">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-6 col-8">
                    <div class="menu-cart-wrap">
                        <div class="main-menu">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('frontend.beranda') }}">Beranda</a></li>
                                    <li><a href="{{ route('frontend.register.form') }}">Registrasi</a></li>
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <ul>
                                <li><a href="{{ route('frontend.beranda') }}">Beranda</a></li>
                                <li><a href="{{ route('frontend.register.form') }}">Registrasi</a></li>
                                <li><a href="{{ route('login') }}">Login</a></li>
                            </ul>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>