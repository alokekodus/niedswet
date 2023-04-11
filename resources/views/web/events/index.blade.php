@extends('web.common.main')

@section('title', 'Events | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/default.jpg');
        }

        .link {
            text-decoration: none;
            color: black;
            font-size: 12px
        }

        .single img {
            width: 100%;
            height: 400px;
            object-fit: contain;
            border: 1px solid var(--secondary-green);
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
            <h3 class="fw-bold text-center mb-3">Upcoming Events</h3>
            @forelse ($upcoming_events as $item)
                <div class="col-md-4 mb-4">
                    <div class="single">
                        <a href="{{ asset($item->image) }}">
                            <img src="{{ asset($item->image) }}" class="card-img-top" alt="Featured image">
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center">**No upcoming events found</p>
            @endforelse
        </div>
    </section>

    <section class="container my-5">
        <div class="row">
            <h3 class="fw-bold text-center mb-3">Past Events</h3>
            @forelse ($past_events as $item)
                <div class="col-md-4 mb-4">
                    <div class="single">
                        <a href="{{ asset($item->image) }}" target="_blank">
                            <img src="{{ asset($item->image) }}" class="card-img-top" alt="Featured image">
                        </a>
                    </div>
                </div>
            @empty
                <p class="text-center">**No past events found</p>
            @endforelse
        </div>
        <div>
            {{ $past_events->links() }}
        </div>
    </section>
@endsection

@section('customJS')
@endsection
