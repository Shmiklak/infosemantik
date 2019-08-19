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
                            @if(isset($product->category->parent_id))
                                <li class="breadcrumb-item"><a
                                        href="{{ route('category', $product->category->getParent->slug) }}">{{ $product->category->getParent->title }}</a>
                                    <svg class="breadcrumb-arrow" width="6px" height="9px">
                                        <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg>
                                </li>
                            @endif
                            <li class="breadcrumb-item"><a href="#">{{ $product->category->title }}</a>
                                <svg class="breadcrumb-arrow" width="6px" height="9px">
                                    <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                </svg>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $product->title }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="block">
            <div class="container">
                <div class="product product--layout--standard" data-layout="standard">
                    <div class="product__content"><!-- .product__gallery -->
                        <div class="product__gallery">
                            <div class="product-gallery">
                                <div class="product-gallery__featured">
                                    <div class="owl-carousel" id="product-image">
                                        <a>
                                            <img src="/{{ $product->main_image }}" alt="{{ $product->title }}">
                                        </a>
                                        @if(isset($product->image_1))
                                            <a>
                                                <img src="/{{ $product->image_1 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_2))
                                            <a>
                                                <img src="/{{ $product->image_2 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_3))
                                            <a>
                                                <img src="/{{ $product->image_3 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_4))
                                            <a>
                                                <img src="/{{ $product->image_4 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_5))
                                            <a>
                                                <img src="/{{ $product->image_5 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_6))
                                            <a>
                                                <img src="/{{ $product->image_6 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="product-gallery__carousel">
                                    <div class="owl-carousel" id="product-carousel">
                                        <a href="#" class="product-gallery__carousel-item">
                                            <img class="product-gallery__carousel-image"
                                                 src="/{{ $product->main_image }}" alt="{{ $product->title }}">
                                        </a>
                                        @if(isset($product->image_1))
                                            <a href="#" class="product-gallery__carousel-item">
                                                <img class="product-gallery__carousel-image"
                                                     src="/{{ $product->image_1 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_2))
                                            <a href="#" class="product-gallery__carousel-item">
                                                <img class="product-gallery__carousel-image"
                                                     src="/{{ $product->image_2 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_3))
                                            <a href="#" class="product-gallery__carousel-item">
                                                <img class="product-gallery__carousel-image"
                                                     src="/{{ $product->image_3 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_4))
                                            <a href="#" class="product-gallery__carousel-item">
                                                <img class="product-gallery__carousel-image"
                                                     src="/{{ $product->image_4 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_5))
                                            <a href="#" class="product-gallery__carousel-item">
                                                <img class="product-gallery__carousel-image"
                                                     src="/{{ $product->image_5 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                        @if(isset($product->image_6))
                                            <a href="#" class="product-gallery__carousel-item">
                                                <img class="product-gallery__carousel-image"
                                                     src="/{{ $product->image_6 }}" alt="{{ $product->title }}">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div><!-- .product__gallery / end --><!-- .product__info -->
                        <div class="product__info">
                            <h1 class="product__name">{{ $product->title }}</h1>
                            <div class="product__description">
                                {!! $product->short_description !!}
                            </div>
                            <ul class="product__meta">
                                <li class="product__meta-availability">Наличие:
                                    @if($product->is_available == 1)
                                        <span class="text-success">В наличии</span>
                                    @endif
                                    @if($product->is_available == 0)
                                        <span class="text-danger">Нет в наличии</span>
                                    @endif
                                </li>
                            </ul>
                        </div><!-- .product__info / end --><!-- .product__sidebar -->
                        <div class="product__sidebar">
                            <div class="product__availability">Наличие:
                                @if($product->is_available == 1)
                                    <span class="text-success">В наличии</span>
                                @endif
                                @if($product->is_available == 0)
                                    <span class="text-danger">Нет в наличии</span>
                                @endif
                            </div>
                            <form class="product__options">
                                <div class="form-group product__option">
                                    <div class="product__actions-item product__actions-item--compare">
                                        <button type="button" class="btn btn-secondary btn-svg-icon btn-lg product-card__compare"
                                                data-toggle="tooltip" title="Сравнить" data-id="{{ $product->id }}">
                                            <svg width="16px" height="16px">
                                                <use xlink:href="/images/sprite.svg#compare-16"></use>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="product-tabs">
                    <div class="product-tabs__list">
                        <a href="#tab-description"
                           class="product-tabs__item product-tabs__item--active">Описание</a>
                        <a href="#tab-specification" class="product-tabs__item">Характеристики</a>
                    </div>
                    <div class="product-tabs__content">
                        <div class="product-tabs__pane product-tabs__pane--active" id="tab-description">
                            <div class="typography">
                                {!! $product->description !!}
                            </div>
                        </div>
                        <div class="product-tabs__pane" id="tab-specification">
                            <div class="spec">
                                <div class="spec__section">
                                    @foreach($attributes as $attribute)
                                        <div class="spec__row">
                                            <div
                                                class="spec__name">{{ $product->getAttributeName($attribute->attribute_id) }}</div>
                                            <div class="spec__value">{!! $attribute->value !!}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .block-products-carousel -->
        <div class="block block-products-carousel" data-layout="grid-5">
            <div class="container">
                <div class="block-header"><h3 class="block-header__title">Другие продукты</h3>
                    <div class="block-header__divider"></div>
                    <div class="block-header__arrows-list">
                        <button class="block-header__arrow block-header__arrow--left" type="button">
                            <svg width="7px" height="11px">
                                <use xlink:href="/images/sprite.svg#arrow-rounded-left-7x11"></use>
                            </svg>
                        </button>
                        <button class="block-header__arrow block-header__arrow--right" type="button">
                            <svg width="7px" height="11px">
                                <use xlink:href="/images/sprite.svg#arrow-rounded-right-7x11"></use>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="block-products-carousel__slider">
                    <div class="block-products-carousel__preloader"></div>
                    <div class="owl-carousel">
                        @foreach ($product->category->products as $item)
                            @if ($item->id != $product->id)
                                <div class="block-products-carousel__column">
                                    <div class="block-products-carousel__cell">
                                        <div class="product-card">
                                            <div class="product-card__badges-list">
                                                @if(strtotime($item->created_at) > strtotime('1 week ago'))
                                                    <div class="product-card__badge product-card__badge--new">Новинка
                                                    </div>
                                                @endif
                                                @if($item->is_bestseller == 1)
                                                    <div class="product-card__badge product-card__badge--new">
                                                        Бестселлер
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="product-card__image"><a
                                                    href="{{ route('product', $item->slug) }}"><img
                                                        src="/{{ $item->main_image }}" alt=""></a>
                                            </div>
                                            <div class="product-card__info">
                                                <div class="product-card__name">
                                                    <a href="{{ route('product', $item->slug) }}">
                                                        {{ $item->title }}
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="product-card__actions">
                                                <div class="product-card__availability">Наличие:
                                                    @if($item->is_available == 1)
                                                        <span class="text-success">В наличии</span>
                                                    @endif
                                                    @if($item->is_available == 0)
                                                        <span class="text-danger">Нет в наличии</span>
                                                    @endif
                                                </div>
                                                <div class="product-card__buttons">
                                                    <button
                                                        class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                        type="button" data-id="{{ $item->id }}">
                                                        <svg width="16px" height="16px">
                                                            <use xlink:href="/images/sprite.svg#compare-16"></use>
                                                        </svg>
                                                        <span
                                                            class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                        Сравнить
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div><!-- .block-products-carousel / end --></div>
@endsection
