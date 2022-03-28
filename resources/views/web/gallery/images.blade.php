@extends('web.common.main')

@section('title', 'Gallery | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/gallery.png');
        }

    </style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{ route('site.home') }}">Home</a> > Gallery</p>
            </div>
            <div class="title">
                <h1 class="header_title">Gallery</h1>
            </div>
        </div>
    </section>

    <section class="photos my-5">
        <h4 class="text-center fw-bold">Photos</h4>
        <div class="container mt-3">
            <div class="images">
                <div class="row">
                    @for ($i = 0; $i < 9; $i++)
                    <div class="col-md-4 mb-3">
                        <a href="{{ asset('web_assets/images/gallery/gallery1.png') }}"><img class="thumbnail" src="{{ asset('web_assets/images/gallery/gallery1.png') }}" alt="Gallery Image"></a>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJS')
@endsection
