<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Список товаров</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <form class="form-horizontal" action="<?php echo e(route('admin_products_show')); ?>">
                        <div class="table-responsive">
                            <table id="table_id" width="100%" class="tableadmin table table-bordered table-hover " >
                        <thead>
                        <tr>
                            <th class="col-md-2">id</th>
                            <th class="col-md-3">Название</th>
                            <th class="col-md-3">Alias</th>
                            <th class="col-md-1">Создан</th>
                            <th class="col-md-1">Обновлён</th>
                            <th class="col-md-1">Control</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">

                            <td></td>
                            <td>


                                <input id="title" type="text" class="form-control inputadmin" name="title" value="<?php echo e(request()->title); ?>">

                            </td>
                            <td  ><input  type="text" class="form-control inputadmin" name="alias" value="<?php echo e(request()->alias); ?>"></td>
                            <td></td>
                            <td></td>

                            <td><button type="submit" class="btn btn-primary btn-block"><?php echo e(__('Filter')); ?></button>
                                <a href="<?php echo e(route('admin_posts_show')); ?>">
                                    <div class="delete-modal btn btn-danger btn-block">
                                        <span class="glyphicon glyphicon-trash">Сброс</span>
                                    </div>
                                </a>
                            </td>

                        </tr>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX">
                            <td>
                                <?php if($item->cover): ?>
                                    <div class="col-md-12">
                                        <img src="/images/cover_products/<?php echo e($item->cover); ?>" class="img-responsive">
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($item->title); ?></td>
                            <td><?php echo e($item->alias); ?></td>
                            <td><?php echo e($item->created_utc); ?>

                            </td>
                            <td><?php echo e($item->updated_utc); ?></td>
                            <td class="center">
                                <a href="<?php echo e(route('admin_edit_product_show', ['alias' => $item->alias])); ?>">
                                    <div class="edit-modal btn btn-info btn-block">
                                        <span class="glyphicon glyphicon-edit">Edit</span>
                                    </div>
                                </a>
                                <a href="<?php echo e(route('admin_delete_product', ['alias' => $item->alias])); ?>">
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
                    </form>
                    <?php echo e($data->links()); ?>

                </div>
                <!-- /.panel-body -->
            
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>