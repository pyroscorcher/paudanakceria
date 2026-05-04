<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
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
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('components.header_dashboard', ['header_dashboard' => $header_dashboard])
        <!-- ========== header end ========== -->

        <!-- ========== tab components start ========== -->
        <section class="tab-components">
            <div class="container-fluid">
                <!-- ========== title-wrapper start ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>Data Orang Tua</h2>
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
                                        <li class="breadcrumb-item"><a href="#0">Forms</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">
                                            Form Elements
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

                <!-- ========== form-elements-wrapper start ========== -->
                <div class="card-style mb-2">
                    <div class="row g-2">

                        <!-- Nama Orang Tua -->
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>Nama Orang Tua</label>
                                <input type="text" name="nama_ortu" placeholder="Nama Orang Tua">
                            </div>
                        </div>

                        <!-- NIK -->
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>NIK</label>
                                <input type="text" name="nik" placeholder="NIK">
                            </div>
                        </div>

                        <!-- Pekerjaan -->
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>Pekerjaan</label>
                                <input type="text" name="pekerjaan" placeholder="Pekerjaan">
                            </div>
                        </div>

                        <!-- No HP -->
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>No HP</label>
                                <input type="text" name="no_hp" placeholder="08xxxxxxxxxx">
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6">
                            <div class="input-style-1">
                                <label>Email</label>
                                <input type="email" name="email" placeholder="email@gmail.com">
                            </div>
                        </div>

                        <!-- Alamat (FULL WIDTH) -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label>Alamat</label>
                                <textarea name="alamat" rows="3" placeholder="Alamat lengkap"></textarea>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ========== form-elements-wrapper end ========== -->
            </div>
            <!-- end container -->
        </section>
        <!-- ========== tab components end ========== -->

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
