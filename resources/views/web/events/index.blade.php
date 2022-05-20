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
            height: 220px;
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
            @for ($i = 0; $i < 6; $i++)
                <div class="col-md-4 mb-3">
                    <div class="single">
                        <img src="https://images.unsplash.com/photo-1505664194779-8beaceb93744?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                            class="card-img-top" alt="Featured image">
                        <div class="card-body">
                            <p>Event Date : 11th July, 2022</p>
                            <h5 class="card-title">Leo sed mattis ullamcorper porta
                                dignissim sollicitudin. In mollis
                                sit mauris, scelerisque.</h5>
                            <div class="text-end">
                                <a class="link"
                                    href="{{ route('site.ourwork', ['id' => Crypt::encrypt(1)]) }}">Read More <i
                                        class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <h4 class="fw-bold text-center mb-3">Past Events</h4>
            @for ($i = 0; $i < 6; $i++)
                <div class="col-md-4 mb-3">
                    <div class="single">
                        <img src="https://images.unsplash.com/photo-1593240637899-5fc06c754c2b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=394&q=80"
                            class="card-img-top" alt="Featured image">
                        <div class="card-body">
                            <p>Event Date : 11th July, 2022</p>
                            <h5 class="card-title">Leo sed mattis ullamcorper porta
                                dignissim sollicitudin. In mollis
                                sit mauris, scelerisque.</h5>
                            <div class="text-end">
                                <a class="link"
                                    href="#">Read More <i
                                        class="fa-solid fa-angles-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </section>
@endsection

@section('customJS')
@endsection
