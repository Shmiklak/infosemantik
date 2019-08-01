<div class="block block--highlighted block-categories block-categories--layout--classic">
    <div class="container">
        <div class="block-header"><h3 class="block-header__title">Популярные категории</h3>
            <div class="block-header__divider"></div>
        </div>
        <div class="block-categories__list">
            @foreach($categories as $category)
                @if($category->is_popular == 1)
                    <div class="block-categories__item category-card category-card--layout--classic">
                        <div class="category-card__body">
                            <div class="category-card__image">
                                <a href="#">
                                    <img src="/{{ $category->image}}" alt="{{ $category->title }}">
                                </a>
                            </div>
                            <div class="category-card__content">
                                <div class="category-card__name"><a href="#">{{ $category->title }}</a></div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div><!-- .block-categories / end --><!-- .block-products-carousel -->
