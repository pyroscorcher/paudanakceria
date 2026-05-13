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
    <section class="section-top">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
                    data-wow-offset="0">
                    <h1>Single Blog</h1>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li> / Single Blog</li>
                    </ul>
                </div><!-- //.HERO-TEXT -->
            </div><!--- END COL -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END SECTION TOP -->
    </div><!-- END  TOP HEADER CLASS -->

    <!-- START BLOG -->
    <section class="blog-page section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-12 col-xs-12">
                    <div class="arti_single">
                        <div class="arti_img_two">
                            <img src="{{ asset('images/all-img/home-program1.png') }}" class="img-fluid"
                            alt="image" />
                        </div>
                        <div class="arti_content ">
                            <p>I almost couldn’t believe it was real! For my first test I had generate some website copy
                                for me. I provided about 50 words to describe my business along with my business name.
                                generated two variants of copy each with several paragraphs of professional sounding
                                copy. I immediately shared the results with a friend who couldn’t believe it was written
                                by an AI. is worth every Yaley and then some. Describe my business along with my
                                business name. generated two variants of copy each with several paragraphs of
                                professional sounding copy. I immediately shared the results with a friend who couldn’t
                                believe it was written by an AI. is worth every Yaley and then some!</p>
                        </div>
                        <div class="arti_sp">
                            <h2>Enhancing Your E-commerce Store With AI Writing Assistants</h2>
                            <img src="assets/images/blog/1.png" class="img-fluid" alt="Blog image" />
                            <p>I immediately shared the results with a friend who couldn’t believe it was written by an
                                AI. is worth every Yaley and then some. Describe my business along with my business
                                name. generated two variants of copy each with several paragraphs of professional
                                sounding copy. I immediately shared the results with a friend who couldn’t believe it
                                was written by an AI. is worth every Yaley and then some!</p>
                        </div>
                    </div><!-- END ARTI SINGLE  -->
                </div><!-- END COL-->
                <div class="col-lg-5 col-sm-12 col-xs-12">
                    <div class="sidebar-post">
                        <div class="sidebar_title">
                            <h4>Popular post</h4>
                        </div>
                        <div class="single_popular">
                            <a href="single_blog.html"><img src="assets/images/blog/blog-1.png" alt="" /></a>
                            <h5><a href="single_blog.html">Supercharging Your SEO Game with AI Writing Assistants</a>
                            </h5>
                        </div><!-- END SINGLE POPULAR POST -->
                        <div class="single_popular">
                            <a href="single_blog.html"><img src="assets/images/blog/blog-2.png" alt="" /></a>
                            <h5><a href="single_blog.html">AI Writing Assistants and the Future of Content
                                    Marketing</a>
                            </h5>
                        </div><!-- END SINGLE POPULAR POST -->
                        <div class="single_popular">
                            <a href="single_blog.html"><img src="assets/images/blog/blog-3.png" alt="" /></a>
                            <h5><a href="single_blog.html">Enhancing Your E-commerce Store With AI Writing
                                    Assistants.</a></h5>
                        </div><!-- END SINGLE POPULAR POST -->
                        <div class="single_popular">
                            <a href="single_blog.html"><img src="assets/images/blog/blog-4.png" alt="" /></a>
                            <h5><a href="single_blog.html">Building your content strategy cannot get easier than
                                    this.</a></h5>
                        </div><!-- END SINGLE POPULAR POST -->
                        <div class="single_popular">
                            <a href="single_blog.html"><img src="assets/images/blog/blog-5.png" alt="" /></a>
                            <h5><a href="single_blog.html">This is the only read you would need before sitting down to
                                    prepare</a></h5>
                        </div><!-- END SINGLE POPULAR POST -->
                    </div><!-- END SIDEBAR POST -->
                </div><!--- END COL -->
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
