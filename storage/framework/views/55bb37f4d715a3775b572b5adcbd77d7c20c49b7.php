<?php $__env->startSection('content'); ?>

    
    <?php if(Session::has('message')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Список заказов</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    

    <div class="row">
        <div class="col-lg-12">
            
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table id="table_id" width="100%" class="table table-striped table-bordered table-hover display nowrap" >
                        <thead>
                            <tr>
                                <th >id</th>
                                <th >Название товара</th>
                                <th >Email</th>
                                <th >Пояснения к заказу</th>
                                <th >Статус заказа</th>
                                <th >Управление</th>
                                <th >Дата создания</th>
                                <th >Дата обновления</th>
                            </tr>
                        </thead>
                        <tbody>
                        <form class="form-horizontal" action="<?php echo e(route('admin_show_orders')); ?>">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <div class="bloc">
                                        <select multiple selected="" size="<?php echo e(count(config('GS.statuses'))); ?>"  name="status[]" class="form-control">
                                            <?php $__currentLoopData = config('GS.statuses'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value=<?php echo e($k); ?> <?php echo e(request()->$status === $k ? 'selected' : ''); ?>><?php echo e($status); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </th>
                                <th>
                                    <button type="submit" class="btn btn-primary btn-block"><?php echo e(__('Filter')); ?></button>
                                    <a href="<?php echo e(route('admin_show_orders')); ?>">
                                        <div class="delete-modal btn btn-danger btn-block">
                                            <span class="glyphicon glyphicon-trash">Сброс</span>
                                        </div>
                                    </a>
                                </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </form>
                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX">
                            <td><?php echo e($item->id); ?></td>
                            <?php if($item->product->trashed()): ?>
                                <td><?php echo e($item->product->title); ?><br><span class="text-danger"><?php echo e('товар удален'); ?></span></td>
                            <?php else: ?>
                                <td><?php echo e($item->product->title); ?></td>
                            <?php endif; ?>

                            <td><?php echo e($item->guest->email); ?></td>

                            <td class="word"><?php echo e($item->content); ?></td>
                            <td class="minwidth"><span hidden><?php echo e($item->status); ?></span>
                                <form method="POST"  id="<?php echo e($item->id); ?>"  action="<?php echo e(route('admin_change_status_order', $item->id)); ?>" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <select selected="" size="1"  name="status" class="form-control">
                                        <option disabled>Выберите</option>
                                            <?php $__currentLoopData = config('GS.statuses'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $status): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value=<?php echo e($k); ?> <?php echo e($item->status === $k ? 'selected' : ''); ?>><?php echo e($status); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </form>
                            </td>
                            <td class="center">
                                <button id="submit-all" type="submit" class="btn btn-primary" form="<?php echo e($item->id); ?>">Сохранить</button>
                                <div class="row-heigth">
                                    <a href="<?php echo e(route('admin_edit_order_show', ['alias' => $item->id])); ?>">
                                        <div class="edit-modal btn btn-info btn-block">
                                            <span class="glyphicon glyphicon-edit">Edit</span>
                                        </div>
                                    </a>
                                </div>
                            </td>
                            <td><?php echo e($item->created_utc); ?></td>
                            <td><?php echo e($item->updated_utc); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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