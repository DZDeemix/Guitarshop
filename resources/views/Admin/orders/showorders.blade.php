@extends('layouts.admin')
@section('content')

    {{--{{ var_dump(request()->$status) }}--}}
    @if (Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success">{!! Session::get('success') !!}</div>
    @endif
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Список заказов</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    {{--{{ dd( config('GS.statuses') ) }}--}}

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
                        <form class="form-horizontal" action="{{ route('admin_show_orders') }}">
                            <tr>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th>
                                    <div class="bloc">
                                        <select multiple selected="" size="{{ count(config('GS.statuses')) }}"  name="status[]" class="form-control">
                                            @foreach(config('GS.statuses') as $k => $status)
                                                <option value={{$k}} {{  request()->$status === $k ? 'selected' : '' }}>{{$status}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </th>
                                <th>
                                    <button type="submit" class="btn btn-primary btn-block">{{ __('Filter') }}</button>
                                    <a href="{{route('admin_show_orders') }}">
                                        <div class="delete-modal btn btn-danger btn-block">
                                            <span class="glyphicon glyphicon-trash">Сброс</span>
                                        </div>
                                    </a>
                                </th>
                                <th></th>
                                <th></th>
                            </tr>
                        </form>
                        @foreach($data as $item)
                        <tr class="odd gradeX">
                            <td>{{ $item->id }}</td>
                            @if($item->product->trashed())
                                <td>{{ $item->product->title }}<br><span class="text-danger">{{'товар удален'}}</span></td>
                            @else
                                <td>{{ $item->product->title}}</td>
                            @endif

                            <td>{{ $item->guest->email }}</td>

                            <td class="word">{{ $item->content }}</td>
                            <td class="minwidth"><span hidden>{{ $item->status }}</span>
                                <form method="POST"  id="{{$item->id}}"  action="{{ route('admin_change_status_order', $item->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <select selected="" size="1"  name="status" class="form-control">
                                        <option disabled>Выберите</option>
                                            @foreach(config('GS.statuses') as $k => $status)
                                                <option value={{$k}} {{ $item->status === $k ? 'selected' : '' }}>{{$status}}</option>
                                            @endforeach
                                    </select>
                                </form>
                            </td>
                            <td class="center">
                                <button id="submit-all" type="submit" class="btn btn-primary" form="{{$item->id}}">Сохранить</button>
                                <div class="row-heigth">
                                    <a href="{{route('admin_edit_order_show', ['alias' => $item->id]) }}">
                                        <div class="edit-modal btn btn-info btn-block">
                                            <span class="glyphicon glyphicon-edit">Edit</span>
                                        </div>
                                    </a>
                                </div>
                            </td>
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


