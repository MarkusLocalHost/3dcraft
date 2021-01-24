@extends('admin.layouts.layout')

@section('title')
    Комментарии - Добавление
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание комментария</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Создание комментария</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Создание комментария</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('comments.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="content">Содержимое</label>
                                    <textarea type="text" name="content"
                                              class="form-control @error('content') is-invalid @enderror" id="content"
                                              placeholder="Содержимое"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="post_id">Пост</label>
                                    <select name="post_id" id="post_id" class="select2"
                                            data-placeholder="Выбор поста" style="width: 100%">
                                        @foreach($posts as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="user_id">Пользователь</label>
                                    <select name="user_id" id="user_id" class="select2"
                                            data-placeholder="Выбор пользователя" style="width: 100%">
                                        @foreach($users as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="parent_id">В ответ на:</label>
                                    <select name="parent_id" id="parent_id" class="select2"
                                            data-placeholder="Выбор комментария" style="width: 100%">
                                        <option value="null">Самостоятельный комментарий</option>
                                        @foreach($comments as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-check">
                                    <input name="is_published"
                                           type="hidden"
                                           value="0">

                                    <input name="is_published"
                                           type="checkbox"
                                           class="form-check-input"
                                           value="1">
                                    <label class="form-check-label" for="is_published">Опубликовано</label>
                                </div>
                            </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                    </div>
                    </form>

                </div>
                <!-- /.card -->

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
        ClassicEditor
            .create(document.querySelector('#content'), {
                toolbar: ['|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo']
            })
            .catch(function (error) {
                console.error(error);
            });
    </script>
@endsection


