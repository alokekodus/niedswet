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
        <h4 class="text-center fw-bold">Photos</h4>
        <div class="container mt-3">
            <div class="images">
                <div class="row">
                    @for ($i = 1; $i < 4; $i++)
                        <div class="col-md-4 mb-3">
                            <a href="{{ asset('web_assets/images/gallery/gallery' . $i . '.png') }}"><img
                                    class="thumbnail"
                                    src="{{ asset('web_assets/images/gallery/gallery' . $i . '.png') }}"
                                    alt="Gallery Image"></a>
                        </div>
                    @endfor
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
