<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Enrollment System</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <nav class="bg-blue-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <span class="font-bold text-xl tracking-wider">🎓 PPDB Admin Portal</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span>Welcome, {{ Auth::guard('admins')->user()->nama_admin ?? 'Admin' }}</span>
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" class="bg-blue-600 hover:bg-blue-500 px-4 py-2 rounded text-sm transition">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        
        <div class="mb-8">
            <h1 class="text-2xl font-bold text-gray-900">Dashboard Overview</h1>
            <p class="text-gray-600">Manage student applications and system settings.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-blue-500">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Total Pendaftaran</h3>
                <p class="text-3xl font-bold text-gray-800 mt-2">142</p> </div>
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-yellow-500">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Menunggu Verifikasi</h3>
                <p class="text-3xl font-bold text-gray-800 mt-2">28</p> </div>
            <div class="bg-white rounded-lg shadow p-6 border-l-4 border-green-500">
                <h3 class="text-gray-500 text-sm font-semibold uppercase tracking-wider">Diterima</h3>
                <p class="text-3xl font-bold text-gray-800 mt-2">105</p> </div>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900">Pendaftaran Terbaru (Recent Applications)</h2>
                <button class="text-blue-600 hover:text-blue-800 text-sm font-medium">View All &rarr;</button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Applicant Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date Applied</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">#001</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 font-medium">Budi Santoso</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">2026-04-24</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pending
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="#" class="text-blue-600 hover:text-blue-900 mr-3">Review</a>
                                <a href="#" class="text-gray-600 hover:text-gray-900">Download Docs</a>
                            </td>
                        </tr>
                        </tbody>
                </table>
            </div>
        </div>

    </main>

</body>
</html>