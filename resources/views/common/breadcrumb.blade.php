<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        @foreach($breadcrumbs as $item)
                            @if($loop->last)
                                <li class="breadcrumb-item active"><a href="{{$item['url']}}"><i
                                                class="{{$item['icon']}}"></i> {{$item['name']}}</a></li>
                            @else
                                <li class="breadcrumb-item"><a href="{{$item['url']}}"><i
                                                class="{{$item['icon']}}"></i> {{$item['name']}}</a></li>
                            @endif

                        @endforeach
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>