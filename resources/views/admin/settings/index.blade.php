@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Настройки
            <small>Здесь вы можете изменить настройки вашего сайта</small>
        </h1>
    </section>

    <section class="content container-fluid">
        <div class="col-lg-6">
            <div class="box box-primary">
                <form role="form" method="POST" action="{{ route('admin.settings_update') }}"
                      enctype="multipart/form-data">
                    <div class="box-header with-border">
                        <h3 class="box-title">Настройки</h3>
                    </div>
                    <div class="box-body">
                        @csrf
                        <div class="form-group">
                            <label for="price_list">Прайс лист</label>
                            <input type="file" id="price_list" name="price_list">
                            <input type="hidden" name="old_price_list" value="{{ $settings->price_list }}">

                            <p class="help-block">Сейчас выбран прайс лист {{ $settings->price_list }}</p>
                        </div>
                        <div class="form-group">
                            <label for="facebook">Страница на Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook"
                                   value="{{ $settings->facebook }}" required>
                        </div>
                        <div class="form-group">
                            <label for="instagram">Страница на Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                   value="{{ $settings->instagram }}" required>
                        </div>
                        <div class="form-group">
                            <label for="telegram">Ссылка на Telegram канал</label>
                            <input type="text" class="form-control" id="telegram" name="telegram"
                                   value="{{ $settings->telegram }}" required>
                            <p class="help-block">Пример ссылки https://t.me/infosemantik</p>
                        </div>
                        <div class="form-group">
                            <label for="bot">Username Telegram бота</label>
                            <input type="text" class="form-control" id="bot" name="bot"
                                   value="{{ $settings->bot }}" required>
                            <p class="help-block">Указывайте его без знака @</p>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ $settings->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес компании</label>
                            <input type="text" class="form-control" id="address" name="address"
                                   value="{{ $settings->address }}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_1">Номера телефона</label>
                            <input type="text" class="form-control" id="phone_1" name="phone_1"
                                   value="{{ $settings->phone_1 }}"><br/>
                            <input type="text" class="form-control" id="phone_2" name="phone_2"
                                   value="{{ $settings->phone_2 }}"><br/>
                            <input type="text" class="form-control" id="phone_3" name="phone_3"
                                   value="{{ $settings->phone_3 }}">
                            <p class="help-block">Указывайте номера без кода страны и оператора. Если один из номеров не
                                требуется, оставьте поле пустым.</p>
                        </div>
                        <div class="form-group">
                            <label for="logo">Логотип компании</label>
                            <input type="file" id="logo" name="logo" class="has-preview" data-preview="#image-preview"
                                   accept="image/*">
                            <input type="hidden" id="old_logo" name="old_logo" value="{{ $settings->logo }}">
                        </div>
                        <div class="upload-preview">
                            <img id="image-preview" style="display:inline-block" src="/{{ $settings->logo }}"/>
                        </div>
                        <div class="form-group">
                            <p class="help-block">Мета настройки сайта</p>
                            <label for="site_name">Заголовок сайта</label>
                            <input type="text" class="form-control" id="site_name" name="site_name"
                                   value="{{ $settings->site_name }}">
                            <label for="description">Описание сайта</label>
                            <input type="text" class="form-control" id="description" name="description"
                                   value="{{ $settings->description }}">
                            <label for="keywords">Ключевые слова</label>
                            <input type="text" class="form-control" id="keywords" name="keywords"
                                   value="{{ $settings->keywords }}">
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    @if(session()->has('message'))
        <script>
            swal('{{ session()->get('message') }}', '', "success");
        </script>
    @endif
@endpush
