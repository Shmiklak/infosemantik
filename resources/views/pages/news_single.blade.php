@extends('layouts.app')
@section('content')
    <div class="site__body">
        <div class="page-header">
            <div class="page-header__container container">
                <div class="page-header__breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item"><a href="#">Breadcrumb</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Post</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-9 col-xl-8">
                    <div class="block post post--layout--full">
                        <div class="post__header post-header post-header--layout--full">
                            <h1 class="post-header__title">{{ $single_news->title }}</h1>
                            <div class="post-header__meta">
                                <div class="post-header__meta-item">{{ strftime(strftime("%e.%m.%Y", strtotime($single_news->created_at))) }}</div>
                            </div>
                        </div>
                        <div class="post__featured"><a href="#"><img src="/{{ $single_news->image }}" alt=""></a>
                        </div>
                        <div class="post__content typography typography--expanded">
                            {!! $single_news->content !!}
                        </div>
                        <section class="post__section"><h4 class="post__section-title">Другие новости</h4>
                            <div class="related-posts">
                                <div class="related-posts__list">
                                    @foreach($news as $item)
                                    <div class="related-posts__item post-card post-card--layout--related">
                                        <div class="post-card__image">
                                            <a href="{{route('news-page', $item->slug)}}">
                                                <img src="/{{ $item->image }}" alt="">
                                            </a>
                                        </div>
                                        <div class="post-card__info">
                                            <div class="post-card__name">
                                                <a href="{{route('news-page', $item->slug)}}">
                                                    {{ $item->title }}
                                                </a>
                                            </div>
                                            <div class="post-card__date">{{ strftime(strftime("%e.%m.%Y", strtotime($item->created_at))) }}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- site__body / end -->
@endsection
