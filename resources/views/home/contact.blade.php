<!DOCTYPE html>
<html lang="en">
<x-home.head title="Professional & Affordable | Royal Choice Laundry "
    metaDescription="Have a question about our laundry or dry cleaning services? Want to schedule a pick-up or delivery? Contact the friendly team at Royal Choice Laundry today! We're here to help you with all of your laundry needs!" />


<body>
    {{-- <div class="preloader">
        <img class="preloader__image" width="60" src="assets/images/loader.png" alt="" />
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
                    <h2>Contact</h2>
                    <ul class="thm-breadcrumb list-unstyled">
                        <li><a href="index-2.html">Home</a></li>
                        <li><span>/</span></li>
                        <li class="active">Contact</li>
                    </ul>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Contact Page Start-->
        <section class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="contact-page__left">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">Get in Touch</span>
                                <h2 class="section-title__title">Don’t Hesitate to Contact</h2>
                            </div>
                            <p class="contact-page__text">Thank you for your interest in our laundry services! We'd love
                                to hear from you and answer any questions you may have. You can reach us using the
                                contact information below, or by filling out the form at the bottom of this page..</p>
                            <div>
                                <ul class="list-unstyled">
                                    <li>
                                        <h4 class="mt-3">Phone Lines</h4>
                                        <p>+234(702) 610 5981 </p>
                                        <p>+234(818) 529 8359</p>
                                    </li>
                                    <li>
                                        <h4 class="mt-3">Address</h4>
                                        <div class="text">
                                            <span class="icon-pin">Head Office</span>
                                            <p>344, Durban Road Besides AMC Hospital, Amuwo-Odofin Lagos</p>
                                        </div>

                                        <div class="text">
                                            <span class="icon-pin">Branch Office 1</span>
                                            <p>3, Tony Eigbokhan Street, Majek Bus-Stop, Abijo Lekki-Epe</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="contact-page__right">
                            <div>
                                <h3 class="mt-4 text-bold">Business Hours</h3>
                                <p>Monday - Saturday: 7:30am - 7:30pm</p>
                                <p>Sunday: Closed</p>
                            </div>
                            <div>
                                <p>

                                    If you need to drop off or pick up laundry outside of our regular business hours,
                                    please let us know and we'll do our best to accommodate your schedule.</p>
                                <p>We offer a variety of laundry services, including washing, drying, folding, and
                                    ironing. Our team takes pride in delivering high-quality laundry services with
                                    exceptional customer service. If you have any questions or concerns about our
                                    services, please don't hesitate to contact us.</p>
                            </div>
                            <form action="" class="comment-one__form contact-form-validated"
                                novalidate="novalidate">
                                <div class="row">
                                    <h3 class="mb-3">Contact Form</h3>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Your Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="comment-form__input-box">
                                            <input type="email" placeholder="Email Address" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Phone Number" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="comment-form__input-box">
                                            <input type="text" placeholder="Subject" name="subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="comment-form__input-box text-message-box">
                                            <textarea name="message" placeholder="Write a Comment"></textarea>
                                        </div>
                                        <div class="comment-form__btn-box">
                                            <button type="submit" class="thm-btn comment-form__btn">Send a
                                                Message<span class="icon-right-arrow"></span></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Contact Page End-->

        <!--Contact page Google Map Start-->
        <section class="contact-page-google-map">
            <div class="contact-page-google-map__inner text-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.4428669320323!2d3.3097268156744772!3d6.465445012881484!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b893ea63c4133%3A0x1154ae67089e6f74!2sAMC%20Hospital!5e0!3m2!1sen!2sng!4v1676636823425!5m2!1sen!2sng"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.7007490692417!2d3.476132114245789!3d6.432473326000725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103bf73c1587f185%3A0x99a2139fdb0f55f1!2sDimatelli%20Global%20Services%20Limited!5e0!3m2!1sen!2sng!4v1676636750881!5m2!1sen!2sng"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
        <!--Contact page Google Map End-->

        <!--Contact Info Start-->
        <section class="contact-info">
            <div class="container">
                <ul class="list-unstyled contact-info__list">
                    <li class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-telephone"></span>
                        </div>
                        <p>
                            <a href="tel:+234(702) 610 5981" class="contact-info__number-1">+234(702) 610 5981</a>
                            <a href="tel:+234(818) 529 8359" class="contact-info__number-2">+234(818) 529 8359</a>
                        </p>
                    </li>
                    <li class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-email"></span>
                        </div>
                        <p>
                            <a href="mailto:care@royalchoicelaundry.com"
                                class="contact-info__mail-1">care@royalchoicelaundry.com</a>
                            <a href="mailto:support@royalchoicelaundry.com"
                                class="contact-info__mail-2">support@royalchoicelaundry.com</a>
                        </p>
                    </li>
                    <li class="contact-info__single">
                        <div class="contact-info__icon">
                            <span class="icon-pin"></span>
                        </div>
                        <p> 344, Durban Road Besides AMC Hospital<br> Amuwo-Odofin Lagos.</p>
                    </li>
                </ul>
            </div>
        </section>
        <!--Contact Info End-->

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
                    <a href="mailto:care@royalchoicelaundry.com">care@royalchoicelaundry.com</a>
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
