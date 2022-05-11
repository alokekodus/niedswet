@extends('web.common.main')

@section('title', 'NIEDSWET | HOME')

@section('customHeader')
    <link rel="stylesheet" href="{{ asset('vendor/jsToastr/toastr.min.css') }}">
@endsection

@section('main')
    <!-- Carousel -->
    <section class="carousel">
        <div class="main-carousel owl-carousel owl-theme">
            @forelse ($carousel as $item)
                <div class="item">
                    <img src="{{ asset($item->image) }}" class="d-block w-100" alt="Carousel">
                </div>
            @empty
                <div class="item">
                    <img src="{{ asset('web_assets/images/slider/slider1.png') }}" class="d-block w-100" alt="Carousel">
                </div>
            @endforelse
        </div>

        <div class="navigation">
            <div class="customPrevBtnMain arrow"><i class="fa-solid fa-angle-left"></i></div>
            <div class="customNextBtnMain arrow"><i class="fa-solid fa-angle-right"></i></div>
        </div>
    </section>

    <!-- about us -->
    <section class="aboutUs">
        <div class="row g-0">
            <div class="col-sm-6">
                <img src="{{ asset('web_assets/images/images/about.png') }}" alt="about us">
            </div>
            <div class="col-sm-6 bg-light aboutInfo">
                <div>
                    <h4 class="mb-4">About Us</h4>

                    <p class="mb-5">Northeast India Education and Social Welfare Trust, also known as NIEDSWET,
                        was established on 15th October 1998. It is a non-profitable organization situated
                        in Jorhat. Dr. Nobin Chandra Bordoloi was one of the founding members of this
                        trust. Although Ophthalmologist by profession, he took interest in culture and
                        literature and was a philanthropist at heart. His inclination to serve humanity
                        got him involved with charitable work for social and education welfare. He was

                        followed by his family members and simultaneously got the attention of like-
                        minded individuals to contribute to the same. As a result, this trust came into

                        existence, which was meant for a common cause, in a not-for-profit motive, and
                        only with a vision to serve the betterment of the society.</p>

                    <a href="#" class="btn btn-know-more">Know More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our work -->
    <section class="ourWork">
        <img class="overlay" src="{{ asset('web_assets/images/images/Background.png') }}" alt="">
        <h4 class="text-center fw-bold mb-5">Our Work</h4>
        <div class="col-sm-8 mx-auto">
            <div class="work-carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="single">
                        <img src="{{ asset('web_assets/images/images/our-work.png') }}" alt="Our work">
                        <p class="fw-bold mt-2">Consequat massa bibendum lobortis aenean lorem nunc vel. Sem tempor
                            vulputate gravida ipsum mauris gravida. Amet venenatis varius tristique
                            penatibus. In elit, facilisis et odio.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="single">
                        <img src="{{ asset('web_assets/images/images/our-work.png') }}" alt="Our work">
                        <p class="fw-bold mt-2">Consequat massa bibendum lobortis aenean lorem nunc vel. Sem tempor
                            vulputate gravida ipsum mauris gravida. Amet venenatis varius tristique
                            penatibus. In elit, facilisis et odio.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation">
            <div class="customPrevBtnOurWork arrow"><i class="fa-solid fa-angle-left"></i></div>
            <div class="customNextBtnOurWork arrow"><i class="fa-solid fa-angle-right"></i></div>
        </div>
    </section>

    <!-- Events -->
    <section class="events">
        <h4 class="text-center fw-bold">Events</h4>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 p-4">
                    <div class="single">
                        <img src="{{ asset('web_assets/images/images/events1.png') }}" alt="Events">
                        <p class="fw-bold title my-3">
                            Leo sed mattis ullamcorper porta
                            dignissim sollicitudin. In mollis sit
                            mauris, scelerisque.
                        </p>
                        <p class="text-end readMore"><a href="#">Read More <i class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>

                <div class="col-sm-4 p-4">
                    <div class="single">
                        <img src="{{ asset('web_assets/images/images/events2.png') }}" alt="Events">
                        <p class="fw-bold title my-3">
                            Tristique elementum, tellus
                            morbi ullamcorper imperdiet
                            pellentesque
                        </p>
                        <p class="text-end readMore"><a href="#">Read More <i class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>

                <div class="col-sm-4 p-4">
                    <div class="single">
                        <img src="{{ asset('web_assets/images/images/events3.png') }}" alt="Events">
                        <p class="fw-bold title my-3">
                            Ut amet scelerisque lacus augue
                            in velit felis mauris mauris
                        </p>
                        <p class="text-end readMore"><a href="#">Read More <i class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="gallery">
        <h4 class="text-center fw-bold">Gallery</h4>
        <div class="photos">
            <h4 class="text-center mt-4">Photos</h4>
            <div class="container">
                <div class="gallery-carousel owl-carousel owl-theme">
                    <div class="item">
                        <a href="{{ asset('web_assets/images/images/gallery1.png') }}"><img
                                src="{{ asset('web_assets/images/images/gallery1.png') }}" alt="Gallery"></a>
                    </div>
                    <div class="item">
                        <a href="{{ asset('web_assets/images/images/gallery2.png') }}"><img
                                src="{{ asset('web_assets/images/images/gallery2.png') }}" alt="Gallery"></a>
                    </div>
                    <div class="item">
                        <a href="{{ asset('web_assets/images/images/gallery3.png') }}"><img
                                src="{{ asset('web_assets/images/images/gallery3.png') }}" alt="Gallery"></a>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <div class="customPrevBtnGallery arrow"><i class="fa-solid fa-angle-left"></i></div>
                <div class="customNextBtnGallery arrow"><i class="fa-solid fa-angle-right"></i></div>
            </div>
        </div>

        <!-- Videos -->
        <div class="videos">
            <h4 class="text-center mt-5">Video</h4>
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/eaU3ff3uVzw"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <div class="col-sm-4">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/eaU3ff3uVzw"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <div class="col-sm-4">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/eaU3ff3uVzw"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center">
            <a href="#" class="btn view-all">View All</a>
        </div>
    </section>

    <!-- Blog -->
    @if ($blogs->count() != 0)
        <section class="blogs">
            <h4 class="text-center fw-bold">Blogs</h4>
            <div class="container">
                <div class="row">
                    @foreach ($blogs as $item)
                        <div class="col-sm-4">
                            <div class="single">
                                <img src="{{ asset($item->image) }}" alt="Blog thumbnail">
                                <p class="fw-bold title my-3">
                                    {{ $item->title }}
                                </p>
                                <p class="postTime">{{ date('F j, Y', strtotime($item->created_at)) }}</p>
                                <p><span class="badge bg-success">{{$item->Category->category}}</span></p>
                                <p class="info">{{ Str::limit(strip_tags($item->description), 200, '...') }}
                                </p>
                                <p class="text-end readMore"><a
                                        href="{{ route('site.blogs', ['id' => Crypt::encrypt($item->id)]) }}">Read
                                        More <i class="fa-solid fa-angle-right"></i></a>
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Testimonials --}}
    <section class="testimonials">
        <h4 class="text-center fw-bold mb-5">Testimonials</h4>
        <div class="testimonial-carousel owl-carousel owl-theme">
            @for ($i = 1; $i < 5; $i++)
                <div class="item">
                    <div class="single bg-gray p-3 py-5">
                        <div class="image">
                            <img src="{{ asset('web_assets/images/testimonials/testi1.png') }}" alt="">
                        </div>
                        <div class="details">
                            <img src="{{ asset('web_assets/images/Icons/bi_quote.png') }}" alt="">
                            <p class="text-center px-3 mb-0 text-12">{{ $i }} Semper libero, porta nunc varius
                                eros senectus. Nunc, leo facilisis dictum sed turpis vestibulum, adipiscing donec. Cursus
                                pharetra libero, tellus egestas.</p>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
        <div class="navigation">
            <div class="customPrevBtnNavigation arrow"><i class="fa-solid fa-angle-left"></i></div>
            <div class="customNextBtnNavigation arrow"><i class="fa-solid fa-angle-right"></i></div>
        </div>
    </section>

    <!-- Milestones -->
    <section class="milestones">
        <h4 class="text-center fw-bold mb-5">Milestones</h4>
        <div class="container">
            <div class="images">
                <div class="col img1">
                    <img src="{{ asset('web_assets/images/Vectors/milestone1.png') }}" alt="Milestones">
                    <p class="fw-bold">Odio et varius ipsum cras sit
                        facilisis sociis pellentesque
                        est</p>
                </div>
                <div class="col img2">
                    <img src="{{ asset('web_assets/images/Vectors/arrow.png') }}" alt="Milestones">
                </div>
                <div class="col img3">
                    <img src="{{ asset('web_assets/images/Vectors/milestone2.png') }}" alt="Milestones">
                    <p class="fw-bold">Ornare tortor pulvinar eget
                        hac auctor adipiscing arcu</p>
                </div>
                <div class="col img4">
                    <img src="{{ asset('web_assets/images/Vectors/arrow.png') }}" alt="Milestones">
                </div>
                <div class="col img5">
                    <img src="{{ asset('web_assets/images/Vectors/milestone3.png') }}" alt="Milestones">
                    <p class="fw-bold">Ultrices fermentum non,
                        eget at elit in blandit</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section class="contact bg-light py-5">
        <h4 class="text-center fw-bold mb-3">Contact Us</h4>
        <div class="container">
            <div class="row">
                {{-- Map --}}
                <div class="col-sm-6 mb-3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114612.57101497037!2d91.63284247523802!3d26.14318577239997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375a5a287f9133ff%3A0x2bbd1332436bde32!2sGuwahati%2C%20Assam!5e0!3m2!1sen!2sin!4v1648190831328!5m2!1sen!2sin"
                        width="100%" height="90%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <p class="text-12">NIEdSWeT, Address Address Address Address, NIEdSWeT, Address Address Address
                        Address, Assam, 110762</p>
                </div>

                {{-- Form --}}
                <div class="col-sm-6">
                    <div class="contactFormDiv">
                        <form id="contactForm">
                            <div class="row mb-3">
                                <div class="col">
                                    <input type="text" class="form-control shadow-none" id="fname" name="fname"
                                        placeholder="First name">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control shadow-none" id="lname" name="lname"
                                        placeholder="Last name">
                                </div>
                            </div>

                            <div class="mb-3">
                                <input type="text" class="form-control shadow-none" id="phone" name="phone"
                                    placeholder="Mobile No.">
                            </div>

                            <div class="mb-3">
                                <input type="email" class="form-control shadow-none" id="email" name="email"
                                    placeholder="Email">
                            </div>

                            <div class="mb-3">
                                <textarea class="form-control shadow-none" id="message" name="message" rows="4" placeholder="Message"></textarea>
                            </div>

                            <div class="text-center">
                                <button type="submit" id="submitBtn" class="btn submitBtn">Send</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJS')
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/jqueryValidation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/jsToastr/toastr.min.js') }}"></script>
    <script src="{{ asset('web_assets/js/contact.js') }}"></script>
@endsection
