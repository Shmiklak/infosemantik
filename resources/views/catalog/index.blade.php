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
                            @if(isset($category->parent_id))
                                <li class="breadcrumb-item"><a
                                        href="{{ route('category', $category->getParent->slug) }}">{{ $category->getParent->title }}</a>
                                    <svg class="breadcrumb-arrow" width="6px" height="9px">
                                        <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                                    </svg>
                                </li>
                            @endif
                            <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
                        </ol>
                    </nav>
                </div>
                <div class="page-header__title"><h1>{{ $category->title }}</h1></div>
            </div>
        </div>
        <div class="container">
            <div class="shop-layout shop-layout--sidebar--start">
                <div class="shop-layout__sidebar">
                    <div class="block block-sidebar block-sidebar--offcanvas--mobile">
                        <div class="block-sidebar__backdrop"></div>
                        <div class="block-sidebar__body">
                            <div class="block-sidebar__header">
                                <div class="block-sidebar__title">Фильтрация</div>
                                <button class="block-sidebar__close" type="button">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="/images/sprite.svg#cross-20"></use>
                                    </svg>
                                </button>
                            </div>
                            <form method="GET" action="{{ route('catalog.filter', $category->slug) }}">
                                <div class="block-sidebar__item">
                                <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse
                                     data-collapse-opened-class="filter--opened"><h4
                                        class="widget-filters__title widget__title">Фильтрация</h4>
                                    <div class="widget-filters__list">
                                        @foreach($attributes as $attr)
                                            @if($attr->characteristics()->get()->count() > 0)
                                                <div class="widget-filters__item">
                                                    <div class="filter filter--opened" data-collapse-item>
                                                        <button type="button" class="filter__title" data-collapse-trigger>
                                                            {{ $attr->title }}
                                                            <svg class="filter__arrow" width="12px" height="7px">
                                                                <use xlink:href="/images/sprite.svg#arrow-rounded-down-12x7"></use>
                                                            </svg>
                                                        </button>
                                                        <div class="filter__body" data-collapse-content>
                                                            <div class="filter__container">
                                                                <div class="filter-list">
                                                                    <div class="filter-list__list">
                                                                        @foreach($attr->characteristics()->get() as $item)
                                                                        <label class="filter-list__item">
                                                                            <span class="filter-list__input input-check">
                                                                                <span class="input-check__body">
                                                                                     <input class="input-check__input" name="filter[{{ $attr->id }}]"
                                                                                            value="{{ $item->value }}" type="checkbox"
                                                                                            @if(request()->get('filter') != null)
                                                                                            @if(in_array($item->value, request()->get('filter'))) checked @endif @endif>
                                                                                    <span class="input-check__box"></span>
                                                                                    <svg class="input-check__icon" width="9px" height="7px"><use xlink:href="/images/sprite.svg#check-9x7"></use></svg>
                                                                                </span>
                                                                            </span>
                                                                            <span class="filter-list__title">{{ $item->value }}</span>
                                                                        </label>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="widget-filters__actions d-flex">
                                        <button class="btn btn-primary btn-sm">Поиск</button>
                                        <a class="btn btn-secondary btn-sm" href="{{ route('category', $category->slug) }}">Сбросить</a>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="shop-layout__content">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__options">
                                <div class="view-options">
                                    <div class="view-options__control"><label for="">Сортировка</label>
                                        <div>
                                            <form method="POST" action="{{ route('catalog.sort') }}" id="sort-form">
                                                @csrf
                                                <select class="form-control form-control-sm" name="sort" id="sort-select">
                                                    <option value="1" @if($sort == 1) selected @endif>Сначала новые</option>
                                                    <option value="2" @if($sort == 2) selected @endif>Сначала старые</option>
                                                    <option value="3" @if($sort == 3) selected @endif>По имени (A-Z)</option>
                                                    <option value="4" @if($sort == 4) selected @endif>По имени (Z-A)</option>
                                                </select>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="products-view__list products-list" data-layout="grid-3-sidebar"
                                 data-with-features="false">
                                <div class="products-list__body">
                                    @if(count($products) == 0)
                                        <div class="no-products">
                                        Нет продуктов в этой категории
                                        </div>
                                    @else
                                        @foreach($products as $product)
                                            <div class="products-list__item">
                                                <div class="product-card">
                                                    <div class="product-card__badges-list">
                                                        @if(strtotime($product->created_at) > strtotime('1 week ago'))
                                                            <div class="product-card__badge product-card__badge--new">
                                                                Новинка
                                                            </div>
                                                        @endif
                                                            @if($product->is_bestseller == 1)
                                                                <div class="product-card__badge product-card__badge--new">
                                                                    Бестселлер
                                                                </div>
                                                            @endif
                                                    </div>
                                                    <div class="product-card__image"><a
                                                            href="{{ route('product', $product->slug) }}"><img
                                                                src="/{{ $product->main_image }}" alt=""></a>
                                                    </div>
                                                    <div class="product-card__info">
                                                        <div class="product-card__name">
                                                            <a href="{{ route('product', $product->slug) }}">
                                                                {{ $product->title }}
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="product-card__description">
                                                        {!! $product->catalog_description !!}
                                                    </div>
                                                    <div class="product-card__actions">
                                                        <div class="product-card__availability">Наличие:
                                                            @if($product->is_available == 1)
                                                                <span class="text-success">В наличии</span>
                                                            @endif
                                                            @if($product->is_available == 0)
                                                                <span class="text-danger">Нет в наличии</span>
                                                            @endif
                                                        </div>
                                                        <div class="product-card__buttons">
                                                            <button
                                                                class="btn btn-light btn-svg-icon btn-svg-icon--fake-svg product-card__compare"
                                                                type="button" data-id="{{ $product->id }}">
                                                                <svg width="16px" height="16px">
                                                                    <use
                                                                        xlink:href="/images/sprite.svg#compare-16"></use>
                                                                </svg>
                                                                <span
                                                                    class="fake-svg-icon fake-svg-icon--compare-16"></span>
                                                                Сравнить
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <div class="products-view__pagination">
                                {{ $products->links('pagination.default') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
    $('#sort-select').change(function() {
        $('#sort-form').submit();
    });
</script>
@endpush
