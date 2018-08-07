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
                            <th >id</th>
                            <th >Название</th>
                            <th >Мета ключ</th>
                            <th >Мета описание</th>
                            <th >Дата создания</th>
                            <th >Дата обновления</th>
                            <th >Управление</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd gradeX">
                            <form action="{{ route('admin_posts_show') }}">
                                <td></td>
                                <td><input id="title" type="text" class="form-control" name="title" value="{{ request()->title }}"></td>
                                <td><input id="meta_key" type="text" class="form-control" name="meta_key" value="{{ request()->meta_key }}"></td>
                                <td><input id="meta_description" type="text" class="form-control" name="meta_description" value="{{ request()->meta_description }}"></td>
                                <td>
                                    <a href="{{route('admin_posts_show', ['sort' => 'ASC']) }}">
                                        <div class="edit-modal btn btn-info">
                                            <span class="glyphicon glyphicon-edit">up</span>
                                        </div>
                                    </a>
                                    <a href="{{route('admin_posts_show', ['sort' => 'DESC']) }}">
                                        <div class="edit-modal btn btn-info">
                                            <span class="glyphicon glyphicon-edit">down</span>
                                        </div>
                                    </a>
                                </td>
                                <td></td>
                                <td><button type="submit" class="btn btn-primary">{{ __('Filter') }}</button>
                                    <a href="{{route('admin_posts_show') }}">
                                        <div class="delete-modal btn btn-danger">
                                            <span class="glyphicon glyphicon-trash">Сброс</span>
                                        </div>
                                    </a></td>
                            </form>
                        </tr>
                        @foreach($data as $item)
                        <tr class="odd gradeX">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->title }}</td>
                            <td>{{ $item->meta_key }}</td>
                            <td>{{ $item->meta_description }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td class="center">
                                <a href="{{route('admin_edit_post_show', ['alias' => $item->alias]) }}">
                                    <div class="edit-modal btn btn-info">
                                        <span class="glyphicon glyphicon-edit">Edit</span>
                                    </div>
                                </a>
                                <a href="{{route('admin_delete_post', ['alias' => $item->alias]) }}">
                                    <div class="delete-modal btn btn-danger">
                                        <span class="glyphicon glyphicon-trash">Delete</span>
                                    </div>
                                </a>

                            </td>

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