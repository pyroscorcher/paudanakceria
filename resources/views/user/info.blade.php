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
    {{-- <section class="section-top">
        <div class="container">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="section-top-title wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.3s"
                    data-wow-offset="0">
                    <h1>Info Pendaftaran</h1>
                </div><!-- //.HERO-TEXT -->
            </div><!--- END COL -->
        </div><!--- END CONTAINER -->
    </section> --}}
    <!-- END SECTION TOP -->
    </div><!-- END  TOP HEADER CLASS -->

    <!-- START ABOUT US HOME ONE -->
    {{-- <section class="ab_two section-padding border-bottom">
        <div class="container">
            <div class="row">
                <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s" data-wow-offset="0">
                    <div class="ab_img">
                        <img src="assets/images/all-img/home-banner.png" class="img-fluid" alt="image">
                        <!-- <div class="wc_year">
       <h3><span>6k+</span> <br />Happy Clients</h3>
      </div> -->
                    </div>
                </div><!--- END COL -->
            </div><!--- END ROW -->
        </div><!--- END CONTAINER -->
    </section> --}}
    <!-- END ABOUT US HOME ONE -->

    <!-- START ABOUT US HOME ONE -->
<section class="ab_one section-padding">
    <div class="section-title">
        <h1>Informasi Pendaftaran</h1>
    </div>

    <div class="container">

        <!-- Persyaratan -->
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay="0.1s"
                data-wow-offset="0">

                <div class="information_box">
                    <div class="sf_top">
                        <h2>Persyaratan Pendaftaran</h2>
                    </div>

                    <p>
                        Untuk mendaftarkan anak di PAUD Anak Ceria,
                        orang tua/wali diminta menyiapkan beberapa dokumen berikut:
                    </p>

                    <ol class="info-list">
                        <li>Fotokopi Akta Kelahiran Anak (1 lembar)</li>
                        <li>Fotokopi Kartu Keluarga (KK) (1 lembar)</li>
                        <li>Fotokopi KTP Orang Tua/Wali (1 lembar)</li>
                        <li>Pas Foto Anak ukuran 3x4 (2 lembar)</li>
                        <li>Mengisi Formulir Pendaftaran yang disediakan oleh sekolah</li>
                        <li>Membayar biaya pendaftaran sesuai ketentuan sekolah</li>
                    </ol>

                    <p class="fw-bold mb-2">Catatan</p>

                    <p>
                        Usia anak minimal 3–5 tahun pada saat pendaftaran.<br>
                        Semua dokumen harus dalam kondisi yang jelas dan dapat dibaca.<br>
                        Semua berkas dapat diserahkan langsung ke sekolah atau diunggah
                        melalui sistem pendaftaran online.
                    </p>
                </div>

            </div>
        </div>

        <!-- Prosedur -->
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay="0.1s"
                data-wow-offset="0">

                <div class="information_box">
                    <div class="sf_top">
                        <h2>Prosedur Pendaftaran</h2>
                    </div>

                    <ol class="info-list">
                        <li>
                            <strong>Mengisi Formulir Pendaftaran</strong><br>
                            Orang tua atau wali mengisi formulir pendaftaran
                            yang tersedia melalui website atau langsung di sekolah.
                        </li>

                        <li>
                            <strong>Mengunggah / Menyerahkan Dokumen</strong><br>
                            Orang tua melengkapi dokumen persyaratan seperti
                            akta kelahiran, kartu keluarga, dan pas foto anak.
                        </li>

                        <li>
                            <strong>Verifikasi Data oleh Sekolah</strong><br>
                            Pihak sekolah akan melakukan pengecekan data
                            dan dokumen yang telah dikirimkan.
                        </li>

                        <li>
                            <strong>Konfirmasi Penerimaan</strong><br>
                            Setelah proses verifikasi selesai, orang tua akan menerima
                            informasi mengenai status penerimaan anak.
                        </li>

                        <li>
                            <strong>Melakukan Pembayaran Administrasi</strong><br>
                            Jika anak dinyatakan diterima, orang tua dapat
                            melanjutkan proses pembayaran administrasi.
                        </li>

                        <li>
                            <strong>Anak Resmi Terdaftar</strong><br>
                            Setelah semua proses selesai, anak resmi terdaftar
                            sebagai peserta didik di PAUD Anak Ceria.
                        </li>
                    </ol>
                </div>

            </div>
        </div>

        <!-- Pendaftaran Ulang -->
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 wow fadeInUp"
                data-wow-duration="1s"
                data-wow-delay="0.1s"
                data-wow-offset="0">

                <div class="information_box">
                    <div class="sf_top">
                        <h2>Pendaftaran Ulang</h2>
                    </div>

                    <p>
                        Pendaftaran ulang dilakukan oleh orang tua/wali
                        untuk memastikan bahwa anak yang telah diterima
                        resmi melanjutkan proses administrasi di
                        PAUD Anak Ceria.
                    </p>

                    <p class="fw-bold mb-2">Prosedur Pendaftaran Ulang</p>

                    <ol class="info-list">
                        <li>
                            <strong>Login ke Sistem Pendaftaran</strong><br>
                            Orang tua/wali masuk ke akun pendaftaran
                            yang telah dibuat sebelumnya.
                        </li>

                        <li>
                            <strong>Memeriksa Data Anak</strong><br>
                            Pastikan data anak dan orang tua sudah benar
                            dan lengkap pada sistem.
                        </li>

                        <li>
                            <strong>Mengunggah Dokumen Tambahan</strong><br>
                            Orang tua dapat mengunggah dokumen tambahan
                            yang diminta oleh pihak sekolah.
                        </li>

                        <li>
                            <strong>Melakukan Pembayaran Administrasi</strong><br>
                            Lakukan pembayaran biaya pendaftaran ulang
                            sesuai informasi dari sekolah.
                        </li>

                        <li>
                            <strong>Konfirmasi Pendaftaran Ulang</strong><br>
                            Setelah pembayaran berhasil, sistem akan menampilkan
                            status bahwa pendaftaran ulang telah selesai.
                        </li>
                    </ol>

                </div>

            </div>
        </div>

    </div>
</section>
    <!-- END ABOUT US HOME ONE -->

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
