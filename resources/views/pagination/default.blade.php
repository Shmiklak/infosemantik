@if ($paginator->hasPages())
    <ul class="pagination justify-content-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled"><a class="page-link page-link--with-arrow">
                    <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true"
                         width="8px" height="13px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-left-8x13"></use>
                    </svg>
                </a>
            </li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="page-link page-link--with-arrow" rel="prev">
                    <svg class="page-link__arrow page-link__arrow--left" aria-hidden="true"
                         width="8px" height="13px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-left-8x13"></use>
                    </svg>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item"><a class="page-link page-link--with-arrow" href="{{ $paginator->nextPageUrl() }}"
                                      rel="next">
                    <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true"
                         width="8px" height="13px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-8x13"></use>
                    </svg>
                </a></li>
        @else
            <li class="page-item disabled"><a class="page-link page-link--with-arrow"
                                      rel="next">
                    <svg class="page-link__arrow page-link__arrow--right" aria-hidden="true"
                         width="8px" height="13px">
                        <use xlink:href="images/sprite.svg#arrow-rounded-right-8x13"></use>
                    </svg>
                </a></li>
        @endif
    </ul>
@endif
