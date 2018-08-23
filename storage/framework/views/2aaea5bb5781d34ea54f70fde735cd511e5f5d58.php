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
        <div class="container">
            <?php if($product->first()): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header"><?php echo e('Товары'); ?></h3>
                    </div>
                </div>
                <div id="example-wrapper">
                    <div class="div-box mb">
                        <div class="container">
                            <div class="big-demo go-wide style-2">
                                <div class="filter-button-group button-group js-radio-button-group container">
                                </div>
                                <div class="row">
                                    <ul class="grid product-begreen columns-3">
                                        <?php $__currentLoopData = $product->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


                                            <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li  class="element-item product-item-wrap product-style_1 featured indoor new seeds">
                                                    <div class="product-item-inner">
                                                        <div class="product-thumb">
                                                            <div class="product-flash-wrap">
                                                                <?php if(!$item->available): ?>
                                                                    <span class="on-new product-flash">Sold</span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="product-thumb-primary absolute-center absolute-center-products" style="background-image: url( '<?php echo e('/images/cover_products/' . $item->cover); ?>' );">
                                                                
                                                                
                                                            </div>
                                                            <a href="<?php echo e(route('product_show',['alias'=> $item->alias ])); ?>" class="product-link">
                                                                <div class="product-hover-sign">
                                                                    <hr/>
                                                                    <hr/>
                                                                </div></a>
                                                            <div class="product-info">
                                                                <h4 class="entry-title" style="padding: 10px; font-size: 24px;">
                                                                    <a href="<?php echo e(route('product_show',['alias'=> $item->alias ])); ?>"><?php echo e($item->title); ?></a></h4>
                                                                <span class="price">
                            <span class="product-begreen-price-amount amount">
                                <span class="product-begreen-price-currencysymbol">

                                </span><?php echo e($item->price); ?>

                            </span>руб
                        </span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                            <div class="clearfix"></div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <div class="custom-pagination center-block">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($post->first()): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header"><?php echo e('Посты'); ?></h2>
                    </div>
                </div>
                <div id="example-wrapper">
                    <div class="div-box mb mt">
                        <div class="container">
                            <div class="blog-wrap">
                                <div class="blog-inner blog-style-grid blog-paging-all blog-col-3 row">
                                    <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php echo $__env->make('Guitarshop.include.post-item', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <div class="clearfix">
                                    <div class="custom-pagination center-block">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php if(!$post->first() and !$product->first()): ?>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header"><?php echo e('Ничего не найдено'); ?></h2>
                    </div>
                </div>

            <?php endif; ?>
        </div>>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>