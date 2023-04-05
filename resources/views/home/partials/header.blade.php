<header class="main-header clearfix">
    <div class="main-header__top">
        <div class="main-header__top-inner">
            <div class="main-header__top-left">
                <ul class="list-unstyled main-header__top-address">
                    <li>
                        <div class="icon">
                            <span class="icon-email"></span>
                        </div>
                        <div class="text">
                            <p><a href="mailto:support@deroyalchoiceng.com">support@deroyalchoiceng.com</a></p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <span class="icon-pin"></span>
                        </div>
                        <div class="text">
                            <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe</p>
                        </div>
                    </li>
                    <li>
                        <div class="icon">
                            <span class="icon-pin"></span>
                        </div>
                        <div class="text">
                            <p>344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="main-header__top-right">
                <div class="main-header__top-social">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <nav class="main-menu clearfix">
        <div class="main-menu-wrapper clearfix">
            <div class="main-menu-wrapper__left">
                <div class="main-menu-wrapper__logo">
                    <a href="/"><img src="home/assets/images/resources/logo-1.png" alt=""></a>
                </div>
                <div class="main-menu-wrapper__btn-box">
                    <a href="{{ route('login') }}" class="thm-btn main-menu-wrapper__btn">Login
                        <span class="icon-right-arrow"></span></a>
                </div>
            </div>
            <div class="main-menu-wrapper__right">
                <div class="main-menu-wrapper__main-menu">
                    <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                    <ul class="main-menu__list">
                        <li class="">
                            <a href="{{ route('home.index') }}">Home</a>
                        </li>
                        <li class="">
                            <a href="{{ route('home.about') }}">About</a>
                        </li>
                        <li class="">
                            <a href="{{ route('home.services') }}">Services</a>

                        </li>
                        <li><a href="{{ route('home.contact') }}">Contact</a></li>
                        <li class="dropdown">
                            <a href="#">Explore</a>
                            <ul>
                                <li><a href="{{ route('login') }}">Login</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                                <li><a href="#news.html">Blog</a></li>
                                <li><a href="#testimonials">Testimonials</a></li>
                                <li><a href="#faq">Faq</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <div class="main-menu-wrapper__search-call">
                    <div class="main-menu-wrapper__search-box">

                    </div>
                    <div class="main-menu-wrapper__call">
                        <div class="main-menu-wrapper__call-icon">
                            <span class="icon-phone-call"></span>
                        </div>
                        <div class="main-menu-wrapper__call-number">
                            <p>Call Anytime</p>
                            <h5><a href="tel:+234(702)6105981">+234(810) 978 7915</a></h5>
                            <h5><a href="tel:+234(704)5529886">+234(704) 552 9886</a></h5>
                            <h5><a href="tel:+234(818)5298359">+234(818) 529 8359</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
