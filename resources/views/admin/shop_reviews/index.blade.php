@extends('admin.layouts.layout')

@section('title')
    Категории - Список
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
                        <li class="breadcrumb-item active">Отзывы на товары</li>
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
                <h3 class="card-title">Отзывы</h3>
            </div>
            <div class="card-body">
                @if (count($reviews))
                    <div class="table-responsive">
                        <table class="display" id="reviews_table_index">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Товар</th>
                                <th>Пользователь</th>
                                <th>Оценка</th>
                                <th>Содержимое</th>
                                <th>Ответ менеджера</th>
                                <th>Дата создания</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($reviews as $review)
                                <tr>
                                    <td>{{ $review->id }}</td>
                                    <td>{{ $review->product->product_name }}</td>
                                    <td>{{ $review->user->name }}</td>
                                    <td>{{ $review->rating }}</td>
                                    <td>{{ $review->content }}</td>
                                    <td>{{ $review->manager_reply }}</td>
                                    <td>{{ $review->created_at }}</td>
                                    <td>
                                        <a href="{{ route('shop_reviews.edit', ['shop_review' => $review->id]) }}"
                                           class="btn btn-info btn-sm float-left mr-1">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{ route('shop_reviews.destroy', ['shop_review' => $review->id]) }}"
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
        $(document).ready(function () {
            $('#reviews_table_index').DataTable();
        });
    </script>
@endsection
