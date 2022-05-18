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

    <section class="team my-5">
        <h4 class="text-center fw-bold">Board of Trustees</h4>

        <div class="container">
            <div class="members images">
                @for ($i = 0; $i < 9; $i++)
                    @include('web.common.singleMember')
                @endfor

            </div>
        </div>
    </section>

    <section class="team my-5">
        <h4 class="text-center fw-bold">Advisors</h4>

        <div class="container">
            <div class="members">
                @for ($i = 0; $i < 4; $i++)
                    @include('web.common.singleMember')
                @endfor

            </div>
        </div>
    </section>

    <section class="team my-5">
        <h4 class="text-center fw-bold">Chartered Accountant</h4>

        <div class="container">
            <div class="members">
                @include('web.common.singleMember')
            </div>
        </div>
    </section>
    
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
                        <img class="thumbnail" src="{{ asset('web_assets/images/team/member1.png') }}" alt="">
                        <p class="fw-bold fs-5 mt-3 mb-0 text-white">Binoy K. Bordoloi</p>
                        <p class="text-white">Managing Trustee</p>
                    </div>
                    <div class="container">
                        <div class="modal_paragraph">
                            <p>
                                Binoy K. Bordoloi was born at Jorhat, Assam. He completed his education at Jorhat Govt.
                                Higher
                                Secondary School,Delhi University (B.Sc. and M.Sc.), New York University (Ph.D.), and
                                University
                                of California, Los Angeles (MBA). He is professionally active in the medical device and
                                pharmaceuticals industries. He led setting up of the operations in India from a zero base
                                for
                                Baxter Healthcare Corp., Deerfield, IL (USA) in home dialysis therapy as a bridge to kidney
                                transplant for renal impaired patients. He also worked in Research & Development at Johnson
                                &
                                Johnson, Somerville, NJ (USA) in bio-surgery. He took retirement after about three decades
                                of
                                professional employment in the industry. He then started as an entrepreneur in early 2010and
                                created Bordoloi Biotech LLC (USA) and Bordoloi Biotech India Pvt Ltd (BBIPL) as the Founder
                                President and Director, respectively. BBLLC is a technology development and marketing
                                company
                                with several patentsgranted in the US. It hasmanufacturing operations at Guwahati(India) via
                                BBIPL, and offices in Kolkata and Delhi, India (www.bordoloibiotech.com;
                                www.HerboJoint.com).He
                                is an invited speaker for guest lecture every year for past many years for graduate students
                                at
                                the Rutgers University, New Jersey (USA), jointly organized by its College of Pharmacy and
                                the
                                Robert Wood Johnson University Hospital.
                            </p>

                            <p>He currently serves as the Chairman of the Board of Trustees of NAAM
                                (Naamghar Association of
                                America, Inc. - www.naamghar.org) .He is a life member of AANA (Assam Association of North
                                America), ASSNA (Asam Sahitya Sabha – North America), and was one of the founding members of
                                AFNA (Assam Foundation of North America, Inc. a charity organization). He along with his
                                younger
                                brother Dr. Bijoy Bordoloi donated to Jorhat Zila Sahitya Sabha(under Asam SahityaSabha) its
                                current permanent office building known as Samajratna Dr Nobin Ch. Bordoloi Smriti Sadan, in
                                memory of their late father, and Mrs. Tiluttoma Bordoloi Mancha, a performing stage, at the
                                same
                                Sadan in memory of their late mother. He manages the family-owned Seujeepam Green Leaf tea
                                plantation in Assam. He is active with Dr Nobin Bordoloi College at Dhekiajuli, Na-Ali,
                                Jorhat,
                                India(now under Dibrugarh University). He is also the Managing Trustee of the charity known
                                as
                                NIEDSWET (Northeast India Education and Social Welfare Trust) in Assam.</p>

                            </p>
                            <p>
                                He is the inventor of 17 granted US patents assigned to Bordoloi Biotech LLC, Ames Rubber
                                Corp.,
                                Johnson & Johnson, and Avery Dennison Corp., and several applications are pending. He is the
                                author/co-author of many publications and posters at symposia, and two books titled
                                “Laboratory
                                Experiments in Polymer Synthesis and Characterization” (1979,1980,1981 and 1982, Penn State
                                Univ.), and “Naamghar in America” (undergoing editing for release in 2022/23).
                            </p>
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

        $('.view').on('click', function(){
            $('#trusteeModal').modal('toggle');
        })
    </script>
@endsection
