<div class="block block-products-carousel" data-layout="grid-4">
    <div class="container">
        <div class="block-header"><h3 class="block-header__title">Рекомендуемые продукты</h3>
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
                @foreach($recommended as $product)
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
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
                                <div class="product-card__image"><a href="{{ route('product', $product->slug) }}"><img
                                            src="/{{ $product->main_image }}" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name">
                                        <a href="{{ route('product', $product->slug) }}">
                                            {{ $product->title }}
                                        </a>
                                    </div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability">
                                        @if($product->is_available == 1)
                                            <span class="text-success">В наличии</span>
                                        @endif
                                        @if($product->is_available == 0)
                                            <span class="text-danger">Нет в наличии</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
