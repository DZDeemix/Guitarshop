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


    <div id="example-wrapper">

        <div class="div-box text-top mt">
            <div class="container">
                <div class="text-center mb-20">
                    <h2 class="title-style title-style-1 mb-20"><span class="title-left"><?php echo e($page->h1); ?> </span></h2>
                    <?php echo $page->content1; ?>

                </div>
                <div class="text-left mb-20">
                    <h2 class="mb-20"><?php echo e($page->h2); ?></h2>
                    <?php echo $page->content2; ?>

                </div>
            </div>
        </div>

        <div class="div-box who-we-are">
            <div class="container">
                <div class="row mt-20 mb-45">
                    <div class="col-md-6 col-sm-6">
                        <div class="img-left"><img src="<?php echo e($page->getPathdir()); ?><?php echo e($page->cover1); ?>" alt="about-us"/></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="who-we-are-right">
                            <h2 class="mt-20 mb-20"><?php echo e($page->h3); ?></h2>
                            <?php echo $page->content3; ?>


                        </div>
                    </div>
                </div>

            </div>
        </div>









    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>