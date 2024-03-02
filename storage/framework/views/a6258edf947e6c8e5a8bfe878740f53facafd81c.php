<!DOCTYPE html>
<html lang="en">
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.home.head','data' => ['title' => 'Professional & Affordable | Royal Choice Laundry ','metaDescription' => 'Looking for a premium laundry service? Look no further than Royal Choice Laundry! We offer professional laundry and dry cleaning services for your everyday and special occasion clothing. Contact us today for fast, reliable service!']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('home.head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Professional & Affordable | Royal Choice Laundry ','metaDescription' => 'Looking for a premium laundry service? Look no further than Royal Choice Laundry! We offer professional laundry and dry cleaning services for your everyday and special occasion clothing. Contact us today for fast, reliable service!']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

<body>
    <div class="preloader">
        
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <?php echo $__env->make('home.partials.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="stricky-header stricked-menu main-menu">
            <div class="sticky-header__content"></div>
            <!-- /.sticky-header__content -->
        </div>
        <!-- /.stricky-header -->

        <!--Main Slider Start-->
        <?php echo $__env->make('home.partials.slider', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--Main Slider End-->

        <!--Feature One Start-->
        <?php echo $__env->make('home.partials.features', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--Feature One End-->

        <!--Welcome One Start-->
        <?php echo $__env->make('home.partials.experience-years', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--Welcome One End-->

        <!--Services One Start-->
        <?php echo $__env->make('home.partials.services-offers', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--Services One End-->

        <!--Book One Start-->
        <?php echo $__env->make('home.partials.discounts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--Book One End-->

        <!--Commercial Start-->
        <?php echo $__env->make('home.partials.brief-services', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--Commercial End-->

        <!--Why Choose One Start-->
        <?php echo $__env->make('home.partials.why-choose-us', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--Why Choose One End-->

        <!--How We Work Start-->
        <?php echo $__env->make('home.partials.how-we-work', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--How We Work End-->

        <!--News One Start-->
        <?php echo $__env->make('home.partials.faq', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--News One End-->

        <!--CTA One Start-->
        <?php echo $__env->make('home.partials.booking', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!--CTA One End-->

        <!--Site Footer Start-->
        <?php echo $__env->make('home.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
    <?php echo $__env->make('home.partials.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/home/index.blade.php ENDPATH**/ ?>