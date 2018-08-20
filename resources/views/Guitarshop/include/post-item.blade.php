
    <article class="post">
        <div class="post-item">
            <div class="entry-wrap">
                <div class="entry-thumbnail-wrap">
                    <div class="data-post-meta">
                        <div class="post-meta-inner">
                            <span class="post-day">{{ date("d", strtotime ($item->created_utc)) }} </span>
                            <span class="post-month">{{ config('GS.month')[(date("n", strtotime ($item->created_utc))-1)] }} </span>
                        </div>
                    </div>
                    <div>
                        <a href="{{ route('post_show',['alias' => $item->alias]) }}" >
                        <div  class="absolute-center absolute-center-posts img-responsive" style="background-image: url( '{{ $item->pathdircover . $item->cover }}')" >
                        </div>
                        </a>
                    </div>
                </div>
                <div class="entry-content-wrap">
                    <div class="entry-detail">
                        <h3 class="entry-title"><a href=" {{ route('post_show',['alias' => $item->alias]) }}">{{$item->title}}</a></h3>
                        <div class="entry-excerpt">
                            <p>{!! substr(strip_tags($item->content),0,100) . "..." !!}</p>
                        </div>
                        <a href="{{ route('post_show',['alias' => $item->alias]) }}" class="btn-readmore">
                            <span class="span-text">Читать
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>

