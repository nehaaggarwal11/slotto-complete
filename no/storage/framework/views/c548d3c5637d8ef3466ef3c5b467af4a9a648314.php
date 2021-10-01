  <?php if(!empty($faq_head)): ?>
    <div class="row mt-4">
        <div class="col-lg-8 mx-auto">
            <div class="section-title-item">
            <span class="section-title faqh2title" ><?php echo e($faq_head); ?></span>
            </div>
        </div>
    </div><!-- row end -->
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="faq-accordion">
                <div class="panel-group" id="accordion" role="tablist"
                    aria-multiselectable="true">
                    <?php $__currentLoopData = $faq_questions ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="panel panel-default">
                        <div class="panel-heading" role="tab"
                            id="heading<?php echo e($faq->id); ?>">
                            <span class="panel-title">
                                <a class="collapsed"
                                data-toggle="collapse"
                                data-parent="#accordion"
                                href="#collapse<?php echo e($faq->id); ?>"
                                aria-expanded="false"
                                aria-controls="collapse<?php echo e($faq->id); ?>"><?php echo e($faq->question); ?>

                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </a>
                            </span>
                        </div>
                        <div id="collapse<?php echo e($faq->id); ?>"
                            class="panel-collapse collapse"
                            role="tabpanel"
                            aria-labelledby="heading<?php echo e($faq->id); ?>">
                            <div class="panel-body">
                                <p><?php echo $faq->answer; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
<?php /**PATH D:\laravel\slottomat-norway\resources\views/partials/faq.blade.php ENDPATH**/ ?>