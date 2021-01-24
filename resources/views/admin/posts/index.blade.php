@extends('admin.layouts.layout')

@section('title')
    Посты - Список
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
                        <li class="breadcrumb-item active">Список постов</li>
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
                <h3 class="card-title">Список статей</h3>
            </div>
            <div class="card-body">
                <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">Добавить статью</a>
                @if (count($posts))
                    <div class="table-responsive">
                        <table class="display" id="post_table_index">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Заголовок</th>
                                <th>Категория</th>
                                <th>Теги</th>
                                <th>Дата публикации</th>
                                <th>Автор</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr @if(!$post->is_published) style="background-color: #ccc;" @endif>
                                    <td>{{ $post->id }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->category['title'] }}</td>
                                    <td>{{ $post->tags->pluck('title')->join(', ') }}</td>
                                    <td>{{ $post->published_at }}</td>
                                    <td>{{ $post->user->name }}</td>
                                    <td>
                                        <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{ route('posts.destroy', ['post' => $post->id]) }}"
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
                    <p>Статей пока нет...</p>
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
            $('#post_table_index').DataTable();
        } );
    </script>
@endsection
