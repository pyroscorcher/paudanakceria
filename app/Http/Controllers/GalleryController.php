<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        // Using paginate instead of get() prevents the admin page from lagging 
        // if you eventually upload 100+ photos.
        $galleries = Gallery::latest()->paginate(10);
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
                             ->with('success', 'Foto berhasil diunggah!');
        }

        return back()->withErrors(['photo' => 'Failed to upload photo.']);
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        // Safety Check: Only attempt to delete the file if it actually exists on the disk
        if (Storage::disk('public')->exists($gallery->photo)) {
            Storage::disk('public')->delete($gallery->photo);
        }

        $gallery->delete();

        return redirect()->route('gallery.index')
                         ->with('success', 'Foto berhasil dihapus!');
    }
}