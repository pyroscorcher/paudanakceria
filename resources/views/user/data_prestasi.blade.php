<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Dashboard - Data Prestasi</title>

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
                                <h2>Data Prestasi</h2>
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

                <form action="{{ route('user.data_prestasi.update') }}" method="POST">
                    @csrf
                    @method('PUT') 

                    <div id="prestasi-wrapper">
                        @forelse ($user->prestasi as $index => $prestasi)
                            <div class="card-style mb-4 prestasi-item">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="text-medium">Data Prestasi</h5>
                                    <button type="button" class="btn btn-sm btn-danger remove-row">Hapus</button>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Jenis Prestasi</label>
                                            <input type="text" placeholder="Jenis Prestasi" value="{{ old('prestasi.' . $index . '.jenis', $prestasi->jenis) }}" name="prestasi[{{ $index }}][jenis]">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Tingkat</label>
                                            <input type="text" placeholder="Tingkat" value="{{ old('prestasi.' . $index . '.tingkat', $prestasi->tingkat) }}" name="prestasi[{{ $index }}][tingkat]">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Nama Prestasi</label>
                                            <input type="text" placeholder="Nama Prestasi" value="{{ old('prestasi.' . $index . '.nama', $prestasi->nama) }}" name="prestasi[{{ $index }}][nama]">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Tahun</label>
                                            <input type="text" placeholder="Tahun" value="{{ old('prestasi.' . $index . '.tahun', $prestasi->tahun) }}" name="prestasi[{{ $index }}][tahun]">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Penyelenggara</label>
                                            <input type="text" placeholder="Penyelenggara" value="{{ old('prestasi.' . $index . '.penyelenggara', $prestasi->penyelenggara) }}" name="prestasi[{{ $index }}][penyelenggara]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="card-style mb-4 prestasi-item">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="text-medium">Data Prestasi</h5>
                                    <button type="button" class="btn btn-sm btn-danger remove-row">Hapus</button>
                                </div>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Jenis Prestasi</label>
                                            <input type="text" placeholder="Jenis Prestasi" value="{{ old('prestasi.0.jenis') }}" name="prestasi[0][jenis]">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Tingkat</label>
                                            <input type="text" placeholder="Tingkat" value="{{ old('prestasi.0.tingkat') }}" name="prestasi[0][tingkat]">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Nama Prestasi</label>
                                            <input type="text" placeholder="Nama Prestasi" value="{{ old('prestasi.0.nama') }}" name="prestasi[0][nama]">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Tahun</label>
                                            <input type="text" placeholder="Tahun" value="{{ old('prestasi.0.tahun') }}" name="prestasi[0][tahun]">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="input-style-1">
                                            <label>Penyelenggara</label>
                                            <input type="text" placeholder="Penyelenggara" value="{{ old('prestasi.0.penyelenggara') }}" name="prestasi[0][penyelenggara]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforelse
                    </div>

                    <div class="d-flex gap-3 mt-4">
                        <button type="button" id="btn-add-prestasi" class="main-btn primary-btn-outline btn-hover">+ Tambah Prestasi</button>
                        <button type="submit" class="main-btn primary-btn btn-hover">Simpan Semua</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        let wrapper = document.getElementById('prestasi-wrapper');
        let addButton = document.getElementById('btn-add-prestasi');
        let indexCounter = wrapper.children.length;

        // Add new form row
        addButton.addEventListener('click', function() {
            // Clone the first element in the wrapper
            let newRow = wrapper.firstElementChild.cloneNode(true);
            
            // Clear the input values and update the name attributes with the new index
            let inputs = newRow.querySelectorAll('input');
            inputs.forEach(input => {
                input.value = '';
                // Update the name attribute dynamically (e.g., prestasi[0][jenis] -> prestasi[1][jenis])
                input.name = input.name.replace(/\[\d+\]/, '[' + indexCounter + ']'); 
            });

            // Add the new row to the DOM
            wrapper.appendChild(newRow);
            indexCounter++;
        });

        // Remove a form row
        wrapper.addEventListener('click', function(e) {
            if (e.target && e.target.classList.contains('remove-row')) {
                if (wrapper.children.length > 1) {
                    e.target.closest('.prestasi-item').remove();
                } else {
                    alert('Anda harus menyisakan setidaknya satu baris formulir. Jika tidak memiliki prestasi, kosongkan saja kolomnya.');
                }
            }
        });
    });
</script>

</html>
