<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
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
    @include('components.side_navbar', ['side_navbar' => $side_navbar ?? []])
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
        <!-- ========== header start ========== -->
        @include('components.header_dashboard', ['header_dashboard' => $header_dashboard ?? []])
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
                        <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- ========== title-wrapper end ========== -->

                <!-- ========== form-elements-wrapper start ========== -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Pembaruan dibatalkan!</strong> Silakan periksa kesalahan berikut:
                        <ul class="mb-0 mt-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form action="{{ route('user.data_anak.update') }}" method="POST">
                    @csrf
                    @method('PUT')


                    <div class="card-style mb-2">
                        <div class="row g-2">

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nama Lengkap</label>
                                    <input type="text" placeholder="Nama Lengkap"
                                        value="{{ old('name', $user->name ?? '') }}" name="name" required>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="select-style-1">
                                    <label>Jenis Kelamin</label>
                                    <div class="select-position">
                                        <select name="jenis_kelamin" required>
                                            <option value="" disabled
                                                {{ empty($user->jenis_kelamin) ? 'selected' : '' }}>Pilih jenis kelamin
                                            </option>
                                            <option value="L"
                                                {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'L' ? 'selected' : '' }}>
                                                Laki - Laki</option>
                                            <option value="P"
                                                {{ old('jenis_kelamin', $user->jenis_kelamin ?? '') == 'P' ? 'selected' : '' }}>
                                                Perempuan</option>
                                        </select>
                                    </div>
                                    @error('jenis_kelamin')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>NISN</label>
                                    <input type="text" placeholder="NISN"
                                        value="{{ old('nisn', $user->nisn ?? '') }}" name="nisn" required>
                                    @error('nisn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>NIS</label>
                                    <input type="text" placeholder="NIS" value="{{ old('nis', $user->nis ?? '') }}"
                                        name="nis">
                                    @error('nis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Tempat Lahir</label>
                                    <input type="text" placeholder="Tempat Lahir"
                                        value="{{ old('tempatlahir', $user->tempatlahir ?? '') }}" name="tempatlahir">
                                    @error('tempatlahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" placeholder="Tanggal Lahir"
                                        value="{{ old('tanggal_lahir', $user->tanggal_lahir ?? '') }}"
                                        name="tanggal_lahir" required>
                                    @error('tanggal_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor Seri Ijazah</label>
                                    <input type="text" placeholder="*Data dari jenjang sebelumnya"
                                        value="{{ old('nomorseriijazah', $user->nomorseriijazah ?? '') }}"
                                        name="nomorseriijazah">
                                    @error('nomorseriijazah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>NIK</label>
                                    <input type="text" placeholder="Nomor Induk Kependudukan"
                                        value="{{ old('nik', $user->nik ?? '') }}" name="nik">
                                    @error('nik')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>NPSN Sekolah Asal</label>
                                    <input type="text" placeholder="*Data dari jenjang sebelumnya"
                                        value="{{ old('npsn', $user->npsn ?? '') }}" name="npsn">
                                    @error('npsn')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nama Sekolah Asal</label>
                                    <input type="text" placeholder="*Data dari jenjang sebelumnya"
                                        value="{{ old('asal_sekolah', $user->asal_sekolah ?? '') }}"
                                        name="asal_sekolah">
                                    @error('asal_sekolah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Agama</label>
                                    <input type="text" placeholder="Agama"
                                        value="{{ old('agama', $user->agama ?? '') }}" name="agama">
                                    @error('agama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Kebutuhan Khusus</label>
                                    <input type="text" placeholder="Kebutuhan Khusus (isi jika ada)"
                                        value="{{ old('kebutuhankhusus', $user->kebutuhankhusus ?? '') }}"
                                        name="kebutuhankhusus">
                                    @error('kebutuhankhusus')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="input-style-1">
                                    <label>Alamat</label>
                                    <textarea name="alamat_rumah" rows="4" placeholder="Alamat">{{ old('alamat_rumah', $user->alamat_rumah ?? '') }}</textarea>
                                    @error('alamat_rumah')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Transportasi</label>
                                    <input type="text" placeholder="Transportasi yang digunakan untuk ke sekolah"
                                        value="{{ old('transportasi', $user->transportasi ?? '') }}"
                                        name="transportasi">
                                    @error('transportasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor Telepon</label>
                                    <input type="text" placeholder="Nomor Telepon"
                                        value="{{ old('telp', $user->telp ?? '') }}" name="telp">
                                    @error('telp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Email Pribadi</label>
                                    <input type="text" placeholder="Email Pribadi"
                                        value="{{ old('emailpribadi', $user->emailpribadi ?? '') }}"
                                        name="emailpribadi">
                                    @error('emailpribadi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor KKS</label>
                                    <input type="text"
                                        placeholder="Nomor Kartu Keluarga Sejahtera (isi jika penerima)"
                                        value="{{ old('kks', $user->kks ?? '') }}" name="kks">
                                    @error('kks')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor KPS</label>
                                    <input type="text"
                                        placeholder="Nomor Kartu Perlindungan Sosial (isi jika penerima)"
                                        value="{{ old('kps', $user->kps ?? '') }}" name="kps">
                                    @error('kps')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Nomor KIP</label>
                                    <input type="text"
                                        placeholder="Nomor Kartu Indonesia Pintar (isi jika penerima)"
                                        value="{{ old('kip', $user->kip ?? '') }}" name="kip">
                                    @error('kip')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Lintang</label>
                                    <input type="text" placeholder="Lintang (koordinat lokasi rumah)"
                                        value="{{ old('lintang', $user->lintang ?? '') }}" name="lintang">
                                    @error('lintang')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="input-style-1">
                                    <label>Bujur</label>
                                    <input type="text" placeholder="Bujur (koordinat lokasi rumah)"
                                        value="{{ old('bujur', $user->bujur ?? '') }}" name="bujur">
                                    @error('bujur')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="button-size mt-3">
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
