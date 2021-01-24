@extends('admin.layouts.layout')

@section('title')
    Комментарии - Список
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
                        <li class="breadcrumb-item active">Комментарии блога</li>
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
                <h3 class="card-title">Список комментариев</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('comments.create') }}" class="btn btn-warning mb-3">Добавить комментарий</a>
                @if (count($comments))
                    <div class="table-responsive">
                        <table class="display" id="comment_table_index">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Содержимое</th>
                                <th>Автор</th>
                                <th>ID статьи</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                                <tr @if(!$comment->is_published) style="background-color: #ccc;" @endif>
                                    <td>{{ $comment->id }}</td>
                                    <td>{{ mb_strimwidth($comment->content, 0, 150) }}...</td>
                                    <td>{{ $comment->user->name }}</td>
                                    <td>{{ $comment->post_id }}</td>
                                    <td>
                                        <a href="{{ route('comments.edit', ['comment' => $comment->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{ route('comments.destroy', ['comment' => $comment->id]) }}"
                                              method="post" class="float-left">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Подтвердите удаление')">
                                                <i
                                                    class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p>Комментариев пока нет...</p>
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
            $('#comment_table_index').DataTable();
        } );
    </script>
@endsection
