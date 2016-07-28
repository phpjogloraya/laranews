<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\News;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('created_at')->paginate();
        return view('home', ['news' => $news]);
    }

    public function news($slug = null)
    {
        if (is_null($slug)) {
            return view('news.news', [
                'articles' => News::orderBy('created_at', 'desc')->paginate(10)
            ]);
        }

        return view('news.show', [
            'article' => News::where('slug', $slug)->firstOrFail()
        ]);
    }
}
