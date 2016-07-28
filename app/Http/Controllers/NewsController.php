<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $news = News::orderBy('created_at', 'desc')->paginate(20);
        return view('news.index', [
            'news' => $news,
            'request' => $request
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $judul = $request->input('title');
        $artikel = $request->input('news');

        $news = new News;
        $news->title = $judul;
        $news->news = $artikel;
        $news->slug = str_slug($news->title, '-');
        //berita satu -> berita-satu
        $news->save();

        $request->session()->flash('success_message', 'Artikel berhasil ditambah!');
        return redirect('news');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit', [
            'news' => $news
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $judul = $request->input('title');
        $artikel = $request->input('news');

        $news = News::find($id);
        $news->title = $judul;
        $news->news = $artikel;
        $news->slug = str_slug($news->title, '-');
        //berita satu -> berita-satu
        $news->save();

        $request->session()->flash('success_message', 'Artikel berhasil dirubah!');
        return redirect('news');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        News::destroy($id);
        $request->session()->flash('success_message', 'Artikel berhasil dirubah!');
        return redirect('news');
    }
}
