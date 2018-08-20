<?php

$metaURL = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$imgURL = 'http://'.$_SERVER['HTTP_HOST'] . '/public/images/coves_posts/' . $data->cover;

?>
@extends('layouts.site')

@section('Meta_property')
    @if($data)
    <title>{{ $data->title }}</title>
    <meta name="keywords" content="{{$data->meta_key}}">
    <meta name="description" content="{{$data->meta_description}}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?= $metaURL ?>">
    <meta property="og:title" content="{{ $data->title }}">
    <meta property="og:description" content="{{$data->meta_description}}">
    <meta property="og:image" content="<?= $imgURL ?>">
    @endif
@endsection

@section('body')
    <body class="products products-grid-3-columns single-product page about-us blog blog-masonry blog-detail">

@endsection

@section('content')
<div id="example-wrapper">

    <div class="div-box mb mt">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="blog-wrap">
                        <div class="blog-inner blog-style-grid blog-paging-all">
                            <article class="post">
                                <div class="post-item">
                                    <div class="entry-wrap">
                                        <div class="">
                                            <div class="data-post-meta">
                                                <div class="post-meta-inner">
                                                    <span class="post-day">{{ date("d", strtotime ($data->created_utc)) }} </span>
                                                    <span class="post-month">{{ config('GS.month')[(date("n", strtotime ($data->created_utc))-1)] }} </span>
                                                </div>
                                            </div>
                                            <div class="item">
                                                <figure><img src="{{ $data->pathdircover . $data->cover }}" alt="slide" width="1080" height="768" class=""/></figure>
                                            </div>
                                        </div>
                                        <div class="entry-content-wrap">
                                            <div class="entry-detail">
                                                <h3 class="entry-title"><a href="blog-detail.html">{{ $data->title }}</a></h3>

                                                <div class="entry-excerpt">
                                                    {!!   $data->content !!}
                                                </div>


                                                <div class="entry-meta-tag-list">
                                                    <div class="entry-meta-tag-right">
                                                        <div class="social-share-wrap">
                                                            <label><i class="fa fa-share-alt"></i>Share:</label>
                                                            <ul class="social-share">
                                                                <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($metaURL) ?>"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="https://twitter.com/share?url=<?= urlencode($metaURL) ?>"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="http://www.odnoklassniki.ru/dk?st.cmd=addShare&st.s=1&st._surl=<?= urlencode($metaURL) ?>&st.comments={{ $data->title }}"><i class="fa fa-odnoklassniki"></i></a></li>
                                                                <li><a href="http://vk.com/share.php?url=<?= urlencode($metaURL) ?>"><i class="fa fa-vk"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>


                </div>
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </div>





</div>


@endsection