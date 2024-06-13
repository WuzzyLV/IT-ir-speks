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
        $perPage= 8;
        $page= $request->input('page', 1);

        $total_pages= ceil(News::count()/$perPage);
        return view('pages.admin.news', [
            'page' => $page,
            'total_pages' => $total_pages,
            'news' => News::paginate($perPage, ['*'], 'page', $page),
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
        $news->visible = $this->isVisible($request);
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
        $news->visible = $this->isVisible($request);
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
    private function isVisible(Request $request): bool
    {
        if (!$request->visible){
            return false;
        }
        return $request->visible === 'on';
    }
}
