@extends('web.common.main')

@section('title', 'Our Work | NIEDSWET')

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
                <p><a href="{{ route('site.home') }}">Home</a> > <a href="{{route('site.ourwork')}}">Our Work</a> > Gate of Dr. Nobin Bordoloi College</p>
            </div>
            <div class="title">
                <h1 class="header_title">Our Work</h1>
            </div>
        </div>
    </section>

    <section class="my-5">
        <div class="container">
            <h4 class="text-center fw-bold mb-4">Gate of Dr. Nobin Bordoloi College</h4>
            <div class="text-center">
                <img src="{{ asset('web_assets/images/images/our-work.png') }}" alt="">
            </div>

            <div class="mt-5">
                <p>Non, nisi, risus mauris tincidunt fermentum nisl, pellentesque. Tristique enim ut maecenas lectus.
                    Aliquam purus proin nunc rhoncus in. Nibh est nunc quam scelerisque
                    placerat pharetra, amet, eu at. Amet lacus, tellus sed imperdiet vehicula nibh est faucibus.</p>

                <p>Mauris donec rutrum dui, cursus pharetra semper aliquet leo. Tincidunt diam integer interdum neque,
                    adipiscing. Et in ullamcorper sapien arcu. Mauris vel duis ultrices ac
                    turpis mi. Diam tristique et suscipit feugiat egestas. Lacus augue vulputate velit est neque lacus
                    adipiscing. Sit imperdiet at pretium risus fames adipiscing vitae vitae
                    dictum. Cras quam placerat id ante quisque massa consequat lorem. Sem purus ac dolor ullamcorper gravida
                    a.
                    Augue etiam purus massa sed feugiat mattis urna, nibh enim. Tellus sodales volutpat turpis adipiscing
                    aliquam pellentesque. Nisl urna dictum risus risus id sollicitudin sit
                    sed donec. Fames leo amet vitae purus consectetur. Venenatis neque sit urna cras a sed consequat quisque
                    massa. Scelerisque at vel faucibus aliquet augue lorem aliquam
                    magna et.</p>

                <p>At sed metus faucibus enim cursus et nibh sed sed. Euismod eros, at ut viverra. Sit diam commodo vitae
                    bibendum pharetra, tellus. Lectus amet non diam, interdum quam
                    est. Erat convallis nibh placerat aliquet lectus. Egestas turpis ipsum donec gravida. Faucibus bibendum
                    tempor lacus at tortor mauris. Turpis eu est viverra faucibus ac
                    massa. Quam egestas varius maecenas sit viverra libero. Eget mattis et tristique eu, pharetra. Malesuada
                    sed fermentum ipsum mattis tellus orci ornare. Id ultrices
                    commodo vitae malesuada malesuada sed netus viverra consequat. Ac ullamcorper dignissim in suspendisse
                    mi enim.</p>

                <p>Mauris donec rutrum dui, cursus pharetra semper aliquet leo. Tincidunt diam integer interdum neque,
                    adipiscing. Et in ullamcorper sapien arcu. Mauris vel duis ultrices ac
                    turpis mi. Diam tristique et suscipit feugiat egestas. Lacus augue vulputate velit est neque lacus
                    adipiscing. Sit imperdiet at pretium risus fames adipiscing vitae vitae
                    dictum. Cras quam placerat id ante quisque massa consequat lorem. Sem purus ac dolor ullamcorper gravida
                    a.</p>

                <p>Mauris donec rutrum dui, cursus pharetra semper aliquet leo. Tincidunt diam integer interdum neque,
                    adipiscing. Et in ullamcorper sapien arcu. Mauris vel duis ultrices ac
                    turpis mi. Diam tristique et suscipit feugiat egestas. Lacus augue vulputate velit est neque lacus
                    adipiscing. Sit imperdiet at pretium risus fames adipiscing vitae vitae
                    dictum. Cras quam placerat id ante quisque massa consequat lorem. Sem purus ac dolor ullamcorper gravida
                    a.</p>
            </div>
        </div>
    </section>
@endsection

@section('customJS')
@endsection
