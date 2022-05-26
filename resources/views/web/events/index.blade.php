@extends('web.common.main')

@section('title', 'Events | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/events.png');
        }

        .link {
            text-decoration: none;
            color: black;
            font-size: 12px
        }

        .single img{
            width: 100%;
            object-fit: cover;
        }

    </style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{ route('site.home') }}">Home</a> > Events</p>
            </div>
            <div class="title">
                <h1 class="header_title">Events</h1>
            </div>
        </div>
    </section>

    <section class="container mt-5">
        <div class="row">
            <h4 class="fw-bold text-center mb-3">Upcoming Events</h4>
            @for ($i = 0; $i < 3; $i++)
                <div class="col-md-4 mb-4">
                    <div class="single">
                        <a href="{{asset('uploads/events/image.jpeg')}}">
                            <img src="{{asset('uploads/events/image.jpeg')}}"
                            class="card-img-top" alt="Featured image">
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <h4 class="fw-bold text-center mb-3">Past Events</h4>
            @for ($i = 0; $i < 6; $i++)
                <div class="col-md-4 mb-4">
                    <div class="single">
                        <a href="{{asset('uploads/events/image.jpeg')}}">
                            <img src="{{asset('uploads/events/image.jpeg')}}"
                            class="card-img-top" alt="Featured image">
                        </a>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection

@section('customJS')
@endsection
