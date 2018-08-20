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
            <h1 class="page-header">{{ $post->big_title }}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>

            <div class="cbf">
                <div class="card">
                    <div class="card-header"></div>

                    <div class="card-body">
                        <form method="POST"    action="{{ route($post->submint_action, $post->param) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="title" class="col-md-2 ">{{ __('Заголовок') }}</label>

                                <div class="col-md-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ !$post->title ? old('title') : $post->title }}" required autofocus>
                                    <input name="alias" id="alias" type="hidden" value="{{ !$post->alias ? old('alias') : $post->alias}}" required>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="meta_key" class="col-md-2 ">{{ __('Метаключи') }}</label>

                                <div class="col-md-10 {{ $errors->has('meta_key') ? 'has-error' : '' }}">
                                    <input id="meta_key" type="text" class="form-control" name="meta_key" value="{{ !$post->meta_key ? old('meta_key') : $post->meta_key }}" required autofocus>

                                    @if ($errors->has('meta_key'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('meta_key') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-2">{{ __('Мета-описание') }}</label>

                                <div class="col-md-10 {{ $errors->has('meta_description') ? 'has-error' : '' }}">
                                    <input id="meta_description" type="text" class="form-control" name="meta_description" value="{{ !$post->meta_description ? old('meta_description') : $post->meta_description }}" required autofocus>

                                    @if ($errors->has('meta_description'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('meta_description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="cover" class="col-md-12 ">Добавить обложку</label>
                                <div class="col-md-12">
                                    @if ($post->cover)
                                        <div class="col-md-4">
                                            <img src="/images/coves_posts/{{$post->cover}}" class="img-thumbnail img-fluid">
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
                                <label for="_content" class="col-md-12">Дата и время публикации поста. Время на сервере: {{ date('H:i', time()) }}</label>
                                <div class="col-md-12">
                                    <div class="input-group date" id="datetimepicker1">
                                        <span class="input-group-addon datepickerbutton">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        <input name="postdata" type="text" class="form-control" value="{{!(date('d.m.Y H:i', $post->postdata)) ?  date('d.m.Y H:i', old('postdata')) : date('d.m.Y H:i', $post->postdata)}}"/>
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-remove"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="_content" class="col-md-12 ">Текст статьи</label>
                                <div class="col-md-12">
                                    <textarea id="content" name="_content" class="form-control my-editor" rows="10" >{!! !$post->content ? old('_content')  : $post->content!!}</textarea>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
    <!-- 4. Подключить библиотеку moment -->
    <script src="/admin_site/vendor/moment-locale/moment.js"></script>

    <!-- 6. Подключить js-файл библиотеки Bootstrap 3 DateTimePicker -->
    <script src="/admin_site/vendor/DateTimePicker/bootstrap-datetimepicker.min.js"></script>

    <script>
        $(function () {
            // идентификатор элемента (например: #datetimepicker1), для которого необходимо инициализировать виджет Bootstrap DateTimePicker
            $('#datetimepicker1').datetimepicker({
                locale: 'ru',

            });
        });
    </script>
    @endpush

