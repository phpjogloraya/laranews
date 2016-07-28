@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h1>Arsip Berita</h1>
            @foreach($articles as $article)
                <div class="panel panel-info">
                    <div class="panel-heading">{{ $article->title }}</div>
                    <div class="panel-body">
                        {!! str_limit($article->news, 200) !!}
                        <br><br>
                        <a class="btn btn-primary" href="{{ url('berita/'.$article->slug) }}" role="button">Selengkapnya</a>
                    </div>
                    <div class="panel-footer">Ditulis oleh Admin pada {{ $article->created_at->toDateTimeString() }}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection
