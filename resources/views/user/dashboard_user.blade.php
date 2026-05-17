<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }} type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Dashboard - Menu Utama</title>

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

                <!-- ========== Title Wrapper ========== -->
                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2>Dashboard Orang Tua</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ========== End Title Wrapper ========== -->


                <!-- ========== Welcome Card ========== -->
                <div class="card-style mb-30">
                    <div class="row align-items-center">
                        <div class="col-lg-8">
                            <div class="welcome-content">
                                <h3 class="mb-2">Selamat Datang, Orang Tua/Wali {{ Auth::user()->name ?? 'User' }}👋
                                </h3>
                                <p class="text-medium">
                                    Pantau informasi pendaftaran, perkembangan data siswa,
                                    serta pengumuman terbaru melalui dashboard ini.
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-4 text-lg-end mt-3 mt-lg-0">
                            <a href="#" class="main-btn primary-btn btn-hover">
                                Lihat Status Pendaftaran
                            </a>
                        </div>
                    </div>
                </div>
                <!-- ========== End Welcome Card ========== -->


                <!-- ========== Info Cards ========== -->
                <div class="row">
                    <!-- Pengumuman -->
                    <div class="col-xl-6 col-md-6">
                        <div class="card-style mb-30">
                            <h6 class="mb-3">Pengumuman</h6>

                            <ul class="list-unstyled">
                                <li class="mb-2">
                                    Jadwal verifikasi berkas dimulai tanggal 15 Mei 2026.
                                </li>

                                <li class="mb-2">
                                    Pastikan data periodik siswa telah lengkap.
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Informasi Anak -->
                    <div class="col-xl-6 col-md-6">
                        <div class="card-style mb-30">
                            <h6 class="mb-3">Data Siswa</h6>
                            <table class="table table-sm table-borderless mb-0">
                                <tbody>
                                    <tr>
                                        <td class="fw-bold py-1" style="width: 150px;">Nama</td>
                                        <td class="py-1">: {{ Auth::user()->name ?? 'User' }}</td>
                                    </tr>
                                    <tr>
                                        <td class="fw-bold py-1">NISN</td>
                                        <td class="py-1">: {{ Auth::user()->nisn ?? '-' }}</td>
                                    </tr>
                                    
                                    @if ($enrollment)
                                        <tr>
                                            <td class="fw-bold py-1">Status Verifikasi</td>
                                            <td class="py-1">
                                                : 
                                                @if ($enrollment->status == 'Diterima')
                                                    <span class="badge bg-success">Diterima</span>
                                                @elseif($enrollment->status == 'Menunggu')
                                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                                @elseif($enrollment->status == 'Ditolak')
                                                    <span class="badge bg-danger">Ditolak</span>
                                                @else
                                                    <span class="badge bg-secondary">{{ $enrollment->status }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td class="fw-bold py-1">Status Verifikasi</td>
                                            <td class="py-1">: <span class="badge bg-secondary">Belum Melengkapi Pendaftaran</span></td>
                                        </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
</div>
                <!-- ========== End Info Cards ========== -->


                <!-- ========== Timeline / Progress ========== -->
                <div class="card-style mb-30">
                    <h5 class="mb-25">Progress Pendaftaran</h5>

                    <div class="row text-center d-flex">

                        <div class="col">
                            <div class="border rounded p-3">
                                <h6>1</h6>
                                <p class="text-sm">Isi Formulir</p>
                                <ol class="custom-bar">
                                    <li class="is-active"><span>Data Anak</span></li>
                                    <li><span>Data Orang Tua</span></li>
                                    <li><span>Data Periodik</span></li>
                                    <li><span>Data Prestasi</span></li>
                                </ol>
                            </div>
                        </div>

                        <div class="col">
                            <div class="border rounded p-3">
                                <h6>2</h6>
                                <p class="text-sm">Upload Dokumen</p>

                                <ol class="custom-bar two-step">
                                    <li class="is-active">
                                        <span>Belum</span>
                                    </li>

                                    <li>
                                        <span>Sudah</span>
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <div class="col">
                            <div class="border rounded p-3">
                                <h6>3</h6>
                                <p class="text-sm">Verifikasi</p>
                                <ol class="custom-bar two-step">
                                    <li class="is-active">
                                        <span>Belum</span>
                                    </li>

                                    <li>
                                        <span>Sudah</span>
                                    </li>
                                </ol>
                            </div>
                        </div>

                        <div class="col">
                            <div class="border rounded p-3">
                                <h6>4</h6>
                                <p class="text-sm">Selesai</p>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- ========== End Timeline ========== -->


            </div>
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmLogout() {

            Swal.fire({
                title: 'Keluar?',
                text: 'Anda yakin ingin keluar dashboard?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, Keluar',
                confirmButtonColor: '#009CE0',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            });
        }
    </script>

</body>

</html>
