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
                            <li class="breadcrumb-item active" aria-current="page">Новости</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title"><h1>Новости</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <div class="block">
                        <div class="posts-view">
                            <div class="posts-view__list posts-list posts-list--layout--list">
                                <div class="posts-list__body">
                                    @foreach($all_news as $item)
                                        <div class="posts-list__item">
                                            <div class="post-card post-card--layout--list post-card--size--nl">
                                                <div class="post-card__image"><a href="{{ route('news-page', $item->slug) }}"><img src="/{{ $item->image }}"
                                                                                               alt="{{ $item->title }}"></a></div>
                                                <div class="post-card__info">
                                                    <div class="post-card__name">
                                                        <a href="{{ route('news-page', $item->slug) }}">{{ $item->title }}</a>
                                                    </div>
                                                    <div class="post-card__date">{{ strftime(strftime("%e.%m.%Y", strtotime($item->created_at))) }}</div>
                                                    <div class="post-card__content">
                                                        {!! $item->shortDescription() !!}
                                                    </div>
                                                    <div class="post-card__read-more"><a href="{{ route('news-page', $item->slug) }}"
                                                                                         class="btn btn-secondary btn-sm">Подробнее</a></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="posts-view__pagination">
                                {{ $all_news->links('pagination.default') }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="block block-sidebar block-sidebar--position--end">
                        <div class="block-sidebar__item">
                            <div class="widget-posts widget"><h4 class="widget__title">Последние новости</h4>
                                <div class="widget-posts__list">
                                    @foreach($news as $item)
                                        <div class="widget-posts__item">
                                            <div class="widget-posts__image"><a href="{{ route('news-page', $item->slug) }}"><img
                                                        src="/{{ $item->image }}" alt="{{ $item->title }}"></a></div>
                                            <div class="widget-posts__info">
                                                <div class="widget-posts__name"><a href="{{ route('news-page', $item->slug) }}">{{ $item->title }}</a></div>
                                                <div class="widget-posts__date">{{ strftime(strftime("%e.%m.%Y", strtotime($item->created_at))) }}</div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- site__body / end --><!-- site__footer -->
@endsection
