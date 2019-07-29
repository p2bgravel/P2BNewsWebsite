<!-- ##### Header Area Start ##### -->
<header class="header-area">
    <!-- Navbar Area -->
    <div class="nikki-main-menu">
        <div class="classy-nav-container breakpoint-off">
            <div class="container-fluid">
                <!-- Menu -->
                <nav class="classy-navbar justify-content-between" id="nikkiNav">
                    <!-- Nav brand -->
                    <a href="{{route('web.home')}}" class="nav-brand"><img src="img/core-img/logo.png" alt=""></a>
                    <!-- Navbar Toggler -->
                    <div class="classy-navbar-toggler">
                        <span class="navbarToggler"><span></span><span></span><span></span></span>
                    </div>
                    <!-- Menu -->
                    <div class="classy-menu">

                        <!-- close btn -->
                        <div class="classycloseIcon">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>

                        <!-- Nav Start -->
                        <div class="classynav">
                            <ul>
                                <li><a href="{{route('web.home')}}">Home</a></li>
                                {{--<li><a href="#">Pages</a>--}}
                                {{--<ul class="dropdown">--}}
                                {{--<li><a href="{{route('web.home')}}">Home</a></li>--}}
                                {{--</ul>--}}
                                {{--</li>--}}
                                <li><a href="javascript:void(0);">Catagories</a>
                                    @if($categories && count($categories) > 0)
                                        <div class="megamenu">
                                            @php
                                                $cat_chunk = $categories->chunk(4);
                                            @endphp
                                            @foreach($cat_chunk as $cats)
                                                <ul class="single-mega cn-col-4">
                                                    @foreach($cats as $cat)
                                                        <li><a href="#">- {{$cat->display_name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            @endforeach
                                        </div>
                                    @endif

                                </li>
                                <li><a href="about-us.html">About</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>

                            <!-- Search Form -->
                            <div class="search-form">
                                <form action="#" method="get">
                                    <input type="search" name="search" class="form-control"
                                           placeholder="Search and hit enter...">
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>

                            <!-- Social Button -->
                            <div class="top-social-info">
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i
                                            class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Twitter"><i
                                            class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Instagram"><i
                                            class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="Pinterest"><i
                                            class="fa fa-pinterest" aria-hidden="true"></i></a>
                                <a href="#" data-toggle="tooltip" data-placement="bottom" title="RSS Feed"><i
                                            class="fa fa-rss" aria-hidden="true"></i></a>
                            </div>

                        </div>
                        <!-- Nav End -->
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>