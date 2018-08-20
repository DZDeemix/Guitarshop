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
            <h1 class="page-header">{{ $product->big_title }}</h1>
        </div>
    </div>

            <div class="cbf">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST"    action="{{ route($product->submint_action, $product->param) }}" enctype="multipart/form-data">
                            <div class="product-wrapper">
                            @csrf



                            <div class="form-group row">
                                <label for="title" class="col-md-2 ">{{ __('Название товара') }}</label>

                                <div class="col-md-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input id="title" type="text" class="form-control" name="title" value="{{!$product->title ?  old('title') : $product->title}}" required autofocus>
                                    <input name="alias" id="alias" type="hidden" value="{{!$product->alias ? old('alias') : $product->alias}}" required>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meta_key" class="col-md-2 ">{{ __('Метаключи') }}</label>

                                <div class="col-md-10 {{ $errors->has('meta_key') ? 'has-error' : '' }}">
                                    <input id="meta_key" type="text" class="form-control" name="meta_key" value="{{ !$product->meta_key ? old('meta_key'): $product->meta_key}}" required autofocus>

                                    @if ($errors->has('meta_key'))
                                        <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('meta_key') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-2">{{ __('Мета-описание') }}</label>

                                <div class="col-md-10 {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                                    <input id="meta_description" type="text" class="form-control" name="meta_description" value="{{ !$product->meta_description ? old('meta_description') : $product->meta_description}}" required autofocus>

                                    @if ($errors->has('meta_description'))
                                        <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('meta_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="price" class="col-md-2 ">{{ __('Цена') }}</label>

                                <div class="col-md-10 {{ $errors->has('price') ? 'has-error' : '' }}">
                                    <input id="price" type="text" class="form-control" name="price" value="{{ !$product->price ? old('price') :  $product->price }} " >

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                        <div class="row">
                            <div class="form-group col-md-5 vbottom">
                                @if ($product->cover)
                                    <div>
                                        <img src="/images/cover_products/{{$product->cover}}" class="img-thumbnail img-fluid">
                                    </div>
                                @endif
                                <label for="cover">Добавить обложку</label>
                                <div>
                                    <input name="cover"  type="file"  class="form-control">
                                    @if ($errors->has('cover'))
                                        <span class="invalid-feedback text-danger">
                                            <strong>{{ $errors->first('cover') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group col-md-6 vbottom ">
                                @if ($product->gallery)
                                    @foreach($product->gallery as $item)
                                        <div class="col-md-3 active-gallery-item">
                                            <span data-id="{{$item->id}}" class="active-gallery-del">
                                                <i class="fa fa-trash fa-2x"></i>
                                            </span>
                                            <img src="/images/gallery_products/{{$item->src_path}}" class="img-thumbnail img-fluid">
                                        </div>
                                    @endforeach
                                @endif
                                <div class="clearfix"></div>
                                <div class="">
                                    <label for="gallery" >Добавить изображения для галлереи</label>
                                    <input name="gallery[]" type="file"  class="form-control" multiple >
                                    @if ($errors->has('gallery.*'))
                                        <div class="alert alert-danger">
                                            @foreach ($errors->get('gallery.*') as $messages)
                                                    <ul>
                                                        @foreach ($messages as $message)
                                                                <li>{{ ($message) }}</li>
                                                        @endforeach
                                                    </ul>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                            <div class="row">
                                <div class="form-group  col-md-5">
                                    <label for="available" >Товар в наличии</label>

                                    <div class="row">
                                        <div class="col-md-4 {{ $errors->has('available') ? 'has-error' : '' }}">
                                            <select  size="1"  name="available" class="form-control">
                                                    <option selected disabled hidden>Выберите</option>
                                                    <option selected="selected" value="1" {{ old('available')=== 1 || $product->available === 1 ? 'selected' : '' }}>Да</option>
                                                    <option value="0" {{ old('available')=== 0 || $product->available === 0 ? 'selected' : '' }}>Нет</option>
                                            </select>
                                            @if ($errors->has('available'))
                                                <span class="invalid-feedback text-danger">
                                                    <strong>{{ $errors->first('available') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="onMain" >Отображать на главной странице</label>

                                    <div class="row">
                                        <div class="col-md-4 {{ $errors->has('onMain') ? 'has-error' : '' }}">
                                            <select size="1"  name="onMain" class="form-control">
                                                <option selected disabled hidden>Выберите</option>
                                                <option selected="selected" value="1" {{ old('onMain')=== 1 || $product->onMain === 1 ? 'selected' : '' }}>Да</option>
                                                <option value="0" {{ old('onMain')=== 0 || $product->onMain === 0 ? 'selected' : '' }}>Нет</option>
                                            </select>
                                        @if ($errors->has('onMain'))
                                            <span class="invalid-feedback text-danger">
                                                <strong>{{ $errors->first('onMain') }}</strong>
                                            </span>
                                        @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="_content" class="col-md-12 ">Описание товара</label>
                                <div class="col-md-12 {{ $errors->has('_content') ? 'has-error' : '' }}">
                                    <textarea id="content" name="_content" class="form-control my-editor" rows="10" >{!! !$product->content ?  old('_content') : $product->content  !!}</textarea>
                                </div>
                                @if ($errors->has('_content'))
                                    <span class="invalid-feedback text-danger">
                                        <strong>{{ $errors->first('_content') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group row ">
                                <div class="col-md-6">
                                    <button id="submit-all" type="submit" class="btn btn-primary">
                                        {{ __('Сохранить') }}
                                    </button>
                                </div>
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

