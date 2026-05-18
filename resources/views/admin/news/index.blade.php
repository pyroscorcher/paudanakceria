<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }} type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>News - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                        <h1 class="text-3xl font-bold text-gray-900">Berita</h1>
                        <a href="{{ route('news.create') }}"
                            class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition inline-flex items-center gap-2">
                            <i class="bi bi-plus"></i>Buat Berita
                        </a>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                        @forelse($news as $new)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                                <div class="p-4">
                                    <img src="{{ asset('storage/' . $new->image) }}" alt="{{ $new->title }}"
                                        class="w-full h-48 object-cover rounded mb-4">
                                    <h2 class="text-lg font-semibold text-gray-900 mb-2">{{ $new->title }}</h2>
                                    <p class="text-gray-700 text-sm">{{ Str::limit($new->content, 100) }}</p>
                                </div>
                                <div class="p-3 bg-gray-50 text-xs text-gray-500 text-center border-t border-gray-100">
                                    Dibuat: {{ $new->created_at->locale('id')->translatedFormat('d F Y') }}
                                </div>
                                <div class="p-3 bg-gray-100 text-center grid grid-cols-2 gap-2">
                                    <form action="{{ route('news.destroy', $new->id) }}" method="POST"
                                        onsubmit="return confirm('Are you sure you want to delete this news item?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                            Hapus
                                        </button>
                                    </form>
                                    <form action="{{ route('news.showUpdate', $new->id) }}" method="GET">
                                        @csrf
                                        <button type="submit"
                                            class="bg-[#009CE0] text-white px-3 py-1 rounded hover:bg-[#007bb5] transition">
                                            Perbarui
                                        </button>
                                    </form>
                                </div>
                            </div>
                        @empty
                            <div
                                class="col-span-full text-center py-12 bg-white rounded-lg shadow-sm border border-gray-200">
                                <p class="text-gray-500">Belum ada berita yang diunggah.</p>
                            </div>
                        @endforelse
                    </div>

                </div>

            </div>
        </section>

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
    </main>

</body>

</html>
