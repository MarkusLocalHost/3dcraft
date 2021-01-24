@extends('admin.layouts.layout')

@section('title')
    Теги - Редактирование
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование тега</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование тега блога</li>
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
                            <h3 class="card-title">Тег "{{ $tag->title }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post"
                              action="{{ route('tags.update', ['tag' => $tag->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           value="{{ $tag->title }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea name="description" id="description" rows="3"
                                              class="form-control">{{ $tag->description }}</textarea>
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
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Доп. информация</h3>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="created_at">Создан</label>
                                <input type="text" name="created_at" class="form-control"
                                       value="{{ $tag->created_at }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="updated_at">Обновлен</label>
                                <input type="text" name="updated_at" class="form-control"
                                       value="{{ $tag->updated_at }}" disabled>
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
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: ['|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo']
            })
            .catch(function (error) {
                console.error(error);
            });
    </script>
@endsection
