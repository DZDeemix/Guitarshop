@extends('layouts.admin')
@section('content')
    @if (Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success">{!! Session::get('success') !!}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Список постов</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            {{--<div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>--}}
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

                        @foreach($data as $item)
                        <tr class="odd gradeX">
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->created_utc }}</td>
                            <td>{{ $item->updated_utc }}</td>

                        </tr>
                        @endforeach


                        </tbody>
                    </table>
                    {{ $data->links() }}
                </div>
                <!-- /.panel-body -->
            {{--</div>--}}
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection


@push('foter_script')

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

@endpush