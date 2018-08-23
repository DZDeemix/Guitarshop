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
            <h1 class="page-header">Список товаров</h1>
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
                    <form class="form-horizontal" action="{{ route('admin_products_show') }}">
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
                                <input id="title" type="text" class="form-control inputadmin" name="title" value="{{ request()->title }}">
                            </td>
                            <td><input  type="text" class="form-control inputadmin" name="alias" value="{{ request()->alias }}"></td>
                            <td></td>
                            <td></td>

                            <td>
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Filter') }}</button>
                                <a href="{{route('admin_products_show') }}">
                                    <div class="delete-modal btn btn-danger btn-block">
                                        <span class="glyphicon glyphicon-trash">Сброс</span>
                                    </div>
                                </a>
                            </td>

                        </tr>
                        @foreach($data as $item)
                        <tr class="odd gradeX">
                            <td>
                                <div class="row-heigth">
                                    @if ($item->cover)
                                        <div class="col-md-12">
                                            <img src="/images/cover_products/{{$item->cover}}" class="img-responsive">
                                        </div>
                                    @endif
                                </div>
                            </td>
                            <td><div class="row-heigth">{{ $item->title }}</div></td>
                            <td><div class="row-heigth">{{ $item->alias }}</div></td>
                            <td><div class="row-heigth">{{ $item->created_utc }}</div></td>
                            <td><div class="row-heigth">{{ $item->updated_utc }}</div></td>
                            <td class="center">
                                <div class="row-heigth">
                                    <a href="{{route('admin_edit_product_show', ['alias' => $item->alias]) }}">
                                        <div class="edit-modal btn btn-info btn-block">
                                            <span class="glyphicon glyphicon-edit">Edit</span>
                                        </div>
                                    </a>
                                    @if(!$item->trashed())
                                    <a href="{{route('admin_delete_product', ['alias' => $item->alias]) }}">
                                        <div class="delete-modal btn btn-danger btn-block">
                                            <span class="glyphicon glyphicon-trash">Delete</span>
                                        </div>
                                    </a>
                                        @else
                                        <a href="{{route('admin_restore_product', ['alias' => $item->alias]) }}">
                                            <div class="delete-modal btn btn-danger btn-block">
                                                <span class="glyphicon glyphicon-trash">Restore</span>
                                            </div>
                                        </a>
                                        @endif
                                </div>
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


