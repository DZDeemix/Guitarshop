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
            <h1 class="page-header">Настройки</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="cbf">
        <div class="card">
            <div class="card-header"></div>

            <div class="card-body">
                <form method="POST"    action="<?php echo e(route('admin_change_settings')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Количество постов на одной странице в панели администратора')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('paginatoin_admin') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="paginatoin_admin" value="<?php echo e($setting->paginatoin_admin); ?>" >
                            <?php if($errors->has('paginatoin_admin')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('paginatoin_admin')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Количество товаров на одной странице в панели администратора')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('paginatoin_admin_product') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="paginatoin_admin_product" value="<?php echo e($setting->paginatoin_admin_product); ?>" >
                            <?php if($errors->has('paginatoin_admin_product')): ?>
                                <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('paginatoin_admin_product')); ?></strong>
                                    </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Количество постов на одной странице сайта')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('paginatoin_site') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="paginatoin_site" value="<?php echo e($setting->paginatoin_site); ?>" >
                            <?php if($errors->has('paginatoin_site')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('paginatoin_site')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Количество товаров на одной странице сайта')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('paginatoin_site_product') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="paginatoin_site_product" value="<?php echo e($setting->paginatoin_site_product); ?>" >
                            <?php if($errors->has('paginatoin_site_product')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('paginatoin_site_product')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Количество постов на главной странице')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('paginatoin_site_onMain') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="paginatoin_site_onMain" value="<?php echo e($setting->paginatoin_site_onMain); ?>" >
                            <?php if($errors->has('paginatoin_site_onMain')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('paginatoin_site_onMain')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Количество товаров на главной странице')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('paginatoin_site_onMain_products') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="paginatoin_site_onMain_products" value="<?php echo e($setting->paginatoin_site_onMain_products); ?>" >
                            <?php if($errors->has('paginatoin_site_onMain_products')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('paginatoin_site_onMain_products')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Email адрес')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="email" value="<?php echo e($setting->email); ?>" >
                            <?php if($errors->has('email')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('email')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="title" class="col-md-12 "><?php echo e(__('Email адрес для заказов')); ?></label>

                        <div class="col-md-12 <?php echo e($errors->has('email_send1') ? ' has-error' : ''); ?>">
                            <input  type="text" class="form-control" name="email_send1" value="<?php echo e($setting->email_send1); ?>" >
                            <?php if($errors->has('email_send1')): ?>
                                <span class="invalid-feedback">
                                    <strong><?php echo e($errors->first('email_send1')); ?></strong>
                                </span>
                            <?php endif; ?>
                        </div>
                    </div>

                    <label for="gallery" >Изображения главного слайдера</label><br>
                    <a href="<?php echo e(route('admin_settings_show')); ?>">
                        <div class="btn btn-primary">Добавить</div>
                    </a>

                            <div class="form-group vbottom ">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="table_id" width="100%" class="tableadmin table table-bordered table-hover " >
                                            <thead>
                                            <tr>
                                                <th class="col-md-3">Обложка</th>
                                                <th class="col-md-3">Порядок</th>
                                                <th class="col-md-1">Control</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $slidergallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr class="odd gradeX">
                                                        <td>

                                                                <div class="col-md-12">
                                                                    <img src="<?php echo e($pathdir . $item->src_path); ?>" width="30%" class="img-responsive">
                                                                </div>

                                                        </td>
                                                        <td><?php echo e($item->number_id); ?></td>

                                                        <td class="center">
                                                            <a href="<?php echo e(route('admin_settings_showedit', ['id' => $item->id])); ?>">
                                                                <div class="edit-modal btn btn-info btn-block">
                                                                    <span class="glyphicon glyphicon-edit">Edit</span>
                                                                </div>
                                                            </a>
                                                            <a href="<?php echo e(route('admin_settings_del', ['id' => $item->id])); ?>">
                                                                <div class="delete-modal btn btn-danger btn-block">
                                                                    <span class="glyphicon glyphicon-trash">Delete</span>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        <div class="clearfix"></div>


                   
                        <div class="col-md-6 ">
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


<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>