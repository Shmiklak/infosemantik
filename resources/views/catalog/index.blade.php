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
                        <div class="block-sidebar__body">
                            <div class="block-sidebar__header">
                                <div class="block-sidebar__title">Категории</div>
                                <button class="block-sidebar__close" type="button">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="images/sprite.svg#cross-20"></use>
                                    </svg>
                                </button>
                            </div>
                            <div class="block-sidebar__item">
                                <div class="widget-filters widget widget-filters--offcanvas--mobile" data-collapse
                                     data-collapse-opened-class="filter--opened"><h4
                                        class="widget-filters__title widget__title">Категории</h4>
                                    <div class="widget-filters__list">
                                        <div class="widget-filters__item">
                                            <div class="filter filter--opened">
                                                <div class="filter__body">
                                                    <div class="filter__container">
                                                        <div class="filter-categories">
                                                            <ul class="filter-categories__list">
                                                                @foreach($categories as $item)
                                                                    <li class="filter-categories__item
                                                                        {{ request()->is('categories/'.$item->slug) ? 'filter-categories__item--current' : 'filter-categories__item--parent' }}">
                                                                        <a href="{{ route('category', $item->slug) }}">{{ $item->title }}</a>
                                                                    </li>
                                                                    @if($item->children->count() > 0)
                                                                        @foreach($item->children as $child)
                                                                            <li class="filter-categories__item {{ request()->is('categories/'.$child->slug) ? 'filter-categories__item--current' : '' }} filter-categories__item--child">
                                                                                <a href="{{ route('category', $child->slug) }}">{{ $child->title }}</a>
                                                                            </li>
                                                                        @endforeach
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shop-layout__content">
                    <div class="block">
                        <div class="products-view">
                            <div class="products-view__options">
                                <div class="view-options view-options--offcanvas--mobile">
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
                                        Нет продуктов в этой категории
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
