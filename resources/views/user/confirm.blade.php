@extends('layouts.main')

@section('title')
    3DCraft - Информация о заказе
@endsection

@section('content')
    <div class="breadcrumb-area breadcrumb-mt"></div>
    <div class="cart-check-order-link-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 ml-auto mr-auto">
                    <div class="cart-check-order-link">
                        <a>Корзина</a>
                        <a>Оформление</a>
                        <a class="active">Завершение</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 ml-auto mr-auto">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="order-complete-area bg-gray pt-160 pb-160">
        <div class="container">
            <div class="order-complete-title">
                <h3>Ваш заказ был успешно оформлен!</h3>
            </div>
            <div class="order-product-details">
                <form action="order-complete.html#">
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                            <tr>
                                <th>НОМЕР ЗАКАЗА</th>
                                <th>ДАТА ЗАКАЗА</th>
                                <th>СУММА</th>
                                <th>МЕТОД ОПЛАТЫ</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>
                                    № {{ session('orderNumber') }}
                                </td>
                                <td>
                                    {{ session('date') }}
                                </td>
                                <td>
                                    {{ session('sum') }}₽
                                </td>
                                <td>
                                    {{ session('paymentMethod') }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
