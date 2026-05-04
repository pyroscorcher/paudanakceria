<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }} type="image/x-icon" />
    <title>PlainAdmin Demo | Bootstrap 5 Admin Template</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body>
    <!-- ======== Preloader =========== -->
    {{-- <div id="preloader">
        <div class="spinner"></div>
    </div> --}}
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    @include('components.side_navbar', ['side_navbar' => $side_navbar])
    <!-- ======== sidebar-nav end =========== -->
    <div class="overlay"></div>

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('components.header_dashboard', ['header_dashboard' => $header_dashboard])
        <!-- ========== header end ========== -->

        <!-- ========== section start ========== -->
        <section class="section">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>eCommerce Dashboard</h2>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <div class="breadcrumb-wrapper">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#0">Dashboard</a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            eCommerce
                                        </li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon purple">
                                <i class="lni lni-cart-full"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New Orders</h6>
                                <h3 class="text-bold mb-10">34567</h3>
                                <p class="text-sm text-success">
                                    <i class="lni lni-arrow-up"></i> +2.00%
                                    <span class="text-gray">(30 days)</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon success">
                                <i class="lni lni-dollar"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Total Income</h6>
                                <h3 class="text-bold mb-10">$74,567</h3>
                                <p class="text-sm text-success">
                                    <i class="lni lni-arrow-up"></i> +5.45%
                                    <span class="text-gray">Increased</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon primary">
                                <i class="lni lni-credit-cards"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">Total Expense</h6>
                                <h3 class="text-bold mb-10">$24,567</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> -2.00%
                                    <span class="text-gray">Expense</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="icon-card mb-30">
                            <div class="icon orange">
                                <i class="lni lni-user"></i>
                            </div>
                            <div class="content">
                                <h6 class="mb-10">New User</h6>
                                <h3 class="text-bold mb-10">34567</h3>
                                <p class="text-sm text-danger">
                                    <i class="lni lni-arrow-down"></i> -25.00%
                                    <span class="text-gray"> Earning</span>
                                </p>
                            </div>
                        </div>
                        <!-- End Icon Cart -->
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== section end ========== -->

        <!-- ========== footer start =========== -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 order-last order-md-first">
                        <div class="copyright text-center text-md-start">
                            <p class="text-sm">
                                PAUD Anak Ceria
                            </p>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </footer>
        <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/dynamic-pie-chart.js') }}"></script>
    <script src="{{ asset('assets/js/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('assets/js/jvectormap.min.js') }}"></script>
    <script src="{{ asset('assets/js/world-merc.js') }}"></script>
    <script src="{{ asset('assets/js/polyfill.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
