@extends('layouts.main')

@section('title')
    Dking - Сравнение
@endsection

@section('content')
    <div class="breadcrumb-area breadcrumb-mt breadcrumb-ptb-2">
        <div class="container">
            <div class="breadcrumb-content text-center">
                <h2>Сравнение {{ $type_name }}</h2>
            </div>
        </div>
    </div>
    <div class="compare-page-wrapper bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Compare Page Content Start -->
                    <div class="compare-page-content-wrap">
                        @if($type_name === 'Моделей')
                            @if($products !== null)
                                <div class="compare-table table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <tbody>
                                        <tr>
                                            <td class="first-column">Наименование</td>
                                            @foreach($products as $product)
                                                <td class="product-image-title">
                                                    <a href="{{ route('shop.product', ['shop_product' => $product->slug]) }}" class="image">
                                                        <img class="img-fluid" src="{{ $product->getImage() }}" alt="Compare Product">
                                                    </a>
                                                    <a href="{{ route('shop.category', ['shop_section' => $product->category->section->slug,'shop_category' => $product->category->slug]) }}" class="category">{{ $product->category->title }}</a>
                                                    <a href="{{ route('shop.product', ['shop_product' => $product->slug]) }}" class="title">{{ $product->product_name }}</a>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Описание</td>
                                            @foreach($products as $product)
                                                <td class="pro-desc">
                                                    <p>{{ $product->content }} </p>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Цена</td>
                                            @foreach($products as $product)
                                                <td class="pro-price">{{ $product->price }} ₽</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Размеры</td>
                                            @foreach($products as $product)
                                                <td class="pro-color">{{ $product->color }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Наличие</td>
                                            @foreach($products as $product)
                                                @if($product->status = 1)
                                                    <td class="pro-stock">В наличии</td>
                                                @else
                                                    <td class="pro-stock">Предзаказ</td>
                                                @endif
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Оценка</td>
                                            @foreach($products as $product)
                                                <td class="pro-ratting">
                                                    <i class="icon-rating"></i>
                                                    <i class="icon-rating"></i>
                                                    <i class="icon-rating"></i>
                                                    <i class="icon-rating"></i>
                                                    <i class="icon-rating"></i>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">В корзину</td>
                                            @foreach($products as $product)
                                                <td><a href="cart.html" class="btn btn-outline-secondary">Добавить в корзину</a></td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Убрать из сравнения</td>
                                            @foreach($products as $product)
                                                <td class="pro-remove">
                                                    <a id="removeFromCompare" data-id="{{ $product->id }}"><img class="inject-me" src="{{ asset('assets/front/img/icon-img/close.svg') }}" alt=""></a>
                                                </td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h4>Вы пока не добавляли товары к сравнению. <a href="{{ route('shop.section', ['shop_section' => 'populyarnye-modeli']) }}">Перейти к продуктам?</a></h4>
                            @endif
                        @else
                            @if($products !== null)
                                <div class="compare-table table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <tbody>
                                        <tr>
                                            <td class="first-column">Наименование</td>
                                            @foreach($products as $product)
                                                <td class="product-image-title">
                                                    <a href="{{ route('shop.product', ['shop_product' => $product->slug]) }}" class="image">
                                                        <img class="img-fluid" src="{{ $product->getImage() }}" alt="Compare Product">
                                                    </a>
                                                    <a href="{{ route('shop.category', ['shop_section' => $product->category->section->slug,'shop_category' => $product->category->slug]) }}" class="category">{{ $product->category->title }}</a>
                                                    <a href="{{ route('shop.product', ['shop_product' => $product->slug]) }}" class="title">{{ $product->product_name }}</a>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Описание</td>
                                            @foreach($products as $product)
                                                <td class="pro-desc">
                                                    <p>{{ $product->content }} </p>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Цена</td>
                                            @foreach($products as $product)
                                                <td class="pro-price">{{ $product->price }} ₽</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Размеры</td>
                                            @foreach($products as $product)
                                                <td class="pro-color">{{ $product->color }}</td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Оценка</td>
                                            @foreach($products as $product)
                                                <td class="pro-ratting">
                                                    <i class="icon-rating"></i>
                                                    <i class="icon-rating"></i>
                                                    <i class="icon-rating"></i>
                                                    <i class="icon-rating"></i>
                                                    <i class="icon-rating"></i>
                                                </td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">В корзину</td>
                                            @foreach($products as $product)
                                                <td><a href="cart.html" class="btn btn-outline-secondary">Добавить в корзину</a></td>
                                            @endforeach
                                        </tr>
                                        <tr>
                                            <td class="first-column">Убрать из сравнения</td>
                                            @foreach($products as $product)
                                                <td class="pro-remove">
                                                    <a id="removeFromCompare" data-id="{{ $product->id }}"><img class="inject-me" src="{{ asset('assets/front/img/icon-img/close.svg') }}" alt=""></a>
                                                </td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h4>Вы пока не добавляли товары к сравнению. <a href="{{ route('shop.section', ['shop_section' => 'plastik']) }}">Перейти к продуктам?</a></h4>
                            @endif
                        @endif
                    </div>
                    <!-- Compare Page Content End -->
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('a#removeFromCompare').click( function () {
                let product_id = $(this).data('id');
                let url = "/compare/remove";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}', product_id: product_id},
                    success: function (response) {
                        window.location.reload();
                    },
                    error: function (response) {
                        console.log(response)
                    }
                })
            })
        })
    </script>
@endsection
