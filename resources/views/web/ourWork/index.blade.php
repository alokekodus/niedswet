@extends('web.common.main')

@section('title', 'Our Work | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/blog.png');
        }

        .link{
            text-decoration: none;
            color: black;
            font-size: 12px
        }

        .card-img-top {
            height: 200px;
            object-fit: cover
        }

    </style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{ route('site.home') }}">Home</a> > Our Work</p>
            </div>
            <div class="title">
                <h1 class="header_title">Our Work</h1>
            </div>
        </div>
    </section>

    <section class="container my-5">
        <div class="row mb-4">
            @forelse ($works as $item)
                <div class="col-md-4 mb-3">
                    <div class="single">
                        <div class="p-3">
                            <img src="{{ $item->image }}" class="card-img-top" alt="Featured image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->work_title }}</h5>
                                <div class="text-end">
                                    <a class="link"
                                        href="{{ route('site.ourwork', ['id' => Crypt::encrypt($item->id)]) }}">Read More
                                        <i class="fa-solid fa-angles-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p>*No data found</p>
            @endforelse
        </div>
        {{ $works->links() }}
    </section>
@endsection

@section('customJS')
@endsection
