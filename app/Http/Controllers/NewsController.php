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

    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $category_id = $request->query('category'); // Get selected category ID from query parameter
        $search = $request->query('search');

        $newsesQuery = News::where('user_id', $user_id);

        if ($category_id) {
            $newsesQuery->where('category_id', $category_id);
        }

        if ($search) {
            $newsesQuery->where('title', 'LIKE', "%{$search}%");
        }

        $newses = $newsesQuery->get();
        $categories = Category::all();

        return view('news.view', ['newses' => $newses, 'categories' => $categories, 'selectedCategory' => $category_id]);
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
        $categories = Category::all();
        return view('news.update', compact('news', 'categories'));
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
