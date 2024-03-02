<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h3 class="box-title">Generate Invoice</h3>
            <?php if(session()->has('message')): ?>
                <div class="alert alert-success text-center" id="alert"><?php echo e(session('message')); ?></div>
            <?php endif; ?>
            <div class="row">
                <div class="table-responsive">
                    <form wire:submit.prevent="submitOrder">
                        <table class="table min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Item Category</th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Item Name</th>


                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Quantity
                                    </th>

                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Package Unit
                                    </th>
                                    <th
                                        class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <select id="" class="form-control" wire:model="selected_category">
                                                <option value="">--Select Category--</option>
                                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <?php $__errorArgs = ['selected_category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" style="font-size: 11.5px;"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </td>

                                    <td>
                                        <?php if(!is_null($selected_category)): ?>
                                            <div class="form-group">
                                                <select id="" class="form-control" wire:model="selected_item"
                                                    wire:change="getItemPrice">
                                                    <option value="">--Select Item--</option>
                                                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?>

                                                        </option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                            <?php $__errorArgs = ['selected_item'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                <span class="text-danger"
                                                    style="font-size: 11.5px;"><?php echo e($message); ?></span>
                                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <input wire:model="quantity" type="number"
                                            class="text-sm sm:text-base px-2 pr-2 form-control rounded-lg border border-gray-400 py-1 focus:outline-none focus:border-blue-400"
                                            style="width: 50px" min="1" />
                                        <?php $__errorArgs = ['quantity'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <span class="text-danger" style="font-size: 11.5px;"><?php echo e($message); ?></span>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </td>
                                    <td>
                                        <?php if(!is_null($selected_item_price)): ?>
                                            <?php echo e($selected_item_package_unit); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <div>
                                            <button type="submit" class="btn btn-sm btn-primary"
                                                wire:click.prevent="addToCart">
                                                Add to Cart
                                            </button>

                                        </div>
                                    </td>
                                <tr>
                                    <td colspan="4">
                                        <a type="button" href="<?php echo e(route('staff.view_generated_invoice')); ?>"
                                            class="btn btn-dark btn-rounded">Check Item List
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->startPush('scripts'); ?>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\xampp\htdocs\royalchoicelaundry\resources\views/livewire/staff/generate-invoice.blade.php ENDPATH**/ ?>