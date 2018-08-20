<?php $__env->startSection('content'); ?>

        <?php if(Session::has('message')): ?>
            <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
        <?php endif; ?>

        <?php if(Session::has('success')): ?>
            <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
        <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger">

            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo e($product->big_title); ?></h1>
        </div>
    </div>

            <div class="cbf">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST"    action="<?php echo e(route($product->submint_action, $product->param)); ?>" enctype="multipart/form-data">
                            <div class="product-wrapper">
                            <?php echo csrf_field(); ?>



                            <div class="form-group row">
                                <label for="title" class="col-md-2 "><?php echo e(__('Название товара')); ?></label>

                                <div class="col-md-10 <?php echo e($errors->has('title') ? 'has-error' : ''); ?>">
                                    <input id="title" type="text" class="form-control" name="title" value="<?php echo e(!$product->title ?  old('title') : $product->title); ?>" required autofocus>
                                    <input name="alias" id="alias" type="hidden" value="<?php echo e(!$product->alias ? old('alias') : $product->alias); ?>" required>

                                    <?php if($errors->has('title')): ?>
                                        <span class="invalid-feedback text-danger">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meta_key" class="col-md-2 "><?php echo e(__('Метаключи')); ?></label>

                                <div class="col-md-10 <?php echo e($errors->has('meta_key') ? 'has-error' : ''); ?>">
                                    <input id="meta_key" type="text" class="form-control" name="meta_key" value="<?php echo e(!$product->meta_key ? old('meta_key'): $product->meta_key); ?>" required autofocus>

                                    <?php if($errors->has('meta_key')): ?>
                                        <span class="invalid-feedback text-danger">
                                        <strong><?php echo e($errors->first('meta_key')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-2"><?php echo e(__('Мета-описание')); ?></label>

                                <div class="col-md-10 <?php echo e($errors->has('meta_description') ? 'has-error' : ''); ?>">
                                    <input id="meta_description" type="text" class="form-control" name="meta_description" value="<?php echo e(!$product->meta_description ? old('meta_description') : $product->meta_description); ?>" required autofocus>

                                    <?php if($errors->has('meta_description')): ?>
                                        <span class="invalid-feedback text-danger">
                                        <strong><?php echo e($errors->first('meta_description')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-2 "><?php echo e(__('Цена')); ?></label>

                                <div class="col-md-10 <?php echo e($errors->has('price') ? 'has-error' : ''); ?>">
                                    <input id="price" type="text" class="form-control" name="price" value="<?php echo e(!$product->price ? old('price') :  $product->price); ?> " >

                                    <?php if($errors->has('price')): ?>
                                        <span class="invalid-feedback text-danger">
                                        <strong><?php echo e($errors->first('price')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                        <div class="row">
                            <div class="form-group col-md-5 vbottom">
                                <?php if($product->cover): ?>
                                    <div>
                                        <img src="/images/cover_products/<?php echo e($product->cover); ?>" class="img-thumbnail img-fluid">
                                    </div>
                                <?php endif; ?>
                                <label for="cover">Добавить обложку</label>
                                <div>
                                    <input name="cover"  type="file"  class="form-control">
                                    <?php if($errors->has('cover')): ?>
                                        <span class="invalid-feedback text-danger">
                                                    <strong><?php echo e($errors->first('cover')); ?></strong>
                                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group col-md-6 vbottom ">
                                <?php if($product->gallery): ?>
                                    <?php $__currentLoopData = $product->gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-md-3 active-gallery-item">
                                        <span data-id="<?php echo e($item->id); ?>" class="active-gallery-del">
                                            <i class="fa fa-trash fa-2x"></i>
                                        </span>
                                        <img src="/images/gallery_products/<?php echo e($item->src_path); ?>" class="img-thumbnail img-fluid">
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                                <div class="clearfix"></div>
                                <div class="">
                                    <label for="gallery" >Добавить изображения для галлереи</label>
                                    <input name="gallery[]" type="file"  class="form-control" multiple >
                                    <?php if($errors->has('gallery.*')): ?>
                                        <div class="alert alert-danger">
                                            <?php $__currentLoopData = $errors->get('gallery.*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $messages): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <ul>
                                                        <?php $__currentLoopData = $messages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li><?php echo e(($message)); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="form-group  col-md-5">
                                    <label for="available" >Товар в наличии</label>

                                    <div class="row">
                                        <div class="col-md-4 <?php echo e($errors->has('available') ? 'has-error' : ''); ?>">
                                            <select  size="1"  name="available" class="form-control">
                                                    <option selected disabled hidden>Выберите</option>
                                                    <option selected="selected" value="1" <?php echo e(old('available')=== 1 || $product->available === 1 ? 'selected' : ''); ?>>Да</option>
                                                    <option value="0" <?php echo e(old('available')=== 0 || $product->available === 0 ? 'selected' : ''); ?>>Нет</option>
                                            </select>
                                            <?php if($errors->has('available')): ?>
                                                <span class="invalid-feedback text-danger">
                                                    <strong><?php echo e($errors->first('available')); ?></strong>
                                                </span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="onMain" >Отображать на главной странице</label>

                                    <div class="row">
                                        <div class="col-md-4 <?php echo e($errors->has('onMain') ? 'has-error' : ''); ?>">
                                            <select size="1"  name="onMain" class="form-control">
                                                <option selected disabled hidden>Выберите</option>
                                                <option selected="selected" value="1" <?php echo e(old('onMain')=== 1 || $product->onMain === 1 ? 'selected' : ''); ?>>Да</option>
                                                <option value="0" <?php echo e(old('onMain')=== 0 || $product->onMain === 0 ? 'selected' : ''); ?>>Нет</option>
                                            </select>
                                        <?php if($errors->has('onMain')): ?>
                                            <span class="invalid-feedback text-danger">
                                                <strong><?php echo e($errors->first('onMain')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="_content" class="col-md-12 ">Описание товара</label>
                                <div class="col-md-12 <?php echo e($errors->has('_content') ? 'has-error' : ''); ?>">
                                    <textarea id="content" name="_content" class="form-control my-editor" rows="10" ><?php echo !$product->content ?  old('_content') : $product->content; ?></textarea>
                                </div>
                                <?php if($errors->has('_content')): ?>
                                    <span class="invalid-feedback text-danger">
                                        <strong><?php echo e($errors->first('_content')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <button id="submit-all" type="submit" class="btn btn-primary">
                                        <?php echo e(__('Сохранить')); ?>

                                    </button>
                                </div>
                            </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>




<?php $__env->stopSection(); ?>
<?php $__env->startPush('foter_script'); ?>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    <?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>