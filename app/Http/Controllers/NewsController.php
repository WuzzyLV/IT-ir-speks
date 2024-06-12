<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Carbon\Carbon;


class NewsController extends Controller
{
    public function new(Request $request)
    {
        return view('pages.admin.forms.edit-news', [
            'news' => null,
            'new' => true,
        ]);
    }
    public function handleNew(Request $request): RedirectResponse
    {
        $request->validate([
            'title' => 'required|unique:news,title',
            'desc' => 'required',
        ]);
        echo "here";

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20480',
            ]);

        }

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->desc;
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
    public function handleEdit(Request $request)
    {
        $news = News::find($request->id);

        return view('pages.admin.forms.edit-news', [
            'news' => $news,
            'new' => false,
        ]);
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
}
