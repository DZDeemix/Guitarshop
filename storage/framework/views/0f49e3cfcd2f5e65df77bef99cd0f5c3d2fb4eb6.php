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
            <h1 class="page-header"><?php echo e($page->getPageName()); ?></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="cbf">
        <div class="card">
            <div class="card-header"></div>

            <div class="card-body">
                <form method="POST"    action="<?php echo e(route('admin_change_page', ['id' => $page->page_id])); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>



                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Заголовок')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="title" value="<?php echo e($page->title); ?>" >
                            <?php if($errors->has('title')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Мета ключи')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('meta_key') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="meta_key" value="<?php echo e($page->meta_key); ?>" >
                            <?php if($errors->has('meta_key')): ?>
                                <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('meta_key')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Мета описание')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('meta_description') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="meta_description" value="<?php echo e($page->meta_description); ?>" >
                            <?php if($errors->has('meta_description')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('meta_description')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <?php if($page->page_id === '4'): ?>
                        <div class="form-group row">
                            <label for="cover" class="col-md-12 ">Добавить обложку</label>
                            <div class="col-md-12">
                                <?php if($page->cover1): ?>
                                    <div class="col-md-4">

                                        <img src="<?php echo e($page->getPathdir()); ?><?php echo e($page->cover1); ?>" class="img-thumbnail img-fluid">
                                    </div>
                                <?php endif; ?>
                                <input name="cover1" type="file"  class="form-control" >

                                <?php if($errors->has('cover1')): ?>
                                    <span class="invalid-feedback">
                                                    <strong><?php echo e($errors->first('cover1')); ?></strong>
                                                </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-12 "><?php echo e(__('Заголовок1 страницы О нас')); ?></label>

                            <div class="col-md-12">
                                <input  type="text" class="form-control<?php echo e($errors->has('h1') ? ' is-invalid' : ''); ?>" name="h1" value="<?php echo e($page->h1); ?>" >
                                <?php if($errors->has('h1')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('h1')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="_content" class="col-md-12 ">Текст1 страницы О нас</label>
                            <div class="col-md-12">
                                <textarea id="content" name="content1" class="form-control my-editor" rows="10" ><?php echo $page->content1; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-12 "><?php echo e(__('Заголовок2 страницы О нас')); ?></label>

                            <div class="col-md-12">
                                <input  type="text" class="form-control<?php echo e($errors->has('h2') ? ' is-invalid' : ''); ?>" name="h2" value="<?php echo e($page->h2); ?>" >
                                <?php if($errors->has('h2')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('h2')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="_content" class="col-md-12 ">Текст1 страницы О нас</label>
                            <div class="col-md-12">
                                <textarea id="content" name="content2" class="form-control my-editor" rows="10" ><?php echo $page->content2; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-12 "><?php echo e(__('Заголовок1 страницы О нас')); ?></label>

                            <div class="col-md-12">
                                <input  type="text" class="form-control<?php echo e($errors->has('h3') ? ' is-invalid' : ''); ?>" name="h3" value="<?php echo e($page->h3); ?>" >
                                <?php if($errors->has('h3')): ?>
                                    <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('h3')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="_content" class="col-md-12 ">Текст1 страницы О нас</label>
                            <div class="col-md-12">
                                <textarea id="content" name="content3" class="form-control my-editor" rows="10" ><?php echo $page->content3; ?></textarea>
                            </div>
                        </div>
                    <?php endif; ?>



                    <div>
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