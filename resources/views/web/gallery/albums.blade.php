@extends('web.common.main')

@section('title', 'Gallery | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/gallery.png');
        }

        .albums .album img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: 0.3s all ease;
        }

        .albums .album {
            position: relative;
            overflow: hidden;
        }

        .albums .album:hover img {
            transform: scale(1.1)
        }

        .albums .album_title {
            position: absolute;
            top: 0;
            width: 100%;
            height: 100%;
            color: #fff;
            background-color: rgb(1, 1, 1, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
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
        <h4 class="text-center fw-bold">Albums</h4>
        <div class="container mt-3">
            <div class="albums">
                <div class="row">
                    @for ($i = 0; $i < 10; $i++)
                    <div class="col-md-4 mb-4">
                        <a href="{{ route('site.gallery.album', ['id' => Crypt::encrypt(1)]) }}">
                            <div class="album">
                                <img class="thumbnail"
                                    src="{{ asset('uploads/gallery/12-05-2022-05-52-55_gallery1.png') }}"
                                    alt="Gallery Image">
                                <div class="album_title">
                                    <h5 class="text-uppercase">Album name</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJS')
@endsection
