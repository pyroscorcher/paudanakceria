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
					<h1>Pendaftaran</h1>
				</div><!-- //.HERO-TEXT -->
			</div><!--- END COL -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END SECTION TOP -->
	</div><!-- END  TOP HEADER CLASS -->


	<!-- START LOGIN AND REGISTER -->
	<section class="login_register section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 col-xs-12">
					<div class="register">
						<h4 class="login_register_title">Formulir Pendaftaran Sekolah</h4>
						<form>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Nama Anak</label>
										<input type="text" id="student-name" class="form-control requiredField input-label"
											name="student_name" placeholder="Masukkan nama anak">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Tanggal Lahir</label>
										<input type="date" id="birth-date" class="form-control requiredField input-label"
											name="birth_date">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Nama Ayah</label>
										<input type="text" id="father-name" class="form-control requiredField input-label"
											name="father_name" placeholder="Masukkan nama ayah">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Nama Ibu</label>
										<input type="text" id="mother-name" class="form-control requiredField input-label"
											name="mother_name" placeholder="Masukkan nama ibu">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Nomor Telepon Orang Tua</label>
										<input type="tel" id="parent-phone" class="form-control requiredField input-label"
											name="phone" placeholder="Masukkan nomor telepon">
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<label for="">Email</label>
										<input type="email" id="contact-email" class="form-control requiredField input-label"
											name="email" placeholder="Masukkan email">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="">Alamat Rumah</label>
								<input type="text" id="address" class="form-control requiredField input-label"
									name="address" placeholder="Masukkan alamat lengkap">
							</div>
							<div class="form-group">
								<label for="">Username</label>
								<input type="text" id="username" class="form-control requiredField input-label"
									name="username" placeholder="Masukkan username">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" id="password" class="form-control requiredField input-label"
									name="password" placeholder="Masukkan password">
							</div>
							<div class="form-group">
								<button class="btn_one" type="submit" name="submit">Daftar Sekarang</button>
							</div>
						</form>
					</div>
				</div><!--- END COL -->
			</div><!--- END ROW -->
		</div><!--- END CONTAINER -->
	</section>
	<!-- END LOGIN AND REGISTER -->

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
