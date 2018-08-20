@foreach($data->chunk(3) as $chunk)


        @foreach ($chunk as $item)
            <li  class="element-item product-item-wrap product-style_1 featured indoor new seeds">
                <div class="product-item-inner">
            <div class="product-thumb">
                <div class="product-flash-wrap">
                    @if(!$item->available)
                        <span class="on-new product-flash">Sold</span>
                    @endif
                </div>
                <div class="product-thumb-primary absolute-center absolute-center-products" style="background-image: url( '{{ $item->pathdircover .  $item->cover }}' );">
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