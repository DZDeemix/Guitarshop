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
        <div class="container">
            @if($product->first())
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header">{{ 'Товары' }}</h3>
                    </div>
                </div>
                <div id="example-wrapper">
                    <div class="div-box mb">
                        <div class="container">
                            <div class="big-demo go-wide style-2">
                                <div class="filter-button-group button-group js-radio-button-group container">
                                </div>
                                <div class="row">
                                    <ul class="grid product-begreen columns-3">
                                        @foreach($product->chunk(3) as $chunk)


                                            @foreach ($chunk as $item)
                                                <li  class="element-item product-item-wrap product-style_1 featured indoor new seeds">
                                                    <div class="product-item-inner">
                                                        <div class="product-thumb">
                                                            <div class="product-flash-wrap">
                                                                @if(!$item->available)
                                                                    <span class="on-new product-flash">Sold</span>
                                                                @endif
                                                            </div>
                                                            <div class="product-thumb-primary absolute-center absolute-center-products" style="background-image: url( '{{ '/images/cover_products/' . $item->cover }}' );">
                                                                {{--<img src="{{ "/images/cover_products/" . $item->cover }}" alt="product1"  class="attachment-shop_catalog size-shop_catalog wp-post-image"/>--}}
                                                                {{--width="375" height="450"--}}
                                                            </div>
                                                            <a href="{{ route('product_show',['alias'=> $item->alias ]) }}" class="product-link">
                                                                <div class="product-hover-sign">
                                                                    <hr/>
                                                                    <hr/>
                                                                </div></a>
                                                            <div class="product-info">
                                                                <h4 class="entry-title" style="padding: 10px; font-size: 24px;">
                                                                    <a href="{{ route('product_show',['alias'=> $item->alias ]) }}">{{ $item->title }}</a></h4>
                                                                <span class="price">
                            <span class="product-begreen-price-amount amount">
                                <span class="product-begreen-price-currencysymbol">

                                </span>{{ $item->price }}
                            </span>руб
                        </span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach


                                            <div class="clearfix"></div>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <div class="custom-pagination center-block">
                                    {{--{{ $product->links() }}--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if($post->first())
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">{{ 'Посты' }}</h2>
                    </div>
                </div>
                <div id="example-wrapper">
                    <div class="div-box mb mt">
                        <div class="container">
                            <div class="blog-wrap">
                                <div class="blog-inner blog-style-grid blog-paging-all blog-col-3 row">
                                    @foreach($post as $item)
                                        @include('Guitarshop.include.post-item')
                                    @endforeach
                                </div>
                                <div class="clearfix">
                                    <div class="custom-pagination center-block">
                                        {{--{{ $post->links() }}--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @if(!$post->first() and !$product->first())
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">{{ 'Ничего не найдено' }}</h2>
                    </div>
                </div>

            @endif
        </div>>
@endsection