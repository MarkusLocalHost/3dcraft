<div class="sidebar-cart-active" id="sidebar-cart-active">
    <div class="sidebar-cart-all">
        <a class="cart-close"><i class="icofont-close-line"></i></a>
        <div class="cart-content">
            <h3>Корзина покупок</h3>
            <ul id="product-in-sidebar-cart">
                @if($products_sidebar)
                    <? $sum_price = 0; ?>
                    @foreach($products_sidebar as $product_sidebar)
{{--                        TODO Refactor--}}
                        <li class="single-product-cart" data-id="{{ $product_sidebar->id }}">
                            <div class="cart-img">
                                <a href="{{ route('shop.product', ['shop_product' => $product_sidebar->slug]) }}"><img src="{{ $product_sidebar->getImage() }}" alt=""></a>
                            </div>
                            <div class="cart-title">
                                <h4><a href="{{ route('shop.product', ['shop_product' => $product_sidebar->slug]) }}">{{ $product_sidebar->product_name }}</a></h4>
                                @if($product_sidebar->sale_id != null)
                                    <span id="sidebarProduct{{ $product_sidebar->id }}Price"> {{ implode($cartData[$product_sidebar->id]) }} × {{ ($product_sidebar->price - $product_sidebar->sale->amount) * (100 - $product_sidebar->sale->percent)/100 }} ₽</span>
                                    <? $sum_price += implode($cartData[$product_sidebar->id])*($product_sidebar->price - $product_sidebar->sale->amount) * (100 - $product_sidebar->sale->percent)/100 ; ?>
                                @else
                                    <span id="sidebarProduct{{ $product_sidebar->id }}Price"> {{ implode($cartData[$product_sidebar->id]) }} × {{ $product_sidebar->price }} ₽</span>
                                    <? $sum_price += implode($cartData[$product_sidebar->id])*$product_sidebar->price ; ?>
                                @endif
                            </div>
                            <div class="cart-delete">
                                <a id="removeFromSidebarCart" data-id="{{ $product_sidebar->id }}">×</a>
                            </div>
                        </li>
                    @endforeach
                @else
                    <p>Корзина пока пуста...</p>
                @endif
            </ul>
            <div class="cart-total">
                @if($products_sidebar)
                    <h4 id="sidebarCartTotal">Сумма: <span><? echo $sum_price;?> ₽</span></h4>
                @endif
            </div>
            <div class="cart-checkout-btn">
                <a class="btn-hover cart-btn-style" href="{{ route('user.cart') }}">корзина</a>
                <a class="no-mrg btn-hover cart-btn-style" href="checkout.html">оплатить</a>
            </div>
        </div>
    </div>
</div>
