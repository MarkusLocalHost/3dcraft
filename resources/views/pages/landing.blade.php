<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dking - 3D</title>
    <meta name="robots" content="noindex, follow"/>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">

    <link rel="stylesheet" href="{{ asset('assets/front/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/front/css/style.min.css') }}">
</head>

<body>

<div class="main-wrapper main-wrapper-2 main-wrapper-3">
    <header class="header-area section-padding-1 header-ptb-1 transparent-bar sticky-bar">
        <div class="header-large-device">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6">
                        <div class="logo">
                            <a href="{{ route('pages.landing') }}">
                                <img src="{{ asset('assets/front/img/logo/logo.png') }}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header-action-wrap header-action-flex header-action-mrg-1">
                            <div class="same-style header-cart">
                                <a class="cart-active" href="#"><i class="icofont-shopping-cart"></i></a>
                            </div>
                            <div class="same-style header-search">
                                <a href="{{ route('auth') }}"><i class="icofont-user-alt-3"></i></a>
                            </div>
                            <div class="same-style header-info">
                                <button class="sidebar-active">
                                    <span class="info-width-1"></span>
                                    <span class="info-width-2"></span>
                                    <span class="info-width-3"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-small-device">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="mobile-logo mobile-logo-width">
                            <a href="{{ route('pages.landing') }}">
                                <img alt="" src="{{ asset('assets/front/img/logo/logo.png') }}">
                            </a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-action-wrap header-action-flex header-action-mrg-1">
                            <div class="same-style header-cart">
                                <a class="cart-active" href="index-handcraft.html#"><i
                                        class="icofont-shopping-cart"></i></a>
                            </div>
                            <div class="same-style header-info">
                                <button class="mobile-menu-button-active">
                                    <span class="info-width-1"></span>
                                    <span class="info-width-2"></span>
                                    <span class="info-width-3"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="clickalbe-sidebar-wrapper-active clickalbe-sidebar-wrapper-style-1">
        <div class="clickalbe-sidebar-wrap">
            <a class="sidebar-close"><i class="icofont-close-line"></i></a>
            <div class="clickable-mainmenu-wrap clickable-mainmenu-style1 sidebar-content-100-percent">
                <nav>
                    <ul>
                        <li class="has-sub-menu"><a href="{{ route('shop.index') }}?perPage=8">Магазин</a>
                            <ul class="sub-menu-2">
                                @foreach($sections as $section)
                                    <li class="has-sub-menu"><a
                                            href="{{ route('shop.section', ['shop_section' => $section->slug]) }}">{{ $section->title }}</a>
                                        <ul class="sub-menu-2">
                                            @foreach($categories as $category)
                                                @if($category->section_id == $section->id)
                                                    <li>
                                                        <a href="{{ route('shop.category', ['shop_section' => $section->slug, 'shop_category' => $category->slug]) }}">{{ $category->title }}</a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endforeach
                                <li><a href="product-details.html">3D макеты</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="">Сравнение</a>
                            <ul class="sub-menu-2">
                                <li><a href="{{ route('user.compare', ['type' => 'models']) }}">Моделей</a></li>
                                <li><a href="{{ route('user.compare', ['type' => 'plastik']) }}">Пластика</a></li>
                            </ul>
                        </li>
                        <li class="has-sub-menu"><a href="{{ route('blog.index') }}">Записи</a>
                            <ul class="sub-menu-2">
                                @foreach($categories_blog as $category_blog)
                                    <li><a href="{{ route('blog.category', ['slug' => $category_blog->slug]) }}">{{ $category_blog->title }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li><a href="{{ route('pages.contact') }}">Связаться</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- mini cart start -->
@include('layouts.include.sidebar_cart_active')
<!-- Mobile menu start -->
    @include('layouts.include.mobile_menu_active')
    <div class="slider-area bg-gray-5">
        <div class="slider-active-2 dot-style-1 dot-style-position2">
            <div class="single-slider slider-height-3 single-slider-pt-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-12 col-sm-12">
                            <div class="slider-content-2 slider-animated-1">
                                <h1 class="animated pl-190">3<span>D</span></h1>
                                <h2 class="animated"><span>C</span>raft</h2>
                                <div class="slider-single-img-3">
                                    <a href="{{ route('shop.index') }}"><img class="animated"
                                                                             src="{{ asset('assets/front/img/slider/handcraft-slider-1.png') }}"
                                                                             alt="product"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider slider-height-3 single-slider-pt-2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-12 col-sm-12">
                            <div class="slider-content-2 slider-animated-1">
                                <h1 class="animated">Han<span>d</span></h1>
                                <h2 class="animated"><span>C</span>raft</h2>
                                <div class="slider-single-img-3">
                                    <a href="{{ route('shop.index') }}"><img class="animated"
                                                                             src="{{ asset('assets/front/img/slider/handcraft-slider-1.png') }}"
                                                                             alt="product"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-categore-wrap">
        <div class="banner-wrap banner-width-flex-50">
            <div class="banner-img banner-img-overflow">
                <a href="index-handcraft.html#"><img src="{{ asset('assets/front/img/banner/sidebar-8.png') }}"
                                                     alt="banner"></a>
            </div>
            <div class="banner-content-5">
                <h3><a href="index-handcraft.html#">Новинки</a></h3>
            </div>
        </div>
        <div class="handcraft-categore-list">
            <ul>
                @foreach($sections as $section)
                    <li>
                        <a href="{{ route('shop.section', ['shop_section' => $section->slug]) }}">{{ $section->title }}</a>
                    </li>
                @endforeach
                <li><a href="{{ route('shop.index') }}">Посмотреть все категории <i
                            class="icofont-long-arrow-right"></i> </a></li>
            </ul>
        </div>
    </div>
    <div class="service-area pt-65 pb-125">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="service-wrap mb-30">
                        <img class="inject-me service-yellow-color"
                             src="{{ asset('assets/front/img/icon-img/headphones.svg') }}" alt="">
                        <h3>Happiness </h3>
                        <p>Free Shipping for any product and it's world wide</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="service-wrap mb-30">
                        <img class="inject-me service-yellow-color"
                             src="{{ asset('assets/front/img/icon-img/shipping-car.svg') }}" alt="">
                        <h3>Free Shipping </h3>
                        <p>Free Shipping for any product and it's world wide</p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                    <div class="service-wrap mb-30">
                        <img class="inject-me service-yellow-color"
                             src="{{ asset('assets/front/img/icon-img/trusty.svg') }}" alt="">
                        <h3>All Trusty Brand </h3>
                        <p>Free Shipping for any product and it's world wide</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pre-order-area pre-order-bg-color">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-6">
                    <div class="pre-order-img">
                        <a class="wow fadeInLeft" data-wow-delay=".5s" href="index-handcraft.html#"><img
                                src="{{ asset('assets/front/img/product/product-on-sale.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="pre-order-content">
                        <h3><a href="index-handcraft.html#">Pre Order is On</a></h3>
                        <h4><span>Materials</span> Wood </h4>
                        <p>Authoritatively matrix functionalized leadership skills after long-term high-impact channels.
                            Monotonectally transition enterprise-wide best practices.</p>
                        <span>$ 1212</span>
                        <div class="btn-style-3 btn-hover">
                            <a class="btn3-ptb-1" href="product-details.html">Pre Order</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-area pt-155 pb-100">
        <div class="container">
            <div class="product-tab-list-3 nav mb-60">
                <a class="active" href="#product-1" data-toggle="tab">
                    Hot Deal
                </a>
                <a href="#product-2" data-toggle="tab">
                    Featured Product
                </a>
                <a href="#product-3" data-toggle="tab">
                    New Arrival
                </a>
            </div>
            <div class="tab-content jump">
                <div id="product-1" class="tab-pane active">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-16.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 155</span>
                                        <span class="old-price">$ 165</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 155</span>
                                            <span class="old-price">$ 165</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-17.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 145</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 145</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-18.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 125</span>
                                        <span class="old-price">$ 140</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 125</span>
                                            <span class="old-price">$ 140</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-19.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 124</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 124</span>
                                            <span class="old-price">$ 130</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-20.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 110</span>
                                        <span class="old-price">$ 150</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 110</span>
                                            <span class="old-price">$ 150</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-21.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 200</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 200</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="product-2" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-21.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 155</span>
                                        <span class="old-price">$ 165</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 155</span>
                                            <span class="old-price">$ 165</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-20.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 145</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 145</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-19.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 125</span>
                                        <span class="old-price">$ 140</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 125</span>
                                            <span class="old-price">$ 140</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-18.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 124</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 124</span>
                                            <span class="old-price">$ 130</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-17.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 110</span>
                                        <span class="old-price">$ 150</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 110</span>
                                            <span class="old-price">$ 150</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-16.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 200</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 200</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="product-3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-19.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 155</span>
                                        <span class="old-price">$ 165</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 155</span>
                                            <span class="old-price">$ 165</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-18.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 145</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 145</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-17.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 125</span>
                                        <span class="old-price">$ 140</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 125</span>
                                            <span class="old-price">$ 140</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-16.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 124</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 124</span>
                                            <span class="old-price">$ 130</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-21.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 110</span>
                                        <span class="old-price">$ 150</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 110</span>
                                            <span class="old-price">$ 150</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="product-wrap mb-55">
                                <div class="product-img product-img-zoom mb-25">
                                    <a href="product-details.html">
                                        <img src="{{ asset('assets/front/img/product/product-20.jpg') }}" alt="">
                                    </a>
                                </div>
                                <div class="product-content">
                                    <h4><a href="product-details.html">Product Title</a></h4>
                                    <div class="product-price">
                                        <span>$ 200</span>
                                    </div>
                                </div>
                                <div class="product-action-position-1 text-center">
                                    <div class="product-content">
                                        <h4><a href="product-details.html">Product Title</a></h4>
                                        <div class="product-price">
                                            <span>$ 200</span>
                                        </div>
                                    </div>
                                    <div class="product-action-wrap">
                                        <div class="product-action-cart">
                                            <button title="Add to Cart">Add to cart</button>
                                        </div>
                                        <button data-toggle="modal" data-target="#exampleModal"><i
                                                class="icon-zoom"></i></button>
                                        <button title="Add to Compare"><i class="icon-compare"></i></button>
                                        <button title="Add to Wishlist"><i class="icon-heart-empty"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sessional-area sessional-bg-color">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-5">
                    <div class="sessional-content">
                        <h2>Sessional Sale </h2>
                        <p>Conveniently repurpose web-enabled supply chains after technically sound action items.
                            Progressively implement granular e-markets whereas</p>
                        <div class="btn-style-3 btn-hover">
                            <a class="btn3-ptb-2" href="shop.html">Browse Offer</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-7">
                    <div class="sessional-img-wrap fix">
                        <div class="sessional-img wow fadeInRight">
                            <a href="index-handcraft.html#"><img
                                    src="{{ asset('assets/front/img/product/sessional-product.png') }}"
                                    alt="product"></a>
                            <span class="sessional-shap"></span>
                        </div>
                        <div class="sessional-img-content">
                            <h2>50%</h2>
                            <h3>Off</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="testimonial-area bg-theme-color-yellow fix section-padding-3 pt-180 pb-180">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-xl-3 col-lg-4">
                    <div class="section-title-3 mb-30">
                        <h2>We Love Our Clients <br>They Love Us</h2>
                        <p>Competently grow wireless platforms through reliable leadership. Intrinsically supply.</p>
                        <div class="btn-style-2 btn-hover">
                            <a class="animated btn-ptb-1 btn-ptb-2-white-bg" href="product-details.html">All
                                Testimonials</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="testimonial-active-2">
                        <div class="testimonial-plr-2">
                            <div class="single-testimonial">
                                <div class="testi-rating-quotes-icon">
                                    <div class="testi-rating">
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                    </div>
                                    <div class="testi-quotes-icon">
                                        <img class="inject-me"
                                             src="{{ asset('assets/front/img/icon-img/quotes-icon.png') }}" alt="">
                                    </div>
                                </div>
                                <p>Quickly iterate superior manufactured products with long-term <span>high impact niche markets</span>.
                                    Rapidiously synergize revolutionary data after tactical technology.</p>
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{ asset('assets/front/img/testimonial/client-1.png') }}" alt="">
                                    </div>
                                    <div class="client-info">
                                        <h3>Binte Chuka</h3>
                                        <span>Google, CEO</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-plr-2">
                            <div class="single-testimonial">
                                <div class="testi-rating-quotes-icon">
                                    <div class="testi-rating">
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                        <i class="icon-rating"></i>
                                    </div>
                                    <div class="testi-quotes-icon">
                                        <img class="inject-me"
                                             src="{{ asset('assets/front/img/icon-img/quotes-icon.png') }}" alt="">
                                    </div>
                                </div>
                                <p>Quickly iterate superior manufactured products with long-term <span>high impact niche markets</span>.
                                    Rapidiously synergize revolutionary data after tactical technology.</p>
                                <div class="client-info-wrap">
                                    <div class="client-img">
                                        <img src="{{ asset('assets/front/img/testimonial/client-1.png') }}" alt="">
                                    </div>
                                    <div class="client-info">
                                        <h3>Binte Chuka</h3>
                                        <span>Google, CEO</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="instagram-area padding-25-row-col pt-165 pb-145">
        <div class="container">
            <div class="section-title text-center mb-60">
                <h2>Follow Us On Instagram</h2>
                <span>@hashop</span>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-12 col-sm-12">
                    <div class="single-instafeed mb-25">
                        <a href="index-handcraft.html#"><img
                                src="{{ asset('assets/front/img/instafeed/instafeed-7.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                    <div class="single-instafeed mb-25">
                        <a href="index-handcraft.html#"><img
                                src="{{ asset('assets/front/img/instafeed/instafeed-8.jpg') }}" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-12 col-sm-6">
                            <div class="single-instafeed mb-25">
                                <a href="index-handcraft.html#"><img
                                        src="{{ asset('assets/front/img/instafeed/instafeed-9.jpg') }}" alt=""></a>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-12 col-sm-6">
                            <div class="single-instafeed mb-25">
                                <a href="index-handcraft.html#"><img
                                        src="{{ asset('assets/front/img/instafeed/instafeed-10.jpg') }}" alt=""></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="subscribe-area pb-130">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <div class="section-title st-peragraph-width st-line-height mb-30 st-light-blue">
                        <h2>Subscribe for getting offer <br>& News Letters</h2>
                        <p>Dramatically iterate revolutionary infomediaries before 2.0 customer service</p>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div id="mc_embed_signup" class="subscribe-form-2 subscribe-form-2-yellow mt-30">
                        <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style-2" novalidate=""
                              target="_blank" name="mc-embedded-subscribe-form" method="post"
                              action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                            <div id="mc_embed_signup_scroll" class="mc-form-2">
                                <input class="email" type="email" required="" placeholder="Enter email address"
                                       name="EMAIL" value="">
                                <div class="mc-news-2" aria-hidden="true">
                                    <input type="text" value="" tabindex="-1"
                                           name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                </div>
                                <div class="clear-2">
                                    <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe"
                                           value="Subscribe">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer-area bg-light-yellow pt-115">
        <div class="container">
            <div class="footer-top-style-3 pb-75">
                <div class="logo text-center">
                    <a href="index.html">
                        <img src="{{ asset('assets/front/img/logo/logo-2.png') }}" alt="logo">
                    </a>
                </div>
                <p>Distinctively synergize orthogonal architectures without equity invested bandwidth.</p>
                <div class="social-icon social-icon-center">
                    <a href="index-handcraft.html#"><i class="icon-social-twitter"></i></a>
                    <a href="index-handcraft.html#"><i class="icon-social-pinterest"></i></a>
                    <a href="index-handcraft.html#"><i class="icon-social-instagram"></i></a>
                    <a href="index-handcraft.html#"><i class="icon-social-facebook-square"></i></a>
                </div>
                <div class="footer-menu-2">
                    <nav>
                        <ul>
                            <li><a href="about-us.html">About</a></li>
                            <li><a href="about-us.html">Mission</a></li>
                            <li><a href="about-us.html">Vision</a></li>
                            <li><a href="index-handcraft.html#">FAQ</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="copyright-ptb-3 border-top-2">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-6">
                            <div class="copyright-2">
                                <p>Copyright © 2020 Dking - <a target="_blank" href="https://hasthemes.com/"> All Right
                                        Reserved</a></p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="footer-menu footer-menu-right footer-menu-right-blue">
                                <nav>
                                    <ul>
                                        <li><a href="index-handcraft.html#">Terms</a></li>
                                        <li><a href="index-handcraft.html#">Privacy</a></li>
                                        <li><a href="index-handcraft.html#">License</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-12 col-sm-6">
                            <div class="quickview-img">
                                <img src="{{ asset('assets/front/img/product/product-3.jpg') }}" alt="">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-12 col-sm-6">
                            <div class="product-details-content quickview-content">
                                <h2>Electronic Shop</h2>
                                <div class="product-ratting-review-wrap">
                                    <div class="product-ratting-digit-wrap">
                                        <div class="product-ratting">
                                            <i class="icon-rating"></i>
                                            <i class="icon-rating"></i>
                                            <i class="icon-rating"></i>
                                            <i class="icon-rating"></i>
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
                                <p>Seamlessly predominate enterprise metrics without performance based process
                                    improvements.</p>
                                <div class="pro-details-price">
                                    <span>US $75.72</span>
                                    <span class="old-price">US $95.72</span>
                                </div>
                                <div class="pro-details-color-wrap">
                                    <span>Color:</span>
                                    <div class="pro-details-color-content">
                                        <ul>
                                            <li><a class="white" href="index-handcraft.html#">Black</a></li>
                                            <li><a class="azalea" href="index-handcraft.html#">Blue</a></li>
                                            <li><a class="dolly" href="index-handcraft.html#">Green</a></li>
                                            <li><a class="peach-orange" href="index-handcraft.html#">Orange</a></li>
                                            <li><a class="mona-lisa active" href="index-handcraft.html#">Pink</a></li>
                                            <li><a class="cupid" href="index-handcraft.html#">gray</a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pro-details-size">
                                    <span>Size:</span>
                                    <div class="pro-details-size-content">
                                        <ul>
                                            <li><a href="index-handcraft.html#">XS</a></li>
                                            <li><a href="index-handcraft.html#">S</a></li>
                                            <li><a href="index-handcraft.html#">M</a></li>
                                            <li><a href="index-handcraft.html#">L</a></li>
                                            <li><a href="index-handcraft.html#">XL</a></li>
                                            <li><a href="index-handcraft.html#">XXL</a></li>
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
                                        <li><span>Model:</span> <a href="index-handcraft.html#">Odsy-1000</a></li>
                                        <li><span>Ship To</span> <a href="index-handcraft.html#">2834 Laurel Lane</a>,
                                            <a href="index-handcraft.html#">Mentone</a> , <a
                                                href="index-handcraft.html#">Texas</a></li>
                                    </ul>
                                </div>
                                <div class="pro-details-action-wrap">
                                    <div class="pro-details-buy-now">
                                        <a href="index-handcraft.html#">Buy Now</a>
                                    </div>
                                    <div class="pro-details-action">
                                        <a title="Add to Cart" href="index-handcraft.html#"><i class="icon-basket"></i></a>
                                        <a title="Add to Wishlist" href="index-handcraft.html#"><i
                                                class="icon-heart"></i></a>
                                        <a class="social" title="Social" href="index-handcraft.html#"><i
                                                class="icon-share"></i></a>
                                        <div class="product-dec-social">
                                            <a class="facebook" title="Facebook" href="index-handcraft.html#"><i
                                                    class="icon-social-facebook-square"></i></a>
                                            <a class="twitter" title="Twitter" href="index-handcraft.html#"><i
                                                    class="icon-social-twitter"></i></a>
                                            <a class="instagram" title="Instagram" href="index-handcraft.html#"><i
                                                    class="icon-social-instagram"></i></a>
                                            <a class="pinterest" title="Pinterest" href="index-handcraft.html#"><i
                                                    class="icon-social-pinterest"></i></a>
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
    <!-- Modal end -->
</div>

<script src="{{ asset('assets/front/js/vendor.min.js') }}"></script>
<script src="{{ asset('assets/front/js/plugins.min.js') }}"></script>
<script src="{{ asset('assets/front/js/main.js') }}"></script>

</body>

</html>
