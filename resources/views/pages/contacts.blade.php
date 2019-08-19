@extends('layouts.app')
@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Главная</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Контакты</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title"><h1>Свяжитесь с нами</h1></div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="card mb-0 contact-us">
                    <div class="contact-us__map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1058.9507534234451!2d69.2859367021294!3d41.3487664555668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38ae8d513af4cb55%3A0xb05c75c8711a68f9!2sOOO+%22INFO+SEMANTIK%22!5e0!3m2!1sru!2s!4v1564823400434!5m2!1sru!2s"
                            frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                    <div class="card-body">
                        <div class="contact-us__container">
                            <div class="row">
                                <div class="col-12 col-lg-6 pb-4 pb-lg-0">
                                    <h4 class="contact-us__header card-title">
                                        Наш адрес
                                    </h4>
                                    <div class="contact-us__address">
                                        <p>
                                            {{ $settings->address }}
                                        </p>
                                        <p>
                                            <strong>Email</strong><br>
                                            <a
                                                href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                                        </p>
                                        <p class="phone">
                                            <strong>Телефон</strong><br>
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
                                        <p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-6">
                                    <h4 class="contact-us__header card-title">
                                        Отправьте нам сообщение
                                    </h4>
                                    <form class="feedback-form">
                                        <div class="form-row">
                                            <div class="form-group col-md-6"><label for="form-name">Ваше имя</label>
                                                <input type="text" id="form-name" class="form-control"
                                                       placeholder="Ваше имя" required></div>
                                            <div class="form-group col-md-6"><label for="form-email">Email</label>
                                                <input type="email" id="form-email" class="form-control"
                                                       placeholder="Email адрес" required></div>
                                        </div>
                                        <div class="form-group"><label for="form-subject">Тема</label> <input
                                                type="text" id="form-subject" class="form-control"
                                                placeholder="Тема" required></div>
                                        <div class="form-group"><label for="form-message">Сообщение</label> <textarea
                                                id="form-message" class="form-control" rows="4" required></textarea></div>
                                        @php
                                            $a = rand(1, 10);
                                            $b = rand(1, 10);

                                            $answer = base64_encode($a + $b);
                                        @endphp
                                        <div class="form-group"><label for="form-captcha">Введите ответ на этот пример {{ $a.' + '.$b.' = ' }}</label>
                                            <input type="number"  class="form-control" id="form-captcha" name="captcha" placeholder="Ответ" required>

                                        </div>
                                        <input type="hidden" value="{{ $answer }}" name="captcha_key" id="form-captcha-key">

                                        <button type="button" class="btn btn-primary send-feedback">Отправить</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
