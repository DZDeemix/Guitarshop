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
                    <label for="title" class="col-md-12 "><?php echo e(__('Порядок')); ?></label>

                    <div class="col-md-12 <?php echo e($errors->has('number_id') ? ' has-error' : ''); ?>">
                        <input id="title" type="text" class="form-control" name="number_id" value="<?php echo e(old('number_id')); ?> <?php echo e($slidergallery->number_id); ?>" required autofocus>


                        <?php if($errors->has('number_id')): ?>
                        <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('number_id')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cover" class="col-md-11 ">Добавить обложку</label>
                    <div class="col-md-12">
                        <?php if($slidergallery->src_path): ?>
                        <div class="col-md-4">

                            <img src="<?php echo e($pathdir . $slidergallery->src_path); ?>" class="img-thumbnail img-fluid">
                        </div>
                        <?php endif; ?>
                        <div class="<?php echo e($errors->has('number_id') ? ' has-error' : ''); ?>">
                            <input name="cover" type="file"  class="form-control" >
                        </div>
                        <?php if($errors->has('src_path')): ?>
                        <span class="invalid-feedback">
                                                    <strong><?php echo e($errors->first('src_path')); ?></strong>
                                                </span>
                        <?php endif; ?>
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