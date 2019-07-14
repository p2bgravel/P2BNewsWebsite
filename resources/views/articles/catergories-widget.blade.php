@php
    $categories = $categories;
@endphp

<!-- ##### Single Widget Area ##### -->
<div class="single-widget-area mb-30">
    <!-- Title -->
    <div class="widget-title">
        <h6>popular catergories</h6>
    </div>
    <!-- Tags -->
    <ol class="popular-tags d-flex flex-wrap">
        @foreach($categories as $cat)
            <li><a href="?category={{$cat->name}}">{{$cat->display_name}}</a></li>
        @endforeach
    </ol>
</div>
