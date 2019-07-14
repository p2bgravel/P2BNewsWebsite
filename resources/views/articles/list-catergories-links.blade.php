<div>
    @foreach($article->categories as $cat)
        / <span>
            <a href="">
                {{$cat->display_name}}
            </a>
        </span>
    @endforeach
</div>