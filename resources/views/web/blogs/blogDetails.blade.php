@extends('web.common.main')

@section('title', 'Blogs | NIEDSWET')

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
                <p><a href="{{ route('site.home') }}">Home</a> > <a href="{{ route('site.blogs') }}">Blogs</a> >
                    {{ $blog->title }}</p>
            </div>
            <div class="title">
                <h1 class="header_title">Blogs</h1>
            </div>
        </div>
    </section>

    <section class="container blogDetails mt-5">
        <div class="row">
            {{-- Left block --}}
            <div class="col-md-9">
                <h4 class="fw-bold">{{ $blog->title }}</h4>

                <div class="author d-flex justify-content-between text-12 fst-italic">
                    <span>{{ date('d-m-Y', strtotime($blog->created_at)) }}</span>
                    <span>By Admin</span>
                </div>

                <div class="blogContent mt-4">
                    <img class="thumbnail mb-5" src="{{ asset($blog->image) }}"
                        alt="Blog thumbnail">
                        {!! $blog->description !!}
                </div>

                {{-- <div class="pagination d-flex justify-content-between mb-5">
                    <a href="#"><span><i class="fa-solid fa-angles-left"></i> Previous Post</span></a>
                    <a href="#"><span>Next Post <i class="fa-solid fa-angles-right"></i></span></a>
                </div> --}}
            </div>

            {{-- Right block --}}
            <div class="col-md-3">
                <div class="searchBox mb-4">
                    <h5>Search News</h5>
                    <form id="searchBlogForm" action="#">
                        <input type="text" class="form-control shadow-none" id="keyword" name="keyword"
                            placeholder="By Keyword">

                        <h5 class="mt-4">or Filter by</h5>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control shadow-none" id="fromDate" name="fromDate"
                                    placeholder="From">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control shadow-none" id="toDate" name="toDate"
                                    placeholder="To">
                            </div>
                        </div>

                        <div class="text-center">
                            <button class="btn btn-search">Search</button>
                        </div>
                    </form>
                </div>

                <div class="categories">
                    <h5 class="mb-3">Categories</h5>
                    <ul class="ps-0">
                        @forelse ($categories as $item)
                        <p class="d-flex justify-content-between text-12"><span>{{$item->category}}</span> <span>{{$item->Blogs->count()}}</span></p>
                            
                        @empty
                        <p class="text-12">*No categories found</p>
                        @endforelse                        
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJS')
@endsection
