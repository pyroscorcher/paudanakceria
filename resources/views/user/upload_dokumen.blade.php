<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Dashboard - Upload Dokumen</title>

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
                                <h2>Upload Dokumen</h2>
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
                        <strong>Upload Dokumen Dibatalkan!</strong> Silakan periksa kesalahan berikut:
                        <ul class="mb-0 mt-1">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <!-- Form untuk upload dokumen -->
                <form action="{{ route('user.upload_dokumen.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-elements-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card-style mb-2">
                                    <div class="row">

                                        <!-- Akta Kelahiran -->
                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-bold">Akta Kelahiran</label>
                                            @if(isset($user->dokumen) && $user->dokumen->akta_kelahiran)
                                                <div class="mb-2">
                                                    <span class="badge bg-success" style="padding: 5px 10px; border-radius: 4px; color: white; background-color: #198754;">Sudah Diunggah</span>
                                                    <a href="{{ asset('storage/' . $user->dokumen->akta_kelahiran) }}" target="_blank" class="ms-2" style="font-size: 0.9em; text-decoration: underline;">
                                                        Lihat Dokumen Saat Ini
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="upload-box" onclick="document.getElementById('akta_kelahiran').click()" style="cursor: pointer;">
                                                <input type="file" id="akta_kelahiran" name="akta_kelahiran" accept="image/*,.pdf" hidden onchange="previewFile(event, 'preview-akta')">
                                                <div class="upload-content" id="preview-akta">
                                                    <p>Klik untuk upload {{ (isset($user->dokumen) && $user->dokumen->akta_kelahiran) ? 'dokumen baru' : 'dokumen' }}</p>
                                                    <small>JPG, PNG, PDF (Maks. 2MB)</small>
                                                </div>
                                            </div>
                                            @error('akta_kelahiran')
                                                <div class="text-danger mt-1" style="color: red; font-size: 0.875em;">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Kartu Keluarga (KK) -->
                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-bold">Kartu Keluarga (KK)</label>
                                            @if(isset($user->dokumen) && $user->dokumen->kk)
                                                <div class="mb-2">
                                                    <span class="badge bg-success" style="padding: 5px 10px; border-radius: 4px; color: white; background-color: #198754;">Sudah Diunggah</span>
                                                    <a href="{{ asset('storage/' . $user->dokumen->kk) }}" target="_blank" class="ms-2" style="font-size: 0.9em; text-decoration: underline;">
                                                        Lihat Dokumen Saat Ini
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="upload-box" onclick="document.getElementById('kk').click()" style="cursor: pointer;">
                                                <input type="file" id="kk" name="kk" accept="image/*,.pdf" hidden onchange="previewFile(event, 'preview-kk')">
                                                <div class="upload-content" id="preview-kk">
                                                    <p>Klik untuk upload {{ (isset($user->dokumen) && $user->dokumen->kk) ? 'dokumen baru' : 'dokumen' }}</p>
                                                    <small>JPG, PNG, PDF (Maks. 2MB)</small>
                                                </div>
                                            </div>
                                            @error('kk')
                                                <div class="text-danger mt-1" style="color: red; font-size: 0.875em;">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Foto Anak -->
                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-bold">Foto Anak</label>
                                            @if(isset($user->dokumen) && $user->dokumen->foto_anak)
                                                <div class="mb-2">
                                                    <span class="badge bg-success" style="padding: 5px 10px; border-radius: 4px; color: white; background-color: #198754;">Sudah Diunggah</span>
                                                    <a href="{{ asset('storage/' . $user->dokumen->foto_anak) }}" target="_blank" class="ms-2" style="font-size: 0.9em; text-decoration: underline;">
                                                        Lihat Dokumen Saat Ini
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="upload-box" onclick="document.getElementById('foto_anak').click()" style="cursor: pointer;">
                                                <input type="file" id="foto_anak" name="foto_anak" accept="image/*" hidden onchange="previewFile(event, 'preview-foto')">
                                                <div class="upload-content" id="preview-foto">
                                                    <p>Klik untuk upload {{ (isset($user->dokumen) && $user->dokumen->foto_anak) ? 'foto baru' : 'foto' }}</p>
                                                    <small>JPG, PNG (Maks. 2MB)</small>
                                                </div>
                                            </div>
                                            @error('foto_anak')
                                                <div class="text-danger mt-1" style="color: red; font-size: 0.875em;">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- KTP Orang Tua -->
                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-bold">KTP Orang Tua</label>
                                            @if(isset($user->dokumen) && $user->dokumen->ktp)
                                                <div class="mb-2">
                                                    <span class="badge bg-success" style="padding: 5px 10px; border-radius: 4px; color: white; background-color: #198754;">Sudah Diunggah</span>
                                                    <a href="{{ asset('storage/' . $user->dokumen->ktp) }}" target="_blank" class="ms-2" style="font-size: 0.9em; text-decoration: underline;">
                                                        Lihat Dokumen Saat Ini
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="upload-box" onclick="document.getElementById('ktp').click()" style="cursor: pointer;">
                                                <input type="file" id="ktp" name="ktp" accept="image/*,.pdf" hidden onchange="previewFile(event, 'preview-ktp')">
                                                <div class="upload-content" id="preview-ktp">
                                                    <p>Klik untuk upload {{ (isset($user->dokumen) && $user->dokumen->ktp) ? 'dokumen baru' : 'dokumen' }}</p>
                                                    <small>JPG, PNG, PDF (Maks. 2MB)</small>
                                                </div>
                                            </div>
                                            @error('ktp')
                                                <div class="text-danger mt-1" style="color: red; font-size: 0.875em;">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- INFORMASI PEMBAYARAN BOX (NEW) -->
                                        <div class="col-12 mb-4">
                                            <div class="p-3 rounded" style="background-color: #f8f9fa; border-left: 4px solid #009CE0;">
                                                <h6 class="fw-bold mb-2" style="color: #009CE0;">
                                                    <i class="fa-solid fa-circle-info me-1"></i> Informasi Pembayaran
                                                </h6>
                                                <p class="mb-2 text-sm text-muted">
                                                    Silakan lakukan transfer biaya pendaftaran sebesar <strong>Rp 150.000</strong> ke rekening berikut sebelum mengunggah bukti pembayaran:
                                                </p>
                                                <ul class="mb-0 text-sm list-unstyled">
                                                    <li><strong>Bank:</strong> Bank Rakyat Indonesia (BRI)</li>
                                                    <li><strong>No. Rekening:</strong> 1234-5678-9012-345</li>
                                                    <li><strong>Atas Nama:</strong> PAUD Anak Ceria</li>
                                                </ul>
                                            </div>
                                        </div>

                                        <!-- Bukti Pembayaran -->
                                        <div class="col-12 mb-4">
                                            <label class="form-label fw-bold">Bukti Pembayaran</label>
                                            @if(isset($user->dokumen) && $user->dokumen->bukti_pembayaran)
                                                <div class="mb-2">
                                                    <span class="badge bg-success" style="padding: 5px 10px; border-radius: 4px; color: white; background-color: #198754;">Sudah Diunggah</span>
                                                    <a href="{{ asset('storage/' . $user->dokumen->bukti_pembayaran) }}" target="_blank" class="ms-2" style="font-size: 0.9em; text-decoration: underline;">
                                                        Lihat Dokumen Saat Ini
                                                    </a>
                                                </div>
                                            @endif
                                            <div class="upload-box" onclick="document.getElementById('bukti_pembayaran').click()" style="cursor: pointer;">
                                                <input type="file" id="bukti_pembayaran" name="bukti_pembayaran" accept="image/*,.pdf" hidden onchange="previewFile(event, 'preview-bukti')">
                                                <div class="upload-content" id="preview-bukti">
                                                    <p>Klik untuk upload {{ (isset($user->dokumen) && $user->dokumen->bukti_pembayaran) ? 'dokumen baru' : 'dokumen' }}</p>
                                                    <small>JPG, PNG, PDF (Maks. 2MB)</small>
                                                </div>
                                            </div>
                                            @error('bukti_pembayaran')
                                                <div class="text-danger mt-1" style="color: red; font-size: 0.875em;">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-12">
                                            <button type="submit" class="main-btn primary-btn btn-hover">Simpan Dokumen</button>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                    <!-- end row -->
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
    <script>
        function previewFile(event, previewId) {
            const file = event.target.files[0];
            const preview = document.getElementById(previewId);

            if (!file) return;

            if (file.type.startsWith("image/")) {
                const img = document.createElement("img");
                img.src = URL.createObjectURL(file);

                preview.innerHTML = "";
                preview.appendChild(img);
            } else if (file.type === "application/pdf") {
                preview.innerHTML = `
            <p>📄 ${file.name}</p>
        `;
            } else {
                preview.innerHTML = "<p>File tidak didukung</p>";
            }
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
