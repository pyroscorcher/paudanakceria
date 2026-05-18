<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }} type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Admin Dashboard</title>
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

    @include('components.admin_navbar', ['admin_navbar' => $admin_navbar])
    <div class="overlay"></div>



    {{-- <nav class="bg-blue-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="font-bold text-xl tracking-wider">🎓 PPDB Admin Portal</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span>Welcome, {{ Auth::guard('admins')->user()->nama_admin ?? 'Admin' }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit"
                            class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-sm transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav> --}}

    <main class="main-wrapper">

        @include('components.admin_header', ['admin_header' => $admin_header])

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <section class="section">
            <div class="container-fluid">

                <div class="title-wrapper pt-30">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <div class="title">
                                <h2 class="text-2xl font-bold text-gray-900">PPDB Admin Portal</h2>
                                <p class="text-gray-600">Portal manajemen pendaftaran murid PAUD Anak Ceria.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-[#009CE0]">
                        <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Pendaftaran</h3>
                        <p class="text-3xl font-bold text-gray-800 mt-2">{{ $enrollments->total() }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
                        <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Perlu Review</h3>
                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $enrollments->where('status', 'Menunggu')->count() }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                        <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Diterima</h3>
                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $enrollments->where('status', 'Diterima')->count() }}</p>
                    </div>
                    <div class="bg-white rounded-lg shadow p-6 border-l-4 border-red-500">
                        <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Ditolak</h3>
                        <p class="text-3xl font-bold text-gray-800 mt-2">
                            {{ $enrollments->where('status', 'Ditolak')->count() }}</p>
                    </div>
                </div>

                <div class="bg-white shadow rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                        <h2 class="text-lg font-medium text-gray-900">Pendaftaran Terbaru (Recent Applications)</h2>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-[#009CE0]">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        ID</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Nama Pendaftar</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Tanggal Pendaftaran</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">


                                @forelse($enrollments as $enrollment)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            #{{ $enrollment->id }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">
                                            {{ $enrollment->nama }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                            {{ $enrollment->created_at->format('Y-m-d') }}</td>

                                        <td class="px-6 py-4 whitespace-nowrap">

                                            <form
                                                action="{{ route('admin.enrollment.update-status', $enrollment->id) }}"
                                                method="POST" class="flex gap-2 flex-wrap">

                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" name="status" value="Menunggu"
                                                    class="px-3 py-1 rounded-full text-xs font-semibold
                                                    {{ $enrollment->status === 'Menunggu'
                                                        ? 'bg-yellow-100 text-yellow-700 border border-yellow-400'
                                                        : 'bg-gray-100 text-gray-500 border border-gray-200' }}">
                                                    Menunggu
                                                </button>

                                                <button type="submit" name="status" value="Diterima"
                                                    class="px-3 py-1 rounded-full text-xs font-semibold
                                                    {{ $enrollment->status === 'Diterima'
                                                        ? 'bg-green-100 text-green-700 border border-green-400'
                                                        : 'bg-gray-100 text-gray-500 border border-gray-200' }}">
                                                    Diterima
                                                </button>

                                                <button type="submit" name="status" value="Ditolak"
                                                    class="px-3 py-1 rounded-full text-xs font-semibold
                                                    {{ $enrollment->status === 'Ditolak'
                                                        ? 'bg-red-100 text-red-700 border border-red-400'
                                                        : 'bg-gray-100 text-gray-500 border border-gray-200' }}">
                                                    Ditolak
                                                </button>

                                            </form>

                                        </td>
                                        <td class="px-6 py-4 text-sm font-medium">
                                            <a href="{{ route('admin.enrollment.show', $enrollment->id) }}"
                                                class="px-4 py-2 text-white mr-3 rounded bg-[#009CE0]">Review</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada pendaftaran yang masuk.</td>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="px-6 py-4 border-t border-gray-200">
                        {{ $enrollments->links() }}
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
