@extends('admin.layouts.layout')

@section('title')
    Заказ - Просмотр
@endsection

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование заказа</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Главная</a></li>
                        <li class="breadcrumb-item active">Редактирование заказа</li>
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
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab"
                                       href="#order" role="tab" aria-controls="nav-home" aria-selected="true"><h3
                                            class="card-title">Заказ "{{ $order->id }}"</h3></a>
                                    @foreach($order->products as $product)
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab"
                                           href="#product{{ $product->id }}" role="tab" aria-controls="nav-profile"
                                           aria-selected="false">Товар {{$product->product_name}}</a>
                                    @endforeach
                                </div>
                            </nav>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="order" role="tabpanel"
                                     aria-labelledby="pills-home-tab">
                                    <div class="form-group">
                                        <label for="user_id">Пользователь</label>
                                        <input type="text" name="user_id"
                                               class="form-control" id="user_id"
                                               value="{{ $order->user->name }}"
                                               disabled>
                                    </div>


                                    <div class="form-group">
                                        <label for="promocode_id">Промокод</label>
                                        <div class="row">
                                            @if($order->promocode !== null)
                                                <div class="col-3">
                                                    <input type="text" name="promocode_title"
                                                           class="form-control" id="promocode_title"
                                                           value="{{ $order->promocode->title }}"
                                                           disabled>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" name="promocode_percent"
                                                           class="form-control" id="promocode_percent"
                                                           value="{{ $order->promocode->percent }} %"
                                                           disabled>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" name="promocode_amount"
                                                           class="form-control" id="promocode_amount"
                                                           value="{{ $order->promocode->amount }} ₽"
                                                           disabled>
                                                </div>
                                                <div class="col-3">
                                                    <input type="text" name="promocode_status"
                                                           class="form-control" id="promocode_status"
                                                           @if ($order->promocode->status = 1)
                                                           value="Промокод активен в данный момент"
                                                           @else
                                                           value="Промок не активен в данный момент"
                                                           @endif
                                                           disabled>
                                                </div>
                                            @else
                                                <div class="col-12">
                                                    <input type="text" name="promocode"
                                                           class="form-control" id="promocode"
                                                           value="Промокод не применялся"
                                                           disabled>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="delivery_id">Вид доставки</label>
                                        <div class="row">
                                            <div class="col-4">
                                                <input type="text" name="delivery_title"
                                                       class="form-control" id="delivery_title"
                                                       value="{{ $order->delivery->title }}"
                                                       disabled>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" name="delivery_price"
                                                       class="form-control" id="delivery_price"
                                                       value="{{ $order->delivery->price }} ₽"
                                                       disabled>
                                            </div>
                                            <div class="col-4">
                                                <input type="text" name="delivery_status"
                                                       class="form-control" id="delivery_status"
                                                       @if ($order->delivery->status = 1)
                                                       value="Данный вид доставки активен в данный момент"
                                                       @else
                                                       value="Данный вид доставки уже не активен"
                                                       @endif
                                                       disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="pay_method">Метод оплаты</label>
                                        <input type="text" name="pay_method"
                                               class="form-control" id="pay_method"
                                               value="{{ $order->pay_method }}"
                                               disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="sum">Сумма</label>
                                        <input type="number" name="sum"
                                               class="form-control" id="sum"
                                               value="{{ $order->sum }}"
                                               disabled>
                                    </div>

                                    <div class="form-group">
                                        <label for="status">Статус</label>
                                        <select name="status" id="status" class="form-control" disabled>
                                            <option value="0" @if($order->status == 0) selected @endif>На модерации
                                            </option>
                                            <option value="1" @if($order->status == 1) selected @endif>Ожидает передачи
                                                в
                                                транспортную компанию
                                            </option>
                                            <option value="2" @if($order->status == 2) selected @endif>Ожидает доставку
                                                клиенту
                                            </option>
                                            <option value="3" @if($order->status == 3) selected @endif>Передано
                                                клиенту
                                            </option>
                                            <option value="4" @if($order->status == 4) selected @endif>Завершен</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="note">Заметки</label>
                                        <textarea name="note" id="note" rows="5"
                                                  class="form-control" disabled>{{ $order->note }}</textarea>
                                    </div>
                                </div>
                                @foreach($order->products as $product)
                                    <div class="tab-pane fade" id="product{{ $product->id }}" role="tabpanel"
                                         aria-labelledby="pills-profile-tab">
                                        <div class="form-group">
                                            <label for="product_name">Название товара</label>
                                            <input type="text" name="product_name"
                                                   class="form-control" id="product_name"
                                                   value="{{ $product->product_name }}"
                                                   disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="qty">Количество</label>
                                            <input type="text" name="qty"
                                                   class="form-control" id="qty"
                                                   @foreach($additional_informations as $info)
                                                       @if($product->id == $info->shop_product_id)
                                                        value="{{ $info->qty }}"
                                                       @endif
                                                   @endforeach
                                                   disabled>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Цена на момент заказа</label>
                                            <input type="text" name="price"
                                                   class="form-control" id="price"
                                                   @foreach($additional_informations as $info)
                                                       @if($product->id == $info->shop_product_id)
                                                        value="{{ $info->price }}"
                                                       @endif
                                                   @endforeach
                                                   disabled>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- /.card-body -->

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
