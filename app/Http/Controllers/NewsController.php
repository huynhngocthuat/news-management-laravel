<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $newses = News::where('user_id', $user_id)->get();
        return view('news.view', ['newses' => $newses]);
    }

    public function create()
    {
        $categories = Category::all();
        $selectedCategory = null;

        return view('news.create', compact('categories', 'selectedCategory'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::user()->id;
        $title = $request->input('title');
        $content = $request->input('content');
        $category_id = $request->input('category');

        $news = new News();
        $news->title = $title;
        $news->content = $content;
        $news->category_id = $category_id;
        $news->user_id = $user_id;
        $news->save();

        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $news = News::find($id);
        return view('news.update', ['news' => $news]);
    }

    public function update(Request $request, $id)
    {
        $title = $request->input('title');
        $content = $request->input('content');
        $category_id = $request->input('category');

        $news = News::find($id);
        $news->title = $title;
        $news->content = $content;
        $news->category_id = $category_id;
        $news->save();

        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();

        $user_id = Auth::user()->id;
        $newses = News::where('user_id', $user_id)->get();
        return $newses;
    }
}
