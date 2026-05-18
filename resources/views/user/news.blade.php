<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="PAUD Anak Ceria">
    <meta name="keywords"
        content="theme_ocean, college, course, e-learning, education, high school, kids, learning, online, online courses, school, student, teacher, tutor, university">
    <meta name="author" content="theme_ocean">
    <!-- SITE TITLE -->
    <title>PAUD Anak Ceria</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('webfonts/themify-icons.css') }}">
    <!-- All Min Css -->
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.min.css') }}">
    <!--- owl carousel Css-->
    <link rel="stylesheet" href="{{ asset('owlcarousel/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('owlcarousel/css/owl.theme.css') }}">
    <!-- MAGNIFIC CSS -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <!--jquery-simple-mobilemenu Css-->
    <link rel="stylesheet" href="{{ asset('css/jquery-simple-mobilemenu.css') }}">
    <!-- animate CSS -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body>

    <!-- START PRELOADER -->
    <!--
 <div class="preloaders">
  <span class="loader">Loading</span>
 </div>
 -->
    <!-- END PRELOADER -->


    <!-- START NAVBAR -->
    @include('components.navbar', ['navbar' => $navbar])
    <!-- END NAVBAR -->

    <!-- START SECTION TOP -->

    <!-- END SECTION TOP -->
    </div><!-- END  TOP HEADER CLASS -->

    <!-- START BLOG -->
    <section class="blog-page section-padding">
        <div class="container">
            <div class="row">
                <!-- Dynamic News Title -->
                <div class="arti_title mb-4">
                    <h1>{{ $news->title }}</h1>
                    
                    <!-- Added Dynamic Publication Date for a professional layout -->
                    <p class="text-muted mt-2" style="font-size: 0.9em;">
                        <i class="purple fa-regular fa-calendar-days me-1"></i> 
                        Diterbitkan pada: {{ $news->created_at->locale('id')->translatedFormat('d F Y') }}
                    </p>
                </div>
                
                <div class="col-auto col-sm-12 col-xs-12 justify-items-center mr-2 ml-2">
                    <div class="arti_single">

                        <!-- Dynamic Image Box with Fallback Mechanism -->
                        <div class="arti_img_two mb-4">
                            @if($news->image)
                                <img src="{{ asset('storage/' . $news->image) }}" class="img-fluid rounded shadow" alt="{{ $news->title }}" style="width: 100%; max-height: 480px; object-fit: cover;" />
                            @else
                                <!-- Fallback standard image if no image was provided -->
                                <img src="{{ asset('images/all-img/home-program1.png') }}" class="img-fluid rounded shadow" alt="Default Image" style="width: 100%; max-height: 480px; object-fit: cover;" />
                            @endif
                        </div>
                        
                        <!-- Dynamic Content Area -->
                        <div class="arti_content">
                            <!-- e() escapes harmful inputs while nl2br preserves original paragraph spacings -->
                            <div class="news-body text-justify" style="line-height: 1.8; font-size: 1.1em; color: #4a5568;">
                                {!! nl2br(e($news->content)) !!}
                            </div>
                        </div>
                        
                        <!-- UX Touch: Navigation Back Button -->
                        <div class="mt-5 border-top pt-4">
                            <a href="{{ url()->previous() }}" class="btn btn-primary text-white" style="background-color: #009CE0; border-color: #009CE0; padding: 10px 24px; border-radius: 5px;">
                                ← Kembali
                            </a>
                        </div>

                    </div><!-- END ARTI SINGLE  -->
                </div><!-- END COL-->
            </div><!-- END ROW-->
        </div><!-- END CONTAINER-->
    </section>
    <!-- END BLOG -->

    <!-- START FOOTER -->
    <div class="footer">
        <div class="container">
            <div class="row fc">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="footer_copyright">
                        <p>&copy; 2026 PAUD Anak Ceria</p>
                    </div>
                </div>
            </div>
        </div><!--- END CONTAINER -->
    </div>
    <!-- END FOOTER -->


    <!-- Latest jQuery -->
    <script src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
    <!-- Latest compiled and minified Bootstrap -->
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- owl-carousel min js  -->
    <script src="{{ asset('owlcarousel/js/owl.carousel.min.js') }}"></script>
    <!-- jquery-simple-mobilemenu.min -->
    <script src="{{ asset('js/jquery-simple-mobilemenu.js') }}"></script>
    <!-- magnific-popup js -->
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <!-- jquery mixitup min js -->
    <script src="{{ asset('js/jquery.mixitup.js') }}"></script>
    <!-- GSAP AND LOCOMOTIV JS-->
    <script src="{{ asset('js/gsap.min.js') }}"></script>
    <script src="{{ asset('js/ScrollTrigger.min.js') }}"></script>
    <script src="{{ asset('js/lenis.js') }}"></script>
    <!-- scrolltopcontrol js -->
    <script src="{{ asset('js/scrolltopcontrol.js') }}"></script>
    <!-- jquery inview js -->
    <script src="{{ asset('js/jquery.inview.min.js') }}"></script>
    <!-- WOW - Reveal Animations When You Scroll -->
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <!-- scripts js -->
    <script src="{{ asset('js/scripts.js') }}"></script>
</body>

</html>
