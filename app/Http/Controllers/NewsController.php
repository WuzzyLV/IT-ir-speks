<?php

namespace App\Http\Controllers;

use App\Helpers\FileUtils;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function adminNews(Request $request)
    {
        $perPage = 10; // Number of items per page
        $currentPage = $request->query('page', 1); // Current page, default to 1

        // Retrieve total news count (for pagination)
        $totalNewsCount = News::count();
        $totalPages = ceil($totalNewsCount / $perPage); // Calculate total pages

        // Calculate offset
        $offset = ($currentPage - 1) * $perPage;

        // Fetch news for the current page
        $newsList = News::orderBy('created_at', 'desc')
            ->skip($offset)
            ->take($perPage)
            ->get();

        return view('pages.admin.news', [
            'newsList' => $newsList,
            'currentPage' => $currentPage,
            'totalPages' => $totalPages,
        ]);
    }
    public function new(Request $request)
    {
        return view('pages.admin.forms.edit-news', [
            'news' => null,
            'new' => true,
        ]);
    }
    public function handleNew(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'desc' => 'required'
        ]);


        $file = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,webp,jpg,gif,svg|max:20480',
            ]);
            $file = FileUtils::store($request->file('image'));
        }

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->desc = $request->desc;
        $news->file_id = $file ? $file->id : null;
        $news->save();

        return redirect()->route('admin-news');
    }

    public function edit(Request $request)
    {
        $news = News::find($request->id);

        return view('pages.admin.forms.edit-news', [
            'news' => $news,
            'new' => false,
        ]);
    }
    public function handleEdit(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'desc' => 'required'
        ]);


        $file = null;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,webp,jpg,gif,svg|max:20480',
            ]);
            $file = FileUtils::store($request->file('image'));
        }

        $news = News::find($request->id);
        $news->title = $request->title;
        $news->content = $request->content;
        $news->desc = $request->desc;
        if ($file) {
            $news->file_id = $file->id;
        }
        $news->save();

        return redirect()->route('admin-news');
    }

    public function destroy(Request $request): RedirectResponse
    {
        $news = News::find($request->id);
        if (!$news) {
            return redirect()->back()->withErrors(['error' => 'Aktualitāte nav atrasta']);
        }

        $news->delete();

        return redirect()->route('admin-news');
    }

    public function view(Request $request)
    {
        $news = News::find($request->id);

        return view('pages.news.news-page', [
            'news' => $news,
        ]);
    }
}
