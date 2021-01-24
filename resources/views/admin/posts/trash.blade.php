@extends('admin.layouts.layout')

@section('title')
    Посты - Корзина
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Удаленные статьи</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Корзина</li>
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
                <h3 class="card-title">Восстановление статей</h3>
            </div>
            <div class="card-body">
                @if (count($deleted_posts))
                    <div class="table-responsive">
                        <table class="display" id="post_table_trash">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Заголовок</th>
                                <th>Категория</th>
                                <th>Теги</th>
                                <th>Дата публикации</th>
                                <th>Дата удаления</th>
                                <th>Автор</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deleted_posts as $post)
                                <tr @if(!$post->is_published) style="background-color: #ccc;" @endif>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category['title'] }}</td>
                                    <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
                                    <td>{{ $post->published_at }}</td>
                                    <td>{{ $post->deleted_at }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>
                                        <a href="{{ route('posts.restore', ['post' => $post->id]) }}"
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
            $('#post_table_trash').DataTable();
        } );
    </script>
@endsection
