<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}" type="image/x-icon" />
    <link rel="icon" type="image/x-icon" href="{{ asset('images/all-img/logo-paudanakceria.png') }}">
    <title>Review Pendaftaran {{ $enrollment->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">

    <header class="header">
        <div class="container-fluid px-4">
            <div class="row flex items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="header-left">
                        <span class="font-bold text-xl tracking-wider">Halaman Review</span>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-12">
                    <div class="header-right flex items-center justify-end space-x-4">
                        <span>{{ Auth::guard('admins')->user()->nama_admin ?? 'Admin' }}</span>
                        <button type="submit" class="main-btn">
                            <a href="{{ route('admin.dashboard') }}">Kembali ke Dashboard</a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        @if (session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 shadow-sm rounded-r-lg flex items-center" role="alert">
                <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                </svg>
                <p class="font-medium">{{ session('error') }}</p>
            </div>
        @endif

        <div class="min-h-screen bg-white py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                <div class="mb-8">
                    <div class="flex justify-between items-center mb-6">
                        <h1 class="text-3xl font-bold text-gray-900">Review Pendaftar:
                            {{ $enrollment->user->name ?? $enrollment->nama }}</h1>
                        <span
                            class="px-4 py-2 inline-flex text-sm leading-5 font-semibold rounded-full
                    {{ $enrollment->status === 'Diterima' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $enrollment->status === 'Ditolak' ? 'bg-red-100 text-red-800' : '' }}
                    {{ $enrollment->status === 'Menunggu' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                            {{ $enrollment->status }}
                        </span>
                    </div>
                    <p class="text-gray-600">Halaman melakukan review terhadap data pendaftar sebelum menerima murid</p>
                </div>

                <div class="flex flex-col lg:flex-row gap-6">

                    <div class="hidden lg:block lg:w-64 flex-shrink-0">
                        <nav class="space-y-4 sticky top-8" id="desktop-stepper">
                        </nav>
                    </div>

                    <div class="lg:hidden mb-6">
                        <div class="flex overflow-x-auto gap-2 pb-2" id="mobile-stepper">
                        </div>
                    </div>

                    <div class="flex-1">

                        <div class="review-step-container bg-white shadow rounded-lg overflow-hidden hidden"
                            data-step="1">
                            <div class="px-6 py-5 border-b border-gray-200 bg-[#009CE0]">
                                <h3 class="text-lg leading-6 font-medium text-white">Data Anak</h3>
                                <p class="mt-1 text-sm text-gray-100">Informasi pribadi calon murid</p>
                            </div>

                            <div class="px-6 py-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Nama Lengkap</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->nama ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">NISN</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->nisn ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">NIS</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->nis ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Jenis Kelamin</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $enrollment->jenis_kelamin === 'L' ? 'Laki-laki' : ($enrollment->jenis_kelamin === 'P' ? 'Perempuan' : '-') }}
                                        </p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Tempat, Tanggal Lahir</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $enrollment->user->tempatlahir ?? '-' }},
                                            {{ $enrollment->tanggal_lahir ? \Carbon\Carbon::parse($enrollment->tanggal_lahir)->locale('id')->translatedFormat('d F Y') : '-' }}
                                        </p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">NIK</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->nik ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Nomor Seri Ijazah</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->nomorseriijazah ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Nomor Seri SKHUN</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->nomorseriskhun ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Nomor Seri UN</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->nomorseriun ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">NPSN</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->npsn ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Asal Sekolah</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->asal_sekolah ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Agama</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->agama ?? '-' }}
                                        </p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Kebutuhan Khusus</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $enrollment->kebutuhankhusus ?? 'Tidak Ada' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">NIK</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->nik ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg md:col-span-2">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Alamat Rumah</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $enrollment->alamat_rumah ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Email</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->emailpribadi ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">KKS</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->kks ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">KPS</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->kps ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">KIP</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->kip ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Lintang</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->lintang ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Bujur</p>
                                        <p class="text-sm font-semibold text-gray-900">{{ $enrollment->user->bujur ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg md:col-span-2">

                                    <div class="flex justify-between items-center mb-2">
                                            <p class="text-xs font-medium text-gray-600">Peta Lokasi Rumah</p>
                                        </div>
                                        
                                        <div id="admin-map" style="height: 350px; width: 100%; border-radius: 8px; z-index: 1; border: 1px solid #e5e7eb;"></div>
                                        
                                        <div class="mt-2 text-xs text-gray-500">
                                            <span class="font-semibold text-red-500">Pin Merah:</span> Rumah Calon Murid &nbsp;|&nbsp; 
                                            <span class="font-semibold text-blue-500">Pin Biru:</span> PAUD Anak Ceria
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="review-step-container bg-white shadow rounded-lg overflow-hidden hidden"
                            data-step="2">
                            <div class="px-6 py-5 border-b border-gray-200 bg-[#009CE0]">
                                <h3 class="text-lg leading-6 font-medium text-white">Data Orang Tua</h3>
                                <p class="mt-1 text-sm text-gray-100">Informasi orang tua/wali calon murid</p>
                            </div>

                            <div class="border-b border-gray-200 bg-gray-50">
                                <div class="flex flex-wrap">
                                    <button type="button"
                                        class="parent-tab flex-1 py-4 px-6 font-medium focus:outline-none transition active"
                                        data-tab="ayah">Ayah</button>
                                    <button type="button"
                                        class="parent-tab flex-1 py-4 px-6 font-medium focus:outline-none transition"
                                        data-tab="ibu">Ibu</button>
                                    <button type="button"
                                        class="parent-tab flex-1 py-4 px-6 font-medium focus:outline-none transition"
                                        data-tab="wali">Wali</button>
                                </div>
                            </div>

                            <div class="px-6 py-6">
                                <div class="parent-tab-content" id="ayah-tab">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Nama Ayah</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $enrollment->user->orangtua->nama_ayah ?? '-' }}</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Pendidikan Ayah</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $enrollment->user->orangtua->pendidikan_ayah ?? '-' }}</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Pekerjaan Ayah</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $enrollment->user->orangtua->pekerjaan_ayah ?? '-' }}</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Penghasilan Ayah</p>
                                            <p class="text-sm font-semibold text-gray-900">Rp
                                                {{ number_format($enrollment->user->orangtua->penghasilan_ayah ?? 0, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="parent-tab-content hidden" id="ibu-tab">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Nama Ibu</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $enrollment->user->orangtua->nama_ibu ?? '-' }}</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Pendidikan Ibu</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $enrollment->user->orangtua->pendidikan_ibu ?? '-' }}</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Pekerjaan Ibu</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $enrollment->user->orangtua->pekerjaan_ibu ?? '-' }}</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Penghasilan Ibu</p>
                                            <p class="text-sm font-semibold text-gray-900">Rp
                                                {{ number_format($enrollment->user->orangtua->penghasilan_ibu ?? 0, 0, ',', '.') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <div class="parent-tab-content hidden" id="wali-tab">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Nama Wali</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $enrollment->user->orangtua->nama_wali ?? '-' }}</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Pendidikan Wali</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $enrollment->user->orangtua->pendidikan_wali ?? '-' }}</p>
                                        </div>
                                        <div class="bg-gray-50 p-4 rounded-lg">
                                            <p class="text-xs font-medium text-gray-600 mb-1">Pekerjaan Wali</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                {{ $enrollment->user->orangtua->pekerjaan_wali ?? '-' }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="review-step-container bg-white shadow rounded-lg overflow-hidden hidden"
                            data-step="3">
                            <div class="px-6 py-5 border-b border-gray-200 bg-[#009CE0]">
                                <h3 class="text-lg leading-6 font-medium text-white">Data Prestasi</h3>
                                <p class="mt-1 text-sm text-gray-100">Data prestasi atau penghargaan calon murid</p>
                            </div>

                            <div class="px-6 py-6 space-y-4">
                                @forelse ($enrollment->user->prestasi ?? [] as $prestasi)
                                    <div
                                        class="border border-gray-200 rounded-lg p-4 bg-gray-50 grid grid-cols-1 md:grid-cols-2 gap-4">
                                        <div>
                                            <p class="text-xs font-medium text-gray-600 mb-1">Nama Prestasi</p>
                                            <p class="text-sm font-semibold text-gray-900">{{ $prestasi->nama }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-medium text-gray-600 mb-1">Jenis Prestasi</p>
                                            <p class="text-sm font-semibold text-gray-900">{{ $prestasi->jenis }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-medium text-gray-600 mb-1">Tingkat</p>
                                            <p class="text-sm font-semibold text-gray-900">{{ $prestasi->tingkat }}
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-xs font-medium text-gray-600 mb-1">Tahun & Penyelenggara</p>
                                            <p class="text-sm font-semibold text-gray-900">{{ $prestasi->tahun }} -
                                                {{ $prestasi->penyelenggara }}</p>
                                        </div>
                                    </div>
                                @empty
                                    <div class="text-center py-8 text-gray-500">
                                        Calon murid tidak memiliki data prestasi yang diinputkan.
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <div class="review-step-container bg-white shadow rounded-lg overflow-hidden hidden"
                            data-step="4">
                            <div class="px-6 py-5 border-b border-gray-200 bg-[#009CE0]">
                                <h3 class="text-lg leading-6 font-medium text-white">Data Periodik</h3>
                                <p class="mt-1 text-sm text-gray-100">Informasi tambahan fisik dan tempat tinggal</p>
                            </div>

                            <div class="px-6 py-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Tinggi Badan</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $enrollment->user->data_periodik->tinggi_badan ?? '-' }} cm</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Berat Badan</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $enrollment->user->data_periodik->berat_badan ?? '-' }} kg</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Jarak ke Sekolah</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $enrollment->user->data_periodik->jarak ?? '-' }} km</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Waktu ke Sekolah</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $enrollment->user->data_periodik->waktu ?? '-' }} menit</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-xs font-medium text-gray-600 mb-1">Jumlah Saudara</p>
                                        <p class="text-sm font-semibold text-gray-900">
                                            {{ $enrollment->user->data_periodik->jumlahsaudara ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="review-step-container bg-white shadow rounded-lg overflow-hidden hidden"
                            data-step="5">
                            <div class="px-6 py-5 border-b border-gray-200 bg-[#009CE0]">
                                <h3 class="text-lg leading-6 font-medium text-white">Dokumen</h3>
                                <p class="mt-1 text-sm text-gray-100">Dokumen pendukung yang diajukan dalam pendaftaran
                                </p>
                            </div>

                            <div class="px-6 py-6">
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @php
                                        $dokumen = $enrollment->user->dokumen ?? null;
                                        $dokumenList = [
                                            'Akta Kelahiran' => $dokumen->akta_kelahiran ?? null,
                                            'Kartu Keluarga' => $dokumen->kk ?? null,
                                            'Foto Anak' => $dokumen->foto_anak ?? null,
                                            'KTP Orang Tua' => $dokumen->ktp ?? null,
                                            'Bukti Pembayaran' => $dokumen->bukti_pembayaran ?? null,
                                        ];
                                    @endphp

                                    @foreach ($dokumenList as $nama => $path)
                                        <div
                                            class="border border-gray-200 rounded-lg p-4 hover:shadow-md transition bg-gray-50">
                                            <div class="flex items-start">
                                                <div class="flex-shrink-0">
                                                    <svg class="h-8 w-8 text-blue-500" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" />
                                                    </svg>
                                                </div>
                                                <div class="ml-3 flex-1">
                                                    <p class="text-sm font-medium text-gray-900">{{ $nama }}
                                                    </p>
                                                    @if ($path)
                                                        <a href="{{ asset('storage/' . $path) }}" target="_blank"
                                                            class="mt-2 inline-flex items-center text-sm text-blue-600 hover:text-blue-800 font-medium">
                                                            Lihat File <span class="ml-1">→</span>
                                                        </a>
                                                    @else
                                                        <span
                                                            class="mt-2 inline-flex items-center text-sm text-red-500 font-medium">Belum
                                                            Diunggah</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="review-step-container bg-white shadow rounded-lg overflow-hidden hidden"
                            data-step="6">
                            <div class="px-6 py-5 border-b border-gray-200 bg-[#009CE0]">
                                <h3 class="text-lg leading-6 font-medium text-white">Keputusan</h3>
                                <p class="mt-1 text-sm text-gray-100">Berikan keputusan dan ubah status verifikasi
                                    pendaftaran</p>
                            </div>

                            <div class="px-6 py-6">
                                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                                    <div class="flex">
                                        <svg class="h-5 w-5 text-blue-500 mr-3 flex-shrink-0 mt-0.5"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <p class="text-sm text-blue-800">Pastikan semua informasi data telah
                                            diverifikasi sesuai persyaratan.</p>
                                    </div>
                                </div>

                                <form action="{{ route('admin.enrollment.update-status', $enrollment->id) }}"
                                    method="POST" class="space-y-4">
                                    @csrf
                                    @method('PATCH')

                                    <div>
                                        <label for="status"
                                            class="block text-sm font-medium text-gray-700 mb-3">Tetapkan
                                            Status</label>
                                        <select name="status" id="status"
                                            class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#009CE0] focus:border-transparent">
                                            <option value="Menunggu"
                                                {{ $enrollment->status === 'Menunggu' ? 'selected' : '' }}>⏳ Menunggu
                                            </option>
                                            <option value="Diterima"
                                                {{ $enrollment->status === 'Diterima' ? 'selected' : '' }}>✅ Diterima
                                            </option>
                                            <option value="Ditolak"
                                                {{ $enrollment->status === 'Ditolak' ? 'selected' : '' }}>❌ Ditolak
                                            </option>
                                        </select>
                                    </div>

                                    <button type="submit"
                                        class="w-full inline-flex justify-center items-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-[#009CE0] hover:bg-blue-700 transition">
                                        Simpan Keputusan
                                    </button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 shadow-lg"
                    style="z-index: 50;">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
                        <div class="flex justify-between items-center">
                            <button type="button" id="prevBtn"
                                class="hidden px-6 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition font-medium">
                                ← Kembali
                            </button>
                            <div class="hidden lg:block text-sm text-gray-600">
                                Langkah <span id="current-step">1</span> of 6
                            </div>
                            <button type="button" id="nextBtn"
                                class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                                Selanjutnya →
                            </button>
                        </div>
                    </div>
                </div>

                <div class="h-24"></div>

            </div>
        </div>

    </main>
    <style>
        .review-step-container {
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .step-active {
            @apply border-l-4 border-[#009CE0] bg-[#009CE01a];
            background-color: #009CE0;
            color: #fff
        }

        .stepper-mobile-active {
            @apply border-b-2 border-[#009CE0] text-[#009CE0];
        }

        .parent-tab.active {
            @apply border-b-2 border-[#009CE0] text-[#009CE0] bg-white;
            border-color: #009CE0;
            color: #009CE0;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const STEPS = 6;
            let currentStep = 1;

            const steps = [{
                    id: 1,
                    name: 'Data Anak',
                    icon: '<i class="fas fa-user"></i>'
                },
                {
                    id: 2,
                    name: 'Data Orang Tua',
                    icon: '<i class="fas fa-people-roof"></i>'
                },
                {
                    id: 3,
                    name: 'Data Prestasi',
                    icon: '<i class="fas fa-trophy"></i>'
                },
                {
                    id: 4,
                    name: 'Data Periodik',
                    icon: '<i class="fas fa-chart-bar"></i>'
                },
                {
                    id: 5,
                    name: 'Dokumen',
                    icon: '<i class="fas fa-file"></i>'
                },
                {
                    id: 6,
                    name: 'Keputusan',
                    icon: '<i class="fas fa-check-circle"></i>'
                }
            ];

            function initSteppers() {
                const desktopStepper = document.getElementById('desktop-stepper');
                const mobileStepper = document.getElementById('mobile-stepper');

                steps.forEach(step => {
                    const desktopStep = document.createElement('button');
                    desktopStep.type = 'button';
                    desktopStep.className =
                        `stepper-btn w-full text-left px-4 py-3 rounded-lg transition ${step.id === 1 ? 'step-active' : 'hover:bg-[#009ce01a]'}`;
                    desktopStep.setAttribute('data-step', step.id);
                    desktopStep.innerHTML = `
                        <div class="flex items-center gap-3">
                            <span class="flex items-center justify-center text-lg w-5 h-5">${step.icon}</span>
                            <span>${step.name}</span>
                        </div>`;
                    desktopStep.addEventListener('click', () => goToStep(step.id));
                    desktopStepper.appendChild(desktopStep);

                    const mobileStep = document.createElement('button');
                    mobileStep.type = 'button';
                    mobileStep.className =
                        `stepper-btn-mobile flex-shrink-0 py-2 px-3 border-b-2 border-gray-300 transition text-sm whitespace-nowrap ${step.id === 1 ? 'stepper-mobile-active text-[#009CE0]' : 'text-gray-600'}`;
                    mobileStep.setAttribute('data-step', step.id);
                    mobileStep.innerHTML = `${step.icon}`;
                    mobileStep.addEventListener('click', () => goToStep(step.id));
                    mobileStepper.appendChild(mobileStep);
                });
            }

            // --- MAP INITIALIZATION ---
            
            // 1. Get student coordinates (fallback to PAUD Anak Ceria if missing)
            const studentLat = {{ $enrollment->user->lintang ? $enrollment->user->lintang : '-6.3181561' }};
            const studentLng = {{ $enrollment->user->bujur ? $enrollment->user->bujur : '106.7238404' }};
            
            // 2. PAUD Anak Ceria Coordinates
            const paudLat = -6.3181561;
            const paudLng = 106.7238404;

            // 3. Create Map
            let adminMap = L.map('admin-map').setView([studentLat, studentLng], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap'
            }).addTo(adminMap);

            // 4. Add Student Home Marker (Red)
            const redIcon = new L.Icon({
                iconUrl: 'https://raw.githubusercontent.com/pointhi/leaflet-color-markers/master/img/marker-icon-2x-red.png',
                shadowUrl: 'https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.7/images/marker-shadow.png',
                iconSize: [25, 41],
                iconAnchor: [12, 41],
                popupAnchor: [1, -34],
                shadowSize: [41, 41]
            });
            
            L.marker([studentLat, studentLng], { icon: redIcon })
             .addTo(adminMap)
             .bindPopup('<b>Rumah Calon Murid</b><br>{{ $enrollment->nama }}');

            // 5. Add School Marker (Default Blue)
            L.marker([paudLat, paudLng])
             .addTo(adminMap)
             .bindPopup('<b>PAUD Anak Ceria</b>');

            // Optional: Draw a line between the two points to visualize distance
            if({{ $enrollment->user->lintang ? 'true' : 'false' }}) {
                const latlngs = [
                    [studentLat, studentLng],
                    [paudLat, paudLng]
                ];
                L.polyline(latlngs, {color: 'gray', dashArray: '5, 5'}).addTo(adminMap);
                
                // Adjust zoom to fit both pins perfectly
                adminMap.fitBounds(L.polyline(latlngs).getBounds(), { 
                    padding: [30, 30],
                    maxZoom: 17
                });
            }

            function showStep(stepNum) {
                document.querySelectorAll('.review-step-container').forEach(el => el.classList.add('hidden'));

                const currentContainer = document.querySelector(`.review-step-container[data-step="${stepNum}"]`);
                if (currentContainer) currentContainer.classList.remove('hidden');

                // Invalidate map size when showing the first step to ensure it renders correctly
                if (stepNum === 1 && typeof adminMap !== 'undefined') {
                    setTimeout(() => {
                        adminMap.invalidateSize();
                    }, 100);
                }

                document.querySelectorAll('.stepper-btn').forEach(btn => {
                    btn.classList.remove('step-active');
                    btn.classList.add('hover:bg-[#009ce01a]');
                    if (parseInt(btn.getAttribute('data-step')) === stepNum) {
                        btn.classList.add('step-active');
                        btn.classList.remove('hover:bg-[#009ce01a]');
                    }
                });

                document.querySelectorAll('.stepper-btn-mobile').forEach(btn => {
                    btn.classList.remove('stepper-mobile-active', 'text-blue-600');
                    btn.classList.add('text-gray-600', 'border-gray-300');
                    if (parseInt(btn.getAttribute('data-step')) === stepNum) {
                        btn.classList.add('stepper-mobile-active', 'text-blue-600');
                        btn.classList.remove('text-gray-600', 'border-gray-300');
                    }
                });

                document.getElementById('current-step').textContent = stepNum;
                document.getElementById('prevBtn').classList.toggle('hidden', stepNum === 1);
                document.getElementById('nextBtn').textContent = stepNum === STEPS ? 'Done ✓' : 'Next →';

                if (stepNum === 2) openParentTab('ayah');
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            }

            function goToStep(stepNum) {
                currentStep = stepNum;
                showStep(stepNum);
            }

            function openParentTab(tabName) {
                document.querySelectorAll('.parent-tab-content').forEach(el => el.classList.add('hidden'));
                document.querySelectorAll('.parent-tab').forEach(btn => {
                    btn.classList.remove('active', 'border-blue-600', 'text-blue-600', 'bg-white');
                    btn.classList.add('border-transparent', 'text-gray-700');
                });

                const tabContent = document.getElementById(`${tabName}-tab`);
                if (tabContent) tabContent.classList.remove('hidden');

                const activeBtn = document.querySelector(`.parent-tab[data-tab="${tabName}"]`);
                if (activeBtn) {
                    activeBtn.classList.add('active', 'border-blue-600', 'text-blue-600', 'bg-white');
                    activeBtn.classList.remove('border-transparent', 'text-gray-700');
                }
            }

            document.querySelectorAll('.parent-tab').forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    openParentTab(btn.getAttribute('data-tab'));
                });
            });

            document.getElementById('nextBtn').addEventListener('click', function(e) {
                e.preventDefault();
                if (currentStep < STEPS) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            document.getElementById('prevBtn').addEventListener('click', function(e) {
                e.preventDefault();
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });

            initSteppers();
            showStep(1);
        });
    </script>
</body>

</html>
