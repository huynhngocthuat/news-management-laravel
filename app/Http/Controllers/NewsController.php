<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list()
    {
        $user_id = Auth::user()->id;
        $newses = News::where('user_id', $user_id)->get();
        return view('news.view', ['newses' => $newses]);
    }

    public function showCreateForm()
    {
        return view('news.create');
    }

    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $title = $request->input('title');
        $content = $request->input('content');

        $news = new News();
        $news->title = $title;
        $news->content = $content;
        $news->user_id = $user_id;
        $news->save();

        return redirect()->route('news.list');
    }
}
