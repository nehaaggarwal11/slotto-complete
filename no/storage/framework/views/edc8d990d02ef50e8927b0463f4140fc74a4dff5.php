<?php $__env->startSection('title', '404'); ?>

<?php $__env->startSection('content'); ?>
        <div class="container">
            <div class="row">
                <div class="col-md-12" style="text-align:center; margin-top:3em; ">
                    <img alt="404-error-image" class="img-fluid" src="<?php echo e(asset('asset/frontend/img/error/404.png')); ?>" style="max-width:100%" width="666" height="469">
                </div>
                <div class="col-md-12" style="text-align:center; margin-top:20px">
                    <a href="<?php echo e(route('frontend.index')); ?>" data-text="Take me back Home" class="splbtns">Take me back Home</a>
                </div>
            </div>
        </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.frontend', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\slottomat-norway\resources\views/errors/404.blade.php ENDPATH**/ ?>