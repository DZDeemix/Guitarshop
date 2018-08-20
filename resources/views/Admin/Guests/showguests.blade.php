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
            <h1 class="page-header">Список гостей</h1>
        </div>
    </div>
    <div class="row">
                <div class="panel-body">
                    <table  width="100%" class="table table-striped table-bordered table-hover display nowrap" >
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
    </div>
@endsection


