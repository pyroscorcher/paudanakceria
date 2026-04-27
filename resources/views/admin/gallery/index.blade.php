<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Gallery</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <div class="max-w-7xl mx-auto mt-10 p-6">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Photo Gallery</h1>
            <a href="{{ route('gallery.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition">
                + Upload New Photo
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($galleries as $gallery)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden border border-gray-200">
                    <img src="{{ asset('storage/' . $gallery->photo) }}" alt="Gallery Image {{ $gallery->id }}" class="object-cover w-full">
                    <div class="p-3 bg-gray-50 text-xs text-gray-500 text-center border-t border-gray-100">
                        Added: {{ $gallery->created_at->format('M d, Y') }}
                    </div>
                    <div class="p-3 bg-gray-100 text-center">
                        <form action="{{ route('gallery.destroy', $gallery->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700 transition">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-lg shadow-sm border border-gray-200">
                    <p class="text-gray-500">No photos have been uploaded yet.</p>
                </div>
            @endforelse
        </div>

    </div>

</body>
</html>