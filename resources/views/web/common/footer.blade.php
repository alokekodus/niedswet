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
                        <a href="{{ route('site.gallery.album') }}">Gallery</a>
                        {{-- <a href="{{ route('site.privacy') }}">Privacy Policy</a> --}}
                        {{-- <a href="{{ route('site.terms') }}">Terms & Conditions</a> --}}
                        {{-- <a href="#">Contact Us</a> --}}
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="what-we-do d-flex flex-column">
                        <p>What We Do</p>
                        <a href="{{ route('site.events') }}">Events</a>
                        <a href="{{ route('site.ourwork') }}">Our Work</a>
                        {{-- <a href="#">Testimonial</a>
                        <a href="#">Milestones</a> --}}
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="resources d-flex flex-column">
                        <p>Resources</p>
                        <a href="{{ route('site.gallery.album') }}">Gallery</a>
                        <a href="{{ route('site.blogs') }}">Blog</a>
                        <a type="button" data-bs-toggle="modal" data-bs-target="#newsletterModal">
                            Newsletter
                        </a>
                    </div>
                </div>

                <div class="col-sm-3 social">
                    <p>Social</p>
                    <div class="top">
                        <a href="#" target="_blank"><img src="{{ asset('web_assets/images/Icons/facebook.png') }}" alt="Social Icons"></a>
                        <a href="#" target="_blank"><img src="{{ asset('web_assets/images/Icons/youtube.png') }}" alt="Social Icons"></a>
                    </div>

                    {{-- <div class="bottom">
                        <img src="{{ asset('web_assets/images/Icons/instagram.png') }}" alt="Social Icons">
                        <img src="{{ asset('web_assets/images/Icons/linkedin.png') }}" alt="Social Icons">
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    <div
        class="copyright bg-dark py-3 px-md-5 px-2 text-white text-12 d-md-flex justify-content-between align-items-center">
        <p class="mb-0">All Rights Reserved 2022 NIEdSWeT</p>

        <p class="mb-0">Designed & Developed by <a href="https://ekodus.com/" class="text-white" target="_blank">Ekodus Technologies Pvt. Ltd.</a></p>
    </div>
</footer>
