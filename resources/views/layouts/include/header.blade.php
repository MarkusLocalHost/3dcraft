<header class="header-area section-padding-1 transparent-bar">
    <div class="header-large-device">
        <div class="header-bottom sticky-bar">
            <div class="container-fluid">
                <div class="header-bottom-flex">
                    <div class="logo-menu-wrap">
                        <div class="logo">
                            <a href="{{ route('shop.index') }}">
                                <img src="{{ asset('assets/front/img/logo/logo-100.png') }}" alt="logo">
                            </a>
                        </div>
                        <div class="main-menu menu-lh-1 main-menu-padding-1 menu-mrg-1">
                            <nav>
                                <ul>
                                    <li><a href="{{ route('pages.landing') }}">Главная</a></li>
                                    <li><a href="{{ route('shop.index') }}?perPage=8">Магазин</a>
                                        <ul class="mega-menu-style-1 mega-menu-width2 menu-negative-mrg2">
                                            @foreach($sections as $section)
                                            <li class="mega-menu-sub-width20">
                                                <a class="menu-title" href="{{ route('shop.section', ['shop_section' => $section->slug]) }}">{{ $section->title }}</a>
                                                <ul>
                                                    @foreach($categories as $category)
                                                        @if($category->section_id == $section->id)
                                                            <li><a href="{{ route('shop.category', ['shop_section' => $section->slug, 'shop_category' => $category->slug]) }}">{{ $category->title }}</a></li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @endforeach
                                            <li class="mega-menu-sub-width40">
                                                <div class="banner-menu-content-wrap default-overlay">
                                                    <a href="product-details.html"><img
                                                            src="{{ asset('assets/front/img/menu/banner-header-1.jpg') }}"
                                                            alt="banner"></a>
                                                    <div class="banner-menu-content">
                                                        <h2>3D <br>макеты</h2>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li><a>Сравнение</a>
                                        <ul class="sub-menu-width">
                                            <li><a href="{{ route('user.compare', ['type' => 'models']) }}">Моделей</a></li>
                                            <li><a href="{{ route('user.compare', ['type' => 'plastik']) }}">Пластика</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('blog.index') }}">Записи</a>
                                        <ul class="sub-menu-width">
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
                    <div class="header-action-wrap header-action-flex header-action-width header-action-mrg-1">
                        <div class="search-style-1">
                            <form action="{{ route('shop.search') }}" method="GET">
                                <div class="form-search-1">
                                    <input class="input-text" value="" placeholder="Поиск (Ex: Phone, Laptop)"
                                           type="search" name="search">
                                    <button>
                                        <i class="icofont-search-1"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="same-style">
                            @auth
                                <a href="{{ route('account') }}"><i class="icofont-user-alt-3"></i></a>
                            @else
                                <a href="{{ route('auth') }}"><i class="icofont-user-alt-3"></i></a>
                            @endif
                        </div>
                        <div class="same-style header-cart">
                            <a class="cart-active" href="login-register.html#"><i class="icofont-shopping-cart"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-small-device header-small-ptb sticky-bar">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-6">
                    <div class="mobile-logo mobile-logo-width">
                        <a href="index.html">
                            <img alt="" src="{{ asset('assets/front/img/logo/logo-9.png') }}">
                        </a>
                    </div>
                </div>
                <div class="col-6">
                    <div class="header-action-wrap header-action-flex header-action-mrg-1">
                        <div class="same-style header-cart">
                            <a class="cart-active" href="login-register.html#"><i class="icofont-shopping-cart"></i></a>
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
