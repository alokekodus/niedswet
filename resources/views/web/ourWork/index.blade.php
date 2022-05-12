@extends('web.common.main')

@section('title', 'Our Work | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/blog.png');
        }

        .link {
            text-decoration: none;
            color: rgb(44, 44, 44);
        }

        .card-img-top{
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
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="single">
                        <div class="shadow p-3 rounded">
                            <img src="https://images.unsplash.com/photo-1620662736427-b8a198f52a4d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <a class="link" href="{{ route('site.ourwork', ['id' => Crypt::encrypt(1)]) }}">
                                    <h5 class="card-title text-center mb-0">Gate of Dr. Nobin Bordoloi College</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single">
                        <div class="shadow p-3 rounded">
                            <img src="https://images.unsplash.com/photo-1620662736427-b8a198f52a4d?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=871&q=80"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <a class="link" href="{{ route('site.ourwork', ['id' => Crypt::encrypt(1)]) }}">
                                    <h5 class="card-title text-center mb-0">Gate of Dr. Nobin Bordoloi College</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="single">
                        <div class="shadow p-3 rounded">
                            <img src="https://images.unsplash.com/photo-1593240637899-5fc06c754c2b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=394&q=80"
                                class="card-img-top" alt="...">
                            <div class="card-body">
                                <a class="link" href="{{ route('site.ourwork', ['id' => Crypt::encrypt(1)]) }}">
                                    <h5 class="card-title text-center mb-0">Gate of Dr. Nobin Bordoloi College</h5>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJS')
@endsection
