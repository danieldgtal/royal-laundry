

<?php $__env->startSection('content'); ?>
    <div class="account-card-box">
        <div class="card mb-0">
            <div class="card-body p-4">
                <?php if(session('success')): ?>
                    <div class="alert alert-success"><strong> <?php echo e(session('success')); ?> </strong></div>
                <?php endif; ?>
                <?php if(session('logout-success')): ?>
                    <div class="alert alert-success"><strong> <?php echo e(session('logout-success')); ?> </strong></div>
                <?php endif; ?>
                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="alert alert-danger text-center" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                <div class="text-center">
                    <div class="my-3">
                        <a href="<?php echo e(route('home.index')); ?>">
                            <span><img src="<?php echo e(asset('dashboard/assets/images/logo.png')); ?>" class="mx-auto" alt=""
                                    height="28"></span>
                        </a>
                    </div>
                    <h5 class="text-muted text-uppercase py-3 font-16">Sign In</h5>
                </div>

                <form method="POST" action="<?php echo e(route('login')); ?>" class="mt-2">
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
                        <input class="form-control" name="email" type="email" value="<?php echo e(old('email')); ?>"
                            placeholder="Enter your email" required autofocus>
                    </div>

                    <div class="form-group mb-3">
                        <input class="form-control" name="password" type="password" id="password"
                            placeholder="Enter your password" required>
                    </div>


                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                            <label class="custom-control-label" for="checkbox-signin">Remember me</label>

                            <a href="<?php echo e(route('password.request')); ?>" class="text-muted float-right">Forgot
                                your
                                password <i class="mdi mdi-lock mr-1"></i> </a>
                        </div>

                    </div>

                    <div class="form-group text-center">
                        <button class="btn btn-success btn-block waves-effect waves-light" type="submit"> Log In </button>
                    </div>

                    <span>Not yet a Member ? <a href="<?php echo e(route('register')); ?>"> Register </a> </span>

                </form>

            </div> <!-- end card-body -->
        </div>
        <!-- end card -->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.guest', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/auth/loginForm.blade.php ENDPATH**/ ?>