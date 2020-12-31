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
                                    <li><a href="{{ route('frontend.beranda') }}"> HOME </a>
                                        <!--<ul class="submenu">-->
                                        <!--    <li><a href="index.html">home version 1</a></li>-->
                                        <!--    <li><a href="index-2.html">home version 2</a></li>-->
                                        <!--    <li><a href="index-3.html">home version 3</a></li>-->
                                        <!--</ul>-->
                                    </li>
                                    <li><a href="{{ route('frontend.register') }}"> REGISTRASI  </a></li>
                                    <!--<li class="mega-menu-position top-hover"><a href="shop.html"> SHOP <i class="fa fa-angle-down"></i> </a>-->
                                    <!--    <ul class="mega-menu">-->
                                    <!--        <li>-->
                                    <!--            <ul>-->
                                    <!--                <li class="mega-menu-title"><a href="#">Categories 01</a></li>-->
                                    <!--                <li><a href="shop.html">bag</a></li>-->
                                    <!--                <li><a href="shop.html">Pen</a></li>-->
                                    <!--                <li><a href="shop.html">Erasers</a></li>-->
                                    <!--                <li><a href="shop.html">Glue sticks</a></li>-->
                                    <!--                <li><a href="shop.html">Lunchbox </a></li>-->
                                    <!--                <li><a href="shop.html">Pencil box </a></li>-->
                                    <!--            </ul>-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <ul>-->
                                    <!--                <li class="mega-menu-title"><a href="#">Categories 02</a></li>-->
                                    <!--                <li><a href="shop.html">bag</a></li>-->
                                    <!--                <li><a href="shop.html">Pen</a></li>-->
                                    <!--                <li><a href="shop.html">Erasers</a></li>-->
                                    <!--                <li><a href="shop.html">Glue sticks</a></li>-->
                                    <!--                <li><a href="shop.html">Lunchbox </a></li>-->
                                    <!--                <li><a href="shop.html">Pencil box </a></li>-->
                                    <!--            </ul>-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <ul>-->
                                    <!--                <li class="mega-menu-title"><a href="#">Categories 03</a></li>-->
                                    <!--                <li><a href="shop.html">bag</a></li>-->
                                    <!--                <li><a href="shop.html">Pen</a></li>-->
                                    <!--                <li><a href="shop.html">Erasers</a></li>-->
                                    <!--                <li><a href="shop.html">Glue sticks</a></li>-->
                                    <!--                <li><a href="shop.html">Lunchbox </a></li>-->
                                    <!--                <li><a href="shop.html">Pencil box </a></li>-->
                                    <!--            </ul>-->
                                    <!--        </li>-->
                                    <!--        <li>-->
                                    <!--            <ul>-->
                                    <!--                <li class="mega-menu-title"><a href="#">Categories 04</a></li>-->
                                    <!--                <li><a href="shop.html">bag</a></li>-->
                                    <!--                <li><a href="shop.html">Pen</a></li>-->
                                    <!--                <li><a href="shop.html">Erasers</a></li>-->
                                    <!--                <li><a href="shop.html">Glue sticks</a></li>-->
                                    <!--                <li><a href="shop.html">Lunchbox </a></li>-->
                                    <!--                <li><a href="shop.html">Pencil box </a></li>-->
                                    <!--            </ul>-->
                                    <!--        </li>-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    <!--<li><a href="#"> PAGES <i class="fa fa-angle-down"></i> </a>-->
                                    <!--    <ul class="submenu">-->
                                    <!--        <li><a href="course.html">course page</a></li>-->
                                    <!--        <li><a href="event.html">event page</a></li>-->
                                    <!--        <li><a href="shop.html">shop page</a></li>-->
                                    <!--        <li><a href="course-details.html">course details</a></li>-->
                                    <!--        <li><a href="event-details.html">event details</a></li>-->
                                    <!--        <li><a href="single-product.html">single product</a></li>-->
                                    <!--        <li><a href="cart.html">cart page</a></li>-->
                                    <!--        <li><a href="checkout.html">checkout</a></li>-->
                                    <!--        <li><a href="wishlist.html">wishlist</a></li>-->
                                    <!--        <li><a href="login-register.html">login / register</a></li>-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    <li><a href="{{ route('login') }}"> LOGIN </a></li>
                                    <!--<li><a href="blog.html"> BLOG </a>-->
                                    <!--    <ul class="submenu">-->
                                    <!--        <li><a href="blog.html">blog</a></li>-->
                                    <!--        <li><a href="blog-details.html">blog details</a></li>-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    <!--<li><a href="contact.html"> CONTACT </a></li>-->
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
                            <li><a href="{{ route('frontend.beranda') }}">HOME</a>
                                <!--<ul>-->
                                <!--    <li><a href="index.html">home version 1</a></li>-->
                                <!--    <li><a href="index-2.html">home version 2</a></li>-->
                                <!--    <li><a href="index-3.html">home version 3</a></li>-->
                                <!--</ul>-->
                            </li>
                            <li><a href="{{ route('frontend.register') }}">REGISTRASI</a></li>
                            <!--<li><a href="shop.html">Shop</a>-->
                            <!--    <ul>-->
                            <!--        <li><a href="#">Categories 01</a>-->
                            <!--            <ul>-->
                            <!--                <li><a href="shop.html">bag</a></li>-->
                            <!--                <li><a href="shop.html">Pen</a></li>-->
                            <!--                <li><a href="shop.html">Erasers</a></li>-->
                            <!--                <li><a href="shop.html">Glue sticks</a></li>-->
                            <!--                <li><a href="shop.html">Lunchbox </a></li>-->
                            <!--                <li><a href="shop.html">Pencil box </a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--        <li><a href="#">Categories 02</a>-->
                            <!--            <ul>-->
                            <!--                <li><a href="shop.html">bag</a></li>-->
                            <!--                <li><a href="shop.html">Pen</a></li>-->
                            <!--                <li><a href="shop.html">Erasers</a></li>-->
                            <!--                <li><a href="shop.html">Glue sticks</a></li>-->
                            <!--                <li><a href="shop.html">Lunchbox </a></li>-->
                            <!--                <li><a href="shop.html">Pencil box </a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--        <li><a href="#">Categories 03</a>-->
                            <!--            <ul>-->
                            <!--                <li><a href="shop.html">bag</a></li>-->
                            <!--                <li><a href="shop.html">Pen</a></li>-->
                            <!--                <li><a href="shop.html">Erasers</a></li>-->
                            <!--                <li><a href="shop.html">Glue sticks</a></li>-->
                            <!--                <li><a href="shop.html">Lunchbox </a></li>-->
                            <!--                <li><a href="shop.html">Pencil box </a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--        <li><a href="#">Categories 04</a>-->
                            <!--            <ul>-->
                            <!--                <li><a href="shop.html">bag</a></li>-->
                            <!--                <li><a href="shop.html">Pen</a></li>-->
                            <!--                <li><a href="shop.html">Erasers</a></li>-->
                            <!--                <li><a href="shop.html">Glue sticks</a></li>-->
                            <!--                <li><a href="shop.html">Lunchbox </a></li>-->
                            <!--                <li><a href="shop.html">Pencil box </a></li>-->
                            <!--            </ul>-->
                            <!--        </li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li><a href="#">Pages</a>-->
                            <!--    <ul>-->
                            <!--        <li><a href="course.html">course page</a></li>-->
                            <!--        <li><a href="event.html">event page</a></li>-->
                            <!--        <li><a href="shop.html">shop page</a></li>-->
                            <!--        <li><a href="course-details.html">course details</a></li>-->
                            <!--        <li><a href="event-details.html">event details</a></li>-->
                            <!--        <li><a href="single-product.html">single product</a></li>-->
                            <!--        <li><a href="cart.html">cart page</a></li>-->
                            <!--        <li><a href="checkout.html">checkout</a></li>-->
                            <!--        <li><a href="wishlist.html">wishlist</a></li>-->
                            <!--        <li><a href="login-register.html">login / register</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <li><a href="{{ route('login') }}">LOGIN</a></li>
                            <!--<li><a href="blog.html">Blog</a>-->
                            <!--    <ul>-->
                            <!--        <li><a href="blog.html">blog</a></li>-->
                            <!--        <li><a href="blog-details.html">blog details</a></li>-->
                            <!--    </ul>-->
                            <!--</li>-->
                            <!--<li><a href="contact.html">Contact</a></li>-->
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>