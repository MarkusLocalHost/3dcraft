@extends('layouts.main')

@section('title')
    3DCraft - Корзина
@endsection

@section('content')
    <div class="breadcrumb-area breadcrumb-mt"></div>
    @if($products)
        <div class="cart-check-order-link-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 ml-auto mr-auto">
                        <div class="cart-check-order-link">
                            <a class="active" href="{{ route('user.cart') }}">Корзина</a>
                            <a>Оформление</a>
                            <a>Завершение</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 ml-auto mr-auto" id="error"></div>
                </div>
            </div>
        </div>
        <div class="cart-area bg-gray pt-100 pb-160">
            <div class="container">
                <form action="cart.html#">
                    <div class="proceed-btn">
                        <a href="{{ route('order.create') }}?" id="toCheckout">Перейти к оформлению</a>
                    </div>
                    <div class="cart-table-content">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th>Продукт</th>
                                    <th class="th-text-center"> Цена</th>
                                    <th class="th-text-center">Количество</th>
                                    <th class="th-text-center">Итог</th>
                                    <th class="th-text-center">Удалить</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr data-id="{{ $product->id }}">
                                        <td class="cart-product">
                                            <div class="product-img-info-wrap">
                                                <div class="product-img">
                                                    <a href="cart.html#"><img src="{{ $product->getImage() }}"
                                                                              alt=""></a>
                                                </div>
                                                <div class="product-info">
                                                    <h4><a href="cart.html#">{{ $product->product_name }}</a></h4>
                                                    <span>Color :  Black</span>
                                                    <span>Size :     SL</span>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-price" id="{{ $product->id }}">@if($product->sale_id != null)
                                                <span class="amount">{{ ($product->price - $product->sale->amount) * (100 - $product->sale->percent)/100 }} ₽</span>@else
                                                <span class="amount">{{ $product->price }} ₽</span>@endif
                                        </td>
                                        <td class="cart-quality">
                                            <div class="pro-details-quality">
                                                <div class="cart-plus-minus" data-id="{{ $product->id }}">
                                                    <input class="cart-plus-minus-box plus-minus-width-inc" type="text"
                                                           name="qtybutton"
                                                           value="{{ implode($cartData[$product->id]) }}">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="product-total" id="{{ $product->id }}">@if($product->sale_id != null)
                                                <span>{{ ($product->price - $product->sale->amount) * (100 - $product->sale->percent)/100 * implode($cartData[$product->id]) }} ₽</span>@else
                                                <span>{{ $product->price * implode($cartData[$product->id]) }} ₽</span>@endif
                                        </td>
                                        <td class="product-remove"><a id="removeFromCart"
                                                                      data-id="{{ $product->id }}"><img
                                                    class="inject-me"
                                                    src="{{ asset('assets/front/img/icon-img/close.svg') }}"
                                                    alt=""></a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-shiping-update-wrapper">
                            <a href="{{ route('shop.index') }}">Продолжить покупки</a>
                            <a href="{{ route('user.cart') }}">Обновить</a>
                            <a id="clearCart">Очистить</a>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="discount-code-wrapper discount-tax-wrap">
                            <h4>Промокод </h4>
                            <div class="discount-code">
                                <p>Введите код для получения скидки на заказ!</p>
                                <form id="verify-promocode">
                                    <input class="form-control" id="promocode" type="text" required=""
                                           placeholder="Ваш промокод." name="promocode">
                                    <button type="submit" id="promocode">Применить промокод</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="tax-wrapper discount-tax-wrap">
                            <h4>Стоимость доставки</h4>
                            <div class="discount-code">
                                <p>Выберите способ доставки!</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <select class="nice-select nice-select-style-3 cart-tax-select">
                                            @foreach($deliveries as $delivery)
                                                <option value="{{ $delivery->id }}">{{ $delivery->title }}
                                                    - {{ $delivery->price }} ₽
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{--                                    <div class="col-lg-6">--}}
                                    {{--                                        <input type="text" required="" placeholder="Zip Code" name="name">--}}
                                    {{--                                    </div>--}}
                                </div>
                                <button type="submit" id="deliveryType">Подтвердить</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="empty-cart-area pt-160 pb-160">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="empty-cart-content text-center">
                            <img src="{{ asset('assets/front/img/cart/empty-cart.png') }}" alt="logo">
                            <h3>Ваша корзина пуста.</h3>
                            <div class="empty-cart-btn">
                                <a href="{{ route('shop.index') }}">Перейти к покупкам</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('a#removeFromCart').click(function () {
                let product_id = $(this).data('id');
                let url = "/cart/remove";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}', product_id: product_id},
                    success: function () {
                        $('tr[data-id=' + product_id + ']').remove();
                    },
                    error: function () {

                    },
                })
            })

            $('div.inc').click(function () {
                let product_id = $(this).parent().data('id');
                let url = "/cart/plusqty";
                let price = Number($('td.product-price#' + product_id).children().text().split(' ').splice(0, 1));
                let oldTotal = Number($('td#' + product_id + '.product-total').children().text().split(' ').splice(0, 1));

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}', product_id: product_id},
                    success: function () {
                        $('td#' + product_id + '.product-total').children().text(oldTotal + price + ' ₽');
                    },
                    error: function () {

                    },
                })
            })

            $('div.dec').click(function () {
                let product_id = $(this).parent().data('id');
                let url = "/cart/minusqty";
                let price = Number($('td.product-price#' + product_id).children().text().split(' ').splice(0, 1))
                let oldTotal = Number($('td#' + product_id + '.product-total').children().text().split(' ').splice(0, 1))

                if (oldTotal !== price) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {_token: '{{ csrf_token() }}', product_id: product_id},
                        success: function () {
                            $('td#' + product_id + '.product-total').children().text(oldTotal - price + ' ₽');
                        },
                        error: function () {

                        },
                    })
                } else {
                    $.ajax({
                        type: "POST",
                        url: "/cart/remove",
                        data: {_token: '{{ csrf_token() }}', product_id: product_id},
                        success: function () {
                            $('tr[data-id=' + product_id + ']').remove();
                            console.log(1);
                        },
                        error: function () {

                        },
                    })
                }
            })

            $('a#clearCart').click(function () {
                let url = "/cart/clear";

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}'},
                    success: function () {
                        location.reload();
                    },
                    error: function () {

                    },
                })
            })

            $('form#verify-promocode').click(function (e) {
                e.preventDefault();
                let url = "/cart/verify_promocode";
                let promocode = $('input#promocode').val()
                let urlChechout = $('a#toCheckout').attr('href');

                if (promocode) {
                    $.ajax({
                        type: "POST",
                        url: url,
                        data: {_token: '{{ csrf_token() }}', promocode: promocode},
                        success: function (response) {
                            $('input#promocode').addClass('is-valid')
                            $('input#promocode').removeClass('is-invalid')
                            $('button#promocode').text('Промокод активирован')
                            $('button#promocode').prop('disabled', true)

                            $('a#toCheckout').prop('href', urlChechout + 'promocode=' + promocode + '&')
                        },
                        error: function () {
                            $('input#promocode').removeClass('is-valid')
                            $('input#promocode').addClass('is-invalid')
                        }
                    })
                }
            })

            $('button#deliveryType').click(function () {
                let type = $('li.selected').data();
                let urlChechout = $('a#toCheckout').attr('href');

                $('button#deliveryType').text('Доставка выбрана')
                $('a#toCheckout').prop('href', urlChechout + 'deliveryType=' + type.value + '&')
            })

            $('a#toCheckout').click(function (e) {
                let aUrl = $('a#toCheckout').attr('href')
                if (aUrl.indexOf('deliveryType') + 1) {

                } else {
                    e.preventDefault()
                    $('div#error').html(
                        '<div class="alert alert-danger" role="alert">\n' +
                        '                            Выберите тип доставки\n' +
                        '                        </div>'
                    )
                }
            })
        })
    </script>
@endsection
