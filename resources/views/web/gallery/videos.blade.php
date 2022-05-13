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
                <p><a href="{{ route('site.home') }}">Home</a> > Gallery</p>
            </div>
            <div class="title">
                <h1 class="header_title">Gallery</h1>
            </div>
        </div>
    </section>

    <section class="photos my-5">
        <h4 class="text-center fw-bold">Videos</h4>
        <div class="container mt-3">
            <div class="images">
                <div class="row">
                    <div class="col-sm-4">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/eaU3ff3uVzw"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <div class="col-sm-4">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/eaU3ff3uVzw"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>

                    <div class="col-sm-4">
                        <iframe width="100%" height="250" src="https://www.youtube.com/embed/eaU3ff3uVzw"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
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
