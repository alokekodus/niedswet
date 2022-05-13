<footer>
    <div class="row g-0">
        <div class="col-sm-3 left-block">
            <img src="{{ asset('web_assets/images/Icons/logo.png') }}" alt="Logo">
        </div>
        <div class="col-sm-9 right-block">
            <div class="flex">
                <div class="col-sm-3">
                    <div class="information d-flex flex-column">
                        <p>Information</p>
                        <a href="{{ route('site.about') }}">About Us</a>
                        <a href="{{ route('site.gallery.image') }}">Gallery</a>
                        <a href="{{ route('site.privacy') }}">Privacy Policy</a>
                        <a href="{{ route('site.terms') }}">Terms & Conditions</a>
                        <a href="#">Contact Us</a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="what-we-do d-flex flex-column">
                        <p>What We Do</p>
                        <a href="{{ route('site.events') }}">Events</a>
                        <a href="#">Our Work</a>
                        <a href="#">Testimonial</a>
                        <a href="#">Milestones</a>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="resources d-flex flex-column">
                        <p>Resources</p>
                        <a href="{{ route('site.gallery.image') }}">Gallery</a>
                        <a href="{{ route('site.blogs') }}">Blog</a>
                        <a href="#">Newsletter</a>
                    </div>
                </div>

                <div class="col-sm-3 social">
                    <p>Social</p>
                    <div class="top">
                        <img src="{{ asset('web_assets/images/Icons/facebook.png') }}" alt="Social Icons">
                        <img src="{{ asset('web_assets/images/Icons/twitter.png') }}" alt="Social Icons">
                    </div>

                    <div class="bottom">
                        <img src="{{ asset('web_assets/images/Icons/instagram.png') }}" alt="Social Icons">
                        <img src="{{ asset('web_assets/images/Icons/linkedin.png') }}" alt="Social Icons">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
