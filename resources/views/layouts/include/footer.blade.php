<footer class="footer-area pt-160">
    <div class="footer-top pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-title">Разделы</h3>
                        <div class="footer-info-list">
                            <ul>
                                @foreach($sections as $section)
                                    <li><a href="{{ route('shop.section', ['shop_section' => $section->slug]) }}">{{ $section->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-title">Информация</h3>
                        <div class="footer-info-list">
                            <ul>
                                <li><a href="login-register.html#">Обратная связь</a></li>
                                <li><a href="login-register.html#">FAQ</a></li>
                                <li><a href="login-register.html#">Помощь</a></li>
                                <li><a href="login-register.html#">Доставка & Возврат</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-title">Социальные сети</h3>
                        <div class="footer-info-list">
                            <ul>
                                <li><a href="login-register.html#">Instagram</a></li>
                                <li><a href="login-register.html#">Twitter</a></li>
                                <li><a href="login-register.html#">Facebook</a></li>
                                <li><a href="login-register.html#">Pinterest</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="footer-widget mb-40">
                        <h3 class="footer-title">Subscribe to get offer!</h3>
                        <div class="subscribe-wrap">
                            <div id="mc_embed_signup" class="subscribe-form">
                                <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" novalidate="" target="_blank" name="mc-embedded-subscribe-form" method="post" action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef">
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input class="email" type="email" required="" placeholder="Your email" name="EMAIL" value="">
                                        <div class="mc-news" aria-hidden="true">
                                            <input type="text" value="" tabindex="-1" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef">
                                        </div>
                                        <div class="clear">
                                            <input id="mc-embedded-subscribe" class="button" type="submit" name="subscribe" value="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <p>We’ll never share your email address with a third-party.</p>
                        </div>
                        <div class="app-google-store">
                            <a href="login-register.html#"><img src="{{ asset('assets/front/img/icon-img/app-store.png') }}" alt=""></a>
                            <a href="login-register.html#"><img src="{{ asset('assets/front/img/icon-img/google-play.png') }}" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom border-top-1">
        <div class="container">
            <div class="copyright copyright-ptb text-center">
                <p>Copyright © 2020 Dking - <a target="_blank" href="https://hasthemes.com/"> All Right Reserved</a></p>
            </div>
        </div>
    </div>
</footer>
