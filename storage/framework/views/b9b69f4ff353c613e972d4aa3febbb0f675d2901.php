<?php

$metaURL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$imgURL = 'http://'.$_SERVER['HTTP_HOST'] . '/public/images/cover_products/' . $product->cover;

?>

<?php $__env->startSection('Meta_property'); ?>
    <?php if($product): ?>
    <title><?php echo e($product->title); ?></title>
    <meta name="keywords" content="<?php echo e($product->meta_key); ?>">
    <meta name="description" content="<?php echo e($product->meta_description); ?>">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?= $metaURL ?>">
    <meta property="og:title" content="<?php echo e($product->title); ?>">
    <meta property="og:description" content="<?php echo e($product->meta_description); ?>">
    <meta property="og:image" content="<?= $imgURL ?>">
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <body class="product single-product">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('modal'); ?>
    <!-- HTML-код модального окна -->
    <div id="order" class="modal fade zindex_mod" >
        <div class="modal-dialog" >
            <div class="modal-content">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="false">×</button>
                    <h4 class="modal-title " style="font-weight: 600; text-transform: uppercase; "><?php echo e($product->title); ?></h4>
                </div>
                <!-- Основное содержимое модального окна -->
                <div class="modal-body">
                    <div class="choose-your-content">
                        <form method="POST"  class="modal_form form-horizontal cart " style="margin: 0px 0;" action="<?php echo e(route('new_order',['alias' => $product->alias])); ?>" enctype="multipart/form-data">
                            <div class="order-wrapper">
                                <?php echo csrf_field(); ?>
                                <input class="order-field-product_id" type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                                <div class="col-md-12">

                                <div class="form-group">
                                    <label for="email" class="modal_order"><?php echo e(__('Ваш email')); ?></label>
                                    <input class="order-field-email" style="width:100%;"  name="email" type="text"  value="<?php echo e(old('email')); ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="_content" class="modal_order"><?php echo e(__('Коментарии к заказу')); ?></label>
                                    <textarea class="order-field-content" style="width:100%;" name="_content"  rows="10" ><?php echo e(old('_content')); ?></textarea>
                                </div>

                                <span role="button" class="btn btn-primary modal_btn order-submit">Оставить заявку</span>


                                </div>
                            </div>

                            <div class="order-response">
                                <span><h3>Спасибо!</h3><p>Ваша заявка получена</p><p>Мы с Вами свяжемся в ближайшее время</p></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Футер модального окна -->

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>


    <?php if($product): ?>
        <div id="example-wrapper">

            <div class="div-box mb mt">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="single-product-slider">

                                <div id="sync1" class="owl-carousel owl-template">
                                    <?php if($product->cover): ?>
                                        <div class="item">
                                            <figure><img src="<?php echo e($product->pathdircover . $product->cover); ?>" alt="slide" width="1080" height="768"/></figure>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($product->gallery): ?>
                                        <?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <figure><img src="<?php echo e($product->pathdir . $item->src_path); ?>" alt="slide" width="1080" height="768"/></figure>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>

                                <div id="sync2" class="owl-carousel owl-template">
                                    <?php if($product->cover): ?>
                                        <div class="item">
                                            <figure><img src="<?php echo e($product->pathdircover . $product->cover); ?>" alt="slide" width="1080" height="768"/></figure>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($product->gallery): ?>
                                        <?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <figure><img src="<?php echo e($product->pathdir . $item->src_path); ?>" alt="slide" width="1080" height="768"/></figure>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="single-product-content">
                                <div class="summary-product entry-summary">
                                    <h2 class="product_title mb-45"><?php echo e($product->title); ?></h2>
                                    <div>
                                        <p class="price"><span class="product-begreen-price-amount amount"><span class="product-begreen-price-currencysymbol">$</span><?php echo e($product->price); ?></span></p>
                                    </div>
                                    <div class="product-single-short-description">
                                        <p><?php echo $product->content; ?></p>
                                    </div>



                                    <?php echo $__env->yieldContent('modal'); ?>
                                    <form class="cart" >
                                        <div class="quantity">
                                        </div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#order">Заказать</button>

                                    </form>

                                    <div class="product_meta">
                                        <span class="product-stock-status-wrapper">
                                            <label>Availability:</label>
                                                <span class="product-stock-status in-stock"><?php echo e($product->available === 1 ? 'In stock' : 'Out of stock'); ?>

                                                </span>
                                            </span><span class="posted_in">

                                        </span>

                                    </div>
                                    <div class="entry-meta-tag-list">
                                        <div class="entry-meta-tag-right">
                                            <div class="social-share-wrap">
                                                <label><i class="fa fa-share-alt"></i>Share:</label>
                                                <ul class="social-share">
                                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($metaURL) ?>"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="https://twitter.com/share?url=<?= urlencode($metaURL) ?>"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?= urlencode($metaURL) ?>&st.comments=<?php echo e($product->title); ?>"><i class="fa fa-odnoklassniki"></i></a></li>
                                                    <li><a href="http://vk.com/share.php?url=<?= urlencode($metaURL) ?>"><i class="fa fa-vk"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            


        </div>

</div>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('create-order'); ?>
    <script Defer type="Text/JavaScript" src="/Site/js/order.js"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.site', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>