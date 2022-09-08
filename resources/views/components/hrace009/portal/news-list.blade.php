@if( $news->items() )
    @foreach( $news as $article )
        <!-- Single News Block -->
        <div class="news-one">
            <div class="row vertical-gutter">
                <div class="col-md-4">
                    <a href="{{ route('show.article', $article->slug) }}" class="angled-img">
                        <div class="img">
                            <img src="{{ asset('uploads/og_image') . '/' . $article->og_image }}" alt="">

                        </div>
                        <!--
                        TODO: For next update, please make rating system on each article
                        <div class="youplay-hexagon-rating youplay-hexagon-rating-small" data-max="10" data-size="50" title="9.1 out of 10"><span>9.1</span></div>
                        -->
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="clearfix">
                        <h3 class="h2 pull-left m-0"><a href="{{ route('show.article', $article->slug ) }}">{{ strtoupper($article->title) }}</a></h3>
                        <span class="date pull-right"><i class="fa fa-calendar"></i> {{ \Carbon\Carbon::parse($article->created_at)->translatedFormat('j F, Y') }}</span>
                    </div>
                    <div class="embed-item">
                        <svg class="svg-inline--fa fa-bookmark fa-w-12 meta-icon" aria-hidden="true" data-prefix="fa" data-icon="bookmark" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg=""><path fill="currentColor" d="M0 512V48C0 21.49 21.49 0 48 0h288c26.51 0 48 21.49 48 48v464L192 400 0 512z"></path></svg><!-- <i class="fa fa-bookmark meta-icon"></i> -->
                        <span class="label label-{{ $article->categoryColor($article->category) }}">{{ __('news.category.' . $article->category) }}</span>
                        <!--
                        TODO: Create category clickable to show all list news category
                        -->
                    </div>
                    <div class="tags">
                        @php($tags = explode(',', $article->keywords))
                        <i class="fa fa-tags"></i>
                        @foreach( $tags as $tag )
                            <a href="#">{{ $tag }}</a>{{ $loop->last ? '' : ', ' }}
                        @endforeach
                    </div>
                    <div class="description">
                        {{ $article->description }}
                    </div>
                    <a href="{{ route('show.article', $article->slug ) }}" class="btn read-more pull-left">{{ __('news.readmore') }}</a>
                </div>
            </div>
        </div>
        <!-- /Single News Block -->
    @endforeach
@else
    <iframe class="center-block" width="560" height="315" src="https://www.youtube-nocookie.com/embed/Z6q_u3EGJsw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
@endif
<!-- Pagination -->
{{ $news->links('vendor.pagination.portal') }}
<!-- /Pagination -->
