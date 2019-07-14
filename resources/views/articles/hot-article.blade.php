@php
    $article = $hot_article;
    $date = $article->published_at ? $article->published_at : $article->updated_at ;
    $formatDate = date('M-d-Y', strtotime($date));
    $limitWords = 300;
    $shortDesc = \Illuminate\Support\Str::limit($article->content, $limitWords, '...')
@endphp


<div class="col-12">
    <div class="featured-post-area mb-50">
        <!-- Thumbnail -->
        <div class="post-thumbnail mb-30">
            <a href="#"><img src="{{$article->image_url}}" alt=""></a>
        </div>
        <!-- Featured Post Content -->
        <div class="featured-post-content">
            <p class="post-date">{{$formatDate}}</p>
            <a href="#" class="post-title">
                <h2>{{$article->title}}</h2>
            </a>
            {{--list catergories--}}
            @include('articles.list-catergories-links', ['article', $article])
            {{--end list catergories--}}
            <p class="post-excerpt">
                {{$shortDesc}}
            </p>
        </div>
        <!-- Post Meta -->
        <div class="post-meta d-flex align-items-center justify-content-between">
            <!-- Author Comments -->

            <div class="author-comments">
                <a href="#"><span>by</span> {{$article->author->name}}</a>

                @if($article->comments)
                    <a href="#">03 <span>Comments</span></a>
                @endif
            </div>
            <!-- Social Info -->
            <div class="social-info">
                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
</div>