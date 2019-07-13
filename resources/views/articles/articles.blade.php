
<div class="col-12 col-lg-8">
    <div class="blog-posts-area">
        <div class="row">
            <!-- hot article Area -->
        @include('articles.hot-article')
        <!-- end hot article Area -->

            <!-- list article Area -->
        @include('articles.list-regular-article')
        <!-- ##### list article Area -->
        </div>
    </div>

    <!-- Pager -->
    <ol class="nikki-pager">
        <li><a href="#"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Newer</a></li>
        <li><a href="#">Older <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
    </ol>
</div>