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

    <!-- /Mobile View -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="/" aria-label="logo image"><img src="home/assets/images/resources/logo-1.png"
                        width="155" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:support@deroyalchoiceng.com">support@deroyalchoiceng.com</a>
                </li>
                <li>
                    <i class="fab fa-whatsapp" href="https://wa.me/2348109787915"></i>
                    <a href="https://wa.me/2348109787915" target="_blank">+234(810)978-7915</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+2347045529886" target="_blank">+234(704)552-9886</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->

        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->
    <!-- /.script-elements -->
    @include('home.partials.scripts')

</body>

</html>
