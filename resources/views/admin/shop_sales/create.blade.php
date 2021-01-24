@extends('admin.layouts.layout')

@section('title')
    Скидка - Создание
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание скидки</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Создание скидки</li>
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
                            <h3 class="card-title">Создание скидки</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('shop_sales.store') }}">
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

                                <div class="form-group">
                                    <label for="percent">Процент</label>
                                    <input type="text" name="percent"
                                           class="form-control @error('percent') is-invalid @enderror" id="percent"
                                           placeholder="Скидка в процентах">
                                </div>

                                <div class="form-group">
                                    <label for="amount">Сумма</label>
                                    <input type="text" name="amount"
                                           class="form-control @error('amount') is-invalid @enderror" id="amount"
                                           placeholder="Сумма скидки">
                                </div>

                                <div class="form-check">
                                    <input name="status"
                                           type="hidden"
                                           value="0">

                                    <input name="status"
                                           type="checkbox"
                                           class="form-check-input"
                                           value="1">
                                    <label class="form-check-label" for="status">Активна</label>
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
