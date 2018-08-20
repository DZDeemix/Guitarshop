<?php $__env->startSection('Meta_property'); ?>
    <?php if($page): ?>
    <title><?php echo e($page->title); ?></title>
    <meta name="keywords" content="<?php echo e($page->meta_key); ?>">
    <meta name="description" content="<?php echo e($page->meta_description); ?>">
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <body class="products products-grid-3-columns single-product page about-us blog blog-masonry ">
    <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>
<div id="example-wrapper">

    <div class="div-box mb mt">
        <div class="container">
            <div class="blog-wrap">
                <div class="blog-inner blog-style-grid blog-paging-all blog-col-3 row">
                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('Guitarshop.include.post-item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>

                    <div class="clearfix">
                        <div class="custom-pagination center-block">
                        <?php echo e($data->links()); ?>

                        </div>
                    </div>
            </div>

        </div>

    </div>


</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>