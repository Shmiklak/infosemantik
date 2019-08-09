<!-- mobilemenu -->
<div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
        <div class="mobilemenu__header">
            <div class="mobilemenu__title">Меню</div>
            <button type="button" class="mobilemenu__close">
                <svg width="20px" height="20px">
                    <use xlink:href="/images/sprite.svg#cross-20"></use>
                </svg>
            </button>
        </div>
        <div class="mobilemenu__content">
            <ul class="mobile-links mobile-links--level--0" data-collapse
                data-collapse-opened-class="mobile-links__item--open">
                @foreach($menu as $item)
                    <li class="mobile-links__item">
                        <div class="mobile-links__item-title">
                        <a @if($item->is_pricelist == 1) href="/{{ $settings->price_list }}"
                           download @else href="/{{$item->link }} @endif" class="mobile-links__item-link">
                            {{ $item->title }}
                        </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div><!-- mobilemenu / end --><!-- site -->
<div class="site"><!-- mobile site__header -->
    <header class="site__header d-lg-none">
        <div class="mobile-header mobile-header--sticky mobile-header--stuck">
            <div class="mobile-header__panel">
                <div class="container">
                    <div class="mobile-header__body">
                        <button class="mobile-header__menu-button">
                            <svg width="18px" height="14px">
                                <use xlink:href="/images/sprite.svg#menu-18x14"></use>
                            </svg>
                        </button>
                        <a class="mobile-header__logo" href="{{ route('home') }}">
                            <img src="/{{ $settings->logo }}">
                        </a>
                        <div class="mobile-header__search">
                            <form class="mobile-header__search-form" action="{{ route('search') }}" method="GET"><input
                                    class="mobile-header__search-input" name="search"
                                    placeholder="Поиск по сайту" aria-label="Site search" type="text"
                                    autocomplete="off" @if(isset($serchQuery)) value="{{ $searchQuery }}" @endif>
                                @csrf
                                <button class="mobile-header__search-button mobile-header__search-button--submit"
                                        type="submit">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="/images/sprite.svg#search-20"></use>
                                    </svg>
                                </button>
                                <button class="mobile-header__search-button mobile-header__search-button--close"
                                        type="button">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="/images/sprite.svg#cross-20"></use>
                                    </svg>
                                </button>
                                <div class="mobile-header__search-body"></div>
                            </form>
                        </div>
                        <div class="mobile-header__indicators">
                            <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                                <button class="indicator__button"><span class="indicator__area"><svg width="20px"
                                                                                                     height="20px"><use
                                                xlink:href="/images/sprite.svg#search-20"></use></svg></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- mobile site__header / end --><!-- desktop site__header -->
    <header class="site__header d-lg-block d-none">
        <div class="site-header"><!-- .topbar -->
            <div class="site-header__middle container">
                <div class="site-header__logo"><a href="{{route('home')}}">
                        <img src="/{{ $settings->logo }}">
                    </a></div>
                <div class="site-header__search">
                    <div class="search">
                        <form class="search__form" action="{{ route('search') }}" method="GET"><input class="search__input" name="search"
                                                                     placeholder="Поиск по сайту"
                                                                     aria-label="Site search" type="text"
                                                                     autocomplete="off" @if(isset($serchQuery)) value="{{ $searchQuery }}" @endif>
                            @csrf
                            <button class="search__button" type="submit">
                                <svg width="20px" height="20px">
                                    <use xlink:href="/images/sprite.svg#search-20"></use>
                                </svg>
                            </button>
                            <div class="search__border"></div>
                        </form>
                    </div>
                </div>
                <div class="site-header__phone">
                    <div class="site-header__phone-title">Позвоните нам</div>
                    <div class="site-header__phone-number"><a
                            href="tel:+99871 {{ $settings->phone_1 }}">+(99871) {{ $settings->phone_1 }}</a></div>
                    @if(isset($settings->phone_2))
                        <div class="site-header__phone-number"><a
                                href="tel:+99871{{ $settings->phone_2 }}">{{ $settings->phone_2 }}</a></div>
                    @endif
                    @if(isset($settings->phone_3))
                        <div class="site-header__phone-number"><a
                                href="tel:+99871{{ $settings->phone_3 }}">{{ $settings->phone_3 }}</a></div>
                    @endif
                </div>
            </div>
            <div class="site-header__nav-panel nav-panel--sticky">
                <div class="nav-panel">
                    <div class="nav-panel__container container">
                        <div class="nav-panel__row">
                            <div class="nav-panel__departments"><!-- .departments -->
                                <div
                                    class="departments @if(request()->is("/")) departments--opened departments--fixed @endif"
                                    data-departments-fixed-by=".block-slideshow">
                                    @include('layouts.categories')
                                </div><!-- .departments / end --></div><!-- .nav-links -->
                            <div class="nav-panel__nav-links nav-links">
                                <ul class="nav-links__list">
                                    @foreach($menu as $item)
                                        <li class="nav-links__item">
                                            <a @if($item->is_pricelist == 1) href="/{{ $settings->price_list }}"
                                               download @else href="/{{$item->link }} @endif">
                                                <span>{{ $item->title }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div><!-- .nav-links / end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- desktop site__header / end --><!-- site__body -->
    <div class="site__body"><!-- .block-slideshow -->
