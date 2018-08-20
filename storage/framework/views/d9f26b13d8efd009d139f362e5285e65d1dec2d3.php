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
                            <div class="product-wrapper col-md-12">
                            <?php echo csrf_field(); ?>
                                <div class="form-group row ">
                                    <div class="col-md-6 ">
                                        <button id="submit-all" type="submit" class="btn btn-primary">
                                            <?php echo e(__('Сохранить')); ?>

                                        </button>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="meta_key" class="col-md-2 "><?php echo e(__('Изменить товар')); ?></label>

                                    <div class="col-md-10">
                                        <select selected="" size="1"  name="product_id" class="form-control">
                                            <option disabled>Выберите</option>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value=<?php echo e($item->id); ?> <?php echo e($item->id === $order->product->id ? 'selected' : ''); ?>><?php echo e($item->title); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>

                                        <?php if($errors->has('meta_key')): ?>
                                            <span class="invalid-feedback text-danger">
                                        <strong><?php echo e($errors->first('meta_key')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="meta_key" class="col-md-2 "><?php echo e(__('Изменить статус')); ?></label>
                                    <div class="col-md-10">
                                        <select selected="" size="1"  name="status" class="form-control">
                                            <option disabled>Выберите</option>
                                            <?php $__currentLoopData = config('GS.statuses'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value=<?php echo e($k); ?> <?php echo e($order->status === $k ? 'selected' : ''); ?>><?php echo e($status); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                        <?php if($errors->has('meta_key')): ?>
                                            <span class="invalid-feedback text-danger">
                                            <strong><?php echo e($errors->first('meta_key')); ?></strong>
                                        </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                               

                                <div class="form-group row">
                                    <label for="_content" class="col-md-11 ">Коментарии покупателя</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="7"><?php echo e(old('content')); ?><?php echo $order->content; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prod_coment" class="col-md-11 ">Коментарии продавца</label>
                                    <div class="col-md-12">
                                        <textarea id="content" name="prod_coment" class="form-control my-editor" rows="10" ><?php echo e(old('prod_coment')); ?>    <?php echo $order->prod_coment; ?></textarea>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-6">
                            <h4 class="page-header "><?php echo e('Информация о товаре'); ?></h4>
                            <label for="cover">Обложка</label>
                            <div class="row">
                                <div class="form-group col-md-4 ">

                                    <?php if($order->product->cover): ?>
                                        <div>
                                            <img src="/images/cover_products/<?php echo e($order->product->cover); ?>" class="img-thumbnail img-fluid">
                                        </div>
                                    <?php endif; ?>
                                    <div class="row-heigth">
                                        <a href="<?php echo e(route('admin_edit_product_show', ['alias' => $order->product->alias])); ?>">
                                            <div class="edit-modal btn btn-info btn-block">
                                                <span class="glyphicon glyphicon-edit">Edit</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-8">


                                    <div class="form-group row">
                                        <label class="col-md-6"><?php echo e(__('Название товара')); ?></label>
                                        <label class="col-md-6"><?php echo e($order->product->title); ?></label>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-md-6"><?php echo e(__('Alias')); ?></label>
                                        <label class="col-md-6"><?php echo e($order->product->alias); ?></label>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-md-6"><?php echo e(__('Метаключи')); ?></label>
                                        <label class="col-md-6"><?php echo e($order->product->meta_description); ?></label>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-md-6"><?php echo e(__('Цена')); ?></label>
                                        <label class="col-md-6"><?php echo e($order->product->price); ?> руб.</label>
                                    </div>




                                    <div class="form-group  row">
                                        <label class="col-md-6">Товар в наличии</label>
                                        <label class="col-md-6"><?php echo e($order->product->available === 1 ? 'Да' : 'Нет'); ?></label>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-6">Отображать на главной странице</label>
                                        <label class="col-md-6"><?php echo e($order->product->onMain === 1 ? 'Да' : 'Нет'); ?></label>
                                    </div>

                                </div>
                            </div>
                        </div>

                            <div class="col-md-6">
                            <h4 class="page-header"><?php echo e('Информация о покупателе'); ?></h4>
                            <label>Покупатель</label>

                                    <div class="form-group row">
                                        <label class="col-md-3"><?php echo e(__('Имя')); ?></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control <?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" name="name" value="<?php echo e(old('name')); ?> <?php echo e($order->guest->name); ?>">
                                        </div>
                                        <?php if($errors->has('name')): ?>
                                            <span class="invalid-feedback text-danger">
                                                <strong><?php echo e($errors->first('name')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3"><?php echo e(__('Email')); ?></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control <?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" value="<?php echo e(old('email')); ?> <?php echo e($order->guest->email); ?>">
                                        </div>
                                            <?php if($errors->has('email')): ?>
                                            <span class="invalid-feedback text-danger">
                                                <strong><?php echo e($errors->first('email')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3"><?php echo e(__('Номер телефона')); ?></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control <?php echo e($errors->has('phone_number') ? ' is-invalid' : ''); ?>" name="phone_number" value="<?php echo e(old('phone_number')); ?> <?php echo e($order->guest->phone_number); ?>">
                                        </div>
                                        <?php if($errors->has('phone_number')): ?>
                                            <span class="invalid-feedback text-danger">
                                                <strong><?php echo e($errors->first('phone_number')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3"><?php echo e(__('Адрес')); ?></label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control <?php echo e($errors->has('address') ? ' is-invalid' : ''); ?>" name="address" value="<?php echo e(old('address')); ?> <?php echo e($order->guest->address); ?>">
                                        </div>
                                        <?php if($errors->has('address')): ?>
                                            <span class="invalid-feedback text-danger">
                                                <strong><?php echo e($errors->first('address')); ?></strong>
                                            </span>
                                        <?php endif; ?>
                                        <label class="col-md-6"><?php echo e($order->guest->addres); ?></label>
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