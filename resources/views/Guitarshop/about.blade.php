@extends('layouts.site')
@section('Meta_property')
    @if($page)
    <title>{{ $page->title }}</title>
    <meta name="keywords" content="{{$page->meta_key}}">
    <meta name="description" content="{{$page->meta_description}}">
    @endif
@endsection
@section('body')
    <body class="products products-grid-3-columns single-product page about-us ">
    @endsection
@section('content')


    <div id="example-wrapper">

        <div class="div-box text-top mt">
            <div class="container">
                <div class="text-center mb-20">
                    <h2 class="title-style title-style-1 mb-20"><span class="title-left">{{ $page->h1 }} </span></h2>
                    {!! $page->content1 !!}
                </div>
                <div class="text-left mb-20">
                    <h2 class="mb-20">{{ $page->h2 }}</h2>
                    {!! $page->content2 !!}
                </div>
            </div>
        </div>

        <div class="div-box who-we-are">
            <div class="container">
                <div class="row mt-20 mb-45">
                    <div class="col-md-6 col-sm-6">
                        <div class="img-left"><img src="{{ $page->getPathdir() }}{{ $page->cover1 }}" alt="about-us"/></div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="who-we-are-right">
                            <h2 class="mt-20 mb-20">{{ $page->h3 }}</h2>
                            {!! $page->content3 !!}

                        </div>
                    </div>
                </div>

            </div>
        </div>









    </div>

@endsection