<!DOCTYPE html>
<html lang="en">
<x-home.head title="Professional & Affordable | Royal Choice Laundry "
    metaDescription="At Royal Choice Laundry, we offer a wide range of laundry and dry cleaning services to meet your needs. From everyday clothing to delicate fabrics, we have the expertise and equipment to get the job done right. Contact us today to learn more!" />

<body>
    {{-- <div class="preloader">
        <img class="preloader__image" width="60" src=/assets/images/loader.png" alt="" />
    </div> --}}
    <!-- /.preloader -->
    <div class="page-wrapper">
        @include('home.partials.header')

        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url(home/assets/images/backgrounds/page-header-bg.jpg)">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Our Services</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="/">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Services</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Services Page Start-->
        <section class="services-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="100ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="home/assets/images/services/services-1-1.jpg" alt="">
                                <div class="services-one__icon">
                                    <span class="icon-drying"></span>
                                </div>
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="#dry-cleaning.html">Dry Cleaning</a></h3>
                                <p class="services-one__text">Our dry cleaning services use state-of-the-art equipment&
                                    top-quality solvents to clean & refresh your clothes.</p>
                                <div class="services-one__btn-box">
                                    <a href="{{ route('home.services') }}" class="thm-btn services-one__btn">Read More
                                        Info
                                        <span class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="home/assets/images/services/services-1-2.jpg" alt="">
                                <div class="services-one__icon">
                                    <span class="icon-steam-iron"></span>
                                </div>
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="#steam-iron.html">Steam Iron</a></h3>
                                <p class="services-one__text">Upgrade your ironing game with our steam iron! Say goodbye
                                    to
                                    wrinkles and hello to a perfectly pressed look.</p>
                                <div class="services-one__btn-box">
                                    <a href="{{ route('home.services') }}" class="thm-btn services-one__btn">Read More
                                        Info
                                        <span class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="300ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="home/assets/images/services/services-1-3.jpg" alt="">
                                <div class="services-one__icon">
                                    <span class="icon-laundry-machine"></span>
                                </div>
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="#laundry-service.html">Laundry Service</a>
                                </h3>
                                <p class="services-one__text"> With our convenient pickup and delivery service, you'll
                                    never
                                    have to worry about running out of clean clothes </p>
                                <div class="services-one__btn-box">
                                    <a href="{{ route('home.services') }}" class="thm-btn services-one__btn">Read More
                                        Info
                                        <span class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="home/assets/images/services/services-1-4.jpg" alt="">
                                <div class="services-one__icon">
                                    <span class="icon-washing"></span>
                                </div>
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="#stain-removal.html">Stain Removal</a></h3>
                                <p class="services-one__text">Say goodbye to stubborn stains with our expert stain
                                    removal services. We'll tackle the toughest stains so you don't have to.</p>
                                <div class="services-one__btn-box">
                                    <a href="#stain-removal.html" class="thm-btn services-one__btn">Read More Info
                                        <span class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="500ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="home/assets/images/services/services-1-5.jpg" alt="">
                                <div class="services-one__icon">
                                    <span class="icon-curtain"></span>
                                </div>
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="#curtains-wash.html">Curtains Wash</a></h3>
                                <p class="services-one__text">Transform your home or Offices with our professional
                                    curtain washing
                                    services.
                                    Let us take care of your dirty curtains and bring them back to life.</p>
                                <div class="services-one__btn-box">
                                    <a href="#curtains-wash.html" class="thm-btn services-one__btn">Read More Info
                                        <span class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                        <!--Services One Single-->
                        <div class="services-one__single">
                            <div class="services-one__img">
                                <img src="home/assets/images/services/services-1-6.jpg" alt="">
                                <div class="services-one__icon">
                                    <span class="icon-laundry-basket"></span>
                                </div>
                            </div>
                            <div class="services-one__content">
                                <h3 class="services-one__title"><a href="#commercial-laundry.html">Commercial
                                        Laundry</a></h3>
                                <p class="services-one__text">Efficient, reliable commercial laundry services for your
                                    business needs.We'll handle your laundry needs so you can focus on your business.
                                </p>
                                <div class="services-one__btn-box">
                                    <a href="#commercial-laundry.html" class="thm-btn services-one__btn">Read More
                                        Info
                                        <span class="icon-right-arrow"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Services Page End-->
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
                <a href="{{ route('home.index') }}" aria-label="logo image"><img
                        src="home/assets/images/resources/logo-2.png" width="155" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:needhelp@packageName__.com">care@royalchoicelaundry.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:(702)610-5981">+234 (702)610-5981</a>
                    <a href="tel:(818)529-8359">+234 (818)529-8359</a>
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
    <!-- /.search-popup -->
    @include('home.partials.scripts')
</body>

</html>
