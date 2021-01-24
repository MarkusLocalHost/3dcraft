@extends('layouts.main')

@section('title')
    Dking - {{ $product->product_name }}
@endsection

@section('content')
    <div class="product-details-area slider-mt-7 pt-120 pb-70">
        <div class="container">
            <div class="product-details-top-content">
                <div class="product-details-content">
                    <h2>{{ $product->product_name }}</h2>
                    <p class="pro-dec-paragraph-2">{!! $product->content !!}</p>
                </div>
                <div class="product-details-content">
                    <div class="product-ratting-review-wrap">
                        <div class="product-ratting-digit-wrap">
                            <div class="product-ratting">
                                @if($rating != null)
                                    @for($i = 0; $i < floor($rating); $i++)
                                        <i class="icon-rating"></i>
                                    @endfor
                                    @if($rating - floor($rating) >= 0.3 && $rating - floor($rating) <= 0.7)
                                        <i class="icon-star-half-alt"></i>
                                        @for($i = 0; $i < 4 - floor($rating); $i++)
                                            <i class="icon-star-empty"></i>
                                        @endfor
                                    @else
                                        @for($i = 0; $i < 5 - floor($rating); $i++)
                                            <i class="icon-star-empty"></i>
                                        @endfor
                                    @endif
                                @else
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                    <i class="icon-star-empty"></i>
                                @endif
                            </div>
                            <div class="product-digit">
                                <span>{{ $rating ?? 0 }}</span>
                            </div>
                        </div>
                        <div class="product-review-order">
                            <span>
                                @if(count($product->reviews) == 0)
                                    0 обзоров
                                @elseif(count($product->reviews) == 1)
                                    1 обзор
                                @elseif(count($product->reviews) < 4.1)
                                    {{ count($product->reviews) }} обзора
                                @else
                                    {{ count($product->reviews) }} обзоров
                                @endif
                            </span>
                            <span>
                                @if($order_count == 0)
                                    Пока нет заказов
                                @elseif($order_count == 1)
                                    {{ $order_count }} заказ
                                @elseif($order_count > 4)
                                    {{ $order_count }} заказа
                                @else
                                    {{ $order_count }} заказов
                                @endif
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-12">
                    <div class="product-details-tab">
                        <div class="product-dec-left">
                            <div class="pro-dec-big-img-slider-2 product-big-img-style">
                                <div class="easyzoom-style">
                                    <div class="easyzoom easyzoom--overlay">
                                        <a href="{{ $product->getImage() }}">
                                            <img src="{{ $product->getImage() }}" alt="">
                                        </a>
                                    </div>
                                </div>
                                @foreach($gallery as $photo)
                                    <div class="easyzoom-style">
                                        <div class="easyzoom easyzoom--overlay">
                                            <a href="{{ $photo->getImage() }}">
                                                <img src="{{ $photo->getImage() }}" alt="" id="{{ $product->id }}">
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="product-dec-right">
                            <div class="product-dec-slider-2 product-small-img-style">
                                <div class="product-dec-small active">
                                    <img src="{{ $product->getImage() }}" alt="" width="75px">
                                </div>
                                @foreach($gallery as $photo)
                                    <div class="product-dec-small">
                                        <img src="{{ $photo->getImage() }}" alt="" width="75px">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5 col-md-12">
                    <div class="product-details-content quickview-content product-details-content-4">
                        <div class="pro-details-price pro-details-price-4">
                            @if($product->sale_id != null)
                                <span>{{ ($product->price - $product->sale->amount) * (100 - $product->sale->percent)/100 }} ₽</span>
                                <span class="old-price">{{ $product->price }} ₽</span>
                            @else
                                <span>{{ $product->price }} ₽</span>
                            @endif
                        </div>
                        @if($product->color)
                            <div class="pro-details-color-wrap">
                                <span>Цвет:</span>
                                <div class="pro-details-color-content">
                                    <ul>
                                        <li><a class="white" href="product-details-4.html#">Black</a></li>
                                        <li><a class="azalea" href="product-details-4.html#">Blue</a></li>
                                        <li><a class="dolly" href="product-details-4.html#">Green</a></li>
                                        <li><a class="peach-orange" href="product-details-4.html#">Orange</a></li>
                                        <li><a class="mona-lisa active" href="product-details-4.html#">Pink</a></li>
                                        <li><a class="cupid" href="product-details-4.html#">gray</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if($product->size)
                            <div class="pro-details-size">
                                <span>Размер:</span>
                                <div class="pro-details-size-content">
                                    <ul>
                                        <li><a href="product-details-4.html#">XS</a></li>
                                        <li><a href="product-details-4.html#">S</a></li>
                                        <li><a href="product-details-4.html#">M</a></li>
                                        <li><a href="product-details-4.html#">L</a></li>
                                        <li><a href="product-details-4.html#">XL</a></li>
                                        <li><a href="product-details-4.html#">XXL</a></li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="pro-details-quality">
                            <span>Количество:</span>
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                            </div>
                        </div>
                        <div class="product-details-meta">
                            {{--                            <ul>--}}
                            {{--                                <li><span>Model:</span> <a href="product-details-4.html#">Odsy-1000</a></li>--}}
                            {{--                                <li><span>Ship To</span> <a href="product-details-4.html#">2834 Laurel Lane</a>, <a href="product-details-4.html#">Mentone</a> , <a href="product-details-4.html#">Texas</a></li>--}}
                            {{--                            </ul>--}}
                        </div>
                        <div class="pro-details-action-wrap">
                            <div class="pro-details-buy-now">
                                <a id="addToCartAndGoToCart" data-id="{{ $product->id }}" href="{{ route('user.cart') }}">Купить сейчас</a>
                            </div>
                            <div class="pro-details-action">
                                <a title="Добавить в корзину" id="addToCart" data-id="{{ $product->id }}"><i class="icon-basket"></i></a>
                                <a title="Add to Wishlist" href="product-details-4.html#"><i class="icon-heart"></i></a>
                                <a class="social" title="Social" href="product-details-4.html#"><i
                                        class="icon-share"></i></a>
                                <div class="product-dec-social">
                                    <a class="facebook" title="Facebook" href="product-details-4.html#"><i
                                            class="icon-social-facebook-square"></i></a>
                                    <a class="twitter" title="Twitter" href="product-details-4.html#"><i
                                            class="icon-social-twitter"></i></a>
                                    <a class="instagram" title="Instagram" href="product-details-4.html#"><i
                                            class="icon-social-instagram"></i></a>
                                    <a class="pinterest" title="Pinterest" href="product-details-4.html#"><i
                                            class="icon-social-pinterest"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="description-review-wrapper pb-155">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="dec-review-topbar nav mb-65">
                        <a class="active" data-toggle="tab" href="#des-details1">Описание</a>
                        <a data-toggle="tab" href="#des-details2">Specification</a>
                        <a data-toggle="tab" href="#des-details3">Материалы </a>
                        <a data-toggle="tab" href="#des-details4">Отзывы </a>
                    </div>
                    <div class="tab-content dec-review-bottom">
                        <div id="des-details1" class="tab-pane active">
                            <div class="description-wrap">
                                <p>Crafted in premium watch quality, fenix Chronos is the first Garmin timepiece to
                                    combine a durable metal case with integrated performance GPS to support navigation
                                    and sport. In the tradition of classic tool watches it features a tough design and a
                                    set of modern meaningful tools like Elevate wrist heart rate, various sports
                                    apps.</p>
                                <p> advanced performance metrics for endurance sports, Garmin quality navigation
                                    features and smart notifications. In fenix Chronos top-tier performance meets
                                    sophisticated design in a highly evolved timepiece that fits your style anywhere,
                                    anytime. Solid brushed 316L stainless steel case with brushed stainless steel bezel
                                    and integrated EXOTM antenna for GPS + GLONASS support. High-strength scratch
                                    resistant sapphire crystal. Brown vintage leather strap with hand-sewn contrast
                                    stitching and nubuck inner lining and quick release mechanism.</p>
                            </div>
                        </div>
                        <div id="des-details2" class="tab-pane">
                            <div class="specification-wrap table-responsive">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="width1">Name</td>
                                        <td>Salwar Kameez</td>
                                    </tr>
                                    <tr>
                                        <td>SKU</td>
                                        <td>0x48e2c</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Models</td>
                                        <td>FX 829 v1</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Categories</td>
                                        <td>Digital Print</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Size</td>
                                        <td>60’’ x 40’’</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Brand</td>
                                        <td>Individual Collections</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Color</td>
                                        <td>Black, White</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="des-details3" class="tab-pane">
                            <div class="specification-wrap table-responsive">
                                <table>
                                    <tbody>
                                    <tr>
                                        <td class="width1">Top</td>
                                        <td>Cotton Digital Print Chain Stitch Embroidery Work</td>
                                    </tr>
                                    <tr>
                                        <td>Bottom</td>
                                        <td>Cotton Cambric</td>
                                    </tr>
                                    <tr>
                                        <td class="width1">Dupatta</td>
                                        <td>Digital Printed Cotton Malmal With Chain Stitch</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="des-details4" class="tab-pane">
                            <div class="review-wrapper">
                                @if($reviews->count() == 0)
                                    <h2>Нет отзывов</h2>
                                @else
                                    <h2>{{ $reviews->count() }} отзывов for Sleeve Button Cowl Neck</h2>
                                @endif
                                @foreach($reviews as $review)
                                    <div class="single-review">
                                        <div class="review-img">
                                            <img src="assets/images/product-details/client-1.png" alt="">
                                        </div>
                                        <div class="review-content">
                                            <div class="review-top-wrap">
                                                <div class="review-name">
                                                    <h5><span>{{ $review->user->name }}</span> - March 14, 2019
                                                        | {{ $review->created_at }}</h5>
                                                </div>
                                                <div class="review-rating">
                                                    <i class="yellow icon-rating"></i>
                                                    <i class="yellow icon-rating"></i>
                                                    <i class="yellow icon-rating"></i>
                                                    <i class="yellow icon-rating"></i>
                                                    <i class="yellow icon-rating"></i>
                                                </div>
                                            </div>
                                            <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna
                                                molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci.
                                                Aliquam
                                                egestas libero ac turpis pharetra, in vehicula lacus scelerisque</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if($products_to_connect)
        <div class="product-area pb-155">
            <div class="container">
                <div class="section-title-8 mb-65">
                    <h2>Вас может заинтересовать</h2>
                </div>
                <div class="product-slider-active-4">
                    @foreach($products_to_connect as $product_to_connect)
                        <div class="product-wrap-plr-1">
                            <div class="product-wrap">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ $product_to_connect->getImage() }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">{{ $product_to_connect->product_name }}</a></h4>
                                    <div class="product-price">
                                        @if($product_to_connect->sale_id != null)
                                            <span>{{ ($product_to_connect->price - $product_to_connect->sale->amount) * (100 - $product_to_connect->sale->percent)/100 }} ₽</span>
                                            <span class="old-price">{{ $product_to_connect->price }} ₽</span>
                                        @else
                                            <span>{{ $product_to_connect->price }} ₽</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">{{ $product_to_connect->product_name }}</a>
                                        </h4>
                                        <div class="product-price">
                                            @if($product_to_connect->sale_id != null)
                                                <span>{{ ($product_to_connect->price - $product_to_connect->sale->amount) * (100 - $product_to_connect->sale->percent)/100 }} ₽</span>
                                                <span class="old-price">{{ $product_to_connect->price }} ₽</span>
                                            @else
                                                <span>{{ $product_to_connect->price }} ₽</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Добавить</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i>
                                        </button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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

            let productsInCart = [];
            $('ul#product-in-sidebar-cart').children().each(function () {
                productsInCart.push(Number($(this).attr('data-id')))
            })

            $('.qtybutton').click( function () {
                if ($('.cart-plus-minus-box').val() == 0) {
                    $('.cart-plus-minus-box').val(1)
                }
            })

            $('a#addToCartAndGoToCart').click( function () {
                let product_id = $(this).data('id');
                let url = "/cart/add";
                let qty = $('.cart-plus-minus-box').val();

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}', product_id: product_id, qty: qty},
                    success: function () {

                    },
                    error: function () {

                    },
                })
            })

            $('a#addToCart').click( function () {
                let product_id = $(this).data('id');
                let url = "/cart/add";
                let qty = $('.cart-plus-minus-box').val();

                let idAdded = product_id;
                let urlAdded = $('a#product' + product_id + 'ForAdd').attr('href');
                let imgAdded = $('img#' + product_id).attr('src');
                let nameAdded = $('a#product' + product_id + 'ForAdd').text();
                let priceAdded = $('span#product' + product_id + 'ForAdd').text();
                let $contentAddedToSidebar = '<li class="single-product-cart" data-id="' + idAdded + '">\n' +
                    '                            <div class="cart-img">\n' +
                    '                                <a href="' + urlAdded + '"><img src="' + imgAdded + '" alt=""></a>\n' +
                    '                            </div>\n' +
                    '                            <div class="cart-title">\n' +
                    '                                <h4><a href="' + urlAdded + '">' + nameAdded + '</a></h4>\n' +
                    '                                    <span id="sidebarProduct' + idAdded + 'Price"> ' + qty + ' × ' + priceAdded + '</span>\n' +
                    '                            </div>\n' +
                    '                            <div class="cart-delete">\n' +
                    '                                <a id="removeFromSidebarCart" data-id="' + idAdded + '">×</a>\n' +
                    '                            </div>\n' +
                    '                        </li>';
                let oldTotal = Number($('h4#sidebarCartTotal').text().split(' ').splice(1, 1));

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {_token: '{{ csrf_token() }}', product_id: product_id, qty: qty},
                    success: function () {
                        $('a[data-id=' + product_id + '][id=addToCart]').text('Добавлено')
                        if ($.inArray(product_id, productsInCart) !== -1) {
                            let quantity = Number($('span#sidebarProduct' + product_id + 'Price').text().split(' ').splice(1, 1)) + qty
                            $('span#sidebarProduct' + product_id + 'Price').text(' ' + Number(quantity) + ' × ' + priceAdded)
                            $('h4#sidebarCartTotal').html('Сумма: <span>' + (oldTotal+Number(priceAdded.split(" ").splice(0, 1))) + ' ₽</span>');
                        } else {
                            productsInCart.push(product_id)

                            $('ul#product-in-sidebar-cart').append($contentAddedToSidebar)
                            $('h4#sidebarCartTotal').html('Сумма: <span>' + (oldTotal+Number(priceAdded.split(" ").splice(0, 1))*qty) + ' ₽</span>');
                        }
                    },
                    error: function () {
                        $('[data-id=' + product_id + ']').text('Ошибка!')
                    },
                })
            })
        })
    </script>
@endsection
