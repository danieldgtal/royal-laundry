<!DOCTYPE html>
<html lang="en">
<x-home.head title="Professional & Affordable | Royal Choice Laundry | About Us "
    metaDescription="At Royal Choice Laundry, we take pride in offering our customers the highest quality laundry and dry cleaning services. Our team of experts has years of experience in the industry, and we are committed to providing fast, reliable, and affordable service. Contact us today to experience the Royal Choice Laundry difference!" />

<body>
    {{-- <div class="preloader">
        <img class="preloader__image" width="60" src="assets/images/loader.png" alt="" />
    </div> --}}
    <!-- /.preloader -->
    <div class="page-wrapper">
        @include('home.partials.header')

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(home/assets/images/backgrounds/page-header-bg.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>About</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index-2.html">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">About</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Get To Know Start-->
        <section class="get-to-know">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="get-to-know__left">
                            <ul class="list-unstyled get-to-know__img-box">
                                <li>
                                    <div class="get-to-know__img-1">
                                        <img src="home/assets/images/resources/get-to-know-img-1.jpg" alt="">
                                    </div>
                                </li>
                                <li>
                                    <div class="get-to-know__img-2">
                                        <img src="home/assets/images/resources/get-to-know-img-2.jpg" alt="">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="welcome-one__right">
                            <div class="section-title text-left">
                                <h2 class="section-title__title">Simplified Laundry Solution</h2>
                            </div>
                            <p class="welcome-one__text-1">we offer convenient and affordable laundry services that take
                                the
                                burden off your shoulders.</p>
                            <p class="welcome-one__text-2">We are a team of dedicated professionals committed to
                                providing
                                exceptional laundry services to our customers.</p>
                            <ul class="list-unstyled welcome-one__points">
                                <li>
                                    <p>
                                        At our laundry site, we take pride in offering the best dry cleaning services
                                        available. Our state-of-the-art equipment is specifically designed to clean and
                                        refresh your clothes using the most advanced technology available. We use only
                                        the highest-quality solvents to ensure that your clothes are not only clean but
                                        also protected from damage and wear.
                                    </p>
                                </li>
                                <li>
                                    <p>Our professional dry cleaning team is experienced in handling all types of
                                        fabrics and garments, from delicate silk dresses to tailored suits. We take
                                        extra care to ensure your clothes are cleaned thoroughly while maintaining their
                                        quality and integrity.</p>
                                </li>
                                <li>
                                    <p>We provide convenient online platform, you can easily schedule a pickup and
                                        delivery service that works with your busy schedule. And with our affordable
                                        prices and quick turnaround times, you'll have your clothes back looking and
                                        feeling great in no time.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Get To Know End-->

        <!--Counter One Start-->
        <section class="counter-one">
            <div class="counter-one__container">
                <ul class="list-unstyled counter-one__list">
                    <li class="counter-one__single">
                        <div class="counter-one__content">
                            <h3 class="odometer" data-count="8000">00</h3>
                            <p class="counter-one__text">Clothes Washed</p>
                        </div>
                    </li>
                    <li class="counter-one__single">
                        <div class="counter-one__content">
                            <h3 class="odometer" data-count="500">00</h3>
                            <p class="counter-one__text">Happy Customers</p>
                        </div>
                    </li>
                    <li class="counter-one__single">
                        <div class="counter-one__content">
                            <h3 class="odometer" data-count="7000">00</h3>
                            <p class="counter-one__text">Dry Cleaned</p>
                        </div>
                    </li>
                    <li class="counter-one__single">
                        <div class="counter-one__content">
                            <h3 class="odometer" data-count="10000">00</h3>
                            <p class="counter-one__text">Steam & Ironed</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!--Counter One End-->

        <!--Site Footer Start-->
        @include('home.partials.footer')
        <!--Site Footer End-->


    </div>
    <!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index-2.html" aria-label="logo image"><img src="home/assets/images/resources/logo-2.png"
                        width="155" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">support@deroyalchoiceng.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:(702)610-5981">+234(810)978-7915</a>
                    <a href="tel:(818)529-8359">+234(704)552-9886</a>
                    <a href="tel:(818)529-8359">+234(818)529-8359</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="#" class="fab fa-twitter"></a>
                    <a href="#" class="fab fa-facebook-square"></a>
                    <a href="#" class="fab fa-pinterest-p"></a>
                    <a href="#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->
        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    @include('home.partials.scripts')
</body>

</html>
