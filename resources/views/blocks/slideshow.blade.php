<div class="col-12 col-lg-9">
    <div class="block-slideshow__body">
        <div class="owl-carousel">
            @foreach($slideshow as $banner)
                <a class="block-slideshow__slide">
                    <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                         style="background-image: url(/{{ $banner->image }})"></div>
                    <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                         style="background-image: url(/{{ $banner->image_mobile }})"></div>
                    <div class="block-slideshow__slide-content">
                        <div class="block-slideshow__slide-title">{{ $banner->title }}
                        </div>
                        <div class="block-slideshow__slide-text">{{ $banner->description }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
