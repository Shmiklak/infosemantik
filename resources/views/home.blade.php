@extends('layouts.app')
@section('content')
    <div class="block-slideshow block-slideshow--layout--with-departments block">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-none d-lg-block"></div>
                <div class="col-12 col-lg-9">
                    <div class="block-slideshow__body">
                        <div class="owl-carousel">
                            <a class="block-slideshow__slide" href="#">
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                     style="background-image: url('images/slides/slide-2.jpg')"></div>
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                     style="background-image: url('images/slides/slide-2-mobile.jpg')"></div>
                                <div class="block-slideshow__slide-content">
                                    <div class="block-slideshow__slide-title">Профессиональная техника<br>для офиса
                                    </div>
                                    <div class="block-slideshow__slide-text">Значимость этих проблем настолько очевидна,
                                        что<br>
                                        сложившаяся структура организации позволяет <br>
                                        оценить значение модели развития.
                                    </div>
                                </div>
                            </a>
                            <a class="block-slideshow__slide" href="#">
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                     style="background-image: url('images/slides/slide-1.jpg')"></div>
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                     style="background-image: url('images/slides/slide-1-mobile.jpg')"></div>
                                <div class="block-slideshow__slide-content">
                                    <div class="block-slideshow__slide-title">Большой выбор продуктов<br>от лучших
                                        производителей
                                    </div>
                                    <div class="block-slideshow__slide-text">Значимость этих проблем настолько очевидна,
                                        что<br>
                                        сложившаяся структура организации позволяет <br>
                                        оценить значение модели развития.
                                    </div>
                                </div>
                            </a><a class="block-slideshow__slide" href="#">
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--desktop"
                                     style="background-image: url('images/slides/slide-3.jpg')"></div>
                                <div class="block-slideshow__slide-image block-slideshow__slide-image--mobile"
                                     style="background-image: url('images/slides/slide-3-mobile.jpg')"></div>
                                <div class="block-slideshow__slide-content">
                                    <div class="block-slideshow__slide-title">Большой выбор продуктов<br>от лучших
                                        производителей
                                    </div>
                                    <div class="block-slideshow__slide-text">Значимость этих проблем настолько очевидна,
                                        что<br>
                                        сложившаяся структура организации позволяет <br>
                                        оценить значение модели развития.
                                    </div>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .block-slideshow / end --><!-- .block-features -->

    @include('blocks.popular_categories')

    <div class="block block-products-carousel" data-layout="grid-4">
        <div class="container">
            <div class="block-header"><h3 class="block-header__title">Рекомендуемые продукты</h3>
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
            <div class="block-products-carousel__slider">
                <div class="block-products-carousel__preloader"></div>
                <div class="owl-carousel">
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">НОВИНКА</div>
                                </div>
                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-1.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Electric Planer Brandix
                                            KL370090G 300 Watts</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__badges-list">
                                    <div class="product-card__badge product-card__badge--new">БЕСТСЕЛЛЕР</div>
                                </div>
                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-2.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                                            DPS3000SY 2700 Watts</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-3.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Drill Screwdriver Brandix
                                            ALX7054 200 Watts</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-danger">Нет в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__badges-list">

                                </div>
                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-4.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Drill Series 3 Brandix
                                            KSR4590PQS 1500 Watts</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-5.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Brandix Router Power Tool
                                            2017ERXPK</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-6.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Brandix Drilling Machine
                                            DM2019KW4 4kW</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-7.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Brandix Pliers</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-8.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Water Hose 40cm</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-9.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Spanner Wrench</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-10.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Water Tap</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-11.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Hand Tool Kit</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-12.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Ash's Chainsaw 3.5kW</a>
                                    </div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-13.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Brandix Angle Grinder
                                            KZX3890PQW</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-14.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Brandix Air Compressor
                                            DELTAKX500</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-15.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Brandix Electric Jigsaw
                                            JIG7000BQ</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-products-carousel__column">
                        <div class="block-products-carousel__cell">
                            <div class="product-card">

                                <div class="product-card__image"><a href="product.html"><img
                                            src="images/products/product-16.jpg" alt=""></a></div>
                                <div class="product-card__info">
                                    <div class="product-card__name"><a href="product.html">Brandix Screwdriver
                                            SCREW1500ACC</a></div>


                                </div>
                                <div class="product-card__actions">
                                    <div class="product-card__availability"><span
                                            class="text-success">Есть в наличии</span></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .block-products-carousel / end --><!-- .block-banner -->
    <div class="block block-products block-products--layout--large-first">
        <div class="container">
            <div class="block-header"><h3 class="block-header__title">Бестселлеры</h3>
                <div class="block-header__divider"></div>
            </div>
            <div class="block-products__body">
                <div class="block-products__featured">
                    <div class="block-products__featured-item">
                        <div class="product-card">

                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--new">НОВИНКА</div>
                            </div>
                            <div class="product-card__image"><a href="product.html"><img
                                        src="images/products/product-1.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="product.html">Electric Planer Brandix
                                        KL370090G 300 Watts</a></div>


                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability"><span
                                        class="text-success">Есть в наличии</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-products__list">
                    <div class="block-products__list-item">
                        <div class="product-card">

                            <div class="product-card__badges-list">
                                <div class="product-card__badge product-card__badge--new">БЕСТСЕЛЛЕР</div>
                            </div>
                            <div class="product-card__image"><a href="product.html"><img
                                        src="images/products/product-2.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="product.html">Undefined Tool IRadix
                                        DPS3000SY 2700 Watts</a></div>


                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability"><span
                                        class="text-success">Есть в наличии</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card">

                            <div class="product-card__image"><a href="product.html"><img
                                        src="images/products/product-3.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="product.html">Drill Screwdriver Brandix
                                        ALX7054 200 Watts</a></div>


                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability"><span
                                        class="text-success">Есть в наличии</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card">

                            <div class="product-card__badges-list">

                            </div>
                            <div class="product-card__image"><a href="product.html"><img
                                        src="images/products/product-4.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="product.html">Drill Series 3 Brandix
                                        KSR4590PQS 1500 Watts</a></div>


                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability"><span
                                        class="text-success">Есть в наличии</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card">

                            <div class="product-card__image"><a href="product.html"><img
                                        src="images/products/product-5.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="product.html">Brandix Router Power Tool
                                        2017ERXPK</a></div>


                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability"><span
                                        class="text-success">Есть в наличии</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card">

                            <div class="product-card__image"><a href="product.html"><img
                                        src="images/products/product-6.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="product.html">Brandix Drilling Machine
                                        DM2019KW4 4kW</a></div>


                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability"><span
                                        class="text-success">Есть в наличии</span>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="block-products__list-item">
                        <div class="product-card">

                            <div class="product-card__image"><a href="product.html"><img
                                        src="images/products/product-7.jpg" alt=""></a></div>
                            <div class="product-card__info">
                                <div class="product-card__name"><a href="product.html">Brandix Pliers</a></div>


                            </div>
                            <div class="product-card__actions">
                                <div class="product-card__availability"><span
                                        class="text-success">Есть в наличии</span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .block-products / end --><!-- .block-categories -->

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
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-1.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">Philosophy That Addresses Topics Such As
                                    Goodness</a></div>
                            <div class="post-card__date">October 19, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-2.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Latest News</a></div>
                            <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And Argument
                                    Part 2</a></div>
                            <div class="post-card__date">September 5, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-3.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">New Arrivals</a></div>
                            <div class="post-card__name"><a href="#">Some Philosophers Specialize In One Or More
                                    Historical Periods</a></div>
                            <div class="post-card__date">August 12, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-4.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">A Variety Of Other Academic And Non-Academic
                                    Approaches Have Been Explored</a></div>
                            <div class="post-card__date">Jule 30, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-5.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">New Arrivals</a></div>
                            <div class="post-card__name"><a href="#">Germany Was The First Country To
                                    Professionalize Philosophy</a></div>
                            <div class="post-card__date">June 12, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-6.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">Logic Is The Study Of Reasoning And Argument
                                    Part 1</a></div>
                            <div class="post-card__date">May 21, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-7.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">Many Inquiries Outside Of Academia Are
                                    Philosophical In The Broad Sense</a></div>
                            <div class="post-card__date">April 3, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-8.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Latest News</a></div>
                            <div class="post-card__name"><a href="#">An Advantage Of Digital Circuits When Compared
                                    To Analog Circuits</a></div>
                            <div class="post-card__date">Mart 29, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-9.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">New Arrivals</a></div>
                            <div class="post-card__name"><a href="#">A Digital Circuit Is Typically Constructed From
                                    Small Electronic Circuits</a></div>
                            <div class="post-card__date">February 10, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                    <div class="post-card">
                        <div class="post-card__image"><a href="#"><img src="images/posts/post-10.jpg" alt=""></a>
                        </div>
                        <div class="post-card__info">
                            <div class="post-card__category"><a href="#">Special Offers</a></div>
                            <div class="post-card__name"><a href="#">Engineers Use Many Methods To Minimize Logic
                                    Functions</a></div>
                            <div class="post-card__date">January 1, 2019</div>
                            <div class="post-card__content">In one general sense, philosophy is associated with
                                wisdom, intellectual culture and a search for knowledge. In that sense, all
                                cultures...
                            </div>
                            <div class="post-card__read-more"><a href="#" class="btn btn-secondary btn-sm">Read
                                    More</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .block-posts / end --><!-- .block-brands -->
    <div class="block block-brands">
        <div class="container">
            <div class="block-brands__slider">
                <div class="owl-carousel">
                    <div class="block-brands__item"><a href="#"><img src="images/vendors/canon.gif" alt=""></a>
                    </div>
                    <div class="block-brands__item"><a href="#"><img src="images/vendors/epson_partner_logo.png" alt=""></a>
                    </div>
                    <div class="block-brands__item"><a href="#"><img src="images/vendors/fujitsu.jpg"
                                                                     alt=""></a></div>
                    <div class="block-brands__item"><a href="#"><img src="images/vendors/hp.jpg" alt=""></a>
                    </div>
                    <div class="block-brands__item"><a href="#"><img src="images/vendors/intel.gif" alt=""></a>
                    </div>
                    <div class="block-brands__item"><a href="#"><img src="images/vendors/samsung.gif" alt=""></a></div>
                    <div class="block-brands__item"><a href="#"><img src="images/vendors/lg.gif" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
