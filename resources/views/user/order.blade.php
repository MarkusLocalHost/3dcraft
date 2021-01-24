@extends('layouts.main')

@section('title')
    3DCraft - Оформление
@endsection

@section('content')
    <div class="breadcrumb-area breadcrumb-mt"></div>
    <div class="cart-check-order-link-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 ml-auto mr-auto">
                    <div class="cart-check-order-link">
                        <a href="{{ route('user.cart') }}">Корзина</a>
                        <a class="active" href="{{ route('order.create') }}">Оформление</a>
                        <a>Завершение</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 ml-auto mr-auto">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="checkout-area bg-gray pt-100 pb-160">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="checkout-left-wrap">
                        <div class="login-guest-top">
                            <div class="checkout-tab nav">
                                @if(!auth()->user())
                                    <a href="#checkout-login" data-toggle="tab">
                                        Войти
                                    </a>
                                    <a class="active" href="#checkout-guest" data-toggle="tab">
                                        Купить как гость
                                    </a>
                                @else
                                    <a class="active">{{ auth()->user()->name }}</a>
                                @endif
                            </div>
                            @if(!auth()->user())
                                <div class="tab-content">
                                    <div id="checkout-login" class="tab-pane">
                                        <div class="checkout-login-wrap">
                                            <h4>Данные для входа</h4>
                                            <div class="checkout-login-style">
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul class="list-unstyled">
                                                            @foreach ($errors->all() as $error)
                                                                <li>{{ $error }}</li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                @endif

                                                <form action="{{ route('auth.login') }}" method="post">
                                                    @csrf
                                                    @method('POST')
                                                    <input type="text" name="email" placeholder="Ваш e-mail">
                                                    <input type="password" name="password" placeholder="Пароль">
                                                    <div class="checkout-button-box">
                                                        <div class="checkout-login-toggle-btn">
                                                            <input type="checkbox">
                                                            <label>Запомнить меня</label>
                                                            <a href="checkout.html#">Забыли пароль?</a>
                                                        </div>
                                                        <button type="submit">Войти</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="checkout-guest" class="tab-pane active">
                                        <div class="checkout-guest-wrap">
                                            <h4>Контактная информация</h4>
                                            <div class="checkout-guest-style">
                                                <form action="checkout.html#">
                                                    <input type="text" name="user-name"
                                                           placeholder="Введите ваш мобильный телефон или e-mail">
                                                    <div class="guest-login-toggle-btn">
                                                        <input type="checkbox">
                                                        <label>Keep me up to date on news and exclusive offers</label>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="shipping-address-wrap">
                            <form id="address" class="needs-validation" novalidate>
                            <div class="row">
                                @if(count($addresses))
                                    <h4 class="checkout-title">Выберите адрес доставки</h4>
                                    @foreach($addresses as $address)
                                        <div class="myaccount-tab-menu nav pt-10" role="tablist">
                                            <a id="address" data-id="{{ $address->id }}">{{ $address->address }}</a>
                                        </div>
                                    @endforeach
                                @endif
                                <div class="col-12 pt-35"></div>
                                <h4 class="checkout-title pt-25">Добавить другой адрес</h4>
                                <div class="col-12"></div>
                                <div class="col-lg-6">
                                    <div class="billing-info">
                                        <input type="text" placeholder="Имя" name="name" id="name"
                                               data-parsley-required
                                               data-parsley-length="[2, 12]">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="billing-info">
                                        <input type="text" placeholder="Фамилия" name="secondname" id="secondname"
                                               data-parsley-required
                                               data-parsley-length="[2, 12]">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info">
                                        <input type="text" placeholder="Отчество" name="lastname" id="lastname"
                                               data-parsley-required
                                               data-parsley-length="[2, 12]">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info">
                                        <input type="text" placeholder="Адрес" name="address" id="address"
                                               data-parsley-required>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="billing-info">
                                        <input type="text" placeholder="Индекс" name="postal_code" id="postal_code"
                                               data-parsley-required
                                               data-parsley-type="integer"
                                               data-parsley-length="[2, 12]">
                                    </div>
                                </div>
                                <div class="myaccount-tab-menu nav pt-10" role="tablist">
                                    <a type="submit" id="address" data-id="newaddress">Использовать новый адрес</a>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="payment-details mb-40">
                        <h4 class="checkout-title">Детали оплаты</h4>
                        <ul>
                            <li>Товары <span>{{ $finalSum }} ₽</span></li>
                            @if($promocode)
                                <li>Промокод {{$promocode->title}} <span>- {{ ($finalSum * ($promocode->percent)/100)  + $promocode->amount }} ₽</span>
                                </li>
                            @endif
                            <li>Доставка <span>{{ $delivery->price }} ₽</span></li>
                        </ul>
                        <div class="total-order">
                            <ul>
                                @if($promocode)
                                    <li>Итог <span>{{ $finalSum - (($finalSum * ($promocode->percent)/100)  + $promocode->amount) + $delivery->price }} ₽</span>
                                    </li>
                                @else
                                    <li>Итог <span>{{ $finalSum  + $delivery->price }} ₽</span></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="payment-details">
                        <h4 class="checkout-title">Способ оплаты</h4>
                        <div class="payment-method">
                            <div class="pay-top sin-payment">
                                <input id="payment_method_1" class="input-radio" type="radio" value="cheque"
                                       checked="checked" name="payment_method">
                                <label for="payment_method_1"> Paypal </label>
                                <div class="payment-box payment_method_bacs">
                                    <form action="checkout.html#">
                                        <input type="text" required="" placeholder="Enter Your Paypal Email"
                                               name="name">
                                    </form>
                                </div>
                            </div>
                            <div class="pay-top sin-payment">
                                <input id="payment-method-2" class="input-radio" type="radio" value="cheque"
                                       name="payment_method">
                                <label for="payment-method-2">Card </label>
                                <div class="payment-box payment_method_bacs">
                                    <form action="checkout.html#">
                                        <input type="text" required="" placeholder="Enter Your Card Email" name="name">
                                    </form>
                                </div>
                            </div>
                            <div class="pay-top sin-payment">
                                <input id="payment-method-3" class="input-radio" type="radio" value="cheque"
                                       name="payment_method">
                                <label for="payment-method-3">Bank or Check </label>
                                <div class="payment-box payment_method_bacs">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="back-continue-wrap">
                <a href="{{ route('user.cart')}}">Вернуться к корзине</a>
                <form role="form" method="POST" action="{{ route('order.complete') }}">
                    @csrf
                    <input type="hidden" name="deliveryID" value="{{ $delivery->id }}">
                    @if($promocode)
                        <input type="hidden" name="promocodeTitle" value="{{ $promocode->title }}">
                    @endif
                    @if($promocode)
                        <input type="hidden" name="sum"
                               value="{{ $finalSum - (($finalSum * ($promocode->percent)/100)  + $promocode->amount) + $delivery->price }}">
                    @else
                        <input type="hidden" name="sum" value="{{ $finalSum  + $delivery->price }}">
                    @endif
                    <input type="hidden" name="productIDs" value="{{ $product_ids_str }}">
                    <input type="hidden" name="addressID" id="addressID">
                    <a onclick="parentNode.submit();">Заказать</a>
                </form>

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/front/js/parsley.min.js') }}"></script>
    <script src="{{ asset('assets/front/js/parsley_ru.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('a#address').click(function () {
                $('a#address').removeClass('active')
                $(this).addClass('active')
                $('form#address').parsley().reset();
                $('input#addressID').attr('value', $(this).data('id'))
            })

            $('input#name, input#secondname, input#lastname, input#address, input#postal_code').change(function () {
                $('a#address').removeClass('active')
            })

            $('a#address[data-id=newaddress]').click(function () {
                if ($('form#address').parsley({
                    errorClass: 'is-invalid text-danger',
                    successClass: 'is-valid', // Comment this option if you don't want the field to become green when valid. Recommended in Google material design to prevent too many hints for user experience. Only report when a field is wrong.
                    errorsWrapper: '<span class="form-text text-danger"></span>',
                    errorTemplate: '<span></span>',
                    trigger: 'change'
                }).validate()) {

                    $('input#addressID').attr('value', $('input#name').val() + ';' + $('input#secondname').val() + ';' + $('input#lastname').val() + ';' + $('input#address').val() + ';' + $('input#postal_code').val())
                } else {
                    $('a#address').removeClass('active')
                }

            })
        })
    </script>
@endsection
