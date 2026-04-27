<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Application #{{ $enrollment->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="bg-blue-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="font-bold text-xl tracking-wider">🎓 PPDB Admin Portal</span>
                </div>
                <div class="flex items-center">
                    <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-blue-200">&larr; Back to Dashboard</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                <p>{{ session('success') }}</p>
            </div>
        @endif

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                <div>
                    <h3 class="text-lg leading-6 font-medium text-gray-900">Application Information</h3>
                    <p class="mt-1 max-w-2xl text-sm text-gray-500">Personal details and application status.</p>
                </div>
                <span class="px-3 py-1 inline-flex text-sm leading-5 font-semibold rounded-full 
                    {{ $enrollment->status === 'Diterima' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $enrollment->status === 'Ditolak' ? 'bg-red-100 text-red-800' : '' }}
                    {{ $enrollment->status === 'Menunggu' ? 'bg-yellow-100 text-yellow-800' : '' }}">
                    {{ $enrollment->status }}
                </span>
            </div>

            <div class="border-t border-gray-200">
                <dl>
                    <div class="bg-gray-50 px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Full name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $enrollment->nama }}</dd>
                    </div>
                    <div class="bg-white px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">NISN</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $enrollment->nisn }}</dd>
                    </div>
                    <div class="bg-gray-50 px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Gender</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $enrollment->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan' }}</dd>
                    </div>
                    <div class="bg-white px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Place & Date of Birth</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $enrollment->tempat_lahir }}, {{ $enrollment->tanggal_lahir->format('d F Y') }}</dd>
                    </div>
                    <div class="bg-gray-50 px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Parent's Name</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $enrollment->nama_orangtua }}</dd>
                    </div>
                    <div class="bg-white px-6 py-4 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">Account Email</dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">{{ $enrollment->user->email ?? 'N/A' }}</dd>
                    </div>
                </dl>
            </div>

            <div class="bg-gray-50 px-6 py-5 border-t border-gray-200">
                <h4 class="text-sm font-medium text-gray-900 mb-4">Admin Actions</h4>
                
                <form action="{{ route('admin.enrollment.update-status', $enrollment->id) }}" method="POST" class="flex items-center space-x-4">
                    @csrf
                    @method('PATCH')
                    
                    <select name="status" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                        <option value="Menunggu" {{ $enrollment->status === 'Menunggu' ? 'selected' : '' }}>Pending</option>
                        <option value="Diterima" {{ $enrollment->status === 'Diterima' ? 'selected' : '' }}>Accepted</option>
                        <option value="Ditolak" {{ $enrollment->status === 'Ditolak' ? 'selected' : '' }}>Rejected</option>
                    </select>

                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
    </main>

</body>
</html>