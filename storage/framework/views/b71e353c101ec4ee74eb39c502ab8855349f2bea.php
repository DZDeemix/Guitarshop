<?php $__currentLoopData = $data->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li  class="element-item product-item-wrap product-style_1 featured indoor new seeds">
                <div class="product-item-inner">
            <div class="product-thumb">
                <div class="product-flash-wrap">
                    <?php if(!$item->available): ?>
                        <span class="on-new product-flash">Sold</span>
                    <?php endif; ?>
                </div>
                <div class="product-thumb-primary absolute-center absolute-center-products" style="background-image: url( '<?php echo e($item->pathdircover .  $item->cover); ?>' );">
                    
                    
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