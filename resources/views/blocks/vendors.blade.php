<div class="block block-brands">
    <div class="container">
        <div class="block-brands__slider">
            <div class="owl-carousel">
                @foreach($vendors as $vendor)
                    <div class="block-brands__item">
                        <a href="{{ $vendor->link }}" target="_blank">
                            <img src="/{{ $vendor->image }}" alt="{{ $vendor->title }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
