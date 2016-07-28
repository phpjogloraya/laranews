@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-9">
            <h1>{{ $article->title }}</h1>
            {!! $article->news !!}
            <hr>
            <b>Ditulis oleh Admin pada {{ $article->created_at->toDateTimeString() }}</b>
        </div>
    </div>
</div>

@endsection
