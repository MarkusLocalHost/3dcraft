@extends('layouts.main')

@section('title')
    Dking - Мой аккаунт
@endsection

@section('content')
    <div class="my-account-wrapper bg-gray pt-160 pb-160">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                @endif
                <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-toggle="tab">Панель управления</a>
                                    <a href="#wishlist" data-toggle="tab"> Избранное</a>
                                    <a href="#orders" data-toggle="tab"> Заказы</a>
                                    <a href="#wait_for_review" data-toggle="tab"> Ожидают отзыва</a>
                                    <a href="#reviews" data-toggle="tab"> Отзывы</a>
                                    <a href="#download" data-toggle="tab">Документы</a>
                                    <a href="#address-edit" data-toggle="tab">Адреса</a>
                                    <a href="#account-info" data-toggle="tab">Account Details</a>
                                    <a href="{{ route('logout') }}">Выйти</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->
                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>
                                            <div class="welcome">
                                                <p>Hello, <strong>{{ auth()->user()->name }}</strong> (If Not <strong>Tuntuni
                                                        !</strong><a href="{{ route('logout') }}" class="logout">
                                                        Logout</a>)</p>
                                            </div>

                                            <p class="mb-0">From your account dashboard. you can easily check & view
                                                your recent orders, manage your shipping and billing addresses and edit
                                                your password and account details.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Заказы</h3>
                                            @if(count($orders))
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>Заказ</th>
                                                            <th>Дата</th>
                                                            <th>Статус</th>
                                                            <th>Сумма</th>
                                                            <th>Действия</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->id }}</td>
                                                            <td>{{ $order->created_at }}</td>
                                                            <td>{{ $order->status }}</td>
                                                            <td>{{ $order->sum }} ₽</td>
                                                            <td><a href="cart.html" class="check-btn sqr-btn ">Детали</a></td>
                                                        </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                            Заказов пока нет
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="wait_for_review" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Оставить отзывы</h3>
                                            @if(count($products_in_wait_for_review))
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>Название</th>
                                                            <th>Изображение</th>
                                                            <th>Действия</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($products_in_wait_for_review as $product_in_wait_for_review)
                                                            <tr>
                                                                <td>{{ $product_in_wait_for_review->product_name }}</td>
                                                                <td>{{ $product_in_wait_for_review->getImage() }}</td>
                                                                <td><a href="{{ route('review.index', ['uuid' => $product_in_wait_for_review->link]) }}" class="check-btn sqr-btn ">Оставить отзыв</a></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                Отзывов пока нет
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="reviews" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Отзывы</h3>
                                            @if(count($reviews))
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>Оценка</th>
                                                            <th>Содержимое</th>
                                                            <th>Оставлен</th>
                                                            <th>Изменен</th>
                                                            <th>Действия</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($reviews as $review)
                                                            <tr>
                                                                <td>{{ $review->rating }}</td>
                                                                <td>{{ $review->content }}</td>
                                                                <td>{{ $review->created_at }}</td>
                                                                <td>{{ $review->updated_at }}</td>
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">Подробнее</a></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                Отзывов пока нет
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="download" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Downloads</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Date</th>
                                                        <th>Expire</th>
                                                        <th>Download</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <td>Haven - Free Real Estate PSD Template</td>
                                                        <td>Aug 22, 2018</td>
                                                        <td>Yes</td>
                                                        <td><a href="my-account.html#" class="check-btn sqr-btn "><i
                                                                    class="fa fa-cloud-download"></i> Download File</a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>HasTech - Profolio Business Template</td>
                                                        <td>Sep 12, 2018</td>
                                                        <td>Never</td>
                                                        <td><a href="my-account.html#" class="check-btn sqr-btn "><i
                                                                    class="fa fa-cloud-download"></i> Download File</a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="wishlist" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Избранное</h3>
                                            @if(count($products_in_wishlist))
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>Наименование</th>
                                                            <th>Действия</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($products_in_wishlist as $product_in_wishlist)
                                                            <tr>
                                                                <td>{{ $product_in_wishlist->product_name }}</td>
                                                                <td><a href="cart.html" class="check-btn sqr-btn ">Просмотр</a></td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <p>Вы еще не добавляли товары в избранное.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Адреса доставки</h3>
                                            <div class="row">
                                                @if(count($addresses))
                                                    @foreach($addresses as $address)
                                                        <div class="col-3">
                                                            <address>
                                                                <p><strong>{{ $address->name }} {{ $address->lastname }}</strong></p>
                                                                <p>{{ $address->address }}</p>
                                                                <p>Индекс: {{ $address->postal_code }}</p>
                                                            </address>
                                                            <a href="#address-update-{{ $address->id }}" data-toggle="tab" class="check-btn sqr-btn "><i
                                                                    class="fas fa-edit"></i> Редактировать адрес</a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                                <div class="col-3">
                                                    <a href="#address-new" data-toggle="tab" class="check-btn sqr-btn "><i
                                                            class="fas fa-edit"></i> Добавить адрес</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Account Details</h3>
                                            <div class="account-details-form">
                                                <form action="my-account.html#">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="first-name" class="required">First
                                                                    Name</label>
                                                                <input type="text" id="first-name"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="single-input-item">
                                                                <label for="last-name" class="required">Last
                                                                    Name</label>
                                                                <input type="text" id="last-name"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="display-name" class="required">Display Name</label>
                                                        <input type="text" id="display-name"/>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="email" class="required">Email Addres</label>
                                                        <input type="email" id="email"/>
                                                    </div>
                                                    <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="single-input-item">
                                                            <label for="current-pwd" class="required">Current
                                                                Password</label>
                                                            <input type="password" id="current-pwd"/>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="new-pwd" class="required">New
                                                                        Password</label>
                                                                    <input type="password" id="new-pwd"/>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="confirm-pwd" class="required">Confirm
                                                                        Password</label>
                                                                    <input type="password" id="confirm-pwd"/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item">
                                                        <button class="check-btn sqr-btn ">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-new" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Добавление адреса</h3>
                                            <div class="account-details-form">
                                                <form action="{{ route('account.new_address') }}" method="POST" role="form">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-lg-4">
                                                            <div class="single-input-item">
                                                                <label for="name" class="required">Имя</label>
                                                                <input type="text" id="name" name="name"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="single-input-item">
                                                                <label for="secondname" class="required">Фамилия</label>
                                                                <input type="text" id="secondname" name="secondname"/>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="single-input-item">
                                                                <label for="lastname" class="required">Отчество</label>
                                                                <input type="text" id="lastname" name="lastname"/>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="address" class="required">Адрес</label>
                                                        <input type="text" id="address" name="address"/>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <label for="postal_code" class="required">Индекс</label>
                                                        <input type="text" id="postal_code" name="postal_code"/>
                                                    </div>
                                                    <div class="single-input-item">
                                                        <button type="submit" class="check-btn sqr-btn ">Добавить</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
                                    @if(count($addresses))
                                        @foreach($addresses as $address)
                                            <div class="tab-pane fade" id="address-update-{{ $address->id }}" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h3>Добавление адреса</h3>
                                                    <div class="account-details-form">
                                                        <form action="{{ route('account.update_address', ['address_id' => $address->id]) }}" method="POST" role="form">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-4">
                                                                    <div class="single-input-item">
                                                                        <label for="name" class="required">Имя</label>
                                                                        <input type="text" id="name" name="name" value="{{ $address->name }}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="single-input-item">
                                                                        <label for="secondname" class="required">Фамилия</label>
                                                                        <input type="text" id="secondname" name="secondname" value="{{ $address->secondname }}"/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <div class="single-input-item">
                                                                        <label for="lastname" class="required">Отчество</label>
                                                                        <input type="text" id="lastname" name="lastname" value="{{ $address->lastname }}"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="address" class="required">Адрес</label>
                                                                <input type="text" id="address" name="address" value="{{ $address->address }}"/>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="postal_code" class="required">Индекс</label>
                                                                <input type="text" id="postal_code" name="postal_code" value="{{ $address->postal_code }}"/>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <button type="submit" class="check-btn sqr-btn ">Сохранить</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
@endsection
