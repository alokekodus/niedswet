@extends('web.common.main')

@section('title', 'About | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/about.png');
        }

    </style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{route('site.home')}}">Home</a> > About Us</p>
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
                    <p class="text-12">Ante nunc porta tristique odio id. Libero est fermentum, ut eu odio ut. Ut id
                        pretium turpis vestibulum dictum molestie elit habitant integer. Ultricies platea
                        dictum congue quis tortor enim lacus facilisi turpis. Turpis cursus cursus sed
                        dictum arcu id fringilla euismod. In pretium, placerat ipsum et sit. Blandit urna
                        cursus suspendisse fames venenatis venenatis. Consequat, est at fermentum
                        tortor, nunc egestas ante nulla habitant. Urna morbi viverra luctus porttitor
                        volutpat et dolor. Cras praesent tellus, platea non suscipit ac pulvinar venenatis.
                        Gravida ullamcorper cursus tempor justo et etiam commodo. Rhoncus, nisl,
                        lorem turpis odio tristique enim sagittis quis scelerisque. Maecenas faucibus
                        gravida tempor, sit leo dui arcu et. Nec vitae urna lorem volutpat non porttitor
                        amet. Porta sagittis, ipsum augue varius laoreet ultricies malesuada dignissim
                        cursus. Congue rhoncus lacinia eu eget. Tincidunt eros, pretium porttitor nec in
                        augue. Velit morbi parturient sed eget eros, nibh a interdum dolor. Odio magnis
                        feugiat vestibulum erat eget nibh suspendisse. Ullamcorper diam velit risus
                        amet, nunc orci sed faucibus cras. Porttitor faucibus nulla enim lobortis laoreet
                        potenti. Mauris, quisque erat posuere vestibulum, aliquam praesent euismod
                        condimentum.</p>
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
                        <div class="leftBlock">
                            <p class="title">Mission</p>
                            <p class="text-12">
                                Posuere porttitor cursus eros tempor
                                aliquam, ut nec sagittis. Mi, donec
                                faucibus cursus varius scelerisque
                                congue. Ut tortor fames sem odio
                                elementum sociis adipiscing
                                accumsan, tortor. Diam pharetra
                                enim rutrum elit libero mauris.
                            </p>
                        </div>

                        <div class="rightBlock">
                            <img src="{{ asset('web_assets/images/Vectors/mission.png') }}" alt="Mission">
                        </div>
                    </div>
                </div>

                {{-- Vision --}}
                <div class="col-md-6">
                    <div class="vision">
                        <div class="leftBlock">
                            <p class="title">Vision</p>
                            <p class="text-12">
                                Posuere porttitor cursus eros tempor
                                aliquam, ut nec sagittis. Mi, donec
                                faucibus cursus varius scelerisque
                                congue. Ut tortor fames sem odio
                                elementum sociis adipiscing
                                accumsan, tortor. Diam pharetra
                                enim rutrum elit libero mauris.
                            </p>
                        </div>

                        <div class="rightBlock">
                            <img src="{{ asset('web_assets/images/Vectors/vision.png') }}" alt="Mission">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team mb-5">
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
    </section>
@endsection

@section('customJS')
@endsection
