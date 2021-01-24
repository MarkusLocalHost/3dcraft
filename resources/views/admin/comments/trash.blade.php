@extends('admin.layouts.layout')

@section('title')
    Комментарии - Корзина
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Главная</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Удаленные комментарии</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Восстановление комментариев</h3>
            </div>
            <div class="card-body">
                @if (count($deleted_comments))
                    <div class="table-responsive">
                        <table class="display" id="comment_table_trash">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Содержимое</th>
                                <th>Автор</th>
                                <th>Удален</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deleted_comments as $comment)
                                <tr>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ $comment->content }}</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->deleted_at }}</td>
                                    <td>
                                        <a href="{{ route('comments.restore', ['comment' => $comment->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>В корзине пусто...</p>
                @endif
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#comment_table_trash').DataTable();
        } );
    </script>
@endsection

