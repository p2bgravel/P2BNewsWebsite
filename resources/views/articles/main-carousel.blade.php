@php
    $list_article = $slide_articles;
@endphp

<section class="hero-area">
    <!-- Preloader -->
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="circle-preloader">
            <div class="a" style="--n: 5;">
                <div class="dot" style="--i: 0;"></div>
                <div class="dot" style="--i: 1;"></div>
                <div class="dot" style="--i: 2;"></div>
                <div class="dot" style="--i: 3;"></div>
                <div class="dot" style="--i: 4;"></div>
            </div>
        </div>
    </div>

    <div class="hero-post-slides owl-carousel">
        @foreach($list_article as $article)
            @php
                $date = $article->published_at ? $article->published_at : $article->updated_at ;
                $formatDate = date('M-d-Y', strtotime($date));
                $limitWords = 200;
                $shortDesc = \Illuminate\Support\Str::limit($article->content, $limitWords, '...')
            @endphp
        <!-- Single Hero Post -->
            <div class="single-hero-post d-flex flex-wrap">
                <!-- Post Thumbnail -->
                <div class="slide-post-thumbnail h-100 bg-img"
                     style="background-image: url({{$article->image_url}});"></div>
                <!-- Post Content -->
                <div class="slide-post-content h-100 d-flex align-items-center">
                    <div class="slide-post-text">
                        <p class="post-date" data-animation="fadeIn" data-delay="100ms">{{$formatDate}}</p>
                        <a href="{{route('web.article',[$article->slug])}}" class="post-title" data-animation="fadeIn" data-delay="300ms">
                            <h2>{{$article->title}}</h2>
                        </a>
                        {{--list catergories--}}
                        @include('articles.list-catergories-links', ['article', $article])
                        {{--end list catergories--}}
                        <p class="post-excerpt" data-animation="fadeIn" data-delay="500ms">{{$shortDesc}}</p>
                        <a href="{{route('web.article',[$article->slug])}}" class="btn nikki-btn" data-animation="fadeIn" data-delay="700ms">Read More</a>
                    </div>
                    <!-- Page Count -->
                    <div class="page-count"></div>
                </div>
            </div>
        @endforeach
    </div>
</section>