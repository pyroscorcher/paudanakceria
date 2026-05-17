<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }} type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Upload Galeri - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <header class="header">
        <div class="container-fluid px-4">
            <div class="row flex items-center">
                <!-- Left Section -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="header-left">
                        <span class="font-bold text-xl tracking-wider">Menambah Foto</span>
                    </div>
                </div>

                <!-- Right Section -->
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="header-right flex items-center justify-end space-x-4">
                        <span>{{ Auth::guard('admins')->user()->nama_admin ?? 'Admin' }}</span>
                        <button type="submit" class="main-btn">
                            <a href="{{ route('gallery.index') }}">Kembali ke Dashboard</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Upload Foto Baru</h2>
        </div>

        <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="photo" class="block text-sm font-medium text-gray-700 mb-2">Pilih Gambar (Maksimal Ukuran:
                    2MB)</label>
                <input type="file" name="photo" id="photo" accept="image/*"
                    class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-[#009CE0] hover:file:bg-blue-100 border border-gray-300 rounded p-2">

                @error('photo')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-[#009CE0] text-white font-bold py-2 px-4 rounded hover:bg-[#007bb5] transition duration-200">
                Upload Foto
            </button>
        </form>
    </div>
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
