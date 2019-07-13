@extends('layouts.app')

@section('content')

    <!-- ##### Hero Area Start ##### -->
    @include('articles.main-carousel')
    <!-- ##### Hero Area End ##### -->

    <!-- ##### Blog Content Area Start ##### -->
    <section class="blog-content-area section-padding-100">
        <div class="container">
            <div class="row justify-content-center">
                <!-- Blog Posts Area -->
                @include('articles.articles')

                <!-- Blog Sidebar Area -->
               @include('articles.right-sidebar')
            </div>
        </div>
    </section>
    <!-- ##### Blog Content Area End ##### -->

    <!-- ##### Instagram Area Start ##### -->
    @include('articles.social-media')
    <!-- ##### Instagram Area End ##### -->

@endsection
