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
                @forelse ($blogs as $item)
                <div class="col-sm-4">
                    <div class="single">
                        <img src="{{ asset($item->image) }}" alt="Blog thumbnail">
                        <p class="fw-bold title my-3">
                            {{$item->title}}
                        </p>
                        <p class="postTime">{{date("F j, Y", strtotime($item->created_at))}}</p>
                        <p class="info">{{ Str::limit(strip_tags($item->description), 200, '...') }}</p>
                        <p class="text-end readMore"><a href="{{ route('site.blogs', ['id' => Crypt::encrypt($item->id)]) }}">Read More <i
                                    class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>
                @empty
                    <p>*No blogs found</p>
                @endforelse
            </div>
        </div>
    </section>
@endsection

@section('customJS')
@endsection
