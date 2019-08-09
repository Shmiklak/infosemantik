<div class="departments__body">
    <div class="departments__links-wrapper">
        <ul class="departments__links">
            @foreach($categories as $category)
                <li class="departments__item @if($category->children->count() > 0) has-child @endif">
                    <a href="{{ route('category', $category->slug) }}">
                        {{ $category->title }}
                        @if($category->children->count() > 0)
                            <svg class="departments__link-arrow" width="6px" height="9px">
                                <use xlink:href="/images/sprite.svg#arrow-rounded-right-6x9"></use>
                            </svg>
                    </a>
                    <ul class="sub-category">
                        @foreach($category->children as $child)
                            <li>
                                <a href="{{ route('category', $child->slug) }}">{{ $child->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                    @else
                    </a>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
<button class="departments__button">
    <svg class="departments__button-icon" width="18px" height="14px">
        <use xlink:href="/images/sprite.svg#menu-18x14"></use>
    </svg>
    Каталог продукции
</button>
