<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Dashboard - Data Anak</title>

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
                                <h2>Data Anak</h2>
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
                                        <li class="breadcrumb-item"><a href="#0">Data Anak</a></li>
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
                <form action="{{ route('user.data_anak.update') }}" method="POST">
                    @csrf
                    @method('PUT') <!-- Spoofs the PUT method for RESTful updates -->

                    <div class="card-style mb-2">
                        <div class="row g-2">

                            <!-- Full Name -->
                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nama Lengkap</label>
                                    <input type="text" placeholder="Nama Lengkap" value="{{ old('nama_lengkap', $dataAnak->nama_lengkap ?? '') }}" name="nama_lengkap" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="select-style-1">
                                    <label>Jenis Kelamin</label>
                                    <div class="select-position">
                                        <select name="jenis_kelamin" required>
                                            <option value="" disabled selected>Pilih jenis kelamin</option>
                                            <option value="L" {{ old('jenis_kelamin', $dataAnak->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>Laki - Laki</option>
                                            <option value="P" {{ old('jenis_kelamin', $dataAnak->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>NISN</label>
                                    <input type="text" placeholder="NISN" value="{{ old('nisn', $dataAnak->nisn ?? '') }}" name="nisn" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>NIS</label>
                                    <input type="text" placeholder="NIS" value="{{ old('nis', $dataAnak->nis ?? '') }}" name="nis" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" placeholder="Tanggal Lahir" value="{{ old('tanggal_lahir', $dataAnak->tanggal_lahir ?? '') }}" name="tanggal_lahir" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor Seri Ijazah</label>
                                    <input type="text" placeholder="*Data dari jenjang sebelumnya" value="{{ old('nomorseriijazah', $dataAnak->nomor_seri_ijazah ?? '') }}" name="nomor_seri_ijazah">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor Seri SKHUN</label>
                                    <input type="text" placeholder="*Data dari jenjang sebelumnya" value="{{ old('nomorseriskhun', $dataAnak->nomor_seri_skhun ?? '') }}" name="nomor_seri_skhun">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor Seri UN</label>
                                    <input type="text" placeholder="*Data dari jenjang sebelumnya" value="{{ old('nomorseriun', $dataAnak->nomor_seri_un ?? '') }}" name="nomor_seri_un">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>NIK</label>
                                    <input type="text" placeholder="Nomor Induk Kependudukan" value="{{ old('nik', $dataAnak->nik ?? '') }}" name="nik" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>NPSN Sekolah Asal</label>
                                    <input type="text" placeholder="*Data dari jenjang sebelumnya" value="{{ old('npsn', $dataAnak->npsn_sekolah_asal ?? '') }}" name="npsn_sekolah_asal">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nama Sekolah Asal</label>
                                    <input type="text" placeholder="*Data dari jenjang sebelumnya" value="{{ old('asal_sekolah', $dataAnak->nama_sekolah_asal ?? '') }}" name="nama_sekolah_asal">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Agama</label>
                                    <input type="text" placeholder="Agama" value="{{ old('agama', $dataAnak->agama ?? '') }}" name="agama">
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Alamat</label>
                                    <textarea rows="4" placeholder="Alamat">{{ old('alamat_rumah', $dataAnak->alamat ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Kebutuhan Khusus</label>
                                    <input type="text" placeholder="Kebutuhan Khusus (isi jika ada)" value="{{ old('kebutuhankhusus', $dataAnak->kebutuhan_khusus ?? '') }}" name="kebutuhan_khusus">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Transportasi</label>
                                    <input type="text" placeholder="Transportasi yang digunakan untuk ke sekolah" value="{{ old('transportasi', $dataAnak->transportasi ?? '') }}" name="transportasi">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor Telepon</label>
                                    <input type="text" placeholder="Nomor Telepon" value="{{ old('telp', $dataAnak->nomor_telepon ?? '') }}" name="nomor_telepon">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Email Pribadi</label>
                                    <input type="email" placeholder="Email Pribadi" value="{{ old('emailpribadi', $dataAnak->email ?? '') }}" name="email">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor KKS</label>
                                    <input type="text" placeholder="Nomor Kartu Keluarga Sejahtera (isi jika penerima)" value="{{ old('kks', $dataAnak->nomor_kks ?? '') }}" name="nomor_kks">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor KPS</label>
                                    <input type="text" placeholder="Nomor Kartu Perlindungan Sosial (isi jika penerima)" value="{{ old('kps', $dataAnak->nomor_kps ?? '') }}" name="nomor_kps">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor KIP</label>
                                    <input type="text" placeholder="Nomor Kartu Indonesia Pintar (isi jika penerima)" value="{{ old('kip', $dataAnak->nomor_kip ?? '') }}" name="nomor_kip">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Lintang</label>
                                    <input type="text" placeholder="Lintang (koordinat lokasi rumah)" value="{{ old('lintang', $dataAnak->lintang ?? '') }}" name="lintang">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Bujur</label>
                                    <input type="text" placeholder="Bujur (koordinat lokasi rumah)" value="{{ old('bujur', $dataAnak->bujur ?? '') }}" name="bujur">
                                </div>
                            </div>

                            

                            <!-- Message (FULL WIDTH / “satu lajur”) -->
                            {{-- <div class="col-12">

                                <div class="input-style-1">
                                    <label>Message</label>
                                    <textarea rows="4" placeholder="Message"></textarea>
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="checkbox" id="checkbox-1" class="form-check-input">
                                    <label for="checkbox-1" class="form-check-label">
                                        Default Checkbox
                                    </label>
                                </div>
                            </div>

                            <!-- Radio -->
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input type="radio" id="radio-1" class="form-check-input">
                                    <label for="radio-1" class="form-check-label">
                                        Default Radio
                                    </label>
                                </div>
                            </div> --}}

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
