
@extends('layouts.site')


@section('body')
    <body class="products products-grid-3-columns single-product page about-us blog blog-masonry blog-detail ">
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
                                            <div class="entry-thumbnail-wrap absolute-center" style="height:500px; background-image: url( '{{ '/images/coves_posts/' . $data->cover }}' );">

                                            </div>
                                        </div>
                                        <div class="entry-content-wrap">
                                            <div class="entry-detail">
                                                <h3 class="entry-title"><a href="blog-detail.html">{{ $data->title }}</a></h3>

                                                <div class="entry-excerpt">
                                                    {!!   $data->content !!}
                                                </div>


                                                <div class="entry-meta-tag-list">
                                                    <div class="entry-meta-tag">
                                                        <label><i class="fa fa-tags"></i>Tags :</label><a href="#">Plant Care</a><a href="#">Plant Of The Month</a>
                                                    </div>
                                                    <div class="entry-meta-tag-right">
                                                        <div class="social-share-wrap">
                                                            <label><i class="fa fa-share-alt"></i>Share:</label>
                                                            <ul class="social-share">
                                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-tumblr"></i></a></li>
                                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
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