<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }} type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Admin Dashboard - Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <!-- ========== sidebar-nav start =========== -->
    @include('components.admin_navbar')
    <!-- ========== sidebar-nav end =========== -->

    <main class="main-wrapper">

        <!-- ========== header start ========== -->
        @include('components.admin_header')
        <!-- ========== header end ========== -->

        <div class="overlay"></div>

        <section class="section">
            <div class="container-fluid">

                <div class="max-w-7xl mx-auto mt-10 p-6">

                    <div class="flex justify-between items-center mb-8">
                        <h1 class="text-3xl font-bold text-gray-900">Photo Gallery</h1>
                        <a href="{{ route('gallery.create') }}"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                            + Upload New Photo
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse($galleries as $gallery)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                                <img src="{{ asset('storage/' . $gallery->photo) }}"
                                    alt="Gallery Image {{ $gallery->id }}" class="object-cover w-full">
                                <div class="p-3 bg-gray-50 text-xs text-gray-500 text-center border-t border-gray-100">
                                    Added: {{ $gallery->created_at->format('M d, Y') }}
                                </div>
                                <div class="p-3 bg-gray-100 text-center">
                                    <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this photo?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div
                                class="col-span-full text-center py-12 bg-white rounded-lg shadow-sm border border-gray-200">
                                <p class="text-gray-500">No photos have been uploaded yet.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </section>
    </main>
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
