@extends('admin.layouts.layout')

@section('title')
    Связи - Список
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
                        <li class="breadcrumb-item active">Список связей</li>
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
                <h3 class="card-title">Список связей</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="display" id="post_table_index">
                        <thead>
                        <tr>
                            <th style="width: 30px">#</th>
                            <th>Название</th>
                            <th>ID связанных товаров</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->product_name }}</td>
                                    <td>
                                        @if($product->connection !== null){{ $product->connection->product_ids_to_connect }}
                                        @else Пусто
                                        @endif
                                    </td>
                                <td>
                                    <a href="{{ route('shop_connections.edit', ['shop_product' => $product->id]) }}"
                                       class="btn btn-info btn-sm float-left mr-1">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
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
            $('#post_table_index').DataTable();
        });
    </script>
@endsection
