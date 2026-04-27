<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('gallery_images', 'public');

            Gallery::create([
                'photo' => $path,
            ]);

            return redirect()->route('gallery.index')
                             ->with('success', 'Photo uploaded successfully!');
        }

        return back()->withErrors(['photo' => 'Failed to upload photo.']);
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        Storage::disk('public')->delete($gallery->photo);
        $gallery->delete();

        return redirect()->route('gallery.index')
                         ->with('success', 'Photo deleted successfully!');
    }
}