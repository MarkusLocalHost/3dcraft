@extends('admin.layouts.layout')

@section('title')
    Пользователь - Информация
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Информация о пользователе</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Информация о пользователе</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Пользователь "{{ $user->name }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <ul class="nav nav-tabs mb-3" role="tablist">
                                <li class="nav-item">
                                    <a href="#maindata" class="nav-link active" data-toggle="tab" role="tab">Основные данные</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#data_post" role="tab">Статьи пользователя</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#data_comment" role="tab">Комментарии пользователя</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#data_notes" role="tab">Заметки о пользователе</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="maindata" role="tabpanel">
                                    <div class="form-group">
                                        <label for="name">Имя</label>
                                        <input type="text" name="name"
                                               class="form-control @error('name') is-invalid @enderror" id="name"
                                               value="{{ $user->name }}" disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" name="email"
                                               class="form-control @error('email') is-invalid @enderror" id="email"
                                               value="{{ $user->email }}" disabled>
                                    </div>
                                </div>
                                <div class="tab-pane" id="data_post" role="tabpanel">
                                    <div class="form-group">
                                        @if(count($user->comments))
                                            <div class="table-responsive">
                                                <table class="display" id="user_posts_table_index">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 30px">#</th>
                                                        <th>Заголовок</th>
                                                        <th>Дата публикации</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($user->posts as $post)
                                                        <tr @if(!$post->is_published) style="background-color: #ccc;" @endif>
                                                            <td>{{ $post->id }}</td>
                                                            <td><a href="{{ route('posts.edit', ['post' => $post->id]) }}">{{ $post->title }}</a></td>
                                                            <td>{{ $post->published_at }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <p>Данный пользователь не оставлял комментарии</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="data_comment" role="tabpanel">
                                    <div class="form-group">
                                        @if(count($user->comments))
                                            <div class="table-responsive">
                                                <table class="display" id="user_comments_table_index">
                                                    <thead>
                                                    <tr>
                                                        <th style="width: 30px">#</th>
                                                        <th>Содержимое</th>
                                                        <th>ID статьи</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($user->comments as $comment)
                                                        <tr @if(!$comment->is_published) style="background-color: #ccc;" @endif>
                                                            <td>{{ $comment->id }}</td>
                                                            <td><a href="{{ route('comments.edit', ['comment' => $comment->id]) }}">{{ mb_strimwidth($comment->content, 0, 90) }}...</a></td>
                                                            <td>{{ $comment->post_id }}</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        @else
                                            <p>Данный пользователь не оставлял комментарии</p>
                                        @endif
                                    </div>
                                </div>
                                <div class="tab-pane" id="data_notes" role="tabpanel">
                                    <div class="form-group">
                                        <label for="notes">Заметки</label>
                                        <textarea name="notes" id="notes" rows="5"
                                                  class="form-control" disabled>{{ $user->notes }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Доп. информация</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="created_at">Создан</label>
                                <input type="text" name="created_at" class="form-control"
                                       value="{{ $user->created_at }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="updated_at">Обновлен</label>
                                <input type="text" name="updated_at" class="form-control"
                                       value="{{ $user->updated_at }}" disabled>
                            </div>
                            <div class="form-check">
                                <input name="is_admin"
                                       type="checkbox"
                                       class="form-check-input"
                                       value="1"
                                       @if($user->is_admin) checked="checked" @endif disabled>
                                <label for="updated_at">Администратор</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#user_comments_table_index').DataTable();
            $('#user_posts_table_index').DataTable();
        } );
    </script>
@endsection
