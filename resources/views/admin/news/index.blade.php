<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin News</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <div class="max-w-7xl mx-auto mt-10 p-6">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">News</h1>
            <a href="{{ route('news.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Create News
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($news as $new)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                    <div class="p-4">
                        <h2 class="text-lg font-semibold text-gray-900 mb-2">{{ $new->title }}</h2>
                        <p class="text-gray-700 text-sm">{{ Str::limit($new->content, 100) }}</p>
                    </div>
                    <div class="p-3 bg-gray-50 text-xs text-gray-500 text-center border-t border-gray-100">
                        Dibuat: {{ $new->created_at->format('M d, Y') }}
                    </div>
                    <div class="p-3 bg-gray-100 text-center grid grid-cols-2 gap-2">
                        <form action="{{ route('news.destroy', $new->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this news item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                Delete
                            </button>
                        </form>
                        <form action="{{ route('news.showUpdate', $new->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="bg-blue-600 text-white px-3 py-1 rounded hover:bg-blue-700 transition">
                                Update
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-lg shadow-sm border border-gray-200">
                    <p class="text-gray-500">No news items have been created yet.</p>
                </div>
            @endforelse
        </div>

    </div>

</body>
</html>