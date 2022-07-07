@extends('web.common.main')

@section('title', 'Our Team | NIEDSWET')

@section('customHeader')
    <style>
        .header {
            background: url('/web_assets/images/header/team.png');
        }

        .modal-content {
            background: rgb(1, 1, 1, 0.8);
            backdrop-filter: blur(4px);
        }

        .modal_paragraph p {
            font-size: 14px;
            color: #fff;
            line-height: 23px;
        }

        .view {
            cursor: pointer;
        }

        .thumbnail {
            width: 200px;
            object-fit: cover;
        }
    </style>
@endsection

@section('main')
    {{-- Header --}}
    <section class="header">
        <div class="overlay">
            <div class="path">
                <p><a href="{{ route('site.home') }}">Home</a> > <a href="{{ route('site.about') }}">About Us</a> > Our
                    Team
                </p>
            </div>
            <div class="title">
                <h1 class="header_title">Our Members</h1>
            </div>
        </div>
    </section>

    @if ($trustees->count() != 0)
        <section class="team my-5">
            <h3 class="text-center fw-bold mb-4">Board of Trustees</h3>

            <div class="container">
                <div class="members images">
                    @foreach ($trustees as $item)
                        @include('web.common.singleMember')
                    @endforeach
                </div>
            </div>
        </section>
    @endif


    @if ($advisors->count() != 0)
        <section class="team my-5">
            <h3 class="text-center fw-bold mb-4">Advisors</h3>

            <div class="container">
                <div class="members images">
                    @foreach ($advisors as $item)
                        @include('web.common.singleMember')
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if ($ca->count() != 0)
        <section class="team my-5">
            <h3 class="text-center fw-bold mb-4">Chartered Accountant</h3>

            <div class="container">
                <div class="members images">
                    @foreach ($ca as $item)
                        @include('web.common.singleMember')
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    
    
    @if ($pastMembers->count() != 0)
        <section class="team my-5">
            <h3 class="text-center fw-bold mb-4">List of Past Trustees</h3>

            <div class="container">
                <div class="members images">
                    @foreach ($pastMembers as $item)
                        @include('web.common.singleMember')
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- <section class="team my-5">
        <h3 class="text-center mb-3 fw-bold mb-4">List of Past Trustees</h3>
        <div class="container">
            <div class="row justify-content-center">

                <div class="singleMember">
                    <div class="image">
                        <img class="thumbnail" src="{{ asset('web_assets/images/default/no-image.png') }}"
                            alt="Dr. Nobin C Bordoloi">
                    </div>
                    <div class="details py-3 shadow">
                        <p class="text-center fw-bold mb-0">Dr. Nobin C Bordoloi</p>
                        <p class="text-center text-12 mb-0">Managing Trustee</p>
                        <p class="text-center text-12 fw-bold">1998 - 2009</p>

                        <div class="socials text-center">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram-square"></i></a>
                        </div>

                    </div>
                    <img class="view" data-id="{{ Crypt::encrypt(1) }}"
                        src="{{ asset('web_assets/images/Icons/view.png') }}" alt="view">
                </div>

                <div class="singleMember">
                    <div class="image">
                        <img class="thumbnail" src="{{ asset('web_assets/images/default/no-image.png') }}"
                            alt="Dr. Nobin C Bordoloi">
                    </div>
                    <div class="details py-3 shadow">
                        <p class="text-center fw-bold mb-0">Mr. Kalyan Bordoloi</p>
                        <p class="text-center text-12 mb-0">Managing Trustee</p>
                        <p class="text-center text-12 fw-bold">1998 - 2022</p>
                        <div class="socials text-center">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram-square"></i></a>
                        </div>
                    </div>
                    <img class="view" data-id="{{ Crypt::encrypt(1) }}"
                        src="{{ asset('web_assets/images/Icons/view.png') }}" alt="view">
                </div>

                <div class="singleMember">
                    <div class="image">
                        <img class="thumbnail" src="{{ asset('web_assets/images/default/no-image.png') }}"
                            alt="Dr. Nobin C Bordoloi">
                    </div>
                    <div class="details py-3 shadow">
                        <p class="text-center fw-bold mb-0">Mr. Raj Barua</p>
                        <p class="text-center text-12 mb-0">Managing Trustee</p>
                        <p class="text-center text-12 fw-bold">1998 - 2012</p>
                        <div class="socials text-center">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram-square"></i></a>
                        </div>
                    </div>
                    <img class="view" data-id="{{ Crypt::encrypt(1) }}"
                        src="{{ asset('web_assets/images/Icons/view.png') }}" alt="view">
                </div>

                <div class="singleMember">
                    <div class="image">
                        <img class="thumbnail" src="{{ asset('web_assets/images/default/no-image.png') }}"
                            alt="Dr. Nobin C Bordoloi">
                    </div>
                    <div class="details py-3 shadow">
                        <p class="text-center fw-bold mb-0">Dr. Hiren Saikia</p>
                        <p class="text-center text-12 mb-0">Managing Trustee</p>
                        <p class="text-center text-12 fw-bold">1998 - 2021</p>
                        <div class="socials text-center">
                            <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fa-brands fa-instagram-square"></i></a>
                        </div>
                    </div>
                    <img class="view" data-id="{{ Crypt::encrypt(1) }}"
                        src="{{ asset('web_assets/images/Icons/view.png') }}" alt="view">
                </div>

            </div>
        </div>
    </section> --}}

    <!-- Modal -->
    <div class="modal fade" id="trusteeModal" tabindex="-1" aria-labelledby="trusteeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- Close modal button --}}
                    <i class="fa-solid fa-xmark text-white fs-1 closeTeamModal"></i>
                    <div class="text-center">
                        <img class="thumbnail" id="profilePic"
                            src="{{ asset('web_assets/images/default/no-image.png') }}" alt="">
                        <p class="fw-bold fs-5 mt-3 mb-0 text-white" id="member_name"></p>
                        <p class="text-white" id="member_designation"></p>
                    </div>
                    <div class="container">
                        <div class="modal_paragraph text-white" id="member_bio">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('customJS')
    <script>
        $('.closeTeamModal').on('click', function() {
            $('#trusteeModal').modal('toggle');
        });

        $('.view').on('click', function() {
            const member_id = $(this).data('id');
            const formData = {
                member_id: member_id
            }
            console.log(member_id);
            $.ajax({
                url: "{{ route('site.get.member.detail') }}",
                type: "POST",
                data: formData,
                success: function(data) {
                    if (data.status === 200) {
                        if (data.member.image != '') {
                            $('#profilePic').attr('src', data.member.image)
                        }
                        $('#member_name').text(data.member.name)
                        $('#member_designation').text(data.member.designation)
                        $('#member_bio').empty().append(data.member.bio)
                        $('#trusteeModal').modal('toggle');
                    } else {
                        Swal.fire(
                            'Oops!',
                            'Member not found',
                            'error'
                        )
                    }
                },
                error: function(data) {
                    Swal.fire(
                        'Oops!',
                        'Server error',
                        'error'
                    )
                }

            });
        })
    </script>
@endsection
