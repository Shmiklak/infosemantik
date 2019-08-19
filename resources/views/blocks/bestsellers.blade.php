<div class="block block-products block-products--layout--large-first">
    <div class="container">
        <div class="block-header"><h3 class="block-header__title">Бестселлеры</h3>
            <div class="block-header__divider"></div>
        </div>
        <div class="block-products__body">
            @foreach($bestsellers as $key=>$product)
                @if($key==0)
                    <div class="block-products__featured">
                        <div class="block-products__featured-item">
                            <div class="product-card">

                                @if(strtotime($product->created_at) > strtotime('1 week ago'))
                                    <div class="product-card__badge product-card__badge--new">
                                        Новинка
                                    </div>
                                @endif
                                <div class="product-card__image"><a href="{{ route('product', $product->slug) }}"><img
                                            src="/{{ $product->main_image }}" alt="{{ $product->title }}"></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('product', $product->slug) }}">
                                            {{ $product->title }}
                                        </a></div>


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
                @endif
            @endforeach
            <div class="block-products__list">
                @foreach($bestsellers as $key=>$product)
                    @if($key!=0)
                        <div class="block-products__list-item">
                            <div class="product-card">

                                <div class="product-card__badges-list">
                                    @if(strtotime($product->created_at) > strtotime('1 week ago'))
                                        <div class="product-card__badge product-card__badge--new">
                                            Новинка
                                        </div>
                                    @endif
                                </div>
                                <div class="product-card__image"><a href="{{ route('product', $product->slug) }}"><img
                                            src="/{{ $product->main_image }}" alt="{{ $product->title }}"></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="{{ route('product', $product->slug) }}">
                                            {{ $product->title }}
                                        </a></div>


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
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
