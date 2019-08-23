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
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('useful') }}">Полезное</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
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
                            <h1 class="post-header__title">{{ $post->title }}</h1>
                        </div>
                        <div class="post__featured"><a href=""><img src="/{{ $post->image }}" alt="{{ $post->title }}"></a>
                        </div>
                        <div class="post__content typography typography--expanded">
                            {!! $post->content !!}
                        </div>
                        <section class="post__section"><h4 class="post__section-title">Последние статьи</h4>
                            <div class="related-posts">
                                <div class="related-posts__list">
                                    @foreach($useful as $item)
                                        <div class="related-posts__item post-card post-card--layout--related">
                                            <div class="post-card__image">
                                                <a href="{{route('useful-page', $item->slug)}}">
                                                    <img src="/{{ $item->image }}" alt="">
                                                </a>
                                            </div>
                                            <div class="post-card__info">
                                                <div class="post-card__name">
                                                    <a href="{{route('useful-page', $item->slug)}}">
                                                        {{ $item->title }}
                                                    </a>
                                                </div>
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
