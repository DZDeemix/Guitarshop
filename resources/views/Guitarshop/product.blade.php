<?php

$metaURL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$imgURL = 'http://'.$_SERVER['HTTP_HOST'] . '/public/images/cover_products/' . $product->cover;

?>
@extends('layouts.site')
@section('Meta_property')
    @if($product)
    <title>{{ $product->title }}</title>
    <meta name="keywords" content="{{$product->meta_key}}">
    <meta name="description" content="{{$product->meta_description}}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?= $metaURL ?>">
    <meta property="og:title" content="{{ $product->title }}">
    <meta property="og:description" content="{{$product->meta_description}}">
    <meta property="og:image" content="<?= $imgURL ?>">
    @endif
@endsection
@section('body')
    <body class="product single-product">
@endsection
@section('modal')
    <!-- HTML-код модального окна -->
    <div id="order" class="modal fade zindex_mod" >
        <div class="modal-dialog" >
            <div class="modal-content">
                <!-- Заголовок модального окна -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="false">×</button>
                    <h4 class="modal-title " style="font-weight: 600; text-transform: uppercase; ">{{ $product->title }}</h4>
                </div>
                <!-- Основное содержимое модального окна -->
                <div class="modal-body">
                    <div class="choose-your-content">
                        <form method="POST"  class="modal_form form-horizontal cart " style="margin: 0px 0;" action="{{ route('new_order',['alias' => $product->alias]) }}" enctype="multipart/form-data">
                            <div class="order-wrapper">
                                @csrf
                                <input class="order-field-product_id" type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="col-md-12">

                                <div class="form-group">
                                    <label for="email" class="modal_order">{{ __('Ваш email') }}</label>
                                    <input class="order-field-email" style="width:100%;"  name="email" type="text"  value="{{ old('email') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="_content" class="modal_order">{{ __('Коментарии к заказу') }}</label>
                                    <textarea class="order-field-content" style="width:100%;" name="_content"  rows="10" >{{ old('_content') }}</textarea>
                                </div>

                                <span role="button" class="btn btn-primary modal_btn order-submit">Оставить заявку</span>


                                </div>
                            </div>

                            <div class="order-response">
                                <span><h3>Спасибо!</h3><p>Ваша заявка получена</p><p>Мы с Вами свяжемся в ближайшее время</p></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Футер модального окна -->

            </div>
        </div>
    </div>
@endsection
@section('content')


    @if($product)
        <div id="example-wrapper">

            <div class="div-box mb mt">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="single-product-slider">

                                <div id="sync1" class="owl-carousel owl-template">
                                    @if ($product->cover)
                                        <div class="item">
                                            <figure><img src="{{$product->pathdircover . $product->cover}}" alt="slide" width="1080" height="768"/></figure>
                                        </div>
                                    @endif
                                    @if ($product->gallery)
                                        @foreach($product->gallery as $item)
                                            <div class="item">
                                                <figure><img src="{{$product->pathdir . $item->src_path}}" alt="slide" width="1080" height="768"/></figure>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div id="sync2" class="owl-carousel owl-template">
                                    @if ($product->cover)
                                        <div class="item">
                                            <figure><img src="{{$product->pathdircover . $product->cover}}" alt="slide" width="1080" height="768"/></figure>
                                        </div>
                                    @endif
                                    @if ($product->gallery)
                                        @foreach($product->gallery as $item)
                                            <div class="item">
                                                <figure><img src="{{$product->pathdir . $item->src_path}}" alt="slide" width="1080" height="768"/></figure>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="single-product-content">
                                <div class="summary-product entry-summary">
                                    <h2 class="product_title mb-45">{{ $product->title }}</h2>
                                    <div>
                                        <p class="price"><span class="product-begreen-price-amount amount"><span class="product-begreen-price-currencysymbol">$</span>{{ $product->price }}</span></p>
                                    </div>
                                    <div class="product-single-short-description">
                                        <p>{!! $product->content !!}</p>
                                    </div>



                                    @yield('modal')
                                    <form class="cart" >
                                        <div class="quantity">
                                        </div>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#order">Заказать</button>

                                    </form>

                                    <div class="product_meta">
                                        <span class="product-stock-status-wrapper">
                                            <label>Availability:</label>
                                                <span class="product-stock-status in-stock">{{$product->available === 1 ? 'In stock' : 'Out of stock' }}
                                                </span>
                                            </span><span class="posted_in">

                                        </span>

                                    </div>
                                    <div class="entry-meta-tag-list">
                                        <div class="entry-meta-tag-right">
                                            <div class="social-share-wrap">
                                                <label><i class="fa fa-share-alt"></i>Share:</label>
                                                <ul class="social-share">
                                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($metaURL) ?>"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="https://twitter.com/share?url=<?= urlencode($metaURL) ?>"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?= urlencode($metaURL) ?>&st.comments={{ $product->title }}"><i class="fa fa-odnoklassniki"></i></a></li>
                                                    <li><a href="http://vk.com/share.php?url=<?= urlencode($metaURL) ?>"><i class="fa fa-vk"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>


            {{--<div class="div-box mb">
                <div class="container">
                    <div class="title-style title-style-2 text-center mb-20">
                        <h2>Related Projects </h2>
                    </div>
                    <div data-number="4" data-margin="0" data-loop="no" data-navcontrol="yes" class="shortcode-data-wrap data-begreen begreen-owl-carousel">
                        @include('Guitarshop.include.poduct')
                    </div>
                </div>
            </div>--}}


        </div>

</div>

    @endif
@endsection

@section('create-order')
    <script Defer type="Text/JavaScript" src="/Site/js/order.js"></script>

@endsection