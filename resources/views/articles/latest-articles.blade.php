@php
    $list_article = $latest_articles;
@endphp
<div class="single-widget-area mb-30">
    <!-- Title -->
    <div class="widget-title">
        <h6>Latest Articles</h6>
    </div>
        @foreach($list_article as $article)
            @php
                $date = $article->published_at ? $article->published_at : $article->updated_at ;
                $formatDate = date('M-d-Y', strtotime($date));
            @endphp
            <!-- ##### Single Widget Area ##### -->
                <!-- Single Latest Posts -->
                <div class="single-latest-post d-flex">
                    <div class="post-thumb">
                        <img src="{{$article->image_url}}" alt="{{$article->title}}">
                    </div>
                    <div class="post-content">
                        <a href="#" class="post-title">
                            <h6>{{$article->title}}</h6>
                        </a>
                        <a href="#" class="post-author"><span>by</span> {{$article->author->name}}</a>
                        <p>{{$formatDate}}</p>

                    </div>
                </div>
            @endforeach
</div>