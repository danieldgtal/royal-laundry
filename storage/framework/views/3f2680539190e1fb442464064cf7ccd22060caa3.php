
<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- start page title -->
        <?php
            $url = url()->current();
            $page = Str::ucfirst(basename(parse_url($url, PHP_URL_PATH)));
        ?>
        <?php if (isset($component)) { $__componentOriginal062657d254d0017cd73d2239b8c04d3d5f51928a = $component; } ?>
<?php $component = App\View\Components\Dashboard\DashboardHeader::resolve(['url' => ''.e($page).''] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('dashboard.dashboard-header'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Dashboard\DashboardHeader::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal062657d254d0017cd73d2239b8c04d3d5f51928a)): ?>
<?php $component = $__componentOriginal062657d254d0017cd73d2239b8c04d3d5f51928a; ?>
<?php unset($__componentOriginal062657d254d0017cd73d2239b8c04d3d5f51928a); ?>
<?php endif; ?>
        <!-- end page title -->

        
        
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('staff.customers', [])->html();
} elseif ($_instance->childHasBeenRendered('X7LKR1m')) {
    $componentId = $_instance->getRenderedChildComponentId('X7LKR1m');
    $componentTag = $_instance->getRenderedChildComponentTagName('X7LKR1m');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('X7LKR1m');
} else {
    $response = \Livewire\Livewire::mount('staff.customers', []);
    $html = $response->html();
    $_instance->logRenderedChild('X7LKR1m', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/staff/customers.blade.php ENDPATH**/ ?>