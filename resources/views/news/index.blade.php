@extends('layouts.app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/sweetalert.css') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @if (Session::has('info_message'))
            <div class="alert alert-info"><p>{{ Session::get('info_message') }}</p></div>
            @endif
            @if (Session::has('warning_message'))
            <div class="alert alert-warning"><p>{{ Session::get('warning_message') }}</p></div>
            @endif
            @if (Session::has('success_message'))
            <div class="alert alert-success"><p>{{ Session::get('success_message') }}</p></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Artikel / Berita</div>
                <div class="panel-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-2" style="border">
                                <div class="btn-group btn-group-sm" role="group" aria-label="...">
                                    <a href="{{ route('news.create')}}" class="btn btn-success"><i class="fa fa-plus fa-fw"></i></a>
                                </div>
                            </div>
                            <div class="col-xs-5" align="center">
                                <form method="get" class="input-group input-group-sm">
                                    <input name="page" type="hidden" value="{{ $news->currentPage()}}" />
                                    <input name="q" type="text" class="form-control" placeholder="Cari" value="{{ $request->input('q')}}" />
                                    <div class="input-group-btn">
                                        <input type="submit" class="btn btn-success" value="Cari">
                                    </div>
                                </form>
                            </div>

                        </div><!-- /.row -->
                        <br />
                        <div class="row">
                            <div class="col-sm-12">
                                @if ( !$news->count() )
                                <div class="alert alert-warning">
                                    <p>Tidak ada data</p>
                                </div>
                                @else
                                <table class="table table-striped table-condensed table-hover table-bordered">
                                    <tr>
                                        <th>#</th>
                                        <th>Judul</th>
                                        <th>Isi Artikel</th>
                                        <th>Ditulis tanggal</th>
                                        <th>Aksi</th>
                                    </tr>
                                    <?php
                                        if ($news->currentPage() == 1) {
                                            $no = 1;
                                        } else {
                                            $no = $news->perPage() * ($news->currentPage() - 1) + 1;
                                        }
                                    ?>
                                    @foreach($news as $article)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>{!! str_limit($article->news, 200) !!}</td>
                                        <td>{{ $article->created_at->toDateTimeString() }}</td>
                                        <td align="center">
                                            <form method="POST" action="{{ route('news.destroy', $article->id)}}" accept-charset="UTF-8" id="form{{ $article->id }}">
                                                {!! csrf_field() !!}
                                                <input name="_method" type="hidden" value="DELETE">
                                                <div class="btn-group btn-group-xs">
                                                    <a class="btn btn-default" href="{{ route('news.edit', $article->id)}}"><i class="fa fa-pencil fa-fw"></i></a>
                                                    <button type="button" class="btn btn-default" onclick="deleteNews({{ $article->id }})"><i class="fa fa-trash fa-fw"></i></button>
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                {!! $news->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/sweetalert.min.js') }}"></script>
    <script>
        function deleteUser(id)
        {
            var id = id;
            swal({
                title: "Anda Yakin Ingin Menghapus?",
                text: "Anda yakin ingin menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya!",
                closeOnConfirm: true
            }, function() {
                $("#form" + id).submit();
            });
        }

        function deleteNews(id)
        {
            var id = id;
            swal({
                title: "Anda Yakin Ingin Menghapus?",
                text: "Anda yakin ingin menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya!",
                closeOnConfirm: true
            }, function() {
                $("#form" + id).submit();
            });
        }
    </script>
@endsection