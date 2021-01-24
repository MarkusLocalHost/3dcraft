@extends('admin.layouts.layout')

@section('title')
    Товары - Создание
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Новый товар</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Создание товара</li>
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
                            <h3 class="card-title">Создание товара</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('shop_products.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="product_name">Название</label>
                                    <input type="text" name="product_name"
                                           class="form-control @error('product_name') is-invalid @enderror" id="product_name"
                                           placeholder="Название товара">
                                </div>

                                <div class="form-group">
                                    <label for="content">Контент</label>
                                    <textarea name="content" id="content" rows="3" class="form-control @error('content') is-invalid @enderror"
                                              placeholder="Описание товара"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="keywords">Ключевые слова</label>
                                    <input type="text" name="keywords"
                                           class="form-control @error('keywords') is-invalid @enderror" id="keywords"
                                           placeholder="[SEO] Ключевые слова">
                                </div>

                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea name="description" id="description" rows="5" class="form-control"
                                              placeholder="[SEO] Описание"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="price">Цена</label>
                                    <textarea name="price" id="price" rows="3" class="form-control @error('price') is-invalid @enderror"
                                              placeholder="Цена"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Выбор категории</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" data-id="{{ $category->section_id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group" id="filters">
                                    <label>Параметры для фильтров</label>
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
                                </div>

                                <div class="form-check">
                                    <input name="status"
                                           type="hidden"
                                           value="0">

                                    <input name="status"
                                           type="checkbox"
                                           class="form-check-input"
                                           value="1">
                                    <label class="form-check-label" for="status">Активен</label>
                                </div>

                                <div class="form-check">
                                    <input name="hit"
                                           type="hidden"
                                           value="0">

                                    <input name="hit"
                                           type="checkbox"
                                           class="form-check-input"
                                           value="1">
                                    <label class="form-check-label" for="hit">Хит</label>
                                </div>

                                <div class="form-group">
                                    <label for="sale_id">Скидка</label>
                                    <select name="sale_id" id="sale_id" class="form-control">
                                        <option value="">Без скидки</option>
                                        @foreach($sales as $k => $v)
                                            <option value="{{ $k }}">{{ $v }}</option>
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

        $('select#category_id').click(function () {
            let type = $('select#category_id option:selected').data('id');
            if (type === 1) {
                $('div.form-group#filters').html('<label for="size">Размер</label>\n' +
                    '                             <input type="text" name="size"\n' +
                    '                             class="form-control @error("size") is-invalid @enderror" id="size"\n' +
                    '                             placeholder="Высота модели в сантиметрах">');
            }
            if (type === 2) {
                $('div.form-group#filters').html('');
            }
            if (type === 3) {
                $('div.form-group#filters').html('<label for="size">Вес</label>\n' +
                    '                                            <input type="text" name="size"\n' +
                    '                                                   class="form-control @error("size") is-invalid @enderror" id="size"\n' +
                    '                                                   placeholder="Вес в граммах">\n' +
                    '\n' +
                    '                                            <label for="color">Цвет</label>\n' +
                    '                                            <input type="text" name="color"\n' +
                    '                                                   class="form-control @error("color") is-invalid @enderror" id="color"\n' +
                    '                                                   placeholder="Цвет">\n' +
                    '\n' +
                    '                                            <label for="brand">Бренд</label>\n' +
                    '                                            <input type="text" name="brand"\n' +
                    '                                                   class="form-control @error("brand") is-invalid @enderror" id="brand"\n' +
                    '                                                   placeholder="Бренд">');
            }
        });
    </script>
@endsection

