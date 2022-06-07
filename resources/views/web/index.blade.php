@extends('web.common.main')

@section('title', 'NIEDSWET | HOME')

@section('customHeader')
    <link rel="stylesheet" href="{{ asset('vendor/jsToastr/toastr.min.css') }}">
    <style>
        .ourWork .owl-carousel .owl-item img {
            height: 450px;
            object-fit: cover;
        }

        .photos .owl-carousel .owl-item img {
            object-fit: cover;
            display: block;
            width: 100%;
            height: 200px;
            border: 4px solid var(--primary-color);
        }
    </style>
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

        @if ($carousel->count() != 1 && $carousel->count() != null)
            <div class="navigation">
                <div class="customPrevBtnMain arrow"><i class="fa-solid fa-angle-left"></i></div>
                <div class="customNextBtnMain arrow"><i class="fa-solid fa-angle-right"></i></div>
            </div>
        @endif
    </section>

    <!-- about us -->
    <section class="aboutUs">
        <div class="row g-0">
            <div class="col-sm-6">
                <img src="{{ asset('web_assets/images/images/about.png') }}" alt="about us">
            </div>
            <div class="col-sm-6 bg-light aboutInfo">
                <div>
                    <h3 class="mb-4 fw-bold">About Us</h3>

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

                    <a href="{{ route('site.about') }}" class="btn btn-fixed-size btn-know-more">Know More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our work -->
    @if ($works->count() != null)
        <section class="ourWork">
            <img class="overlay" src="{{ asset('web_assets/images/images/Background.png') }}" alt="">
            <h3 class="text-center fw-bold mb-5 text-white">Our Work</h3>
            <div class="col-sm-8 mx-auto">
                <div class="work-carousel owl-carousel owl-theme">
                    @foreach ($works as $item)
                        <a href="{{ route('site.ourwork', [Crypt::encrypt($item->id)]) }}">
                            <div class="item">
                                <div class="single">
                                    <img src="{{ asset($item->image) }}" alt="Our work">
                                    <p class="fw-bold mt-2 text-center">{{ $item->work_title }}.</p>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @if ($works->count() != 1 && $works->count() != null)
                <div class="navigation">
                    <div class="customPrevBtnOurWork arrow"><i class="fa-solid fa-angle-left"></i></div>
                    <div class="customNextBtnOurWork arrow"><i class="fa-solid fa-angle-right"></i></div>
                </div>
            @endif
        </section>
    @endif

    <!-- Events -->
    @if ($events->count() != null)
        <section class="events mb-5">
            <h3 class="text-center fw-bold">Events</h3>
            <div class="container">
                <div class="row">
                    @foreach ($events as $item)
                        <div class="col-sm-4 p-4">
                            <a href="{{ asset($item->image) }}" target="_blank">
                                <div class="single">
                                    <img src="{{ asset($item->image) }}" alt="Events">
                                </div>
                            </a>
                        </div>
                    @endforeach


                    {{-- <div class="col-sm-4 p-4">
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
                </div> --}}
                </div>
                <div class="text-center">
                    <button onClick="location.href='{{ route('site.events') }}'" class="btn btn-fixed-size view-all">View
                        All</button>
                </div>
            </div>
        </section>
    @endif

    <!-- Gallery -->
    <section class="gallery">
        @if ($images->count() != 0)
            <h3 class="text-center fw-bold">Gallery</h3>
            <div class="photos">
                <h3 class="text-center mt-4">Photos</h3>
                <div class="container">
                    <div class="gallery-carousel owl-carousel owl-theme">
                        @foreach ($images as $item)
                            <div class="item">
                                <a href="{{ asset($item->image) }}"><img src="{{ asset($item->image) }}"
                                        alt="Gallery"></a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="navigation">
                    <div class="customPrevBtnGallery arrow"><i class="fa-solid fa-angle-left"></i></div>
                    <div class="customNextBtnGallery arrow"><i class="fa-solid fa-angle-right"></i></div>
                </div>
            </div>
            <div class="text-center mt-4">
                <button onClick="location.href='{{ route('site.gallery.album') }}'"
                    class="btn btn-fixed-size view-all">View
                    All</button>
            </div>
        @endif

        <!-- Videos -->
        @if ($videos->count() != null)
            <div class="videos">
                <h3 class="text-center mt-5">Video</h3>
                <div class="container">
                    <div class="row">
                        @foreach ($videos as $item)
                            <div class="col-sm-4">
                                <iframe width="100%" height="250"
                                    src="https://www.youtube.com/embed/{{ $item->video_id }}"
                                    title="YouTube video player" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button onClick="location.href='{{ route('site.gallery.video') }}'"
                    class="btn btn-fixed-size view-all">View
                    All</button>
            </div>
        @endif
    </section>

    <!-- Blog -->
    @if ($blogs->count() != 0)
        <section class="blogs">
            <h3 class="text-center fw-bold">Blogs</h3>
            <div class="container">
                <div class="row">
                    @foreach ($blogs as $item)
                        <div class="col-lg-4 col-md-6 mx-auto">
                            <div class="single">
                                <img src="{{ asset($item->image) }}" alt="Blog thumbnail">
                                <p class="fw-bold title my-3" title="{{ $item->title }}">
                                    {{ Str::limit($item->title, 60) }}
                                </p>
                                <p class="postTime">{{ date('F j, Y', strtotime($item->created_at)) }}</p>
                                <p
                                    class="bg-success d-inline-block text-capitalize text-white text-12 fw-bold px-2 py-1 rounded">
                                    {{ $item->Category->category }}</p>
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
    @if ($testimonials->count() != null)
        <section class="testimonials">
            <h3 class="text-center fw-bold mb-5">Testimonials</h3>
            <div class="testimonial-carousel owl-carousel owl-theme">
                @foreach ($testimonials as $item)
                    <div class="item">
                        <div class="single bg-gray p-3 py-5">
                            <div class="image">
                                <img src="{{ asset($item->image) }}" alt="">
                            </div>
                            <div class="details">
                                <img src="{{ asset('web_assets/images/Icons/bi_quote.png') }}" alt="">
                                <p class="text-center px-3 text-12">{{ $item->message }}</p>
                                <p class="text-center fw-bold text-uppercase px-3 mb-0">{{ $item->name }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="navigation">
                <div class="customPrevBtnNavigation arrow"><i class="fa-solid fa-angle-left"></i></div>
                <div class="customNextBtnNavigation arrow"><i class="fa-solid fa-angle-right"></i></div>
            </div>
        </section>
    @endif

    <!-- Milestones -->
    <section class="milestones">
        <h3 class="text-center fw-bold mb-5">Milestones</h3>
        <div class="container">
            <div class="images">
                <div class="col img1">
                    <img src="{{ asset('web_assets/images/Vectors/milestone1.png') }}" alt="Milestones">
                    <p class="fw-bold text-center">1988 <br>
                        NIEdSWeT was established</p>
                </div>
                <div class="col img2">
                    <img src="{{ asset('web_assets/images/Vectors/arrow.png') }}" alt="Milestones">
                </div>
                <div class="col img3">
                    <img src="{{ asset('web_assets/images/Vectors/milestone2.png') }}" alt="Milestones">
                    <p class="fw-bold text-center">2011 <br>
                        Constructed Dr NC Bordoloi Jorhat Zilla Sahitya Sabha</p>
                </div>
                <div class="col img4">
                    <img src="{{ asset('web_assets/images/Vectors/arrow.png') }}" alt="Milestones">
                </div>
                <div class="col img5">
                    <img src="{{ asset('web_assets/images/Vectors/milestone3.png') }}" alt="Milestones">
                    <p class="fw-bold text-center">2022 <br>
                        NIEdSWeT introduced itself to the online platform through its website</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    <section class="contact bg-light py-5 mt-5">
        <h3 class="text-center fw-bold mb-3">Contact Us</h3>
        <div class="container">
            <div class="row">
                {{-- Map --}}
                <div class="col-sm-6 mb-3">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d114017.36212805597!2d94.13244039682283!3d26.743017702565382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3746c294ee518ba1%3A0x75147ff2c76406bc!2sJorhat%2C%20Assam!5e0!3m2!1sen!2sin!4v1654586209996!5m2!1sen!2sin"
                        width="100%" height="90%" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <p class="text-12">NIEDSWET, Bordoloi Nagar, Kushal Kanwar Path, Jail road, Jorhat, 785001, Assam</p>
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
                                <button type="submit" id="submitBtn" class="btn submitBtn btn-fixed-size">Send</button>
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
    <script src="{{ asset('web_assets/js/contact.js') }}"></script>
@endsection
