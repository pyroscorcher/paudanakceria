<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        // 1. Validate the input
        $validatedData = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Ensure it's an image
        ]);

        // 2. Handle the file upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('news_images', 'public');
            $validatedData['image'] = $path;
        }

        // 3. Create the record (This will now include the image path)
        News::create($validatedData);

        return redirect()->route('news.index')->with('success', 'News created successfully!');
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        // 1. Validate (Notice 'image' is nullable here so they don't HAVE to change it)
        $validatedData = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required',
            'image'   => 'nullable|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        // 2. Check if a NEW image was uploaded
        if ($request->hasFile('image')) {
            
            // Optional but recommended: Delete the old image from the server to save space
            if ($news->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($news->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($news->image);
            }

            // Upload the new image
            $path = $request->file('image')->store('news_images', 'public');
            
            // Overwrite the 'image' key in our validated data array with the new path
            $validatedData['image'] = $path;
        }

        // 3. Perform the update
        $news->update($validatedData);

        return redirect()->route('news.index')->with('success', 'News updated successfully!');
    }

    public function showUpdate($id)
    {
        $news = News::findOrFail($id);

        return view('admin.news.update', compact('news'));
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->route('news.index')
                         ->with('success', 'News deleted successfully!');
    }

    public function show($id)
    {
        $news = News::findOrFail($id);
        return view('user.news', compact('news'));
    }
}