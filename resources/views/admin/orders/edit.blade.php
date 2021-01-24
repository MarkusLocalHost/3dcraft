@extends('admin.layouts.layout')

@section('title')
    Заказ - Редактирование
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
                            <h3 class="card-title">Заказ "{{ $order->id }}"</h3>
                        </div>
                        <!-- /.card-header -->

                        <form role="form" method="post" action="{{ route('shop_orders.update', ['shop_order' => $order->id]) }}"
                              enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="user_id">Пользователь</label>
                                    <select name="user_id" id="user_id" class="form-control">
                                        @foreach($users as $k => $v)
                                            <option value="{{ $k }}"
                                                    @if($k == $order->user_id) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="promocode_id">Промокод</label>
                                    <select name="promocode_id" id="promocode_id" class="form-control">
                                        <option value="">Без промокода</option>
                                        @foreach($promocodes as $k => $v)
                                            <option value="{{ $k }}"
                                                    @if($k == $order->promocode_id) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="delivery_id">Вид доставки</label>
                                    <select name="delivery_id" id="delivery_id" class="form-control">
                                        @foreach($deliveries as $k => $v)
                                            <option value="{{ $k }}"
                                                    @if($k == $order->deliveries_id) selected @endif>{{ $v }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="pay_method">Метод оплаты</label>
                                    <input type="text" name="pay_method"
                                           class="form-control @error('pay_method') is-invalid @enderror" id="pay_method"
                                           value="{{ $order->pay_method }}">
                                </div>

                                <div class="form-group">
                                    <label for="sum">Сумма</label>
                                    <input type="number" name="sum"
                                           class="form-control @error('sum') is-invalid @enderror" id="sum"
                                           value="{{ $order->sum }}">
                                </div>

                                <div class="form-group">
                                    <label for="status">Статус</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="0" @if($order->status == 0) selected @endif>На модерации</option>
                                        <option value="1" @if($order->status == 1) selected @endif>Ожидает передачи в транспортную компанию</option>
                                        <option value="2" @if($order->status == 2) selected @endif>Ожидает доставку клиенту</option>
                                        <option value="3" @if($order->status == 3) selected @endif>Передано клиенту</option>
                                        <option value="4" @if($order->status == 4) selected @endif>Завершен</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="note">Контент</label>
                                    <textarea name="note" id="note" rows="5"
                                              class="form-control">{{ $order->note }}</textarea>
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

