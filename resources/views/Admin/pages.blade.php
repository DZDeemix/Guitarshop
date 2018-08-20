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
            <h1 class="page-header">{{ $page->getPageName() }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

    <div class="cbf">
        <div class="card">
            <div class="card-header"></div>

            <div class="card-body">
                <form method="POST"    action="{{ route('admin_change_page', ['id' => $page->page_id]) }}" enctype="multipart/form-data">
                    @csrf



                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Заголовок') }}</label>

                        <div class="col-md-12 {{ $errors->has('title') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="title" value="{{ $page->title }}" >
                            @if ($errors->has('title'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Мета ключи') }}</label>

                        <div class="col-md-12 {{ $errors->has('meta_key') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="meta_key" value="{{ $page->meta_key }}" >
                            @if ($errors->has('meta_key'))
                                <span class="invalid-feedback">
                                        <strong>{{ $errors->first('meta_key') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="title" class="col-md-12 ">{{ __('Мета описание') }}</label>

                        <div class="col-md-12 {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                            <input  type="text" class="form-control" name="meta_description" value="{{ $page->meta_description }}" >
                            @if ($errors->has('meta_description'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('meta_description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    @if ($page->page_id === '4')
                        <div class="form-group row">
                            <label for="cover" class="col-md-12 ">Добавить обложку</label>
                            <div class="col-md-12">
                                @if ($page->cover1)
                                    <div class="col-md-4">

                                        <img src="{{$page->getPathdir()}}{{$page->cover1}}" class="img-thumbnail img-fluid">
                                    </div>
                                @endif
                                <input name="cover1" type="file"  class="form-control" >

                                @if ($errors->has('cover1'))
                                    <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('cover1') }}</strong>
                                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-md-12 ">{{ __('Заголовок1 страницы О нас') }}</label>

                            <div class="col-md-12">
                                <input  type="text" class="form-control{{ $errors->has('h1') ? ' is-invalid' : '' }}" name="h1" value="{{ $page->h1 }}" >
                                @if ($errors->has('h1'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('h1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="_content" class="col-md-12 ">Текст1 страницы О нас</label>
                            <div class="col-md-12">
                                <textarea id="content" name="content1" class="form-control my-editor" rows="10" >{!!$page->content1!!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-12 ">{{ __('Заголовок2 страницы О нас') }}</label>

                            <div class="col-md-12">
                                <input  type="text" class="form-control{{ $errors->has('h2') ? ' is-invalid' : '' }}" name="h2" value="{{ $page->h2 }}" >
                                @if ($errors->has('h2'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('h2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="_content" class="col-md-12 ">Текст1 страницы О нас</label>
                            <div class="col-md-12">
                                <textarea id="content" name="content2" class="form-control my-editor" rows="10" >{!!$page->content2!!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-12 ">{{ __('Заголовок1 страницы О нас') }}</label>

                            <div class="col-md-12">
                                <input  type="text" class="form-control{{ $errors->has('h3') ? ' is-invalid' : '' }}" name="h3" value="{{ $page->h3 }}" >
                                @if ($errors->has('h3'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('h3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="_content" class="col-md-12 ">Текст1 страницы О нас</label>
                            <div class="col-md-12">
                                <textarea id="content" name="content3" class="form-control my-editor" rows="10" >{!!$page->content3!!}</textarea>
                            </div>
                        </div>
                    @endif



                    <div>
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