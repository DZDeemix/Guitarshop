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
            <h1 class="page-header">{{ $big_title }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

            <div class="cbf">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST"    action="{{ route($submint_action, $param) }}" enctype="multipart/form-data">
                            <div class="product-wrapper col-md-12">
                            @csrf
                                <div class="form-group row ">
                                    <div class="col-md-6 ">
                                        <button id="submit-all" type="submit" class="btn btn-primary">
                                            {{ __('Сохранить') }}
                                        </button>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="meta_key" class="col-md-2 ">{{ __('Изменить товар') }}</label>

                                    <div class="col-md-10">
                                        <select selected="" size="1"  name="product_id" class="form-control">
                                            <option disabled>Выберите</option>
                                            @foreach($products as $item)
                                                <option value={{$item->id}} {{ $item->id === $order->product->id ? 'selected' : '' }}>{{$item->title}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('meta_key'))
                                            <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('meta_key') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="meta_key" class="col-md-2 ">{{ __('Изменить статус') }}</label>
                                    <div class="col-md-10">
                                        <select selected="" size="1"  name="status" class="form-control">
                                            <option disabled>Выберите</option>
                                            @foreach(config('GS.statuses') as $k => $status)
                                                <option value={{$k}} {{ $order->status === $k ? 'selected' : '' }}>{{$status}}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('meta_key'))
                                            <span class="invalid-feedback text-danger">
                                            <strong>{{ $errors->first('meta_key') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                               {{-- <div class="form-group row">
                                    <label for="meta_key" class="col-md-2 ">{{ __('Изменить покупателя') }}</label>

                                    <div class="col-md-9">
                                        <select selected="" size="1"  name="guest_id" class="form-control">
                                            <option disabled>Выберите</option>
                                            @foreach($guests as $item)
                                                <option value={{$item->id}} {{ $item->id === $order->guest->id ? 'selected' : '' }}>{{$item->email .'  -  '. $item->name}}</option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('meta_key'))
                                            <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('meta_key') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>--}}

                                <div class="form-group row">
                                    <label for="_content" class="col-md-11 ">Коментарии покупателя</label>
                                    <div class="col-md-12">
                                        <textarea class="form-control" rows="7">{{ old('content') }}{!! $order->content !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="prod_coment" class="col-md-11 ">Коментарии продавца</label>
                                    <div class="col-md-12">
                                        <textarea id="content" name="prod_coment" class="form-control my-editor" rows="10" >{{ old('prod_coment') }}    {!! $order->prod_coment !!}</textarea>
                                    </div>
                                </div>


                            </div>

                            <div class="col-md-6">
                            <h4 class="page-header ">{{ 'Информация о товаре' }}</h4>
                            <label for="cover">Обложка</label>
                            <div class="row">
                                <div class="form-group col-md-4 ">

                                    @if ($order->product->cover)
                                        <div>
                                            <img src="/images/cover_products/{{$order->product->cover}}" class="img-thumbnail img-fluid">
                                        </div>
                                    @endif
                                    <div class="row-heigth">
                                        <a href="{{route('admin_edit_product_show', ['alias' => $order->product->alias]) }}">
                                            <div class="edit-modal btn btn-info btn-block">
                                                <span class="glyphicon glyphicon-edit">Edit</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-8">


                                    <div class="form-group row">
                                        <label class="col-md-6">{{ __('Название товара') }}</label>
                                        <label class="col-md-6">{{$order->product->title}}</label>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-md-6">{{ __('Alias') }}</label>
                                        <label class="col-md-6">{{$order->product->alias}}</label>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-md-6">{{ __('Метаключи') }}</label>
                                        <label class="col-md-6">{{$order->product->meta_description}}</label>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-md-6">{{ __('Цена') }}</label>
                                        <label class="col-md-6">{{$order->product->price}} руб.</label>
                                    </div>




                                    <div class="form-group  row">
                                        <label class="col-md-6">Товар в наличии</label>
                                        <label class="col-md-6">{{$order->product->available === 1 ? 'Да' : 'Нет' }}</label>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-md-6">Отображать на главной странице</label>
                                        <label class="col-md-6">{{$order->product->onMain === 1 ? 'Да' : 'Нет' }}</label>
                                    </div>

                                </div>
                            </div>
                        </div>

                            <div class="col-md-6">
                            <h4 class="page-header">{{ 'Информация о покупателе' }}</h4>
                            <label>Покупатель</label>

                                    <div class="form-group row">
                                        <label class="col-md-3">{{ __('Имя') }}</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control {{$errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }} {{$order->guest->name}}">
                                        </div>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback text-danger">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3">{{ __('Email') }}</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control {{$errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }} {{$order->guest->email}}">
                                        </div>
                                            @if ($errors->has('email'))
                                            <span class="invalid-feedback text-danger">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3">{{ __('Номер телефона') }}</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control {{$errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }} {{$order->guest->phone_number}}">
                                        </div>
                                        @if ($errors->has('phone_number'))
                                            <span class="invalid-feedback text-danger">
                                                <strong>{{ $errors->first('phone_number') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-md-3">{{ __('Адрес') }}</label>
                                        <div class="col-md-9">
                                            <input type="text" class="form-control {{$errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }} {{$order->guest->address}}">
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="invalid-feedback text-danger">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                        <label class="col-md-6">{{$order->guest->addres}}</label>
                                    </div>

                        </div>
                        </form>
                    </div>
                </div>
            </div>




@endsection
@push('foter_script')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        var editor_config = {
            path_absolute : "/",
            selector: "textarea.my-editor",
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            relative_urls: false,
            file_browser_callback : function(field_name, url, type, win) {
                var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
                if (type == 'image') {
                    cmsURL = cmsURL + "&type=Images";
                } else {
                    cmsURL = cmsURL + "&type=Files";
                }

                tinyMCE.activeEditor.windowManager.open({
                    file : cmsURL,
                    title : 'Filemanager',
                    width : x * 0.8,
                    height : y * 0.8,
                    resizable : "yes",
                    close_previous : "no"
                });
            }
        };

        tinymce.init(editor_config);
    </script>
    @endpush

