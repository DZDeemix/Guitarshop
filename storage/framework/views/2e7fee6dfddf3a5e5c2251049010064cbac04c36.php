<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <article class="post">
        <div class="post-item">
            <div class="entry-wrap">
                <div class="entry-thumbnail-wrap">
                    <div>
                        <div>
                            <a href="<?php echo e(route('post_show',['alias' => $item->alias])); ?>" >
                                <img src="/images/coves_posts/<?php echo e($item->cover); ?>" alt="blog" width="420" height="280" class="img-responsive"/>
                            </a>

                        </div>

                    </div>
                </div>
                <div class="entry-content-wrap">
                    <div class="entry-detail">
                        <h3 class="entry-title"><a href=" <?php echo e(route('post_show',['alias' => $item->alias])); ?>"><?php echo e($item->title); ?></a></h3>

                        <div class="entry-excerpt">

                            <p><?php echo substr(strip_tags($item->content),0,100) . "..."; ?></p>
                        </div>
                        <div class="entry-meta-tag">
                            <label><i class="fa fa-tags"></i>Tags :</label><a href="#">Plant Care</a><a href="#">Plant Of The Month</a>
                        </div>
                        <a href="<?php echo e(route('post_show',['alias' => $item->alias])); ?>" class="btn-readmore">
                            <span class="span-text">Читать
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
