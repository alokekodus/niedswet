@extends('web.common.main')

@section('title', 'Our Work | NIEDSWET')

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
                <p><a href="{{ route('site.home') }}">Home</a> > <a href="{{ route('site.ourwork') }}">Our Work</a> > {{ $work->work_title }}</p>
            </div>
            <div class="title">
                <h1 class="header_title">Our Work</h1>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <h4 class="text-center fw-bold mb-4">{{ $work->work_title }}</h4>
            <div class="text-center">
                <img class="w-100" src="{{ asset($work->image) }}" alt="">
            </div>

            <div class="mt-5">
                {!! $work->work_details !!}
            </div>
        </div>
    </section>
@endsection

@section('customJS')
@endsection
