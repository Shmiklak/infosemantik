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
                            <li class="breadcrumb-item active" aria-current="page">Поиск</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title"><h1>Результаты поиска</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-12">
                    <div class="block">
                        <div class="posts-view">
                            <div class="posts-view__list posts-list posts-list--layout--list">
                                <div class="posts-list__body">
                                    @foreach($results as $item)
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image">
                                                    <a href="{{ $item['type']=='news' ? route('news-page', $item['slug']) : route('product', $item['slug']) }}">
                                                        <img src="/{{ $item['image'] }}" alt="{{ $item['title'] }}"></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__name">
                                                        <a href="{{ $item['type']=='news' ? route('news-page', $item['slug']) : route('product', $item['slug']) }}">
                                                            {{ $item['title'] }}
                                                        </a>
                                                    </div>
                                                    <div class="post-card__content">
                                                        {!! strip_tags($item['description']) !!}
                                                    </div>
                                                    <div class="post-card__read-more">
                                                        <a href="{{ $item['type']=='news' ? route('news-page', $item['slug']) : route('product', $item['slug']) }}"
                                                                                         class="btn btn-secondary btn-sm">Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="posts-view__pagination">
                                {{ $results->appends(request()->query())->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- site__body / end --><!-- site__footer -->
@endsection
