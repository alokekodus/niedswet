<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.index') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('favicon.png') }}" alt="">
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2">NIEDSWET</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::routeIs('admin.index') ? 'active' : '' }}">
            <a href="{{ route('admin.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <!-- Master -->
        <li class="menu-item {{ Request::routeIs('admin.carousel.index') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-layout"></i>
                <div>Master</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item {{ Request::routeIs('admin.carousel.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.carousel.index') }}" class="menu-link">
                        <div>Carousel</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Blog -->
        <li
            class="menu-item {{ Request::routeIs('admin.blog.index') || Request::routeIs('admin.blog.create') || Request::routeIs('admin.blog.edit') || Request::routeIs('admin.blog.category.index') ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class='menu-icon bx bxl-bootstrap'></i>
                <div>Blog</div>
            </a>

            <ul class="menu-sub">
                <li
                    class="menu-item {{ Request::routeIs('admin.blog.index') || Request::routeIs('admin.blog.create') || Request::routeIs('admin.blog.edit') ? 'active' : '' }}">
                    <a href="{{ route('admin.blog.index') }}" class="menu-link">
                        <div>Blogs</div>
                    </a>
                </li>

                <li class="menu-item {{ Request::routeIs('admin.blog.category.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.blog.category.index') }}" class="menu-link">
                        <div>Category</div>
                    </a>
                </li>

            </ul>
        </li>

        <!-- Gallery -->
        <li class="menu-item {{ Request::routeIs('admin.gallery.index') ? 'active' : '' }}">
            <a href="{{ route('admin.gallery.index') }}" class="menu-link">
                <i class='menu-icon bx bx-images'></i>
                <div data-i18n="Analytics">Gallery</div>
            </a>
        </li>
        
        <!-- Testimonial -->
        <li class="menu-item {{ Request::routeIs('admin.testimonial.index') ? 'active' : '' }}">
            <a href="{{ route('admin.testimonial.index') }}" class="menu-link">
                <i class='menu-icon bx bxs-star'></i>
                <div data-i18n="Analytics">Testimonial</div>
            </a>
        </li>


        <!-- Components -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>

    </ul>
</aside>
