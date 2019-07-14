@php
    $list_article = $regular_articles;
@endphp

@foreach($list_article as $article)
    @php
        $date = $article->published_at ? $article->published_at : $article->updated_at ;
        $formatDate = date('M-d-Y', strtotime($date));
        $limitWords = 200;
        $shortDesc = \Illuminate\Support\Str::limit($article->content, $limitWords, '...');
    @endphp
    <!-- Single Blog Post -->
    <div class="col-12 col-sm-6">
        <div class="single-blog-post mb-50">
            <!-- Thumbnail -->
            <div class="post-thumbnail">
                <a href="#"><img src="{{$article->image_url}}" alt="{{$article->title}}"></a>
                {{--list catergories--}}
                @include('articles.list-catergories-links', ['article', $article])
                {{--end list catergories--}}
            </div>
            <!-- Content -->
            <div class="post-content">
                <p class="post-date">{{$formatDate}}</p>
                <a href="#" class="post-title">
                    <h4>{{$article->title}}</h4>
                </a>
                <p class="post-excerpt">{{$shortDesc}}</p>
            </div>
        </div>
    </div>
@endforeach
