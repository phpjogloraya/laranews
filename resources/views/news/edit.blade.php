@extends('layouts.app')
@section('styles')
    <link rel="stylesheet" href="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.css">
    <link rel="stylesheet" href="http://blackrockdigital.github.io/startbootstrap-sb-admin-2/dist/css/sb-admin-2.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}" media="screen" title="no title" charset="utf-8">
@endsection
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            @if (Session::has('info_message'))
            <div class="alert alert-info"><p>{{ Session::get('info_message') }}</p></div>
            @endif
            @if (Session::has('success_message'))
            <div class="alert alert-success"><p>{{ Session::get('success_message') }}</p></div>
            @endif
            <form action="{{ route('news.update', $news->id) }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="id" value="{{ $news->id }}">
                {{ method_field('PUT') }}
                <div class="panel panel-default">
                    <div class="panel-heading">Tambah Tulisan</div>
                    <div class="panel-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 form-control-label">Judul</label>
                            <div class="col-sm-6">
                                <input type="text" name="title" class="form-control" placeholder="Judul" value="{{ $news->title }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-2 form-control-label">Tulisan</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="10"  name="news">{!! $news->news !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4">
                                <input type="submit" class="btn btn-primary" value="Simpan">
                                <a class="btn btn-default" href="{{ url('artikel') }}" role="button">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/components/wysihtml5x/dist/wysihtml5x-toolbar.min.js"></script>
<script src="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/components/handlebars/handlebars.runtime.min.js"></script>
<script src="http://bootstrap-wysiwyg.github.io/bootstrap3-wysiwyg/dist/bootstrap3-wysihtml5.min.js"></script>
<script src="{{ asset('js/sweetalert.min.js') }}"></script>
<script>
    $('textarea').wysihtml5({
        toolbar: {
            "font-styles": true,
            emphasis: true,
            lists: true,
            link: true,
            image: true,
            color: true,
            blockquote: true,
            html: true
        }
    });
</script>
@endsection
