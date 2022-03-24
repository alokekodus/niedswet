<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{asset('web_assets/vendor/bootstrap5/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('web_assets/vendor/owlcarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('web_assets/vendor/owlcarousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('web_assets/vendor/magnific/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('web_assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('web_assets/css/responsive.css')}}">

    <title>NIEDSWET</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar shadow-sm navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{asset('web_assets/images/Icons/logo.png')}}" alt=""></a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Campaigns</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-donate" href="#">Donate Now</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carousel -->
    <section class="carousel">
        <div class="main-carousel owl-carousel owl-theme">
            <div class="item">
                <img src="{{asset('web_assets/images/images/slider.png')}}" class="d-block w-100" alt="Carousel">
            </div>
            <div class="item">
                <img src="{{asset('web_assets/images/images/slider.png')}}" class="d-block w-100" alt="Carousel">
            </div>
        </div>

        <div class="navigation">
            <div class="customPrevBtnMain arrow"><i class="fa-solid fa-angle-left"></i></div>
            <div class="customNextBtnMain arrow"><i class="fa-solid fa-angle-right"></i></div>
        </div>
    </section>

    <!-- notification -->
    <section class="notifications">
        <div class="container">
            <h4 class="text-center">Notifications</h4>

            <table class="table table-bordered shadow-sm">
                <tr>
                    <td>
                        <p class="fw-bold text-center">Campaign</p>
                        <p class="info text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </td>
                    <td>
                        <p class="fw-bold text-center">Campaign</p>
                        <p class="info text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="info my-2 text-center">Amet eget tortor, luctus eros vulputate id sed ac sagittis. Lacus pharetra
                            porta in aenean nisl eget habitant tortor amet.</p>
                    </td>
                    <td>
                        <p class="info my-2 text-center">Cursus purus quis sagittis tellus volutpat egestas tortor.</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="info my-2 text-center">Aliquet diam id semper molestie integer mattis.</p>
                    </td>
                    <td>
                        <p class="info my-2 text-center">Turpis ante felis dignissim lectus.</p>
                    </td>
                </tr>

                <tr>
                    <td>
                        <p class="text-center my-2"><i class="fa-solid fa-angles-down"></i></p>
                    </td>
                    <td>
                        <p class="text-center my-2"><i class="fa-solid fa-angles-down"></i></p>
                    </td>
                </tr>
            </table>
        </div>
    </section>
    <!-- about us -->
    <section class="aboutUs">
        <div class="row g-0">
            <div class="col-sm-6">
                <img src="{{asset('web_assets/images/images/about.png')}}" alt="about us">
            </div>
            <div class="col-sm-6 bg-light aboutInfo">
                <div>
                    <h4 class="mb-4">About Us</h4>

                    <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Accumsan, sed vitae elit,
                        arcu. Vulputate aliquet ut nec urna, parturient. Faucibus sit amet consectetur
                        faucibus phasellus purus ultricies rhoncus. Augue metus, vestibulum sit lectus
                        imperdiet non eleifend at ac. Ac iaculis purus, massa eget mattis a, pulvinar
                        cursus. Sed varius non velit a, morbi duis nibh quis. Faucibus mi, massa, mattis
                        volutpat, ac cursus vel. Molestie vitae, id non mauris viverra risus tellus blandit.

                        Odio pharetra nam et ante auctor duis. Elit tempus tellus ac semper quis.
                        Consequat viverra vitae consequat tincidunt ultrices pellentesque elit eu duis.
                        Tempor id nec viverra in lorem interdum. Nunc, fringilla sollicitudin scelerisque
                        tempus sit ultrices gravida.</p>

                    <a href="#" class="btn btn-know-more">Know More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our work -->
    <section class="ourWork">
        <img class="overlay" src="{{asset('web_assets/images/images/Background.png')}}" alt="">
        <h4 class="text-center fw-bold mb-5">Our Work</h4>
        <div class="col-sm-8 mx-auto">
            <div class="work-carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/our-work.png')}}" alt="Our work">
                        <p class="fw-bold mt-2">Consequat massa bibendum lobortis aenean lorem nunc vel. Sem tempor
                            vulputate gravida ipsum mauris gravida. Amet venenatis varius tristique
                            penatibus. In elit, facilisis et odio.</p>
                    </div>
                </div>
                <div class="item">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/our-work.png')}}" alt="Our work">
                        <p class="fw-bold mt-2">Consequat massa bibendum lobortis aenean lorem nunc vel. Sem tempor
                            vulputate gravida ipsum mauris gravida. Amet venenatis varius tristique
                            penatibus. In elit, facilisis et odio.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation">
            <div class="customPrevBtnOurWork arrow"><i class="fa-solid fa-angle-left"></i></div>
            <div class="customNextBtnOurWork arrow"><i class="fa-solid fa-angle-right"></i></div>
        </div>
    </section>

    <!-- Campaigns -->
    <section class="campaigns">
        <h4 class="text-center fw-bold">Campaigns</h4>
        <div class="container">
            <div class="campaigns-carousel owl-carousel owl-theme">
                <div class="item">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/campaign.png')}}" alt="">
                        <p class="heading fw-bold my-3">Volutpat, suspendisse mauris at
                            nulla enim</p>

                        <p class="info">
                            Eu lectus duis faucibus amet tincidunt duis sit.
                            Mattis suspendisse arcu sit vulputate nam duis
                            in adipiscing scelerisque. Eget egestas
                            venenatis, ultricies fermentum nunc.
                        </p>

                        <p class="donationRaised mb-0">&#8377; 50,000 <span>raised of 5,46,000</span></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span>Ongoing</span>
                            <span>15 Supporters</span>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-donate" href="#">Donate Now</a>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/campaign.png')}}" alt="">
                        <p class="heading fw-bold my-3">Volutpat, suspendisse mauris at
                            nulla enim</p>

                        <p class="info">
                            Eu lectus duis faucibus amet tincidunt duis sit.
                            Mattis suspendisse arcu sit vulputate nam duis
                            in adipiscing scelerisque. Eget egestas
                            venenatis, ultricies fermentum nunc.
                        </p>

                        <p class="donationRaised mb-0">&#8377; 50,000 <span>raised of 5,46,000</span></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span>Ongoing</span>
                            <span>15 Supporters</span>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-donate" href="#">Donate Now</a>
                        </div>
                    </div>
                </div>

                <div class="item">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/campaign.png')}}" alt="">
                        <p class="heading fw-bold my-3">Volutpat, suspendisse mauris at
                            nulla enim</p>

                        <p class="info">
                            Eu lectus duis faucibus amet tincidunt duis sit.
                            Mattis suspendisse arcu sit vulputate nam duis
                            in adipiscing scelerisque. Eget egestas
                            venenatis, ultricies fermentum nunc.
                        </p>

                        <p class="donationRaised mb-0">&#8377; 50,000 <span>raised of 5,46,000</span></p>
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <div class="d-flex justify-content-between mt-2">
                            <span>Ongoing</span>
                            <span>15 Supporters</span>
                        </div>
                        <div class="text-center">
                            <a class="btn btn-donate" href="#">Donate Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="navigation">
            <div class="customPrevBtn arrow"><i class="fa-solid fa-angle-left"></i></div>
            <div class="customNextBtn arrow"><i class="fa-solid fa-angle-right"></i></div>
        </div>
    </section>

    <!-- Events -->
    <section class="events">
        <h4 class="text-center fw-bold">Events</h4>
        <div class="container">
            <div class="row">
                <div class="col-sm-4 p-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/events1.png')}}" alt="Events">
                        <p class="fw-bold title my-3">
                            Leo sed mattis ullamcorper porta
                            dignissim sollicitudin. In mollis sit
                            mauris, scelerisque.
                        </p>
                        <p class="text-end readMore"><a href="#">Read More <i class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>

                <div class="col-sm-4 p-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/events2.png')}}" alt="Events">
                        <p class="fw-bold title my-3">
                            Tristique elementum, tellus
                            morbi ullamcorper imperdiet
                            pellentesque
                        </p>
                        <p class="text-end readMore"><a href="#">Read More <i class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>

                <div class="col-sm-4 p-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/events3.png')}}" alt="Events">
                        <p class="fw-bold title my-3">
                            Ut amet scelerisque lacus augue
                            in velit felis mauris mauris
                        </p>
                        <p class="text-end readMore"><a href="#">Read More <i class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services -->
    <section class="services">
        <h4 class="text-center fw-bold">Services</h4>
        <div class="container">
            <div class="row">
                <div class="col-sm-3 p-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/Vectors/service1.png')}}" alt="Services">
                        <p class="fw-bold my-2">Elit id velit, consequat
                            viverra nascetur tortor
                            hac.</p>
                    </div>
                </div>

                <div class="col-sm-3 p-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/Vectors/service2.png')}}" alt="Services">
                        <p class="fw-bold my-2">In tincidunt ac magnis at
                            elementum interdum
                            vulputate tempus.</p>
                    </div>
                </div>

                <div class="col-sm-3 p-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/Vectors/service3.png')}}" alt="Services">
                        <p class="fw-bold my-2">Elit id velit, consequat
                            viverra nascetur tortor
                            hac.</p>
                    </div>
                </div>

                <div class="col-sm-3 p-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/Vectors/service4.png')}}" alt="Services">
                        <p class="fw-bold my-2">In tincidunt ac magnis at
                            elementum interdum
                            vulputate tempus.</p>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="btn know-more">Know More</a>
            </div>
        </div>
    </section>

    <!-- Gallery -->
    <section class="gallery">
        <h4 class="text-center fw-bold">Gallery</h4>
        <div class="photos">
            <h4 class="text-center mt-4">Photos</h4>
            <div class="container">
                <div class="gallery-carousel owl-carousel owl-theme">
                    <div class="item">
                        <a href="{{asset('web_assets/images/images/gallery1.png')}}"><img src="{{asset('web_assets/images/images/gallery1.png')}}"
                                alt="Gallery"></a>
                    </div>
                    <div class="item">
                        <a href="{{asset('web_assets/images/images/gallery2.png')}}"><img src="{{asset('web_assets/images/images/gallery2.png')}}"
                                alt="Gallery"></a>
                    </div>
                    <div class="item">
                        <a href="{{asset('web_assets/images/images/gallery3.png')}}"><img src="{{asset('web_assets/images/images/gallery3.png')}}"
                                alt="Gallery"></a>
                    </div>
                </div>
            </div>
            <div class="navigation">
                <div class="customPrevBtnGallery arrow"><i class="fa-solid fa-angle-left"></i></div>
                <div class="customNextBtnGallery arrow"><i class="fa-solid fa-angle-right"></i></div>
            </div>
        </div>

        <!-- Videos -->
        <div class="videos">
            <h4 class="text-center mt-5">Video</h4>
            <div class="container">
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
        <div class="text-center">
            <a href="#" class="btn view-all">View All</a>
        </div>
    </section>

    <!-- Blog -->
    <section class="blogs">
        <h4 class="text-center fw-bold">Blogs</h4>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/blog1.png')}}" alt="Blog thumbnail">
                        <p class="fw-bold title my-3">
                            Ut sem arcu mi lobortis dui ut
                            cursus hendrerit.
                        </p>
                        <p class="postTime">Mar 01, 2022</p>
                        <p class="info">Porta metus viverra enim sed volutpat dictum
                            maecenas. Facilisi ullamcorper eget nullam odio
                            libero enim. Integer mattis viverra pellentesque
                            mauris eget.</p>
                        <p class="text-end readMore"><a href="#">Read More <i class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/blog1.png')}}" alt="Blog thumbnail">
                        <p class="fw-bold title my-3">
                            Ut sem arcu mi lobortis dui ut
                            cursus hendrerit.
                        </p>
                        <p class="postTime">Mar 01, 2022</p>
                        <p class="info">Porta metus viverra enim sed volutpat dictum
                            maecenas. Facilisi ullamcorper eget nullam odio
                            libero enim. Integer mattis viverra pellentesque
                            mauris eget.</p>
                        <p class="text-end readMore"><a href="#">Read More <i class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="single">
                        <img src="{{asset('web_assets/images/images/blog1.png')}}" alt="Blog thumbnail">
                        <p class="fw-bold title my-3">
                            Ut sem arcu mi lobortis dui ut
                            cursus hendrerit.
                        </p>
                        <p class="postTime">Mar 01, 2022</p>
                        <p class="info">Porta metus viverra enim sed volutpat dictum
                            maecenas. Facilisi ullamcorper eget nullam odio
                            libero enim. Integer mattis viverra pellentesque
                            mauris eget.</p>
                        <p class="text-end readMore"><a href="#">Read More <i class="fa-solid fa-angle-right"></i></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Milestones -->
    <section class="milestones">
        <h4 class="text-center fw-bold mb-5">Milestones</h4>
        <div class="container">
            <div class="images">
                <div class="col img1">
                    <img src="{{asset('web_assets/images/Vectors/milestone1.png')}}" alt="Milestones">
                    <p class="fw-bold">Odio et varius ipsum cras sit
                        facilisis sociis pellentesque
                        est</p>
                </div>
                <div class="col img2">
                    <img src="./web_assets/images/Vectors/arrow1.png" alt="Milestones">
                </div>
                <div class="col img3">
                    <img src="{{asset('web_assets/images/Vectors/milestone2.png')}}" alt="Milestones">
                    <p class="fw-bold">Ornare tortor pulvinar eget
                        hac auctor adipiscing arcu</p>
                </div>
                <div class="col img4">
                    <img src="./web_assets/images/Vectors/arrow2.png" alt="Milestones">
                </div>
                <div class="col img5">
                    <img src="{{asset('web_assets/images/Vectors/milestone3.png')}}" alt="Milestones">
                    <p class="fw-bold">Ultrices fermentum non,
                        eget at elit in blandit</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Awards -->
    <section class="awards">
        <h4 class="text-center fw-bold mb-5">Awards</h4>
        <div class="container">
            <div class="col-sm-10 mx-auto">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single">
                            <div class="text-center">
                                <img src="{{asset('web_assets/images/images/award1.png')}}" alt="Awards">
                            </div>
                            <p class="info">Ut sagittis laoreet est
                                rutrum lorem ac. Ut quisque
                                ullamcorper ullamcorper
                                dui fermentum vel donec
                                eget et.</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="single">
                            <div class="text-center">
                                <img src="{{asset('web_assets/images/images/award2.png')}}" alt="Awards">
                            </div>
                            <p class="info">Pulvinar penatibus tincidunt
                                tempor, ut ultricies risus, ut vel.</p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="single">
                            <div class="text-center">
                                <img src="{{asset('web_assets/images/images/award3.png')}}" alt="Awards">
                            </div>
                            <p class="info">Orci, dictum gravida mauris
                                pharetra auctor cras
                                elementum ac.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="row g-0">
            <div class="col-sm-3 left-block">
                <img src="{{asset('web_assets/images/Icons/logo.png')}}" alt="Logo">
            </div>
            <div class="col-sm-9 right-block">
                <div class="flex">
                    <div class="col-sm-3">
                        <div class="information d-flex flex-column">
                            <p>Information</p>
                            <a href="#">About Us</a>
                            <a href="#">Gallery</a>
                            <a href="#">Privacy Policy</a>
                            <a href="#">Terms & Conditions</a>
                            <a href="#">Careers</a>
                            <a href="#">Contact Us</a>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="what-we-do d-flex flex-column">
                            <p>What We Do</p>
                            <a href="#">Campaign</a>
                            <a href="#">Events</a>
                            <a href="#">Services</a>
                            <a href="#">Awards</a>
                            <a href="#">Milestones</a>
                        </div>
                    </div>

                    <div class="col-sm-3">
                        <div class="resources d-flex flex-column">
                            <p>Resources</p>
                            <a href="#">Gallery</a>
                            <a href="#">Blog</a>
                            <a href="#">Media</a>
                            <a href="#">Newsletter</a>
                        </div>
                    </div>

                    <div class="col-sm-3 social">
                        <p>Social</p>
                        <div class="top">
                            <img src="./web_assets/images/Icons/facebook.png" alt="">
                            <img src="./web_assets/images/Icons/twitter.png" alt="">
                        </div>

                        <div class="bottom">
                            <img src="./web_assets/images/Icons/instagram.png" alt="">
                            <img src="./web_assets/images/Icons/linkedin.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{asset('web_assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('web_assets/vendor/bootstrap5/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('web_assets/vendor/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('web_assets/vendor/magnific/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('web_assets/js/main.js')}}"></script>
</body>

</html>