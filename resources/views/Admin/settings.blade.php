@extends('layouts.admin')
@section('content')

    @if (Session::has('message'))
        <div class="alert alert-danger">{{ Session::get('message') }}</div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success">{!! Session::get('success') !!}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Настройки</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="cbf">
        <div class="card">
            <div class="card-header"></div>

            <div class="card-body">
                <form method="POST"    action="{{ route('admin_change_settings') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Количество постов на одной странице в панели администратора') }}</label>

                        <div class="col-md-12 {{ $errors->has('paginatoin_admin') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="paginatoin_admin" value="{{ $setting->paginatoin_admin }}" >
                            @if ($errors->has('paginatoin_admin'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('paginatoin_admin') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Количество товаров на одной странице в панели администратора') }}</label>

                        <div class="col-md-12 {{ $errors->has('paginatoin_admin_product') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="paginatoin_admin_product" value="{{ $setting->paginatoin_admin_product }}" >
                            @if ($errors->has('paginatoin_admin_product'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('paginatoin_admin_product') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Количество постов на одной странице сайта') }}</label>

                        <div class="col-md-12 {{ $errors->has('paginatoin_site') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="paginatoin_site" value="{{ $setting->paginatoin_site }}" >
                            @if ($errors->has('paginatoin_site'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('paginatoin_site') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Количество товаров на одной странице сайта') }}</label>

                        <div class="col-md-12 {{ $errors->has('paginatoin_site_product') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="paginatoin_site_product" value="{{ $setting->paginatoin_site_product }}" >
                            @if ($errors->has('paginatoin_site_product'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('paginatoin_site_product') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Количество постов на главной странице') }}</label>

                        <div class="col-md-12 {{ $errors->has('paginatoin_site_onMain') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="paginatoin_site_onMain" value="{{ $setting->paginatoin_site_onMain }}" >
                            @if ($errors->has('paginatoin_site_onMain'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('paginatoin_site_onMain') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Количество товаров на главной странице') }}</label>

                        <div class="col-md-12 {{ $errors->has('paginatoin_site_onMain_products') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="paginatoin_site_onMain_products" value="{{ $setting->paginatoin_site_onMain_products }}" >
                            @if ($errors->has('paginatoin_site_onMain_products'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('paginatoin_site_onMain_products') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Email адрес') }}</label>

                        <div class="col-md-12 {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="email" value="{{ $setting->email }}" >
                            @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Email адрес для заказов') }}</label>

                        <div class="col-md-12 {{ $errors->has('email_send1') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="email_send1" value="{{ $setting->email_send1 }}" >
                            @if ($errors->has('email_send1'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email_send1') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <label for="gallery" >Изображения главного слайдера</label><br>
                    <a href="{{route('admin_settings_show')}}">
                        <div class="btn btn-primary">Добавить</div>
                    </a>

                            <div class="form-group vbottom ">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="table_id" width="100%" class="tableadmin table table-bordered table-hover " >
                                            <thead>
                                            <tr>
                                                <th class="col-md-3">Обложка</th>
                                                <th class="col-md-3">Порядок</th>
                                                <th class="col-md-1">Control</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($slidergallery as $item)
                                                    <tr class="odd gradeX">
                                                        <td>

                                                                <div class="col-md-12">
                                                                    <img src="{{$pathdir . $item->src_path}}" width="30%" class="img-responsive">
                                                                </div>

                                                        </td>
                                                        <td>{{ $item->number_id }}</td>

                                                        <td class="center">
                                                            <a href="{{route('admin_settings_showedit', ['id' => $item->id]) }}">
                                                                <div class="edit-modal btn btn-info btn-block">
                                                                    <span class="glyphicon glyphicon-edit">Edit</span>
                                                                </div>
                                                            </a>
                                                            <a href="{{route('admin_settings_del', ['id' => $item->id]) }}">
                                                                <div class="delete-modal btn btn-danger btn-block">
                                                                    <span class="glyphicon glyphicon-trash">Delete</span>
                                                                </div>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        <div class="clearfix"></div>


                   {{-- <div class="form-group row">
                        <label for="meta_key" class="col-md-2 ">{{ __('Метаключи') }}</label>

                        <div class="col-md-9">
                            <input id="meta_key" type="text" class="form-control{{ $errors->has('meta_key') ? ' is-invalid' : '' }}" name="meta_key" value="{{ old('meta_key') }} {{ $post->meta_key }}" required autofocus>

                            @if ($errors->has('meta_key'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('meta_key') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-2">{{ __('Мета-описание') }}</label>

                        <div class="col-md-9">
                            <input id="meta_description" type="text" class="form-control{{ $errors->has('meta_description') ? ' is-invalid' : '' }}" name="meta_description" value="{{ old('meta_description') }}{{ $post->meta_description }}" required autofocus>

                            @if ($errors->has('meta_description'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('meta_description') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="cover" class="col-md-11 ">Добавить обложку</label>
                        <div class="col-md-11">
                            @if ($post->cover)
                                <div class="col-md-4">

                                    <img src="/images/posts/{{$post->cover}}" class="img-thumbnail img-fluid">
                                </div>
                            @endif
                            <input name="cover" type="file"  class="form-control" >

                            @if ($errors->has('cover'))
                                <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('cover') }}</strong>
                                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="_content" class="col-md-11 ">Текст статьи</label>
                        <div class="col-md-11">
                            <textarea id="content" name="_content" class="form-control my-editor" rows="10" >{{ old('_content') }} {{ $post->title }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row ">--}}
                        <div class="col-md-6 ">
                            <button id="submit-all" type="submit" class="btn btn-primary">
                                {{ __('Сохранить') }}
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>




@endsection

