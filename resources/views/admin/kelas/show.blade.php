<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}" type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Detail Kelas {{ $kelas->nama_kelas }} - Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    @include('components.admin_navbar')

    <main class="main-wrapper">

        @include('components.admin_header')

        <div class="overlay"></div>

        <section class="section">
            <div class="container-fluid">
                <div class="max-w-7xl mx-auto mt-10 p-6">

                    <div class="mb-8">
                        <a href="{{ route('kelas.index') }}" class="text-blue-600 hover:text-blue-800 text-sm font-medium mb-3 inline-block transition">
                            &larr; Kembali ke Daftar Kelas
                        </a>
                        <div class="flex justify-between items-end">
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900">{{ $kelas->nama_kelas }}</h1>
                                <p class="text-sm text-gray-500 mt-1">
                                    <i class="bi bi-person-badge mr-1"></i> Wali Kelas: <strong>{{ $kelas->nama_guru }}</strong> | 
                                    <i class="bi bi-diagram-3 mr-1"></i> Kelompok: <strong>{{ $kelas->kelompok_usia }}</strong>
                                </p>
                            </div>
                            
                            @php
                                $isFull = $kelas->users->count() >= $kelas->kapasitas;
                            @endphp
                            <div class="text-right">
                                <span class="text-sm text-gray-600 block mb-1">Kapasitas Kelas</span>
                                <span class="text-2xl font-bold {{ $isFull ? 'text-red-600' : 'text-green-600' }}">
                                    {{ $kelas->users->count() }}
                                </span>
                                <span class="text-gray-500">/ {{ $kelas->kapasitas }} Siswa</span>
                            </div>
                        </div>
                    </div>

                    @if (session('success'))
                        <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded shadow-sm">
                            <ul class="list-disc pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        
                        <div class="lg:col-span-2">
                            <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                    <h2 class="text-lg font-bold text-gray-800">Daftar Siswa di Kelas Ini</h2>
                                </div>
                                <div class="overflow-x-auto">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-[#009CE0]">
                                            <tr>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">No</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Nama Siswa</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">NIK / NISN</th>
                                                <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">Jenis Kelamin</th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @forelse($kelas->users as $index => $student)
                                                <tr class="hover:bg-gray-50 transition">
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $index + 1 }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                        {{ $student->name }}
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $student->nik ?? '-' }} <br>
                                                        <span class="text-xs text-gray-400">{{ $student->nisn ?? 'Tanpa NISN' }}</span>
                                                    </td>
                                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                        {{ $student->jenis_kelamin === 'L' ? 'Laki-laki' : ($student->jenis_kelamin === 'P' ? 'Perempuan' : '-') }}
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">
                                                        <i class="bi bi-people text-3xl text-gray-300 block mb-2"></i>
                                                        Belum ada siswa yang dimasukkan ke kelas ini.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="lg:col-span-1">
                            <div class="bg-white shadow-sm rounded-lg border border-gray-200">
                                <div class="px-6 py-4 border-b border-gray-200 bg-blue-50">
                                    <h2 class="text-lg font-bold text-blue-900">Tambahkan Siswa</h2>
                                </div>
                                <div class="p-6">
                                    
                                    @if($isFull)
                                        <div class="text-center py-6">
                                            <i class="bi bi-shield-lock text-4xl text-red-400 block mb-3"></i>
                                            <h3 class="text-md font-bold text-red-600">Kapasitas Penuh</h3>
                                            <p class="text-sm text-gray-500 mt-1">Kelas ini telah mencapai batas maksimal ({{ $kelas->kapasitas }} siswa). Anda tidak dapat menambahkan siswa lagi.</p>
                                        </div>
                                    @else
                                        <form action="{{ route('kelas.assign', $kelas->id) }}" method="POST">
                                            @csrf
                                            
                                            <div class="mb-4">
                                                <label for="user_id" class="block text-sm font-medium text-gray-700 mb-2">
                                                    Pilih Siswa (Status: Diterima)
                                                </label>
                                                <select name="user_id" id="user_id" required class="block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#009CE0] focus:border-[#009CE0] sm:text-sm">
                                                    <option value="" disabled selected>-- Pilih Siswa --</option>
                                                    @forelse($unassignedStudents as $unassigned)
                                                        <option value="{{ $unassigned->id }}">{{ $unassigned->name }} ({{ $unassigned->nik }})</option>
                                                    @empty
                                                        <option value="" disabled>Semua siswa Diterima sudah masuk kelas</option>
                                                    @endforelse
                                                </select>
                                                <p class="text-xs text-gray-500 mt-2">
                                                    Hanya menampilkan siswa yang status pendaftarannya <strong>Diterima</strong> dan belum memiliki kelas.
                                                </p>
                                            </div>

                                            <button type="submit" 
                                                {{ $unassignedStudents->isEmpty() ? 'disabled' : '' }}
                                                class="w-full inline-flex justify-center items-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#009CE0] text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:text-sm transition disabled:opacity-50 disabled:cursor-not-allowed">
                                                <i class="bi bi-person-plus-fill mr-2"></i> Tambahkan ke Kelas
                                            </button>
                                        </form>
                                    @endif

                                </div>
                            </div>
                        </div>

                    </div> </div>
            </div>
        </section>
    </main>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>
</html>