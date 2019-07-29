@extends('layouts.default')

@section('title', 'Web design and branding in Dallas')

@section('content')
    <!-- ##### Breadcrumb Area Start ##### -->
    @include('articleDetail.breadcrumb')
    <!-- ##### Breadcrumb Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    @php
        $date = $article->published_at ? $article->published_at : $article->updated_at ;
        $formatDate = date('M-d-Y', strtotime($date));
    @endphp
    <section class="blog-content-area section-padding-0-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                <div class="col-12">
                    <!-- Post Details Area -->
                    <div class="single-post-details-area">
                        <div class="post-content">
                            <div class="text-center mb-50">
                                <h2 class="post-title">{{$article->title}}</h2>
                                <!-- Post Meta -->
                                <div class="post-meta">
                                    <p class="post-date">{{$formatDate}}</p>
                                    <a href="#"><span>by</span> {{$article->author->name}}</a>
                                    <a href="#">03 <span>Comments</span></a>
                                </div>
                            </div>

                            <!-- Post Thumbnail -->
                            <div class="post-thumbnail mb-50">
                                <img style="width: 100%; object-fit: cover" src="{{$article->image_url}}" alt="{{$article->title}}">
                            </div>

                            <!-- Post Text -->
                            <div class="post-text">
                                <!-- Share -->
                                <div class="post-share">
                                    <span>Share</span>
                                    <a href="#" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                    <a href="#" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                    <a href="#" class="google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                    <a href="#" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                    <a href="#" class="pin"><i class="fa fa-thumb-tack" aria-hidden="true"></i></a>
                                </div>
                                    <div>
                                        {{$article->content}}
                                    </div>

{{--                                <p>I love dals. All kinds of them but yellow moong dal is my go-to lentil when I am in need of some easy comfort food. In this recipe I added suva or dill leaves to the classic moong dal recipe for a twist. I like the simplicity of this recipe, just the dal, tomatoes and fresh dill with simple seasoning. This recipe is without any onions and garlic. I love the aroma of fresh dill and I think, in Indian food, we don’t really use dill as much as we can. Nine out of ten times, the only green leaves sprinkled on a curry or a dal is fresh coriander and while I love coriander too, dill adds a unique freshness and aroma to the dal. The delicate feathery leaves of dill are also rich in Vitamin A, C and minerals like iron and manganese.</p>--}}

{{--                                <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves. They don’t really need to cook and cooking for a long time actually reduces their flavour and aroma.</p>--}}

{{--                                <blockquote class="shortcodes">--}}
{{--                                    <div class="blockquote-icon">--}}
{{--                                        <img src="img/core-img/quote.png" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="blockquote-text">--}}
{{--                                        <h5>That’s not to say you’ll have the exact same thing if you stop by: the restaurant’s menus change constantly, based on seasonal ingredients.</h5>--}}
{{--                                        <h6>Ollie Schneider - <span>CEO Colorlib</span></h6>--}}
{{--                                    </div>--}}
{{--                                </blockquote>--}}

{{--                                <p>Dals or lentils are packed with proteins and especially in a vegetarian diet, lentils are the main source of protein. It is amazing how this humble yellow moong dal can be made into so many recipes from a plain dal khichdi to mangodi ki sabzi to the traditional Indian desserts like moong dal halwa. Fresh dill should be added only at the end of cooking, much like fresh coriander leaves. They don’t really need to cook and cooking for a long time actually reduces their flavour and aroma.</p>--}}

{{--                                <div class="row">--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <img class="mb-30" src="img/blog-img/4.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                    <div class="col-12 col-md-6">--}}
{{--                                        <img class="mb-30" src="img/blog-img/3.jpg" alt="">--}}
{{--                                    </div>--}}
{{--                                </div>--}}

{{--                                <!-- List -->--}}
{{--                                <div class="nikki-list-area mb-50">--}}
{{--                                    <h4 class="mb-15">Immediate Dividends</h4>--}}
{{--                                    <ul class="nikki-list">--}}
{{--                                        <li>* Wash the dal in 3-4 changes of water and soak in room temperature water for 10 mins while you finish the rest of preparation.</li>--}}
{{--                                        <li>* Drain and pressure cook with salt, turmeric and water for 2 whistles.</li>--}}
{{--                                        <li>* Remove the cooker from heat and open only after all the steam has escaped on its own.</li>--}}
{{--                                        <li>* While the dal is cooking, heat ghee in a pan. Add hing and cumin seeds.</li>--}}
{{--                                        <li>* When the seeds start to crackle, add ginger, and green chillies. Sauté for a minute.</li>--}}
{{--                                        <li>* Add tomatoes and a little salt. Mix well. Cook for about 5 mins with occasional stirring. Add a little water to the pan if the masala starts to stick.</li>--}}
{{--                                    </ul>--}}
{{--                                </div>--}}

{{--                                <!-- Post Tags & Share -->--}}
{{--                                <div class="post-tags-share">--}}
{{--                                    <!-- Tags -->--}}
{{--                                    <ol class="popular-tags d-flex flex-wrap">--}}
{{--                                        <li><a href="#">HealthFood</a></li>--}}
{{--                                        <li><a href="#">Yoga</a></li>--}}
{{--                                        <li><a href="#">Life Style</a></li>--}}
{{--                                    </ol>--}}
{{--                                </div>--}}

{{--                                <!-- Related Post Area -->--}}
{{--                                <div class="related-posts clearfix">--}}
{{--                                    <!-- Headline -->--}}
{{--                                    <h4 class="headline">related posts</h4>--}}

{{--                                    <div class="row">--}}

{{--                                        <!-- Single Blog Post -->--}}
{{--                                        <div class="col-12 col-lg-6">--}}
{{--                                            <div class="single-blog-post mb-50">--}}
{{--                                                <!-- Thumbnail -->--}}
{{--                                                <div class="post-thumbnail">--}}
{{--                                                    <a href="#"><img src="img/blog-img/1.jpg" alt=""></a>--}}
{{--                                                </div>--}}
{{--                                                <!-- Content -->--}}
{{--                                                <div class="post-content">--}}
{{--                                                    <p class="post-date">MAY 17, 2018 / lifestyle</p>--}}
{{--                                                    <a href="#" class="post-title">--}}
{{--                                                        <h4>A Closer Look At Our Front Porch Items From Lowe’s</h4>--}}
{{--                                                    </a>--}}
{{--                                                    <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <!-- Single Blog Post -->--}}
{{--                                        <div class="col-12 col-lg-6">--}}
{{--                                            <div class="single-blog-post mb-50">--}}
{{--                                                <!-- Thumbnail -->--}}
{{--                                                <div class="post-thumbnail">--}}
{{--                                                    <a href="#"><img src="img/blog-img/4.jpg" alt=""></a>--}}
{{--                                                </div>--}}
{{--                                                <!-- Content -->--}}
{{--                                                <div class="post-content">--}}
{{--                                                    <p class="post-date">MAY 25, 2018 / Fashion</p>--}}
{{--                                                    <a href="#" class="post-title">--}}
{{--                                                        <h4>5 Things to Know About Dating a Bisexual</h4>--}}
{{--                                                    </a>--}}
{{--                                                    <p class="post-excerpt">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit.</p>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                    </div>--}}
{{--                                </div>--}}

                                <!-- Comment Area Start -->
{{--                               @include('articleDetail.comment-block')--}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->

    <!-- ##### Instagram Area Start ##### -->
    <div class="follow-us-instagram">
        <div class="instagram-content d-flex flex-wrap align-items-center">

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="img/blog-img/insta1.jpg" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="img/blog-img/insta2.jpg" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="img/blog-img/insta3.jpg" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="img/blog-img/insta4.jpg" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="img/blog-img/insta5.jpg" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="img/blog-img/insta6.jpg" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="img/blog-img/insta7.jpg" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>

            <!-- Single Instagram Slide -->
            <div class="single-instagram">
                <img src="img/blog-img/insta8.jpg" alt="">
                <a href="#"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
    </div>
    <!-- ##### Instagram Area End ##### -->

@endsection
