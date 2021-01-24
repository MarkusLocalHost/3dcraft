@extends('admin.layouts.layout')

@section('title')
    Связи - Редактирование
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование связи</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование связи</li>
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
                            <h3 class="card-title">Товар "{{ $product_main->product_name }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('shop_connections.update', ['shop_product' => $product_main->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <label for="product_name">Предложенные для связи товары</label>
                                <div class="row">
                                    @foreach($recommended_products as $recommended_product)
                                        <div class="col-2">
                                            <p>{{ $recommended_product->product_name }}</p>
                                            <img src="{{ $recommended_product->getImage() }}" alt="" height="100px">
                                        </div>
                                    @endforeach
                                </div>

                                <div class="form-group">
                                    <label for="product_ids_to_connect">ID товаров для связи</label>
                                    <select name="product_ids_to_connect[]" id="product_ids_to_connect" class="select2" multiple="multiple"
                                            data-placeholder="Выбор ID товаров" style="width: 100%" data-maximum-selection-length="4">
                                        @foreach($products as $k => $v)
                                            <option value="{{ $k }}"
                                                    @if(in_array($k, $connection)) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
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
