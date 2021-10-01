<div class="table-body">
    <table class="table table-rating nj_sorting_table">
        <thead>
            <tr>
                <th>&nbsp;&nbsp;# <i class="fa fa-sort" aria-hidden="true"></i></th>
                <th>Free Spins <i class="fa fa-sort" aria-hidden="true"></i></th>
                <th>Bonus <i class="fa fa-sort" aria-hidden="true"></i></th>
                <th>Omsetningskrav <i class="fa fa-sort" aria-hidden="true"></i></th>
                <th>Rating <i class="fa fa-sort" aria-hidden="true"></i></th>
                <th class="no-sort">Info</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $casinos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cas => $casino): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><span class="serial_no"><?php echo e($cas + 1); ?></span></td>
                    <td data-order="<?php echo e($casino->spins); ?>" class="note">
                        <?php if($casino->featured_image): ?>
                            <a href="<?php echo e($casino->link); ?>" class="d-print-inline-block" target="_blank" rel="nofollow">
                                <img src="<?php echo e($casino->featured_image->getUrl('thumb')); ?>" alt="<?php echo e($casino->featured_image_alt_text); ?>">
                            </a>
                        <?php endif; ?>
                    </td>
                    <td data-order="<?php echo e($casino->bonus); ?>" align="center" style="width:200px;">
                        <a href="<?php echo e($casino->link); ?>" rel="nofollow"><h6><?php echo e($casino->name); ?></h6></a>
                        <p><?php echo e($casino->spins_text); ?></p>
                        <span class="bonus-span"><?php echo e($casino->bonus_text); ?></span>
                        <p><?php echo e($casino->wagering_requirements_text); ?></p>
                        <?php if($casino->rating): ?>
                            <p>
                                <?php for($i = 0; $i < $casino->rating; $i++): ?>
                                    <span class="fa fa-star text-orange"></span>
                                <?php endfor; ?>
                            </p>
                        <?php endif; ?>
                        <a href="<?php echo e($casino->route); ?>">
                            <p class="add-review-btn">Les anmeldelse</p>
                        </a>
                    </td>
                    <td data-order="<?php echo e($casino->wagering_requirements); ?>">
                        <p><?php echo e($casino->small_description); ?></p>
                    </td>
                    <td data-order="<?php echo e($casino->rating); ?>">
                        <p><?php echo e($casino->info); ?></p>
                    </td>
                    <td>
                        <a href="<?php echo e($casino->link); ?>" target="_blank" class="btn blue text-nowrap" rel="nofollow">Spill her
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php /**PATH D:\laravel\slottomat-norway\resources\views/partials/casino-table.blade.php ENDPATH**/ ?>