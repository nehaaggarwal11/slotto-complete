<div class="table-body">
    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer">
        <table class="table sports-casinos nj_sorting_table dataTable no-footer" id="DataTables_Table_0" role="grid">
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="&amp;nbsp;&amp;nbsp;# : activate to sort column descending" style="width: 37px;">&nbsp;&nbsp;# <i class="fa fa-sort" aria-hidden="true"></i></th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Bonus : activate to sort column ascending" style="width: 176px;">Bonus <i class="fa fa-sort" aria-hidden="true"></i></th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Omsetningskrav : activate to sort column ascending" style="width: 200px;">Omsetningskrav <i class="fa fa-sort" aria-hidden="true"></i></th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Rating : activate to sort column ascending" style="width: 109px;">Rating <i class="fa fa-sort" aria-hidden="true"></i></th>
                <th class="no-sort sorting_disabled" rowspan="1" colspan="1" aria-label="Info" style="width: 119px;">Info</th>
                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Free Spins : activate to sort column ascending" style="width: 206px;"></th>
                
            </tr>
            </thead>
            <tbody>
             <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sp => $sport): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><span class="serial_no"><?php echo e($sp + 1); ?></span></td>
                    <td data-order="<?php echo e($sport->spins); ?>" class="note">
                        <?php if($sport->logo): ?>
                            <a href="<?php echo e($sport->link); ?>" target="_blank" class="d-print-inline-block">
                                <img src="<?php echo e($sport->logo->getUrl('thumb')); ?>" alt="<?php echo e($sport->featured_image_alt_text); ?>" class="sport-featured-image">
                            </a>
                        <?php endif; ?>
                    </td>
                    <td data-order="<?php echo e($sport->bonus); ?>" align="center" style="width:200px;">
                        <a href="<?php echo e($sport->link); ?>"><h6><?php echo e($sport->name); ?></h6></a>
                        <p><?php echo e($sport->spins_text); ?></p>
                        <span class="bonus-span"><?php echo e($sport->bonus_text); ?></span>
                        <p><?php echo e($sport->wagering_requirements_text); ?></p>
                        <?php if($sport->rating): ?>
                            <p>
                                <?php for($i = 0; $i < $sport->rating; $i++): ?>
                                    <span class="fa fa-star text-orange"></span>
                                <?php endfor; ?>
                            </p>
                        <?php endif; ?>
                        <a href="<?php echo e($sport->route); ?>">
                            <p class="add-review-btn">Les anmeldelse</p>
                        </a>
                    </td>
                    <td data-order="<?php echo e($sport->wagering_requirements); ?>">
                        <p><?php echo e($sport->small_description); ?></p>
                    </td>
                    <td data-order="<?php echo e($sport->rating); ?>">
                        <p><?php echo e($sport->info); ?></p>
                    </td>
                    <td>
                        <a href="<?php echo e($sport->link); ?>" target="_blank" class="btn blue text-nowrap">Spill her
                        </a>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
            </tbody>
        </table>
    </div>
</div>
<?php /**PATH D:\laravel\slottomat-norway\resources\views/partials/sport-table.blade.php ENDPATH**/ ?>