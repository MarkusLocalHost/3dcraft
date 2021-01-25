@extends('layouts.main')

@section('content')
    <div class="shop-area breadcrumb-mt section-padding-12 pt-25 pb-160">
        <div class="container-fluid">
            <div class="row flex-row-reverse">
                <div class="col-xl-10 col-lg-9">
                    <div class="shop-wrap-5">
                        <div class="shop-top-bar">
                            <div class="shop-top-bar-left">
                                <div class="shop-tab nav">
                                    <a href="#shop-1" class="active" data-toggle="tab"><img class="inject-me"
                                                                                            src="{{ asset('assets/front/img/icon-img/shop-grid.svg') }}"
                                                                                            alt=""></a>
                                    <a href="#shop-2" data-toggle="tab"><img class="inject-me"
                                                                             src="{{ asset('assets/front/img/icon-img/shop-list.svg') }}"
                                                                             alt=""></a>
                                </div>
                            </div>
                            <div class="shop-top-bar-right">
                                <div class="shop-page-list">
                                    <ul>
                                        <li>Show</li>
                                        <li @if($perPage == 4) class="active" @endif><a href="?perPage=4">4</a></li>
                                        <li @if($perPage == 8) class="active" @endif><a href="?perPage=8">8</a></li>
                                        <li @if($perPage == 12) class="active" @endif><a href="?perPage=12">12</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @yield('shop-content')
                    </div>
                </div>
                <div class="col-xl-2 col-lg-3">
                    <div class="shop-sidebar-style shop-sidebar-style-mrg2">
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Категории</h4>
                            <div class="sidebar-widget-categori mt-45 mb-70">
                                <ul>
                                    @foreach($categories as $category)
                                        <li>
                                            <a href="{{ route('shop.category', ['shop_section' => $category->section->slug, 'shop_category' => $category->slug]) }}">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="sidebar-widget">
                            <h4 class="pro-sidebar-title">Диапазон цен</h4>
                            <div class="price-filter mt-55 mb-65">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <span>Цена: </span><input type="text" id="amount" name="price"
                                                                  placeholder="Add Your Price"/>
                                    </div>
                                </div>
                                <div>
                                    <button class="apply-filter mt-25">Применить</button>
                                </div>
                            </div>
                        </div>
                        @if($section)
                            @if($section->title == "Популярные модели")
                                <div class="sidebar-widget">
                                    <h4 class="pro-sidebar-title">Найти по высоте (в см)</h4>
                                    <div class="sidebar-widget-size mt-50 mb-75">
                                        <ul>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('height') == '5')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="height"
                                                    data-id="5"
                                                ><5</a></li>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('height') == '10')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="height"
                                                    data-id="10"
                                                ><10</a></li>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('height') == '15')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="height"
                                                    data-id="15"
                                                ><15</a></li>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('height') == 'max')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="height"
                                                    data-id="max"
                                                >>15</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @elseif($section->title == "Пластик")
                                <div class="sidebar-widget">
                                    <h4 class="pro-sidebar-title">Найти по цвету</h4>
                                    <div class="pro-details-color-content sidebar-widget-color mt-45 mb-70">
                                        <ul>
                                            <li><a class="black @if(\Illuminate\Support\Facades\Request::input('color') == 'black') active @endif" id="color" data-id="black">Black</a></li>
                                            <li><a class="grey @if(\Illuminate\Support\Facades\Request::input('color') == 'grey') active @endif" id="color" data-id="grey">Grey</a></li>
                                            <li><a class="white @if(\Illuminate\Support\Facades\Request::input('color') == 'white') active @endif" id="color" data-id="white">White</a></li>
                                            <li><a class="green @if(\Illuminate\Support\Facades\Request::input('color') == 'green') active @endif" id="color" data-id="green">Green</a></li>
                                            <li><a class="yellow @if(\Illuminate\Support\Facades\Request::input('color') == 'yellow') active @endif" id="color" data-id="yellow">Yellow</a></li>
                                            <li><a class="orange @if(\Illuminate\Support\Facades\Request::input('color') == 'orange') active @endif" id="color" data-id="orange">Orange</a></li>
                                            <li><a class="red @if(\Illuminate\Support\Facades\Request::input('color') == 'red') active @endif" id="color" data-id="red">Red</a></li>
                                            <li><a class="blue @if(\Illuminate\Support\Facades\Request::input('color') == 'blue') active @endif" id="color" data-id="blue">Blue</a></li>
                                            <li><a class="copper @if(\Illuminate\Support\Facades\Request::input('color') == 'copper') active @endif" id="color" data-id="copper">Copper</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar-widget">
                                    <h4 class="pro-sidebar-title">Найти по весу (в кг)</h4>
                                    <div class="sidebar-widget-size mt-50 mb-75">
                                        <ul>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('weight') == '0.1')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="weight"
                                                    data-id="0.1"
                                                >0.1</a></li>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('weight') == '0.2')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="weight"
                                                    data-id="0.2"
                                                >0.2</a></li>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('weight') == '0.5')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="weight"
                                                    data-id="0.5"
                                                >0.5</a></li>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('weight') == '1')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="weight"
                                                    data-id="1"
                                                >1</a></li>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('weight') == '2')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="weight"
                                                    data-id="2"
                                                >2</a></li>
                                            <li><a
                                                    @if(\Illuminate\Support\Facades\Request::input('weight') == '5')
                                                    style="background-color: #333333; color: white"
                                                    @endif
                                                    id="weight"
                                                    data-id="5"
                                                >5</a></li>
                                        </ul>
                                    </div>
                                </div>
{{--                                <div class="sidebar-widget">--}}
{{--                                    <h4 class="pro-sidebar-title">Найти по бренду</h4>--}}
{{--                                    <div class="sidebar-widget-brand-logo mt-50">--}}
{{--                                        <ul>--}}
{{--                                            <li><a href="shop-6.html#"><img--}}
{{--                                                        src="assets/images/brand-logo/brand-logo-1.png" alt=""></a></li>--}}
{{--                                            <li><a href="shop-6.html#"><img--}}
{{--                                                        src="assets/images/brand-logo/brand-logo-2.png" alt=""></a></li>--}}
{{--                                            <li><a href="shop-6.html#"><img--}}
{{--                                                        src="assets/images/brand-logo/brand-logo-3.png" alt=""></a></li>--}}
{{--                                            <li><a href="shop-6.html#"><img--}}
{{--                                                        src="assets/images/brand-logo/brand-logo-6.png" alt=""></a></li>--}}
{{--                                            <li><a href="shop-6.html#"><img--}}
{{--                                                        src="assets/images/brand-logo/brand-logo-5.png" alt=""></a></li>--}}
{{--                                            <li><a href="shop-6.html#"><img--}}
{{--                                                        src="assets/images/brand-logo/brand-logo-4.png" alt=""></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $('.sidebar-widget-categori ul li a').each(function () {
            let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
            let link = this.href;
            if (link == location) {
                $(this).addClass('active');
            }
        });

        function removeParam(key, sourceURL) {
            var rtn = sourceURL.split("?")[0],
                param,
                params_arr = [],
                queryString = (sourceURL.indexOf("?") !== -1) ? sourceURL.split("?")[1] : "";
            if (queryString !== "") {
                params_arr = queryString.split("&");
                for (var i = params_arr.length - 1; i >= 0; i -= 1) {
                    param = params_arr[i].split("=")[0];
                    if (param === key) {
                        params_arr.splice(i, 1);
                    }
                }
                rtn = rtn + "?" + params_arr.join("&");
            }
            return rtn;
        }

        $('.apply-filter').click(function () {
            let value = $('input#amount').val();
            let prices = value.replaceAll('₽', '').split(" - ", 2);

            let url = document.location.href;
            let urlFilter = removeParam("minPrice", url)
            let urlFilterTwo = removeParam("maxPrice", urlFilter)

            document.location = urlFilterTwo + (document.location.href.indexOf('?') >= 0 ? '&' : '?') + "minPrice=" + prices[0] + "&maxPrice=" + prices[1];
        })

        $('a#height').click(function () {
            let data = $(this).data('id')

            let url = document.location.href;
            let urlFilter = removeParam("height", url)

            document.location = urlFilter + (document.location.href.indexOf('?') >= 0 ? '&' : '?') + "height=" + data;
        })

        $('a#weight').click(function () {
            let data = $(this).data('id')

            let url = document.location.href;
            let urlFilter = removeParam("weight", url)

            document.location = urlFilter + (document.location.href.indexOf('?') >= 0 ? '&' : '?') + "weight=" + data;
        })

        $('a#color').click(function () {
            let data = $(this).data('id')

            let url = document.location.href;
            let urlFilter = removeParam("color", url)

            document.location = urlFilter + (document.location.href.indexOf('?') >= 0 ? '&' : '?') + "color=" + data;
        })

        /*---------------------
        Price range
        --------------------- */
        var minPrice = {{ $minPrice }};
        var maxPrice = {{ $maxPrice }}
        var actualMinPrice = {{ \Illuminate\Support\Facades\Request::input('minPrice') ?? $minPrice }}
        var actualMaxPrice = {{ \Illuminate\Support\Facades\Request::input('maxPrice') ?? $maxPrice }}
        var sliderrange = $('#slider-range');
        var amountprice = $('#amount');
        $(function () {
            sliderrange.slider({
                range: true,
                min: minPrice,
                max: maxPrice,
                values: [actualMinPrice, actualMaxPrice],
                slide: function (event, ui) {
                    amountprice.val("₽" + ui.values[0] + " - ₽" + ui.values[1]);
                }
            });
            amountprice.val("₽" + sliderrange.slider("values", 0) +
                " - ₽" + sliderrange.slider("values", 1));
        });
    </script>
    @yield('script-in-shop')
@endsection
