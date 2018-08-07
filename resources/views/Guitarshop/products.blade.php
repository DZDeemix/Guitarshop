@extends('layouts.site')
@section('body')
    <body class="products products-grid-3-columns single-product page about-us ">
    @endsection
@section('content')
@if($data)
    <div id="example-wrapper">

        <div class="div-box mb">
            <div class="container">
                <div class="big-demo go-wide style-2">
                    <div class="filter-button-group button-group js-radio-button-group container">

                    </div>
                    <div class="row">
                        <ul class="grid product-begreen columns-3">
                            @include('Guitarshop.include.poduct')
                        </ul>
                    </div>
                    <div class="clearfix"></div>
                        <div class="custom-pagination center-block">
                            {{ $data->links() }}
                        </div>

                </div>

            </div>
        </div>


    </div>
@endif
@endsection