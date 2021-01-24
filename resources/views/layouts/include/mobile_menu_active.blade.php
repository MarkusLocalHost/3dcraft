<div class="mobile-menu-active clickalbe-sidebar-wrapper-style-1">
    <div class="clickalbe-sidebar-wrap">
        <a class="sidebar-close"><i class="icofont-close-line"></i></a>
        <div class="mobile-menu-content-area sidebar-content-100-percent">
            <div class="mobile-search">
                <form class="search-form" action="login-register.html#">
                    <input type="text" placeholder="Search here…">
                    <button class="button-search"><i class="icofont-search-1"></i></button>
                </form>
            </div>
            <div class="clickable-mainmenu-wrap clickable-mainmenu-style1">
                <nav>
                    <ul>
                        <li><a href="{{ route('pages.landing') }}">Главная</a></li>
                        <li class="has-sub-menu"><a href="{{ route('shop.index') }}?perPage=8">Магазин</a>
                            <ul class="sub-menu-2">
                                @foreach($sections as $section)
                                <li class="has-sub-menu"><a href="{{ route('shop.section', ['shop_section' => $section->slug]) }}">{{ $section->title }}</a>
                                    <ul class="sub-menu-2">
                                        @foreach($categories as $category)
                                            @if($category->section_id == $section->id)
                                                <li><a href="{{ route('shop.category', ['shop_section' => $section->slug, 'shop_category' => $category->slug]) }}">{{ $category->title }}</a></li>
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
            <div class="mobile-curr-lang-wrap">
                <div class="single-mobile-curr-lang">
                    <a class="mobile-language-active" href="login-register.html#">Language <i class="icofont-simple-down"></i></a>
                    <div class="lang-curr-dropdown lang-dropdown-active">
                        <ul>
                            <li><a href="login-register.html#">English</a></li>
                            <li><a href="login-register.html#">Spanish</a></li>
                            <li><a href="login-register.html#">Hindi </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="aside-contact-info">
                <ul>
                    <li><i class="icofont-clock-time"></i>Monday - Friday: 9:00 - 19:00</li>
                    <li><i class="icofont-envelope"></i>Info@example.com</li>
                    <li><i class="icofont-stock-mobile"></i>(+55) 254. 254. 254</li>
                    <li><i class="icofont-home"></i>Helios Tower 75 Tam Trinh Hoang - Ha Noi - Viet Nam</li>
                </ul>
            </div>
        </div>
    </div>
</div>
