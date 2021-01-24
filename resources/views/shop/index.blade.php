@extends('layouts.shop')

@section('title')
    Dking - Товары
@endsection

@section('shop-content')
    <div class="tab-content pt-30">
        <div id="shop-1" class="tab-pane active">
            <div class="row">
                @foreach($products as $product)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="product-wrap mb-50">
                        <div class="product-img product-img-zoom mb-25 @if($product->hit == 1)ribbon-wrapper @endif">
                            <a href="{{ route('shop.product', ['shop_product' => $product->slug]) }}">
                                <img id="product{{ $product->id }}ForAdd" src="{{ $product->getImage() }}" alt="">
                                @if($product->hit == 1)
                                <div class="ribbon base"><span>Хит</span></div>
                                @endif
                            </a>
                        </div>
                        <div class="product-content">
                            <h4><a href="{{ route('shop.product', ['shop_product' => $product->slug]) }}">{{ $product->product_name }}</a></h4>
                            <div class="product-price">
                                @if($product->sale_id != null)
                                    <span>{{ ($product->price - $product->sale->amount) * (100 - $product->sale->percent)/100 }} ₽</span>
                                    <span class="old-price">{{ $product->price }} ₽</span>
                                @else
                                    <span>{{ $product->price }} ₽</span>
                                @endif
                            </div>
                        </div>
                        <div class="product-action-position-1 text-center">
                            <div class="product-content">
                                <h4><a id="product{{ $product->id }}ForAdd" href="{{ route('shop.product', ['shop_product' => $product->slug]) }}">{{ $product->product_name }}</a></h4>
                                <div class="product-price">
                                    @if($product->sale_id != null)
                                        <span id="product{{ $product->id }}ForAdd">{{ ($product->price - $product->sale->amount) * (100 - $product->sale->percent)/100 }} ₽</span>
                                        <span class="old-price">{{ $product->price }} ₽</span>
                                    @else
                                        <span id="product{{ $product->id }}ForAdd">{{ $product->price }} ₽</span>
                                    @endif
                                </div>
                            </div>
                            <div class="product-action-wrap">
                                <div class="product-action-cart">
                                    <button id="addToCart" title="Добавить в корзину" data-id="{{ $product->id }}">Добавить</button>
                                </div>
                                <button data-toggle="modal" data-target="#{{ $product->slug }}Modal"><i class="icon-zoom"></i></button>
                                @if(array_search($product->id, $compare_product_ids) !== false)
                                    <button id="goToCompare" title="Перейти к сравнению">
                                        <i class="icon-categori-all"></i>
                                    </button>
                                @else
                                    <button id="addToCompare" data-id="{{ $product->id }}" title="Добавить к сравнению">
                                        <i class="icon-compare"></i>
                                    </button>
                                @endif
                                <button id="addToWishlist" data-id="{{ $product->id }}" title="Добавить в избранное">
                                    @if(array_search($product->id, array_values($user_products_wishlist)) !== false)
                                        <i class="icon-heart"></i>
                                    @else
                                        <i class="icon-heart-empty"></i>
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div id="shop-2" class="tab-pane ">
            @foreach($products as $product)
            <div class="shop-list-wrap mb-50">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4">
                        <div class="product-list-img">
                            <a href="{{ route('shop.product', ['shop_product' => $product->slug]) }}">
                                <img src="{{ $product->getImage() }}" alt="">
                            </a>
                            <div class="shop-list-quickview">
                                <button data-toggle="modal" data-target="#{{ $product->slug }}Modal"><i class="icon-zoom"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <div class="shop-list-content ml-20">
                            <h3><a href="{{ route('shop.product', ['shop_product' => $product->slug]) }}">{{ $product->product_name }}</a></h3>
                            <div class="pro-list-price">
                                @if($product->sale_id != null)
                                    <span>{{ ($product->price - $product->sale->amount) * (100 - $product->sale->percent)/100 }} ₽</span>
                                    <span class="old-price">{{ $product->price }} ₽</span>
                                @else
                                    <span>{{ $product->price }} ₽</span>
                                @endif
                            </div>
                            {!! $product->description !!}
                            <div class="product-list-action pt-25">
                                @if(array_search($product->id, $compare_product_ids) !== false)
                                    <button id="goToCompare" title="Перейти к сравнению">
                                        <i class="icon-categori-all"></i>
                                    </button>
                                @else
                                    <button id="addToCompare" data-id="{{ $product->id }}" title="Добавить к сравнению">
                                        <i class="icon-compare"></i>
                                    </button>
                                @endif

                                <div class="product-action-cart">
                                    <button id="addToCart" title="Добавить в корзину" data-id="{{ $product->id }}">Добавить</button>
                                </div>
                                <button id="addToWishlist" data-id="{{ $product->id }}" title="Добавить в избранное">
                                    @if(array_search($product->id, array_values($user_products_wishlist)) !== false)
                                        <i class="icon-heart"></i>
                                    @else
                                        <i class="icon-heart-empty"></i>
                                    @endif
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="pro-pagination-style text-center mt-50">
            {{ $products->withQueryString()->links() }}
        </div>
    </div>
@endsection

@section('modal')
    @foreach($products as $product)
    <div class="modal fade" id="{{ $product->slug }}Modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-12 col-sm-6">
                            <div class="quickview-img">
                                <img src="{{ $product->getImage() }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-12 col-sm-6">
                            <div class="product-details-content quickview-content">
                                <h2>{{ $product->product_name }}</h2>
                                <div class="product-ratting-review-wrap">
                                    <div class="product-ratting-digit-wrap">
                                        <div class="product-ratting">
                                            <i class="icon-rating"></i>
                                            <i class="icon-rating"></i>
                                            <i class="icon-rating"></i>
                                            <i class="icon-star-half-alt"></i>
                                            <i class="icon-star-empty"></i>
                                        </div>
                                        <div class="product-digit">
                                            <span>4.0</span>
                                        </div>
                                    </div>
                                    <div class="product-review-order">
                                        <span>62 Reviews</span>
                                        <span>242 orders</span>
                                    </div>
                                </div>
                                {!! $product->content !!}
                                <div class="pro-details-price">
                                    @if($product->sale_id != null)
                                        <span>{{ ($product->price - $product->sale->amount) * (100 - $product->sale->percent)/100 }} ₽</span>
                                        <span class="old-price">{{ $product->price }} ₽</span>
                                    @else
                                        <span>{{ $product->price }} ₽</span>
                                    @endif
                                </div>
                                <div class="pro-details-color-wrap">
                                    <span>Color:</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li><a class="white" href="shop-6.html#">Black</a></li>
                                            <li><a class="azalea" href="shop-6.html#">Blue</a></li>
                                            <li><a class="dolly" href="shop-6.html#">Green</a></li>
                                            <li><a class="peach-orange" href="shop-6.html#">Orange</a></li>
                                            <li><a class="mona-lisa active" href="shop-6.html#">Pink</a></li>
                                            <li><a class="cupid" href="shop-6.html#">gray</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size:</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            <li><a href="shop-6.html#">XS</a></li>
                                            <li><a href="shop-6.html#">S</a></li>
                                            <li><a href="shop-6.html#">M</a></li>
                                            <li><a href="shop-6.html#">L</a></li>
                                            <li><a href="shop-6.html#">XL</a></li>
                                            <li><a href="shop-6.html#">XXL</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    <span>Quantity:</span>
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                    </div>
                                </div>
                                <div class="product-details-meta">
                                    <ul>
                                        <li><span>Model:</span> <a href="shop-6.html#">Odsy-1000</a></li>
                                        <li><span>Ship To</span> <a href="shop-6.html#">2834 Laurel Lane</a>, <a href="shop-6.html#">Mentone</a> , <a href="shop-6.html#">Texas</a></li>
                                    </ul>
                                </div>
                                <div class="pro-details-action-wrap">
                                    <div class="pro-details-buy-now">
                                        <a id="addToCart" data-id="{{ $product->id }}">Добавить</a>
                                    </div>
                                    <div class="pro-details-action">
                                        <a title="Добавить в избранное" id="addToWishlist" data-id="{{ $product->id }}">
                                            @if(array_search($product->id, array_values($user_products_wishlist)) !== false)
                                                <i class="icon-heart"></i>
                                            @else
                                                <i class="icon-heart-empty"></i>
                                            @endif
                                        </a>
                                        <a class="social" title="Social" href="shop-6.html#"><i class="icon-share"></i></a>
                                        <div class="product-dec-social">
                                            <a class="facebook" title="Facebook" href="shop-6.html#"><i class="icon-social-facebook-square"></i></a>
                                            <a class="twitter" title="Twitter" href="shop-6.html#"><i class="icon-social-twitter"></i></a>
                                            <a class="instagram" title="Instagram" href="shop-6.html#"><i class="icon-social-instagram"></i></a>
                                            <a class="pinterest" title="Pinterest" href="shop-6.html#"><i class="icon-social-pinterest"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endsection

@section('script-in-shop')
    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let productsInCart = [];
            $('ul#product-in-sidebar-cart').children().each(function () {
                productsInCart.push(Number($(this).attr('data-id')))
            })

            $('button#addToCart').click( function () {
                let product_id = $(this).data('id');
                let url = "/cart/add";

                let idAdded = product_id;
                let urlAdded = $('a#product' + product_id + 'ForAdd').attr('href');
                let imgAdded = $('img#product' + product_id + 'ForAdd').attr('src');
                let nameAdded = $('a#product' + product_id + 'ForAdd').text();
                let priceAdded = $('span#product' + product_id + 'ForAdd').text();
                let $contentAddedToSidebar = '<li class="single-product-cart" data-id="' + idAdded + '">\n' +
                    '                            <div class="cart-img">\n' +
                    '                                <a href="' + urlAdded + '"><img src="' + imgAdded + '" alt=""></a>\n' +
                    '                            </div>\n' +
                    '                            <div class="cart-title">\n' +
                    '                                <h4><a href="' + urlAdded + '">' + nameAdded + '</a></h4>\n' +
                    '                                    <span id="sidebarProduct' + idAdded + 'Price"> 1 × ' + priceAdded + '</span>\n' +
                    '                            </div>\n' +
                    '                            <div class="cart-delete">\n' +
                    '                                <a id="removeFromSidebarCart" data-id="' + idAdded + '">×</a>\n' +
                    '                            </div>\n' +
                    '                        </li>';
                let oldTotal = Number($('h4#sidebarCartTotal').text().split(' ').splice(1, 1));

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}', product_id: product_id},
                    success: function () {
                        $('a[data-id=' + product_id + '][id=addToCart]').text('Добавлено')
                        if ($.inArray(product_id, productsInCart) !== -1) {
                            $('button[data-id=' + product_id + '][id=addToCart]').text('Добавлено')
                            let quantity = Number($('span#sidebarProduct' + product_id + 'Price').text().split(' ').splice(1, 1)) + 1
                            $('span#sidebarProduct' + product_id + 'Price').text(' ' + Number(quantity) + ' × ' + priceAdded)
                            $('h4#sidebarCartTotal').html('Сумма: <span>' + (oldTotal+Number(priceAdded.split(" ").splice(0, 1))) + ' ₽</span>');
                        } else {
                            productsInCart.push(product_id)

                            $('button[data-id=' + product_id + '][id=addToCart]').text('Добавлено')
                            $('ul#product-in-sidebar-cart').append($contentAddedToSidebar)
                            $('h4#sidebarCartTotal').html('Сумма: <span>' + (oldTotal+Number(priceAdded.split(" ").splice(0, 1))) + ' ₽</span>');
                        }
                    },
                    error: function () {
                        $('[data-id=' + product_id + ']').text('Ошибка!')
                    },
                })
            })

            $('a#addToCart').click( function () {
                let product_id = $(this).data('id');
                let url = "/cart/add";

                let idAdded = product_id;
                let urlAdded = $('a#product' + product_id + 'ForAdd').attr('href');
                let imgAdded = $('img#product' + product_id + 'ForAdd').attr('src');
                let nameAdded = $('a#product' + product_id + 'ForAdd').text();
                let priceAdded = $('span#product' + product_id + 'ForAdd').text();
                let $contentAddedToSidebar = '<li class="single-product-cart" data-id="' + idAdded + '">\n' +
                    '                            <div class="cart-img">\n' +
                    '                                <a href="' + urlAdded + '"><img src="' + imgAdded + '" alt=""></a>\n' +
                    '                            </div>\n' +
                    '                            <div class="cart-title">\n' +
                    '                                <h4><a href="' + urlAdded + '">' + nameAdded + '</a></h4>\n' +
                    '                                    <span id="sidebarProduct' + idAdded + 'Price"> 1 × ' + priceAdded + '</span>\n' +
                    '                            </div>\n' +
                    '                            <div class="cart-delete">\n' +
                    '                                <a id="removeFromSidebarCart" data-id="' + idAdded + '">×</a>\n' +
                    '                            </div>\n' +
                    '                        </li>';
                let oldTotal = Number($('h4#sidebarCartTotal').text().split(' ').splice(1, 1));

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}', product_id: product_id},
                    success: function () {
                        $('a[data-id=' + product_id + '][id=addToCart]').text('Добавлено')
                        if ($.inArray(product_id, productsInCart) !== -1) {
                            $('button[data-id=' + product_id + '][id=addToCart]').text('Добавлено')
                            let quantity = Number($('span#sidebarProduct' + product_id + 'Price').text().split(' ').splice(1, 1)) + 1
                            $('span#sidebarProduct' + product_id + 'Price').text(' ' + Number(quantity) + ' × ' + priceAdded)
                            $('h4#sidebarCartTotal').html('Сумма: <span>' + (oldTotal+Number(priceAdded.split(" ").splice(0, 1))) + ' ₽</span>');
                        } else {
                            productsInCart.push(product_id)

                            $('button[data-id=' + product_id + '][id=addToCart]').text('Добавлено')
                            $('ul#product-in-sidebar-cart').append($contentAddedToSidebar)
                            $('h4#sidebarCartTotal').html('Сумма: <span>' + (oldTotal+Number(priceAdded.split(" ").splice(0, 1))) + ' ₽</span>');
                        }
                    },
                    error: function () {
                        $('a[data-id=' + product_id + '][id=addToCart]').text('Ошибка!')
                        $('[data-id=' + product_id + ']').text('Ошибка!')
                    },
                })
            })

            $('button#addToWishlist, a#addToWishlist').click( function () {
                let product_id = $(this).data('id');
                let url = "/account/wishlist/addOrRemove";
                let buttonAddToWishlist = $('button[data-id=' + product_id + '][id=addToWishlist]');
                let aAddToWishlist = $('a[data-id=' + product_id + '][id=addToWishlist]');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}', product_id: product_id},
                    success: function (response) {
                        if (response === 'added') {
                            buttonAddToWishlist.children().attr('class', 'icon-heart')
                            aAddToWishlist.children().attr('class', 'icon-heart')
                        } else {
                            buttonAddToWishlist.children().attr('class', 'icon-heart-empty')
                            aAddToWishlist.children().attr('class', 'icon-heart-empty')
                        }
                    },
                    error: function () {
                        alert('Произошла ошибка! Попробуйте позже')
                    },
                })
            })

            $('button#addToCompare').click( function () {
                let product_id = $(this).data('id');
                let url = "/compare/add";
                let button = '<button id="goToCompare" title="Перейти к сравнению">\n' +
                    '                                        <i class="icon-categori-all"></i>\n' +
                    '                                    </button>'

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}', product_id: product_id},
                    success: function (response) {
                        $('button[id=addToCompare][data-id=' + product_id + ']').replaceWith(button)
                    },
                    error: function () {
                        alert('Произошла ошибка! Попробуйте позже')
                    }
                })
            })

            $('button#goToCompare').click( function () {
                window.location.href = '{{ route('user.compare', ['type' => 'models']) }}';
            })
        })
    </script>
@endsection
