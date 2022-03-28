<nav class="navbar shadow-sm navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand py-2" href="#"><img src="{{ asset('web_assets/images/Icons/logo.png') }}" alt=""></a>
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{Request::routeIs('site.home') ? 'active' : ''}}" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::routeIs('site.about') ? 'active' : ''}}" href="{{route('site.about')}}">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::routeIs('site.events') ? 'active' : ''}}" href="{{route('site.events')}}">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::routeIs('site.gallery.image') ? 'active' : ''}}" href="{{route('site.gallery.image')}}">Gallery</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{Request::routeIs('site.blogs') ? 'active' : ''}}" href="{{route('site.blogs')}}">Blog</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
