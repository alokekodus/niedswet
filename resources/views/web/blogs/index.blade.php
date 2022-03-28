@extends('web.common.main')

@section('title', 'Blogs | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/blog.png');
        }

        .blogs {
            background: unset;
        }

    </style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{ route('site.home') }}">Home</a> > Blogs</p>
            </div>
            <div class="title">
                <h1 class="header_title">Blogs</h1>
            </div>
        </div>
    </section>

    <section class="container blogs">
        <h4 class="text-center fw-bold">Blogs</h4>
        <div class="container">
            <div class="row">
                @for ($i = 1; $i < 6; $i++)
                    <div class="col-sm-4">
                        <div class="single">
                            <img src="{{ asset('web_assets/images/images/blog1.png') }}" alt="Blog thumbnail">
                            <p class="fw-bold title my-3">
                                Ut sem arcu mi lobortis dui ut
                                cursus hendrerit.
                            </p>
                            <p class="postTime">Mar 01, 2022</p>
                            <p class="info">Porta metus viverra enim sed volutpat dictum
                                maecenas. Facilisi ullamcorper eget nullam odio
                                libero enim. Integer mattis viverra pellentesque
                                mauris eget.</p>
                            <p class="text-end readMore"><a href="{{ route('site.blogs', ['id' => $i]) }}">Read More <i
                                        class="fa-solid fa-angle-right"></i></a>
                            </p>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </section>
@endsection

@section('customJS')
@endsection
