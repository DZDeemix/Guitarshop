<?php $__env->startSection('Meta_property'); ?>
    <?php if($page): ?>
        <title><?php echo e($page->title); ?></title>
        <meta name="keywords" content="<?php echo e($page->meta_key); ?>">
        <meta name="description" content="<?php echo e($page->meta_description); ?>">
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <body class="products products-grid-3-columns single-product page about-us ">
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php if($data): ?>
    <div id="example-wrapper">

        <div class="div-box mb">
            <div class="container">
                <div class="big-demo go-wide style-2">
                    <div class="filter-button-group button-group js-radio-button-group container">

                    </div>
                    <div class="row">
                        <ul class="grid product-begreen columns-3">
                            <?php echo $__env->make('Guitarshop.include.poduct', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                        <div class="custom-pagination center-block">
                            <?php echo e($data->links()); ?>

                        </div>

                </div>

            </div>
        </div>


    </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>