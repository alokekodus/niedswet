@extends('web.common.main')

@section('title', 'About | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/default.jpg');
        }

    </style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{ route('site.home') }}">Home</a> > About Us</p>
            </div>
            <div class="title">
                <h1 class="header_title">About Us</h1>
            </div>
        </div>
    </section>

    <section class="aboutContent bg-light py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 leftBlock">
                    <img src="{{ asset('web_assets/images/images/about.png') }}" alt="About us">
                </div>
                <div class="col-md-6 rightBlock">
                    <p class="text-14">Northeast India Education and Social Welfare Trust, also known as NIEDSWET,
                        was established on 15th October 1998. It is a non-profitable organization situated
                        in Jorhat. Dr. Nobin Chandra Bordoloi was one of the founding members of this
                        trust. Although Ophthalmologist by profession, he took interest in culture and
                        literature and was a philanthropist at heart. His inclination to serve humanity
                        got him involved with charitable work for social and education welfare. He was

                        followed by his family members and simultaneously got the attention of like-
                        minded individuals to contribute to the same. As a result, this trust came into

                        existence, which was meant for a common cause, in a not-for-profit motive, and
                        only with a vision to serve the betterment of the society. In a nutshell, the
                        members of the trust are dedicated to creating an environment with the aim of
                        providing facilities for community welfare service, especially for people
                        belonging to rural areas of the Northeastern region, with a particular focus
                        around Jorhat district. It emphasizes establishing centers for the development of
                        the education sectors and preservation of the Assamese language and its
                        culture by establishing a fund for serving these areas.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="mission-vision my-5">
        <div class="container">
            <div class="row">
                {{-- Mission --}}
                <div class="col-md-6 mb-3">
                    <div class="mission">
                        <div class="leftBlock text-center">
                            <h4 class="title fw-bold"><u>Mission</u></h4>
                            <p class="text-14">
                                Striving to work for the upliftment of people associated with educational institutions and
                                social organizations started by the Bordoloi family in the Jorhat district. It endeavors to
                                promote the language and culture of the Northeastern region. The goal of prosperity is
                                carried forward through means of aid, support, and counselling for the respective institutes
                                and organizations.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Vision --}}
                <div class="col-md-6">
                    <div class="vision">
                        <div class="leftBlock text-center">
                            <h4 class="title fw-bold"><u>Vision</u></h4>
                            <p class="text-14">
                                To establish a society of equals by developing sections that require assistance and
                                encourage the families of similar vision to initiate their possible means of contribution to
                                the prosperity of the Northeastern people and culture.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="team mb-5">
        <h4 class="text-center fw-bold">Our Team</h4>

        <div class="container">
            <div class="members">
                @for ($i = 0; $i < 5; $i++)
                    @include('web.common.singleMember')
                @endfor

            </div>
        </div>

        <div class="text-center">
            <a class="btn btn-see-all" href="#">See All</a>
        </div>
    </section> --}}
@endsection

@section('customJS')
@endsection
