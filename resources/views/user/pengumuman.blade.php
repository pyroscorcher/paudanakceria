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

    <div class="preloaders">
        <span class="loader">Loading</span>
    </div>

    <!-- END PRELOADER -->

    @include('components.navbar', ['navbar' => $navbar])

    <!-- START SECTION TOP -->
    <section class="section-top">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
                    data-wow-offset="0">
                    <h1>Berita</h1>
                </div><!-- //.HERO-TEXT -->
            </div><!--- END COL -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END SECTION TOP -->
    </div><!-- END  TOP HEADER CLASS -->

    <!--START COURSE -->
    <section id="blog" class="blog_area section-padding">
        <div class="container">
            <div class="row">
                @forelse($all_news as $item)
                    <!-- Dynamic News Block -->
                    <div class="col-lg-3 col-sm-4 col-xs-12 wow fadeInUp d-flex mb-4" data-wow-duration="1s" data-wow-delay="0.1s" data-wow-offset="0">
                        <div class="single_blog_news d-flex flex-column w-100">
                            <div class="single_blog_img single_blog_img_news">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="img-fluid" alt="{{ $item->title }}" style="width: 100%; height: 220px; object-fit: cover;" />
                                @else
                                    <!-- Fallback image if a news post does not have an uploaded picture -->
                                    <img src="{{ asset('images/all-img/home-program1.png') }}" class="img-fluid" alt="default image" style="width: 100%; height: 220px; object-fit: cover;" />
                                @endif
                            </div>
                            <div class="content_box flex-grow-1 d-flex flex-column justify-content-between">
                                <div>
                                    <h2><a href="{{ route('user.news.detail', ['id' => $item->id]) }}">{{ $item->title }}</a></h2>
                                    <p>{{ Str::limit($item->content, 150, '...') }}</p>
                                </div>

                                <!-- Automatically outputs localized Indonesian dates (e.g., 18 Mei 2026) -->
                                <p class="mt-3 pt-3 text-muted border-top" style="font-size: 0.85em;">
                                    {{ $item->created_at->locale('id')->translatedFormat('d F Y') }}
                                </p>
                            </div>
                        </div>
                    </div><!-- END COL-->
                @empty
                    <!-- Fallback display if the database is clean/empty -->
                    <div class="col-12 text-center text-muted py-5">
                        <p>Belum ada kabar terbaru atau berita yang diterbitkan.</p>
                    </div>
                @endforelse
            </div><!-- / END ROW -->
        </div><!-- END CONTAINER  -->
    </section>
    </div>
    <!--END COURSE -->


    <!-- START FOOTER -->
    @include('components.footer', ['footer' => $footer])

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
