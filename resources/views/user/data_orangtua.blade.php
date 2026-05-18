<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Dashboard - Data Orang Tua</title>

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
    @include('components.side_navbar', ['side_navbar' => $side_navbar ?? 'Slide Menu'])
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
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->

                <!-- ========== form-elements-wrapper start ========== -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Pembaruan dibatalkan!</strong> Silakan periksa kesalahan berikut:
                        <ul class="mb-0 mt-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('user.data_orangtua.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="card-style mb-4">
                        <h4 class="mb-3">Data Ayah Kandung</h4>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nama Ayah</label>
                                    <input type="text" placeholder="Nama Lengkap Ayah" value="{{ old('nama_ayah', $user->orangtua->nama_ayah ?? '') }}" name="nama_ayah">
                                    @error('nama_ayah') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Tahun Lahir Ayah</label>
                                    <input type="text" placeholder="YYYY" value="{{ old('tahun_lahir_ayah', $user->orangtua->tahun_lahir_ayah ?? '') }}" name="tahun_lahir_ayah" min="1900" max="{{ date('Y') }}">
                                    @error('tahun_lahir_ayah') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Pendidikan Ayah</label>
                                    <input type="text" placeholder="Pendidikan Terakhir" value="{{ old('pendidikan_ayah', $user->orangtua->pendidikan_ayah ?? '') }}" name="pendidikan_ayah">
                                    @error('pendidikan_ayah') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Pekerjaan Ayah</label>
                                    <input type="text" placeholder="Pekerjaan" value="{{ old('pekerjaan_ayah', $user->orangtua->pekerjaan_ayah ?? '') }}" name="pekerjaan_ayah">
                                    @error('pekerjaan_ayah') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Penghasilan Ayah (Per Bulan)</label>
                                    <input type="text" placeholder="Nominal Penghasilan" value="{{ old('penghasilan_ayah', $user->orangtua->penghasilan_ayah ?? '') }}" name="penghasilan_ayah" min="0">
                                    @error('penghasilan_ayah') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-style mb-4">
                        <h4 class="mb-3">Data Ibu Kandung</h4>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nama Ibu</label>
                                    <input type="text" placeholder="Nama Lengkap Ibu" value="{{ old('nama_ibu', $user->orangtua->nama_ibu ?? '') }}" name="nama_ibu">
                                    @error('nama_ibu') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Tahun Lahir Ibu</label>
                                    <input type="text" placeholder="YYYY" value="{{ old('tahun_lahir_ibu', $user->orangtua->tahun_lahir_ibu ?? '') }}" name="tahun_lahir_ibu" min="1900" max="{{ date('Y') }}">
                                    @error('tahun_lahir_ibu') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Pendidikan Ibu</label>
                                    <input type="text" placeholder="Pendidikan Terakhir" value="{{ old('pendidikan_ibu', $user->orangtua->pendidikan_ibu ?? '') }}" name="pendidikan_ibu">
                                    @error('pendidikan_ibu') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Pekerjaan Ibu</label>
                                    <input type="text" placeholder="Pekerjaan" value="{{ old('pekerjaan_ibu', $user->orangtua->pekerjaan_ibu ?? '') }}" name="pekerjaan_ibu">
                                    @error('pekerjaan_ibu') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Penghasilan Ibu (Per Bulan)</label>
                                    <input type="text" placeholder="Nominal Penghasilan" value="{{ old('penghasilan_ibu', $user->orangtua->penghasilan_ibu ?? '') }}" name="penghasilan_ibu" min="0">
                                    @error('penghasilan_ibu') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-style mb-2">
                        <h4 class="mb-3">Data Wali (Opsional)</h4>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nama Wali</label>
                                    <input type="text" placeholder="Nama Lengkap Wali" value="{{ old('nama_wali', $user->orangtua->nama_wali ?? '') }}" name="nama_wali">
                                    @error('nama_wali') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Tahun Lahir Wali</label>
                                    <input type="text" placeholder="YYYY" value="{{ old('tahun_lahir_wali', $user->orangtua->tahun_lahir_wali ?? '') }}" name="tahun_lahir_wali" min="1900" max="{{ date('Y') }}">
                                    @error('tahun_lahir_wali') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Pendidikan Wali</label>
                                    <input type="text" placeholder="Pendidikan Terakhir" value="{{ old('pendidikan_wali', $user->orangtua->pendidikan_wali ?? '') }}" name="pendidikan_wali">
                                    @error('pendidikan_wali') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Pekerjaan Wali</label>
                                    <input type="text" placeholder="Pekerjaan" value="{{ old('pekerjaan_wali', $user->orangtua->pekerjaan_wali ?? '') }}" name="pekerjaan_wali">
                                    @error('pekerjaan_wali') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Penghasilan Wali (Per Bulan)</label>
                                    <input type="text" placeholder="Nominal Penghasilan" value="{{ old('penghasilan_wali', $user->orangtua->penghasilan_wali ?? '') }}" name="penghasilan_wali" min="0">
                                    @error('penghasilan_wali') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="button-size mt-4">
                                <button type="submit" class="main-btn primary-btn-outline btn-hover">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
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
</body>

</html>
