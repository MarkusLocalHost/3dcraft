@extends('admin.layouts.layout')

@section('title')
    Товары - Корзина
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Удаленные товары</h1>
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
                <h3 class="card-title">Восстановление товаров</h3>
            </div>
            <div class="card-body">
                @if (count($deleted_products))
                    <div class="table-responsive">
                        <table class="display" id="post_table_trash">
                            <thead>
                            <tr>
                                <th style="width: 30px">#</th>
                                <th>Название</th>
                                <th>Категория</th>
                                <th>Добавлен</th>
                                <th>Удален</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($deleted_products as $product)
                                <tr @if(!$product->status) style="background-color: #ccc;" @endif>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->category->title }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->deleted_at }}</td>
                                    <td>
                                        <a href="{{ route('shop_products.restore', ['shop_product' => $product->id]) }}"
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
