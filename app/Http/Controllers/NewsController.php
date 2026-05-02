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
        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:500',
        ]);

        News::create($request->only(['title', 'content']));

        return redirect()->route('news.index')
                         ->with('success', 'News created successfully!');
    }

    public function update(Request $request, $id)
    {   
        $news = News::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:100',
            'content' => 'required|string|max:500',
        ]);

        $news->update($request->only(['title', 'content']));

        return redirect()->route('news.index')
                         ->with('success', 'News updated successfully!');
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
}