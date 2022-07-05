<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="NIEDSWET seeks to contribute to the prosperity of Northeastern people and culture. It targets prosperity through aid, support, and counselling of the respective institutes and organizations.">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/x-icon">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('vendor/bootstrap5/css/bootstrap.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/owlcarousel/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/magnific/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('web_assets/css/main.css') }}">

    <title>@yield('title')</title>

    @yield('customHeader')
</head>

<body>
    <!-- Navbar -->
    @include('web.common.navbar')

    {{-- Main content --}}
    @yield('main')

    <!-- Footer -->
    @include('web.common.footer')

    <!-- Modal -->
    <div class="modal fade" id="newsletterModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="newsletterModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form action="#" id="newsletterForm">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="newsletterModalLabel">Subscribe to our Newsletter</h5>
                        <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="email" class="form-control shadow-none" id="newsletterEmail"
                                name="newsletterEmail" placeholder="Enter email address" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success shadow-none"
                            id="subscribeBtn">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap5/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('vendor/magnific/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('web_assets/js/main.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- AJAX header --}}
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    {{-- Donate button --}}
    <script>
        $('.btn-donate').on('click', function(e) {
            e.preventDefault();
            Swal.fire({
                icon: 'warning',
                title: 'Oops...',
                text: 'Currently we are not accepting online donation',
            })
        });
    </script>

    {{-- Newsletter --}}
    <script>
        $('#newsletterForm').on('submit', function(e) {
            e.preventDefault();

            let btn = $('#subscribeBtn');
            let data = new FormData(this);
            let url = "{{ route('site.subscribe.newsletter') }}";
            btn.text("Sending...");
            btn.attr("disabled", true);
            $.ajax({
                type: "post",
                url: url,
                data: data,
                cache: false,
                processData: false,
                contentType: false,
                success: function(data, textStatus, jqXHR) {
                    console.log(textStatus);
                    if (jqXHR.status === 200) {
                        btn.text("Subscribe");
                        btn.attr("disabled", false);
                        $("#newsletterForm")[0].reset();
                        $('#newsletterModal').modal('toggle');
                        Swal.fire({
                            icon: "success",
                            title: "Success",
                            text: data.message,
                        });
                    } else {
                        btn.text("Subscribe");
                        btn.attr("disabled", false);
                        Swal.fire({
                            icon: "error",
                            title: "Oops!",
                            text: data.message,
                        });
                    }
                },
                error: function(error) {
                    btn.text("Subscribe");
                    btn.attr("disabled", false);
                    Swal.fire({
                        icon: "error",
                        title: "Error",
                        text: error.responseJSON['message'],
                    });
                }
            });
        })
    </script>
    @yield('customJS')
</body>

</html>
