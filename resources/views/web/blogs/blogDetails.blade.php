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
                <p><a href="{{ route('site.home') }}">Home</a> > <a href="{{ route('site.blogs') }}">Blogs</a> > Ut sem
                    arcu mi lobortis dui ut cursus hendrerit.</p>
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
                <h4 class="fw-bold">Ut sem arcu mi lobortis dui ut cursus hendrerit.</h4>

                <div class="author d-flex justify-content-between text-12 fst-italic">
                    <span>Mar 01, 2022</span>
                    <span>By Joe David</span>
                </div>

                <div class="blogContent mt-4">
                    <img class="thumbnail mb-5" src="{{ asset('web_assets/images/blogs/blog1.png') }}"
                        alt="Blog thumbnail">
                    <p>Proin nibh velit nam scelerisque et odio. Urna eu dui, a dignissim elementum, in. Enim, ullamcorper
                        ac enim tellus
                        elementum duis lectus fames. At sit in quis nunc, turpis bibendum. Molestie fusce donec ullamcorper
                        adipiscing metus.
                        Turpis rhoncus, id ipsum massa molestie urna quam.</p>

                    <p>Leo et lorem in suspendisse id vitae nunc vivamus imperdiet. Sit convallis egestas ipsum quam
                        vehicula gravida ipsum
                        enim. Condimentum vel non scelerisque non. Aliquet mattis donec nisi, ultricies aliquam. Dui tortor,
                        a leo faucibus iaculis
                        amet. Egestas eget quis nec amet turpis fringilla. Et pretium fringilla diam metus venenatis
                        ultrices faucibus et. Proin
                        eleifend etiam diam nec. Metus dolor sem dui, ut diam. Dui sit quis pretium purus imperdiet sed eu
                        felis. Elementum
                        convallis et felis cursus ut pellentesque neque ullamcorper purus. Urna, risus ut pellentesque
                        adipiscing viverra fusce.
                        Vitae mauris a nunc lorem vulputate.</p>

                    <p>Amet, tristique vulputate nec dignissim augue tellus at. A pharetra aliquet in arcu faucibus sed
                        lacus nullam. Est
                        scelerisque hendrerit diam scelerisque lectus lobortis. Ac ultrices augue sem ultricies venenatis
                        adipiscing sit imperdiet
                        sit. Varius duis eget vitae pharetra odio. Volutpat lacus fermentum venenatis enim commodo, mattis.
                        Tortor consectetur
                        eu, scelerisque pellentesque sollicitudin consequat. Tempor quam nec ipsum ante luctus ut neque eget
                        non.
                        Turpis sed nisi amet, pulvinar tristique adipiscing euismod eu non. Ac dolor fusce potenti iaculis
                        parturient. Rhoncus,
                        quisque purus, semper maecenas sed sollicitudin vitae. Id maecenas eget rhoncus donec euismod ante.
                        Mi aliquam
                        commodo et auctor vel nulla. Enim neque velit libero lacus. Tincidunt ultricies amet faucibus eu in
                        amet. Purus nunc quis
                        iaculis est. Nunc cras turpis libero ornare morbi mauris proin gravida. Euismod netus aliquam
                        tristique sodales. Diam
                        lacus, amet malesuada fermentum ullamcorper eget eu morbi. Lectus posuere fames mattis vitae.
                        Ultricies pretium non
                        sed nisi faucibus turpis. Nunc interdum arcu faucibus cras amet.</p>

                    <p>Pretium malesuada leo nunc, ultrices lorem egestas in pretium id. Faucibus dolor, etiam luctus quis
                        diam neque
                        pellentesque hendrerit molestie. Odio mauris vitae gravida molestie nisi mattis. Sit nunc amet in
                        laoreet non fringilla
                        gravida arcu. Vulputate elit interdum molestie duis tellus elementum amet sapien vestibulum. Ac
                        tortor elit dictum
                        elementum purus. Nunc, in sed quis risus massa. Ultrices mauris leo sit dui. Morbi aenean posuere
                        amet, vitae viverra
                        scelerisque congue. Enim, adipiscing nibh mauris lorem enim mi. Turpis sit quis fusce sit auctor id
                        justo, viverra. Iaculis
                        non ut libero volutpat orci diam duis pulvinar non. Nullam non id vestibulum feugiat cras. Fusce in
                        nec nascetur ornare
                        montes, eu, volutpat, consectetur eu. Eu quis porta ac commodo, nulla.</p>

                    <p>Ipsum at elementum suscipit nisi. Purus viverra sit feugiat aliquam. Suspendisse iaculis sit molestie
                        sit egestas. Duis
                        netus tempor, hendrerit sapien fames vestibulum pellentesque elit amet. Tellus tortor arcu at vel.
                        Ornare faucibus in cras
                        neque, a. Sapien enim tortor eu proin vestibulum porttitor. Volutpat donec tincidunt quisque sed
                        vestibulum a.
                        Eget dapibus id sed accumsan porttitor. Leo aliquam phasellus consectetur adipiscing volutpat arcu
                        aliquet. Risus vel
                        tristique velit risus. Posuere neque eu vitae nisl quisque amet. Dui lorem id ultricies semper lorem
                        tempus malesuada.
                        Elementum placerat donec facilisis vestibulum ut sed dolor. Ut ipsum orci, magna massa egestas.
                        Adipiscing nulla
                        imperdiet lacus, rhoncus lacus, viverra elementum, interdum egestas. Pharetra, nisl facilisi varius
                        purus nisl ac. Neque, ac
                        magna vel id magna rutrum dolor massa. Feugiat interdum quam lacus dapibus at. Donec aenean vitae
                        aliquam at cras
                        convallis. Porttitor ultrices morbi dictum morbi elit ac nullam. Nam id fringilla lacus dictumst
                        nulla dolor amet leo. A
                        integer ullamcorper consectetur proin nec in ultrices vel sit.</p>
                </div>

                <div class="pagination d-flex justify-content-between mb-5">
                    <a href="#"><span><i class="fa-solid fa-angles-left"></i> Previous Post</span></a>
                    <a href="#"><span>Next Post <i class="fa-solid fa-angles-right"></i></span></a>
                </div>
            </div>

            {{-- Right block --}}
            <div class="col-md-3">
                <div class="searchBox mb-4">
                    <h5>Search News</h5>
                    <form id="searchBlogForm" action="#">
                        <input type="text" class="form-control shadow-none" id="keyword" name="keyword" placeholder="By Keyword">

                        <h5 class="mt-4">or Filter by</h5>
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control shadow-none" id="fromDate" name="fromDate" placeholder="From">
                            </div>
                            <div class="col">
                                <input type="text" class="form-control shadow-none" id="toDate" name="toDate" placeholder="To">
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
                        <p class="d-flex justify-content-between text-12"><span>Charity</span> <span>04</span></p>
                        <p class="d-flex justify-content-between text-12"><span>Donation</span> <span>02</span></p>
                        <p class="d-flex justify-content-between text-12"><span>Volunteer Team</span> <span>05</span></p>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('customJS')
@endsection
