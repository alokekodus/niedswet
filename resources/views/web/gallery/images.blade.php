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
                <p><a href="{{ route('site.home') }}">Home</a> > <a href="{{ route('site.gallery.album') }}">Photos</a> > {{ $album->album_title }}</p>
            </div>
            <div class="title">
                <h1 class="header_title">{{ $album->album_title }}</h1>
            </div>
        </div>
    </section>

    <section class="photos my-5">
        <div class="container mt-3">
            <div class="images">
                <div class="row">
                    @forelse ($images as $item)
                        <div class="col-md-4 mb-3">
                            <a href="{{ asset($item->image) }}"><img class="thumbnail"
                                    src="{{ asset($item->image) }}" alt="Gallery Image"></a>
                        </div>
                    @empty
                        <p>*No image found</p>
                    @endforelse
                </div>
            </div>
            {{ $images->links() }}
        </div>
    </section>
@endsection

@section('customJS')
    <script>
        $(".images").each(function() {
            // the containers for all your galleries
            $(this).magnificPopup({
                delegate: "a", // the selector for gallery item
                type: "image",
                gallery: {
                    enabled: true,
                },
                zoom: {
                    enabled: true, // By default it's false, so don't forget to enable it

                    duration: 300, // duration of the effect, in milliseconds
                    easing: "ease-in-out",
                    opener: function(openerElement) {
                        return openerElement.is("img") ?
                            openerElement :
                            openerElement.find("img");
                    },
                },
            });
        });
    </script>
@endsection
