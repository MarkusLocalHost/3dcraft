@extends('admin.layouts.layout')

@section('title')
    Пользователи - Редактирование
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование пользователя</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование пользователя</li>
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

                        <form role="form" method="post"
                              action="{{ route('users.update', ['user' => $user->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Имя</label>
                                    <input type="text" name="name"
                                           class="form-control @error('name') is-invalid @enderror" id="name"
                                           value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email"
                                           class="form-control @error('email') is-invalid @enderror" id="email"
                                           value="{{ $user->email }}">
                                </div>

                                <div class="form-check">
                                    <input name="is_admin"
                                           type="hidden"
                                           value="0">

                                    <input name="is_admin"
                                           type="checkbox"
                                           class="form-check-input"
                                           value="1"
                                           @if($user->is_admin) checked="checked" @endif>
                                    <label class="form-check-label" for="is_published">Администратор</label>
                                </div>

                                <div class="form-group">
                                    <label for="notes">Заметки</label>
                                    <textarea name="notes" id="notes" rows="5"
                                              class="form-control">{{ $user->notes }}</textarea>
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
                                       value="{{ $user->created_at }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="updated_at">Обновлен</label>
                                <input type="text" name="updated_at" class="form-control"
                                       value="{{ $user->updated_at }}" disabled>
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
