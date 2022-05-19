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
                <h1 class="header_title">Our Team</h1>
            </div>
        </div>
    </section>

    @if ($trustees->count() != 0)
        <section class="team my-5">
            <h4 class="text-center fw-bold">Board of Trustees</h4>

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
            <h4 class="text-center fw-bold">Advisors</h4>

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
            <h4 class="text-center fw-bold">Chartered Accountant</h4>

            <div class="container">
                <div class="members images">
                    @foreach ($ca as $item)
                        @include('web.common.singleMember')
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <section class="team my-5">
        <h4 class="text-center mb-3 fw-bold">List of Past Trustees</h4>

        <div class="container">
            <div class="col-md-6 mx-auto">
                <table class="table table-bordered table-striped">
                    <tr>
                        <td>1</td>
                        <td>Dr. Nobin C Bordoloi</td>
                        <td>Since Till</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Mr. Kalyan Bordoloi</td>
                        <td>Since Till</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Mr. Raj Barua</td>
                        <td>Since Till</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Dr. Hiren Saikia</td>
                        <td>Since Till</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="trusteeModal" tabindex="-1" aria-labelledby="trusteeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- Close modal button --}}
                    <i class="fa-solid fa-xmark text-white fs-1 closeTeamModal"></i>
                    <div class="text-center">
                        <img class="thumbnail" id="profilePic"
                            src="{{ asset('web_assets/images/team/member1.png') }}" alt="">
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
