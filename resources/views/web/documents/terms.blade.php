@extends('web.common.main')

@section('title', 'Terms & Conditions | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/blog.png');
        }

    </style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{ route('site.home') }}">Home</a> > Terms & Conditions</p>
            </div>
            <div class="title">
                <h1 class="header_title">Terms & Conditions</h1>
            </div>
        </div>
    </section>

    <section class="container">

    </section>
@endsection

@section('customJS')
@endsection
