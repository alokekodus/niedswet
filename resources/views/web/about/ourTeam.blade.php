@extends('web.common.main')

@section('title', 'Our Team | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/team.png');
        }

    </style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{route('site.home')}}">Home</a> > <a href="{{route('site.about')}}">About Us</a> > Our Team</p>
            </div>
            <div class="title">
                <h1 class="header_title">Our Team</h1>
            </div>
        </div>
    </section>

    <section class="team my-5">
        <h4 class="text-center fw-bold">Board of Trustees</h4>

        <div class="container">
            <div class="members images">
                @for ($i = 0; $i < 5; $i++)
                    @include('web.common.singleMember')
                @endfor
                
            </div>
        </div>
    </section>

    <section class="team my-5">
        <h4 class="text-center fw-bold">Advisors</h4>

        <div class="container">
            <div class="members">
                @for ($i = 0; $i < 8; $i++)
                    @include('web.common.singleMember')
                @endfor
                
            </div>
        </div>
    </section>
@endsection

@section('customJS')
@endsection
