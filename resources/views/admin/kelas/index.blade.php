<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}" type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Manajemen Kelas - Admin Dashboard</title>
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

                    <div class="flex justify-between items-center mb-8">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Manajemen Kelas</h1>
                            <p class="text-sm text-gray-500 mt-1">Kelola pembagian kelas dan kapasitas siswa.</p>
                        </div>
                        <button type="button" onclick="toggleModal('createKelasModal')"
                            class="bg-[#009CE0] text-white px-4 py-2 rounded hover:bg-blue-700 transition inline-flex items-center gap-2 shadow-sm">
                            <i class="bi bi-plus-lg text-lg"></i>Buat Kelas Baru
                        </button>
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

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($kelasList as $kelas)
                            <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200 hover:shadow-md transition">
                                <div class="p-5 border-b border-gray-100">
                                    <div class="flex justify-between items-start mb-2">
                                        <h3 class="text-xl font-bold text-gray-800">{{ $kelas->nama_kelas }}</h3>
                                        <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded border border-blue-200">
                                            {{ $kelas->kelompok_usia }}
                                        </span>
                                    </div>
                                    <p class="text-sm text-gray-600 mb-4">
                                        <i class="bi bi-person-badge mr-1"></i> Wali Kelas: <span class="font-medium">{{ $kelas->nama_guru }}</span>
                                    </p>

                                    @php
                                        $percentage = $kelas->kapasitas > 0 ? ($kelas->users_count / $kelas->kapasitas) * 100 : 0;
                                        $barColor = $percentage >= 100 ? 'bg-red-500' : ($percentage >= 80 ? 'bg-yellow-500' : 'bg-green-500');
                                    @endphp
                                    
                                    <div class="w-full bg-gray-200 rounded-full h-2 mb-1">
                                        <div class="{{ $barColor }} h-2 rounded-full" style="width: {{ min($percentage, 100) }}%"></div>
                                    </div>
                                    <div class="flex justify-between text-xs text-gray-500">
                                        <span>Terisi: {{ $kelas->users_count }}</span>
                                        <span>Kapasitas: {{ $kelas->kapasitas }}</span>
                                    </div>
                                </div>
                                <div class="bg-gray-50 p-3">
                                    <a href="{{ route('kelas.index', $kelas->id) }}"
                                        class="block w-full text-center bg-white border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded text-sm font-medium transition">
                                        Kelola Siswa &nbsp;→
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div class="col-span-full text-center py-16 bg-white rounded-lg shadow-sm border border-gray-200 mt-4">
                                <i class="bi bi-journal-x text-4xl text-gray-400 mb-3"></i>
                                <h3 class="text-lg font-medium text-gray-900">Belum ada kelas yang dibuat</h3>
                                <p class="text-gray-500 mt-1">Silakan klik "Buat Kelas Baru" untuk memulai pembagian rombongan belajar.</p>
                            </div>
                        @endforelse
                    </div>

                    @if($kelasList->isEmpty())
                        <div class="col-span-full text-center py-16 bg-white rounded-lg shadow-sm border border-gray-200 mt-4">
                            <i class="bi bi-journal-x text-4xl text-gray-400 mb-3"></i>
                            <h3 class="text-lg font-medium text-gray-900">Belum ada kelas yang dibuat</h3>
                            <p class="text-gray-500 mt-1">Silakan klik "Buat Kelas Baru" untuk memulai pembagian rombongan belajar.</p>
                        </div>
                    @endif

                </div>
            </div>
        </section>
    </main>

    <div id="createKelasModal" class="fixed inset-0 z-[100] hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" onclick="toggleModal('createKelasModal')"></div>

            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                Buat Kelas Baru
                            </h3>
                            <div class="mt-4">
                                <form action="{{ route('kelas.store') }}" method="POST" id="createKelasForm">
                                    @csrf
                                    
                                    <div class="mb-4">
                                        <label for="nama_kelas" class="block text-sm font-medium text-gray-700">Nama Kelas</label>
                                        <input type="text" name="nama_kelas" id="nama_kelas" required placeholder="Contoh: Kelas A Bintang" 
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#009CE0] focus:border-[#009CE0] sm:text-sm">
                                    </div>

                                    <div class="mb-4">
                                        <label for="kelompok_usia" class="block text-sm font-medium text-gray-700">Kelompok Usia</label>
                                        <select name="kelompok_usia" id="kelompok_usia" required
                                            class="mt-1 block w-full bg-white border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#009CE0] focus:border-[#009CE0] sm:text-sm">
                                            <option value="" disabled selected>Pilih kelompok usia...</option>
                                            <option value="3-4 Tahun (Playgroup)">3-4 Tahun (Playgroup)</option>
                                            <option value="4-5 Tahun (TK A)">4-5 Tahun (TK A)</option>
                                            <option value="5-6 Tahun (TK B)">5-6 Tahun (TK B)</option>
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="kapasitas" class="block text-sm font-medium text-gray-700">Kapasitas Maksimal Siswa</label>
                                        <input type="number" name="kapasitas" id="kapasitas" required min="1" max="50" value="15"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#009CE0] focus:border-[#009CE0] sm:text-sm">
                                    </div>

                                    <div class="mb-5">
                                        <label for="nama_guru" class="block text-sm font-medium text-gray-700">Nama Wali Kelas / Guru</label>
                                        <input type="text" name="nama_guru" id="nama_guru" required placeholder="Masukkan nama guru"
                                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#009CE0] focus:border-[#009CE0] sm:text-sm">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" form="createKelasForm"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#009CE0] text-base font-medium text-white hover:bg-blue-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm transition">
                        Simpan Kelas
                    </button>
                    <button type="button" onclick="toggleModal('createKelasModal')"
                        class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition">
                        Batal
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
    <script>
        function toggleModal(modalID) {
            const modal = document.getElementById(modalID);
            if (modal.classList.contains('hidden')) {
                modal.classList.remove('hidden');
            } else {
                modal.classList.add('hidden');
            }
        }
    </script>
</body>
</html>