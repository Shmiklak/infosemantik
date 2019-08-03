<footer class="site__footer">
    <div class="site-footer">
        <div class="container">
            <div class="site-footer__widgets">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-5">
                        <div class="site-footer__widget footer-contacts"><h5 class="footer-contacts__title">Свяжитесь с нами</h5>
                            <ul class="footer-contacts__contacts">
                                <li><i class="footer-contacts__icon fas fa-globe-americas"></i>
                                    {{ $settings->address }}
                                </li>
                                <li><i class="footer-contacts__icon far fa-envelope"></i>
                                    <a href="mailto:{{ $settings->email }}">
                                        {{ $settings->email }}
                                    </a>
                                </li>
                                <li class="footer-phones"><i class="footer-contacts__icon fas fa-mobile-alt"></i>
                                    <a
                                        href="tel:+99871 {{ $settings->phone_1 }}">+(99871) {{ $settings->phone_1 }}</a>
                                    @if(isset($settings->phone_2))
                                        <br><a
                                            href="tel:+99871{{ $settings->phone_2 }}">+(99871) {{ $settings->phone_2 }}</a>
                                    @endif
                                    @if(isset($settings->phone_3))
                                        <br><a
                                            href="tel:+99871{{ $settings->phone_3 }}">+(99871) {{ $settings->phone_3 }}</a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="site-footer__widget footer-links"><h5 class="footer-links__title">
                                Меню</h5>
                            <ul class="footer-links__list">
                                @foreach($menu as $item)
                                    <li class="footer-links__item"><a
                                            @if($item->is_pricelist == 1) href="/{{ $settings->price_list }}"
                                            download @else href="/{{$item->link }} @endif" class="footer-links__link">{{ $item->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="site-footer__widget footer-newsletter"><h5 class="footer-newsletter__title">
                                Подписка на новости</h5>
                            <form action="#" class="footer-newsletter__form">
                                <label class="sr-only"
                                       for="footer-newsletter-address">Email
                                    Address</label>
                                <input type="text"
                                       class="footer-newsletter__form-input form-control"
                                       id="footer-newsletter-address"
                                       placeholder="Email">
                                <button class="footer-newsletter__form-button btn btn-primary">Подписаться</button>
                            </form>
                            <div class="footer-newsletter__text footer-newsletter__text--social">Подпишитесь на наш телеграм бот, чтобы получать актуальный прайс лист
                                <a href="https://t.me/{{ $settings->bot }}" target="_blank" class="telegram-bot-link">{{ '@'.$settings->bot }}</a>
                            </div>
                            <div class="footer-newsletter__text footer-newsletter__text--social">Следите за нами в социальных сетях
                            </div>
                            <ul class="footer-newsletter__social-links">
                                <li class="footer-newsletter__social-link footer-newsletter__social-link--facebook">
                                    <a href="{{ $settings->facebook }}" target="_blank"><i
                                            class="fab fa-facebook-f"></i></a></li>
                                <li class="footer-newsletter__social-link footer-newsletter__social-link--instagram">
                                    <a href="{{ $settings->instagram }}" target="_blank"><i
                                            class="fab fa-instagram"></i></a></li>
                                <li class="footer-newsletter__social-link footer-newsletter__social-link--telegram">
                                    <a href="{{ $settings->telegram }}" target="_blank"><i
                                            class="fab fa-telegram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="site-footer__copyright">Сайт разработан в дизайн студии <a
                        href="https://datasite.uz" target="_blank">DataSite Technology</a></div>
            </div>
        </div>
    </div>
</footer><!-- site__footer / end --></div>
