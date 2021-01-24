@extends('admin.layouts.layout')

@section('title')
    Товары - Галерея товара
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Галерея товара</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Галерея товара</li>
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
                            <h3 class="card-title">Товар "{{ $product_id }}"</h3>
                        </div>
                        <!-- /.card-header -->


                        <div class="card-body">
                            <a href="{{ route('shop_products.gallery_add_photo', ['shop_product' => $product_id]) }}"
                               class="btn btn-primary mb-3">Добавить изображения</a>

                            <div class="row">
                                @foreach($gallery as $photo)
                                    <div class="col-sm-2 pt-1">
                                        <a href="{{ $photo->getImage() }}" data-toggle="lightbox"
                                           data-gallery="image-gallery">
                                            <img src="{{ $photo->getImage() }}" class="img-fluid mb-2">
                                        </a>
                                        <form role="form" method="post"
                                              action="{{ route('shop_products.gallery_delete_photo', ['shop_product' => $product_id]) }}">
                                            @csrf
                                            <input type="hidden" name="image" value="{{ $photo->image }}">
                                            <button type="submit" class="btn btn-outline-danger">Удалить</button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"
            integrity="sha512-Y2IiVZeaBwXG1wSV7f13plqlmFOx8MdjuHyYFVoYzhyRr3nH/NMDjTBSswijzADdNzMyWNetbLMfOpIPl6Cv9g=="
            crossorigin="anonymous"></script>
    <script>
        $(document).on('click', '[data-toggle="lightbox"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
@endsection
