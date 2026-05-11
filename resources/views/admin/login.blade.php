<!DOCTYPE html>
<html lang="en">

<head>

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
        <title>Login Admin - PAUD Anak Ceria</title>
        <!-- Latest Bootstrap min CSS -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap"
            rel="stylesheet">
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
</head>

<body>

    {{-- <h2>Login Admin</h2>

    @if (session('error'))
        <p style="color:red;">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        @csrf

        <label>Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Login</button>
    </form> --}}

    <section class="login_register_admin section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-xs-12">
                    <div class="login">
                        <h4 class="login_register_title">Login Admin</h4>

                        @if (session('error'))
                            <p style="color:red;">{{ session('error') }}</p>
                        @endif

                        <form method="POST" action="{{ route('admin.login.submit') }}">

                            @csrf

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" class="form-control requiredField input-label"
                                    name="username" value="{{ old('username') }}" required autofocus>

                                @error('username')
                                    <span class="text-danger" style="color:red; font-size: 0.875em;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" class="form-control requiredField input-label"
                                    name="password" required>

                                @error('password')
                                    <span class="text-danger" style="color:red; font-size: 0.875em;">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-lg-12">
                                <button class="btn_one" type="submit" name="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


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
