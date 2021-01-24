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
                                    <a href="#shop-1" class="active" data-toggle="tab"><img class="inject-me" src="{{ asset('assets/front/img/icon-img/shop-grid.svg') }}" alt=""></a>
                                    <a href="#shop-2" data-toggle="tab"><img class="inject-me" src="{{ asset('assets/front/img/icon-img/shop-list.svg') }}" alt=""></a>
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
                                        <li><a href="{{ route('shop.category', ['shop_section' => $category->section->slug, 'shop_category' => $category->slug]) }}">{{ $category->title }}</a> </li>
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
                                        <span>Price: </span><input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($section)
                            @if($section->title == "Популярные модели")
                                <div class="sidebar-widget">
                                    <h4 class="pro-sidebar-title">Найти по высоте (в см)</h4>
                                    <div class="sidebar-widget-size mt-50 mb-75">
                                        <ul>
                                            <li><a href="shop-6.html#"><5</a> </li>
                                            <li><a href="shop-6.html#"><10</a> </li>
                                            <li><a href="shop-6.html#"><15</a> </li>
                                            <li><a href="shop-6.html#">>15</a> </li>
                                        </ul>
                                    </div>
                                </div>
                            @elseif($section->title == "Пластик")
                                <div class="sidebar-widget">
                                    <h4 class="pro-sidebar-title">Найти по цвету</h4>
                                    <div class="pro-details-color-content sidebar-widget-color mt-45 mb-70">
                                        <ul>
                                            <li><a class="white" href="shop-6.html#">Black</a></li>
                                            <li><a class="azalea" href="shop-6.html#">Blue</a></li>
                                            <li><a class="dolly" href="shop-6.html#">Green</a></li>
                                            <li><a class="peach-orange" href="shop-6.html#">Orange</a></li>
                                            <li><a class="mona-lisa active" href="shop-6.html#">Pink</a></li>
                                            <li><a class="cupid" href="shop-6.html#">gray</a></li>
                                            <li><a class="one" href="shop-6.html#">one</a></li>
                                            <li><a class="two" href="shop-6.html#">two</a></li>
                                            <li><a class="three" href="shop-6.html#">three</a></li>
                                            <li><a class="four" href="shop-6.html#">four</a></li>
                                            <li><a class="five" href="shop-6.html#">five</a></li>
                                            <li><a class="six" href="shop-6.html#">six</a></li>
                                            <li><a class="seven" href="shop-6.html#">seven</a></li>
                                            <li><a class="eight" href="shop-6.html#">eight</a></li>
                                            <li><a class="nine" href="shop-6.html#">nine</a></li>
                                            <li><a class="ten" href="shop-6.html#">ten</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar-widget">
                                    <h4 class="pro-sidebar-title">Найти по весу (в кг)</h4>
                                    <div class="sidebar-widget-size mt-50 mb-75">
                                        <ul>
                                            <li><a href="shop-6.html#">0.1</a> </li>
                                            <li><a href="shop-6.html#">0.2</a> </li>
                                            <li><a href="shop-6.html#">0.5</a> </li>
                                            <li><a href="shop-6.html#">1</a> </li>
                                            <li><a href="shop-6.html#">2</a> </li>
                                            <li><a href="shop-6.html#">5</a> </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="sidebar-widget">
                                    <h4 class="pro-sidebar-title">Найти по бренду</h4>
                                    <div class="sidebar-widget-brand-logo mt-50">
                                        <ul>
                                            <li><a href="shop-6.html#"><img src="assets/images/brand-logo/brand-logo-1.png" alt=""></a></li>
                                            <li><a href="shop-6.html#"><img src="assets/images/brand-logo/brand-logo-2.png" alt=""></a></li>
                                            <li><a href="shop-6.html#"><img src="assets/images/brand-logo/brand-logo-3.png" alt=""></a></li>
                                            <li><a href="shop-6.html#"><img src="assets/images/brand-logo/brand-logo-6.png" alt=""></a></li>
                                            <li><a href="shop-6.html#"><img src="assets/images/brand-logo/brand-logo-5.png" alt=""></a></li>
                                            <li><a href="shop-6.html#"><img src="assets/images/brand-logo/brand-logo-4.png" alt=""></a></li>
                                        </ul>
                                    </div>
                                </div>
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
    </script>
    @yield('script-in-shop')
@endsection
