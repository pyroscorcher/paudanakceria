<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update News - Admin News</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">Update News</h2>
            <a href="{{ route('news.index') }}" class="text-blue-600 hover:underline">&larr; Back to News</a>
        </div>
        <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">News Title</label>
                <input type="text" name="title" id="title" class="block w-full border border-gray-300 rounded p-2" value="{{ old('title', $news->title) }}">

                <label for="content" class="block text-sm font-medium text-gray-700 mt-4 mb-2">News Content</label>
                <textarea name="content" id="content" rows="5" class="block w-full border border-gray-300 rounded p-2">{{ old('content', $news->content) }}</textarea>

                @error('title')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

                @error('content')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold py-2 px-4 rounded hover:bg-blue-700 transition duration-200">
                Update News
            </button>
    </div>

</body>
</html>