<?php $__env->startSection('content'); ?>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-danger"><?php echo e(Session::get('message')); ?></div>
    <?php endif; ?>

    <?php if(Session::has('success')): ?>
        <div class="alert alert-success"><?php echo Session::get('success'); ?></div>
    <?php endif; ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Список постов</h1>
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
                            <th >имя</th>
                            <th >email</th>
                            <th >Дата создания</th>
                            <th >Дата обновления</th>


                        </tr>
                        </thead>
                        <tbody>

                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="odd gradeX">
                            <td><?php echo e($item->name); ?></td>
                            <td><?php echo e($item->email); ?></td>
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


<?php $__env->startPush('foter_script'); ?>

<!-- DataTables JavaScript -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
<script Defer Type="Text/JavaScript" src="/admin/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script Defer Type="Text/JavaScript" src="/admin/vendor/datatables-responsive/dataTables.responsive.js"></script>

<script>
    $(document).ready( function () {
        $('#table_id').DataTable(
            {
                "autoWidth": true,
                paging: false
            }
        );

    } );
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>