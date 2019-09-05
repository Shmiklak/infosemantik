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
{{--                                                                            @dd(request()->get('filter'))--}}
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
                            Нет продуктов по вашему запросу
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
