@extends('admin.layouts.layout')

@section('title')
    Товары - Редактирование
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование товара</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование товара</li>
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
                            <h3 class="card-title">Товар "{{ $product->product_name }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('shop_products.update', ['shop_product' => $product->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product_name">Название</label>
                                    <input type="text" name="product_name"
                                           class="form-control @error('product_name') is-invalid @enderror" id="product_name"
                                           value="{{ $product->product_name }}">
                                </div>

                                <div class="form-group">
                                    <label for="content">Описание</label>
                                    <textarea name="content" id="content" rows="3"
                                              class="form-control @error('content') is-invalid @enderror">{{ $product->content }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="keywords">Ключевые слова</label>
                                    <input type="text" name="keywords"
                                           class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                                           value="{{ $product->keywords }}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Контент</label>
                                    <textarea name="description" id="description" rows="5"
                                              class="form-control">{{ $product->description }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <input type="text" name="price"
                                           class="form-control @error('price') is-invalid @enderror" id="price"
                                           value="{{ $product->price }}">
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        @foreach($categories as $k => $v)
                                            <option value="{{ $k }}"
                                                    @if($k == $product->category_id) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="size">Размер</label>
                                    <input type="text" name="size"
                                           class="form-control @error('size') is-invalid @enderror" id="size"
                                           value="{{ $product->size }}">
                                </div>

                                <div class="form-group">
                                    <label for="color">Цвет</label>
                                    <input type="text" name="color"
                                           class="form-control @error('color') is-invalid @enderror" id="color"
                                           value="{{ $product->color }}">
                                </div>

                                <div class="form-group">
                                    <label for="brand">Бренд</label>
                                    <input type="text" name="brand"
                                           class="form-control @error('brand') is-invalid @enderror" id="brand"
                                           value="{{ $product->brand }}">
                                </div>

                                <div class="form-group">
                                    <label for="image">Изображение (800x460)</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="image" id="image"
                                                   class="custom-file-input">
                                            <label for="image" class="custom-file-label">Выберите файл</label>
                                        </div>
                                    </div>
                                    <div>
                                        <img src="{{ $product->getImage() }}" alt="" class="img-thumbnail mt-2"
                                             width="200px">
                                    </div>
                                </div>

                                <div class="form-check">
                                    <input name="status"
                                           type="hidden"
                                           value="0">

                                    <input name="status"
                                           type="checkbox"
                                           class="form-check-input"
                                           value="1"
                                           @if($product->status) checked="checked" @endif>
                                    <label class="form-check-label" for="status">Активен</label>
                                </div>

                                <div class="form-check">
                                    <input name="hit"
                                           type="hidden"
                                           value="0">

                                    <input name="hit"
                                           type="checkbox"
                                           class="form-check-input"
                                           value="1"
                                           @if($product->hit) checked="checked" @endif>
                                    <label class="form-check-label" for="hit">Хит</label>
                                </div>

                                <div class="form-group">
                                    <label for="sale_id">Скидка</label>
                                    <select name="sale_id" id="sale_id" class="form-control">
                                        <option value="">Без скидки</option>
                                        @foreach($sales as $k => $v)
                                            <option value="{{ $k }}"
                                                    @if($k == $product->sale_id) selected @endif>{{ $v }}</option>
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

@section('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#description'), {
                toolbar: ['|', 'heading', '|', 'bold', 'italic', '|', 'undo', 'redo']
            })
            .catch(function (error) {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#content'), {
                ckfinder: {
                    uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                },
                toolbar: {
                    items: [
                        'heading',
                        '|',
                        'bold',
                        'italic',
                        'link',
                        'bulletedList',
                        'numberedList',
                        '|',
                        'indent',
                        'outdent',
                        'alignment',
                        '|',
                        'blockQuote',
                        'insertTable',
                        'undo',
                        'redo',
                        'CKFinder',
                        'mediaEmbed'
                    ]
                },
                language: 'ru',
                image: {
                    toolbar: [
                        'imageTextAlternative',
                        'imageStyle:full',
                        'imageStyle:side'
                    ]
                },
                table: {
                    contentToolbar: [
                        'tableColumn',
                        'tableRow',
                        'mergeTableCells'
                    ]
                },
            })
            .catch(function (error) {
                console.error(error);
            });
    </script>
@endsection
