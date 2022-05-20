@extends('web.common.main')

@section('title', 'Our Work | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/ourwork.png');
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

        a{
            text-decoration: none;
        }

        .work_title{
            color: rgb(77, 77, 77);
            text-transform: capitalize;
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

    <div class="bg-light">
        <section class="container py-5">
            <div class="row mb-4">
                @forelse ($works as $item)
                    <div class="col-md-4 mb-3">
                        <a href="{{ route('site.ourwork', ['id' => Crypt::encrypt($item->id)]) }}">
                            <div class="single shadow-sm">
                                <div class="p-3">
                                    <img src="{{ $item->image }}" class="card-img-top" alt="Featured image">
                                    <div class="card-body">
                                        <h5 class="text-center work_title">{{ $item->work_title }}</h5>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <p>*No data found</p>
                @endforelse
            </div>
            {{ $works->links() }}
        </section>
    </div>
@endsection

@section('customJS')
@endsection
