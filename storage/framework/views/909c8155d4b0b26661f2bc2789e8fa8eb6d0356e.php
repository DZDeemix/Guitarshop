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
            <h1 class="page-header"><?php echo e($big_title); ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

            <div class="cbf">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST"    action="<?php echo e(route($submint_action, $param)); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <div class="form-group row">
                                <label for="title" class="col-md-2 "><?php echo e(__('Заголовок')); ?></label>

                                <div class="col-md-9">
                                    <input id="title" type="text" class="form-control<?php echo e($errors->has('title') ? ' is-invalid' : ''); ?>" name="title" value="<?php echo e(old('title')); ?> <?php echo e($post->title); ?>" required autofocus>
                                    <input name="alias" id="alias" type="hidden" value="<?php echo e(old('alias')); ?> <?php echo e($post->alias); ?>" required>

                                    <?php if($errors->has('title')): ?>
                                        <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('title')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meta_key" class="col-md-2 "><?php echo e(__('Метаключи')); ?></label>

                                <div class="col-md-9">
                                    <input id="meta_key" type="text" class="form-control<?php echo e($errors->has('meta_key') ? ' is-invalid' : ''); ?>" name="meta_key" value="<?php echo e(old('meta_key')); ?> <?php echo e($post->meta_key); ?>" required autofocus>

                                    <?php if($errors->has('meta_key')): ?>
                                        <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('meta_key')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-2"><?php echo e(__('Мета-описание')); ?></label>

                                <div class="col-md-9">
                                    <input id="meta_description" type="text" class="form-control<?php echo e($errors->has('meta_description') ? ' is-invalid' : ''); ?>" name="meta_description" value="<?php echo e(old('meta_description')); ?><?php echo e($post->meta_description); ?>" required autofocus>

                                    <?php if($errors->has('meta_description')): ?>
                                        <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('meta_description')); ?></strong>
                                    </span>
                                    <?php endif; ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="cover" class="col-md-11 ">Добавить обложку</label>
                                <div class="col-md-11">
                                    <?php if($post->cover): ?>
                                        <div class="col-md-4">

                                            <img src="/images/coves_posts/<?php echo e($post->cover); ?>" class="img-thumbnail img-fluid">
                                        </div>
                                    <?php endif; ?>
                                        <input name="cover" type="file"  class="form-control" >

                                    <?php if($errors->has('cover')): ?>
                                        <span class="invalid-feedback">
                                                    <strong><?php echo e($errors->first('cover')); ?></strong>
                                                </span>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="_content" class="col-md-11 ">Текст статьи</label>
                                <div class="col-md-11">
                                    <textarea id="content" name="_content" class="form-control my-editor" rows="10" ><?php echo old('_content'); ?>  <?php echo $post->content; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="submit-all" type="submit" class="btn btn-primary">
                                        <?php echo e(__('Сохранить')); ?>

                                    </button>
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