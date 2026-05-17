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

    <!-- START HOME -->
    <section id="home" class="home_bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12 order-2 order-sm-1">
                    <div class="home_content">
                        <h1>A Happy Start for Every Child</h1>
                        <p>Kami percaya awal yang bahagia akan membentuk anak yang percaya diri, mandiri, dan siap
                            menghadapi jenjang pendidikan berikutnya. Bersama orang tua, kami menciptakan lingkungan
                            belajar yang aman dan penuh kasih, agar Ayah dan Bunda merasa tenang mempercayakan tumbuh
                            kembang buah hati kepada kami.
                        </p>
                    </div>
                    <div class="home_btn">
                        <a href="{{ route('user.daftar') }}" class="cta"><span>Daftar Sekarang!</span>
                            <svg width="13px" height="10px" viewBox="0 0 13 10">
                                <path d="M1,5 L11,5"></path>
                                <polyline points="8 1 12 5 8 9"></polyline>
                            </svg>
                        </a>
                    </div>
                </div><!-- END COL-->
                <div class="col-lg-6 col-sm-6 col-xs-12 order-1 order-sm-2">
                    <div class="home_me_img">
                        <img src="{{ asset('images/all-img/home-banner.png') }}" style="border-radius: 15px;"
                            class="img-fluid" alt="" />
                    </div>
                </div><!-- END COL-->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END  HOME -->
    </div>
    <!-- END  TOP HEADER CLASS -->

    <!-- START ABOUT US HOME ONE -->
    <section class="home_bg2 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="home_me_img2">
                        <img src="{{ asset('images/all-img/home-banner2.png') }}" style="border-radius: 15px;"
                            class="img-fluid" alt="image">
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-6 col-sm-8 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="ab_content">
                        <p>Assalamu’alaikum Warahmatullahi Wabarakatuh,

                            Dengan penuh rasa syukur, kami menyambut Ayah dan Bunda di PAUD kami, tempat di mana setiap
                            anak memulai langkah pertamanya dengan bahagia. Kami percaya bahwa masa usia dini adalah
                            fondasi penting dalam membentuk karakter, kemandirian, dan kecintaan terhadap
                            belajar.<br><br>
                            Di sekolah ini, kami menghadirkan lingkungan yang aman, menyenangkan, dan bernuansa Islami,
                            di mana anak-anak dapat belajar sambil bermain, mengeksplorasi potensi diri, serta
                            menumbuhkan akhlak mulia sejak dini. Kami juga berkomitmen untuk menjadi mitra terbaik bagi
                            orang tua dalam mendampingi proses tumbuh kembang buah hati.
                            <br><br>

                            Semoga melalui kebersamaan dan sinergi antara sekolah dan keluarga, kita dapat menciptakan
                            generasi yang cerdas, berkarakter, dan penuh kebaikan.
                            <br><br>
                            Wassalamu’alaikum Warahmatullahi Wabarakatuh..
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END ABOUT US HOME ONE -->

    <!-- START WHY CHOOSE US-->
    <section class="marketing_content_area section-padding">
        <div class="container">

            <div class="section-title">
                <h4>PAUD Anak Ceria</h4>
                <h1>Visi Misi Kami</h1>
            </div>

            <div class="row justify-content-center align-items-stretch">

                <!-- VISI -->
                <div class="col-lg-5 col-sm-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">

                    <div class="single_feature_one h-100">
                        <div class="sf_top">
                            <i class="fa-solid fa-school"></i>
                            <h2>Visi</h2>
                        </div>

                        <p style="text-align: justify;">
                            “Menjadi lembaga PAUD yang membentuk anak usia dini
                            yang ceria, mandiri, kreatif, berakhlak mulia,
                            dan siap belajar sesuai tahap perkembangannya.”
                        </p>
                    </div>

                </div>
                <!-- END VISI -->


                <!-- MISI -->
                <div class="col-lg-5 col-sm-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">

                    <div class="single_feature_one h-100">
                        <div class="sf_top">
                            <i class="fa-solid fa-person-chalkboard"></i>
                            <h2>Misi</h2>
                        </div>

                        <ol style="text-align: left; padding-left: 20px; list-style-type: decimal;">

                            <li style="margin-bottom: 10px;">
                                Menyelenggarakan kegiatan belajar yang menyenangkan,
                                aman, dan ramah anak.
                            </li>

                            <li style="margin-bottom: 10px;">
                                Menanamkan nilai agama, moral,
                                dan karakter positif sejak dini.
                            </li>

                            <li style="margin-bottom: 10px;">
                                Mengembangkan kemampuan anak dalam aspek kognitif,
                                bahasa, motorik, sosial, dan emosional secara seimbang.
                            </li>

                            <li style="margin-bottom: 10px;">
                                Mendorong kreativitas dan rasa percaya diri anak
                                melalui bermain dan eksplorasi.
                            </li>

                            <li style="margin-bottom: 10px;">
                                Menjalin kerja sama yang baik antara sekolah,
                                orang tua, dan masyarakat dalam mendukung tumbuh kembang anak.
                            </li>

                            <li style="margin-bottom: 10px;">
                                Menciptakan lingkungan belajar yang bersih,
                                sehat, dan nyaman bagi anak.
                            </li>

                        </ol>
                    </div>

                </div>
                <!-- END MISI -->

            </div>
            <!-- END ROW -->

        </div>
        <!-- END CONTAINER -->
    </section>
    <!-- END WHY CHOOSE US -->

    <!-- START INSTRUCTOR+FREE COURSE -->
    <section class="insfreecourse section-padding">
        <div class="container">
            <div class="row">
                <div class="section-title-white">
                    <h1>Program Unggulan</h1>
                </div>
                <div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="single_ins">
                        <div class="single_ins_img">
                            <img src="{{ asset('images/all-img/home-program2.png') }}" class="img-fluid"
                                alt="image">
                        </div>
                        <div class="single_ins_content">
                            <h1>Belajar Sambil Bermain</h1>
                            <p>Anak belajar melalui aktivitas kreatif dan menyenangkan, sehingga mereka lebih mudah
                                memahami konsep dasar tanpa merasa terbebani.</p>
                        </div>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="single_ins">
                        <div class="single_ins_img">
                            <img src="{{ asset('images/all-img/home-program3.png') }}" class="img-fluid"
                                alt="image">
                        </div>
                        <div class="single_ins_content">
                            <h1>Tahfidz & Pembiasaan Islami</h1>
                            <p>Mengenalkan nilai-nilai Islam sejak dini melalui hafalan surat pendek, doa harian, dan
                                pembiasaan akhlak mulia dalam keseharian.</p>
                        </div>
                    </div>
                </div><!--- END COL -->
                <div class="col-lg-4 col-sm-12 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="single_ins">
                        <div class="single_ins_img">
                            <img src="{{ asset('images/all-img/home-program1.png') }}" class="img-fluid"
                                alt="image">
                        </div>
                        <div class="single_ins_content">
                            <h1>Kelas Kreativitas & Seni</h1>
                            <p>Mengembangkan imajinasi dan motorik halus anak melalui kegiatan menggambar, mewarnai,
                                kerajinan tangan, dan seni pertunjukan.</p>
                        </div>
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section>
    <!-- END INSTRUCTOR+FREE COURSE -->

    <!-- START BLOG -->
    <section id="blog" class="blog_area section-padding">
        <div class="container">
            <div class="section-title">
                <h1>Kabar Terbaru</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp d-flex" data-wow-duration="1s"
                    data-wow-delay="0.1s" data-wow-offset="0">
                    <div class="single_blog">
                        <div class="single_blog_img">
                            <img src="{{ asset('images/all-img/home-program1.png') }}" class="img-fluid"
                                alt="image" />
                        </div>
                        <div class="content_box">
                            <h2><a href="/user/news">Kegiatan Mewarnai untuk Mengasah Kreativitas Anak</a></h2>
                            <p>Anak-anak PAUD Anak Ceria mengikuti kegiatan mewarnai bersama di kelas. Melalui aktivitas
                                ini, anak-anak belajar mengenal warna, melatih motorik halus, serta mengekspresikan
                                imajinasi mereka dengan cara yang menyenangkan. Suasana kelas penuh dengan keceriaan dan
                                kreativitas.
                            </p>
                            <p>12 Mei 2026</p>
                        </div>
                    </div>
                </div><!-- END COL-->
                <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp d-flex" data-wow-duration="1s"
                    data-wow-delay="0.1s" data-wow-offset="0">
                    <div class="single_blog">
                        <div class="single_blog_img">
                        <img src="{{ asset('images/all-img/home-kabar1.png') }}" class="img-fluid" alt="image" />
                        </div>
                        <div class="content_box">
                            <h2><a href="/user/news">Belajar Mengenal Tanaman Melalui Kegiatan Menanam</a></h2>
                            <p>Dalam kegiatan pembelajaran minggu ini, anak-anak diajak menanam tanaman di halaman
                                sekolah. Anak-anak belajar mengenal bagian tanaman, cara merawatnya, serta pentingnya
                                menjaga lingkungan. Kegiatan ini membantu anak belajar sambil bermain di alam terbuka.
                            </p>
                            <p>5 Mei 2026</p>
                        </div>
                    </div>
                </div><!-- END COL-->
                <div class="col-lg-4 col-sm-4 col-xs-12 wow fadeInUp d-flex" data-wow-duration="1s"
                    data-wow-delay="0.3s" data-wow-offset="0">
                    <div class="single_blog">
                        <div class="single_blog_img">
                        <img src="{{ asset('images/all-img/home-kabar2.png') }}" class="img-fluid" alt="image" />
                        </div>
                        <div class="content_box">
                            <h2><a href="/user/news">Perayaan Hari Kartini di PAUD Anak Ceria </a></h2>
                            <p>PAUD Anak Ceria merayakan Hari Kartini dengan kegiatan mengenakan pakaian adat dan
                                berbagai aktivitas seru. Anak-anak belajar mengenal budaya Indonesia sekaligus
                                meningkatkan rasa percaya diri saat tampil di depan teman-temannya.</p>
                            <p>3 Mei 2026</p>
                        </div><!--- END Col -->
                    </div>
                </div>
            </div><!-- END COL-->
        </div><!-- / END ROW -->
        </div><!-- END CONTAINER  -->
    </section>
    <!-- END BLOG -->

    <section id="gallery" class="gallery_area section-padding">
        <div class="container">
            <div class="section-title">
                <h1>Galeri Kegiatan</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s"
                    data-wow-offset="0">
                    <div class="single_gallery">
                        <img src="{{ asset('images/all-img/home-program1.png') }}" class="img-fluid" alt="image" />
                    </div>
                </div><!-- END COL-->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s"
                    data-wow-offset="0">
                    <div class="single_gallery">
                        <img src="{{ asset('images/all-img/home-program2.png') }}" class="img-fluid" alt="image" />
                    </div>
                </div><!-- END COL-->
                <div class="col-lg-4 col-sm-6 col-xs-12 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s"
                    data-wow-offset="0">
                    <div class="single_gallery">
                        <img src="{{ asset('images/all-img/home-program3.png') }}" class="img-fluid" alt="image" />
                    </div>
                </div><!-- END COL-->
            </div><!-- END ROW -->
        </div><!-- END CONTAINER -->
        </section>>



    <!-- START FOOTER -->
    <div class="footer">
        <div class="container">
            <div class="row fc">
                <div class="col-lg-3 col-sm-6 col-xs-12">
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
