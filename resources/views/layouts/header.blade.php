<!-- mobilemenu -->
<div class="mobilemenu">
    <div class="mobilemenu__backdrop"></div>
    <div class="mobilemenu__body">
        <div class="mobilemenu__header">
            <div class="mobilemenu__title">Меню</div>
            <button type="button" class="mobilemenu__close">
                <svg width="20px" height="20px">
                    <use xlink:href="images/sprite.svg#cross-20"></use>
                </svg>
            </button>
        </div>
        <div class="mobilemenu__content">
            <ul class="mobile-links mobile-links--level--0" data-collapse
                data-collapse-opened-class="mobile-links__item--open">
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="index.html" class="mobile-links__item-link">О компании</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="index.html" class="mobile-links__item-link">Новости</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="index.html" class="mobile-links__item-link">Поддержка</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="index.html" class="mobile-links__item-link">Полезное</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="index.html" class="mobile-links__item-link">Гарантия</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="index.html" class="mobile-links__item-link">Контакты</a>
                    </div>
                </li>
                <li class="mobile-links__item" data-collapse-item>
                    <div class="mobile-links__item-title">
                        <a href="index.html" class="mobile-links__item-link">Прайс лист</a>
                    </div>
                </li>
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
                                <use xlink:href="images/sprite.svg#menu-18x14"></use>
                            </svg>
                        </button>
                        <a class="mobile-header__logo" href="index.html">
                            <img src="images/head_logo.png">
                        </a>
                        <div class="mobile-header__search">
                            <form class="mobile-header__search-form" action="#"><input
                                    class="mobile-header__search-input" name="search"
                                    placeholder="Поиск по сайту" aria-label="Site search" type="text"
                                    autocomplete="off">
                                <button class="mobile-header__search-button mobile-header__search-button--submit"
                                        type="submit">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="images/sprite.svg#search-20"></use>
                                    </svg>
                                </button>
                                <button class="mobile-header__search-button mobile-header__search-button--close"
                                        type="button">
                                    <svg width="20px" height="20px">
                                        <use xlink:href="images/sprite.svg#cross-20"></use>
                                    </svg>
                                </button>
                                <div class="mobile-header__search-body"></div>
                            </form>
                        </div>
                        <div class="mobile-header__indicators">
                            <div class="indicator indicator--mobile-search indicator--mobile d-sm-none">
                                <button class="indicator__button"><span class="indicator__area"><svg width="20px"
                                                                                                     height="20px"><use
                                                xlink:href="images/sprite.svg#search-20"></use></svg></span></button>
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
                <div class="site-header__logo"><a href="index.html">
                        <img src="images/head_logo.png">
                    </a></div>
                <div class="site-header__search">
                    <div class="search">
                        <form class="search__form" action="#"><input class="search__input" name="search"
                                                                     placeholder="Поиск по сайту"
                                                                     aria-label="Site search" type="text"
                                                                     autocomplete="off">
                            <button class="search__button" type="submit">
                                <svg width="20px" height="20px">
                                    <use xlink:href="images/sprite.svg#search-20"></use>
                                </svg>
                            </button>
                            <div class="search__border"></div>
                        </form>
                    </div>
                </div>
                <div class="site-header__phone">
                    <div class="site-header__phone-title">Позвоните нам</div>
                    <div class="site-header__phone-number"><a href="tel:+998712346677">+(99871) 234-66-77</a></div>
                    <div class="site-header__phone-number"><a href="tel:+998712346777">234-67-77</a></div>
                    <div class="site-header__phone-number"><a href="tel:+998712348877">234-88-77</a></div>
                </div>
            </div>
            <div class="site-header__nav-panel nav-panel--sticky">
                <div class="nav-panel">
                    <div class="nav-panel__container container">
                        <div class="nav-panel__row">
                            <div class="nav-panel__departments"><!-- .departments -->
                                <div class="departments @if(request()->is("/")) departments--opened departments--fixed @endif"
                                     data-departments-fixed-by=".block-slideshow">
                                    @include('layouts.categories')
                                </div><!-- .departments / end --></div><!-- .nav-links -->
                            <div class="nav-panel__nav-links nav-links">
                                <ul class="nav-links__list">
                                    <li class="nav-links__item"><a
                                            href="about-us.html"><span>О компании</span></a>
                                    </li>
                                    <li class="nav-links__item"><a
                                            href="about-us.html"><span>Новости</span></a>
                                    </li>
                                    <li class="nav-links__item"><a
                                            href="about-us.html"><span>Поддержка</span></a>
                                    </li>
                                    <li class="nav-links__item"><a
                                            href="about-us.html"><span>Полезное</span></a>
                                    </li>
                                    <li class="nav-links__item"><a
                                            href="about-us.html"><span>Гарантия</span></a>
                                    </li>
                                    <li class="nav-links__item"><a
                                            href="about-us.html"><span>Контакты</span></a>
                                    </li>
                                    <li class="nav-links__item"><a
                                            href="about-us.html"><span>Прайс лист</span></a>
                                    </li>
                                </ul>
                            </div><!-- .nav-links / end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header><!-- desktop site__header / end --><!-- site__body -->
    <div class="site__body"><!-- .block-slideshow -->
