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
                <div class="form-elements-wrapper">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-style mb-2">
                                <div class="row">

                                    <!-- Akta Kelahiran -->
                                    <div class="col-12">
                                        <label class="form-label">Akta Kelahiran</label>

                                        <div class="upload-box" onclick="document.getElementById('akta').click()">
                                            <input type="file" id="akta" name="akta" accept="image/*,.pdf"
                                                hidden onchange="previewFile(event, 'preview-akta')">

                                            <div class="upload-content" id="preview-akta">
                                                <p>Klik untuk upload</p>
                                                <small>JPG, PNG, PDF</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Kartu Keluarga (KK)</label>

                                        <div class="upload-box" onclick="document.getElementById('kk').click()">
                                            <input type="file" id="kk" name="kk" accept="image/*,.pdf"
                                                hidden onchange="previewFile(event, 'preview-kk')">

                                            <div class="upload-content" id="preview-kk">
                                                <p>Klik untuk upload</p>
                                                <small>JPG, PNG, PDF</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Foto Anak</label>

                                        <div class="upload-box" onclick="document.getElementById('foto_anak').click()">
                                            <input type="file" id="foto_anak" name="foto_anak" accept="image/*"
                                                hidden onchange="previewFile(event, 'preview-foto')">

                                            <div class="upload-content" id="preview-foto">
                                                <p>Klik untuk upload</p>
                                                <small>JPG, PNG</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">KTP Orang Tua</label>

                                        <div class="upload-box" onclick="document.getElementById('ktp').click()">
                                            <input type="file" id="ktp" name="ktp_ortu" accept="image/*,.pdf"
                                                hidden onchange="previewFile(event, 'preview-ktp')">

                                            <div class="upload-content" id="preview-ktp">
                                                <p>Klik untuk upload</p>
                                                <small>JPG, PNG, PDF</small>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label class="form-label">Dokumen Tambahan (Opsional)</label>

                                        <div class="upload-box" onclick="document.getElementById('lain').click()">
                                            <input type="file" id="lain" name="dokumen_lain"
                                                accept="image/*,.pdf" hidden
                                                onchange="previewFile(event, 'preview-lain')">

                                            <div class="upload-content" id="preview-lain">
                                                <p>Klik untuk upload</p>
                                                <small>JPG, PNG, PDF</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="button-size mt-3">
                                        <button type="submit"
                                            class="main-btn primary-btn-outline btn-hover">Simpan</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
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
</body>

</html>
