


@extends('layouts.site')

@section('Meta_property')
    @if($page)
    <title>{{ $page->title }}</title>
    <meta name="keywords" content="{{$page->meta_key}}">
    <meta name="description" content="{{$page->meta_description}}">
    @endif
@endsection
@section('body')
    <body class="products products-grid-3-columns single-product page about-us blog blog-masonry ">
    @endsection


@section('content')
<div id="example-wrapper">

    <div class="div-box mb mt">
        <div class="container">
            <div class="blog-wrap">
                <div class="blog-inner blog-style-grid blog-paging-all blog-col-3 row">
                    @foreach($data as $item)
                        @include('Guitarshop.include.post-item')
                    @endforeach

                </div>

                    <div class="clearfix">
                        <div class="custom-pagination center-block">
                        {{ $data->links() }}
                        </div>
                    </div>
            </div>

        </div>

    </div>


</div>
@endsection