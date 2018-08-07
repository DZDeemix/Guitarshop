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
                @csrf
                <div class="form-group row">
                    <label for="title" class="col-md-12 ">{{ __('Порядок') }}</label>

                    <div class="col-md-12">
                        <input id="title" type="text" class="form-control{{ $errors->has('number_id') ? ' is-invalid' : '' }}" name="number_id" value="{{ old('number_id') }} {{ $slidergallery->number_id }}" required autofocus>


                        @if ($errors->has('number_id'))
                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('number_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="cover" class="col-md-11 ">Добавить обложку</label>
                    <div class="col-md-11">
                        @if ($slidergallery->src_path)
                        <div class="col-md-4">

                            <img src="{{$pathdir . $slidergallery->src_path}}" class="img-thumbnail img-fluid">
                        </div>
                        @endif
                        <input name="cover" type="file"  class="form-control" >

                        @if ($errors->has('src_path'))
                        <span class="invalid-feedback">
                                                    <strong>{{ $errors->first('cover') }}</strong>
                                                </span>
                        @endif
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
@endpush

