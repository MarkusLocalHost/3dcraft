@extends('admin.layouts.layout')

@section('title')
    Категории - Создание
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание категории</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Создание категории блога</li>
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
                            <h3 class="card-title">Создание категории</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('categories.store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title">Название</label>
                                    <input type="text" name="title"
                                           class="form-control @error('title') is-invalid @enderror" id="title"
                                           placeholder="Название">
                                </div>

                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea name="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                              id="description"
                                              placeholder="Описание"></textarea>
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
            .create(document.querySelector('#description'), {
                toolbar: ['|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo']
            })
            .catch(function (error) {
                console.error(error);
            });
    </script>
@endsection
