@extends('layouts.app')
@section('content')
    <div class="site__body">
        <div class="block">
            <div class="container">
                <div class="not-found">
                    <div class="not-found__404">Упс! Ошибка 404</div>
                    <div class="not-found__content"><h1 class="not-found__title">Страница не найдена</h1>
                        <p class="not-found__text">К сожалению мы не смогли найти страницу, на которую вы пытались зайти.<br>Попробуйте использовать поиск.</p>
                        <form class="not-found__search"><input type="text" class="not-found__search-input form-control"
                                                               placeholder="Поиск...">
                            <button type="submit" class="not-found__search-button btn btn-primary">Найти</button>
                        </form>
                        <p class="not-found__text">Или вернитесь на главную страницу.</p><a
                            class="btn btn-secondary btn-sm" href="{{ route('home') }}">На главную</a></div>
                </div>
            </div>
        </div>
    </div><!-- site__body / end --><!-- site__footer -->
@endsection
