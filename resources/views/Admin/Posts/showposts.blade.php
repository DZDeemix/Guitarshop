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
                    <form class="form-horizontal" action="{{ route('admin_posts_show') }}">
                        <div class="table-responsive">
                            <table id="table_id"  class="tableadmin table table-bordered table-hover " >

                            <thead>
                            <tr class="something">
                                <th class="col-md-2" >Обложка</th>
                                <th class="col-md-3" >Название</th>
                                <th class="col-md-3" >Alias</th>
                                <th class="col-md-1" >Дата публикации</th>
                                <th class="col-md-1" >Обновлён</th>
                                <th class="col-md-1" >Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="odd gradeX">

                                    <td></td>
                                    <td>
                                        <input id="title" type="text" class="form-control inputadmin" name="title" value="{{ request()->title }}">
                                    </td>

                                    <td>
                                        <input  type="text" class="form-control inputadmin" name="alias" value="{{ request()->alias }}">
                                    </td>

                                    <td></td>
                                    <td></td>

                                    <td><button type="submit" class="btn btn-primary btn-block">{{ __('Filter') }}</button>
                                        <a href="{{route('admin_posts_show') }}">
                                            <div class="delete-modal btn btn-danger btn-block">
                                                <span class="glyphicon glyphicon-trash">Сброс</span>
                                            </div>
                                        </a>
                                    </td>

                            </tr>
                            @foreach($data as $item)
                            <tr class="odd gradeX">

                                <td>
                                    @if ($item->cover)
                                        <div class="col-md-12 row-heigth">
                                                <img src="/images/coves_posts/{{$item->cover}}" class="img-responsive">
                                        </div>
                                    @endif
                                </td>
                                <td><div class="row-heigth">{{ $item->title }}</div></td>
                                <td><div class="row-heigth">{{ $item->alias }}</div></td>
                                <td><div class="row-heigth">{{ date('d.m.Y H:i', $item->postdata) }}</div></td>
                                <td><div class="row-heigth">{{ $item->updated_utc }}</div></td>
                                <td class="center">
                                    <a href="{{route('admin_edit_post_show', ['alias' => $item->alias]) }}">
                                        <div class="edit-modal btn btn-info btn-block">
                                            <span class="glyphicon glyphicon-edit">Edit</span>
                                        </div>
                                    </a>
                                    @if(!$item->trashed())
                                    <a href="{{route('admin_delete_post', ['alias' => $item->alias]) }}">
                                        <div class="delete-modal btn btn-danger btn-block">
                                            <span class="glyphicon glyphicon-trash">Delete</span>
                                        </div>
                                    </a>
                                    @else
                                        <a href="{{route('admin_restore_post', ['alias' => $item->alias]) }}">
                                            <div class="delete-modal btn btn-danger btn-block">
                                                <span class="glyphicon glyphicon-trash">Restore</span>
                                            </div>
                                        </a>
                                        @endif
                                </td>

                            </tr>
                            @endforeach


                            </tbody>
                        </table>
                        </div>
                    </form>
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
{{--
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
--}}

@endpush