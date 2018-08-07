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
                            <th >Имя гостя</th>
                            <th >Пояснения к заказу</th>
                            <th >Статус заказа</th>
                            <th >Управление</th>
                            <th >Дата создания</th>
                            <th >Дата обновления</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                        <tr class="odd gradeX">
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->product->title }}</td>
                            <td>{{ $item->guest->email }}</td>
                            <td class="word">{{ $item->content }}</td>
                            <td ><span hidden> {{ $item->status }} </span>
                                <form method="POST"  id="{{$item->id}}"  action="{{ route('admin_change_status_order', $item->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <select selected="" size="1"  name="status" class="form-control" {{--onchange="this.form.submit()"--}}>
                                        <option disabled>Выберите</option>
                                            @foreach(config('GS.statuses') as $k => $status)
                                                <option value={{$k}} {{ $item->status === $k ? 'selected' : '' }}>{{$status}}</option>
                                            @endforeach
                                        {{--<option value="1" {{ $item->status === "1" ? 'selected' : '' }}>В обработке</option>
                                        <option value="2" {{ $item->status === "2" ? 'selected' : '' }}>Завершен</option>
                                        <option value="3" {{ $item->status === "3" ? 'selected' : '' }}>Отказ</option>
                                        <option value="4" {{ $item->status === "4" ? 'selected' : '' }}>Возврат</option>--}}
                                    </select>
                                </form>


                            </td>
                            <td class="center">

                                <button id="submit-all" type="submit" class="btn btn-primary" form="{{$item->id}}">Сохранить</button>


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


