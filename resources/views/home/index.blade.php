<!DOCTYPE html>
<html lang="en">
<x-home.head title="Professional & Affordable | Royal Choice Laundry "
    metaDescription="Looking for a premium laundry service? Look no further than Royal Choice Laundry! We offer professional laundry and dry cleaning services for your everyday and special occasion clothing. Contact us today for fast, reliable service!" />

<body>
    <div class="preloader">
        {{-- <img class="preloader__image" width="60" src="home/assets/images/loader.png" alt="" /> --}}
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        @include('home.partials.header')
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->

        <!--Main Slider Start-->
        @include('home.partials.slider')
        <!--Main Slider End-->

        <!--Feature One Start-->
        @include('home.partials.features')
        <!--Feature One End-->

        <!--Welcome One Start-->
        @include('home.partials.experience-years')
        <!--Welcome One End-->

        <!--Services One Start-->
        @include('home.partials.services-offers')
        <!--Services One End-->

        <!--Brand One Start-->
        {{-- @include('home.partials.partners') --}}
        <!--Brand One End-->

        <!--Book One Start-->
        @include('home.partials.discounts')
        <!--Book One End-->

        <!--Commercial Start-->
        @include('home.partials.brief-services')
        <!--Commercial End-->

        <!--Why Choose One Start-->
        @include('home.partials.why-choose-us')
        <!--Why Choose One End-->

        <!--How We Work Start-->
        @include('home.partials.how-we-work')
        <!--How We Work End-->

        <!--Testimonial One Start-->
        @include('home.partials.testimonials')
        <!--Testimonial One End-->

        <!--News One Start-->
        @include('home.partials.faq')
        <!--News One End-->

        <!--CTA One Start-->
        @include('home.partials.booking')
        <!--CTA One End-->

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
                    <a href="mailto:needhelp@packageName__.com">help@royalchoicelaundry.com</a>
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
    <!-- /.script-elements -->
    @include('home.partials.scripts')

</body>

</html>
