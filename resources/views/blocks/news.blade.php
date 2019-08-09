<div class="block block-posts block-posts--layout--list-sm" data-layout="list-sm">
    <div class="container">
        <div class="block-header"><h3 class="block-header__title">Последние новости</h3>
            <div class="block-header__divider"></div>
            <div class="block-header__arrows-list">
                <button class="block-header__arrow block-header__arrow--left" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-left-7x11"></use>
                    </svg>
                </button>
                <button class="block-header__arrow block-header__arrow--right" type="button">
                    <svg width="7px" height="11px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-7x11"></use>
                    </svg>
                </button>
            </div>
        </div>
        <div class="block-posts__slider">
            <div class="owl-carousel">
                @foreach($news as $item)
                    <div class="post-card">
                        <div class="post-card__image">
                            <a href="{{ route('news-page', $item->slug) }}">
                                <img src="/{{ $item->image }}" alt="{{ $item->title }}">
                            </a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__name"><a href="{{ route('news-page', $item->slug) }}">{{ $item->title }}</a></div>
                            <div class="post-card__date">{{ strftime(strftime("%e.%m.%Y", strtotime($item->created_at))) }}</div>
                            <div class="post-card__content">
                                {!! strip_tags($item->shortDescription()) !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div><!-- .block-posts / end -->
