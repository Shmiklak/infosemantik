@extends('layouts.app')
@section('content')

    @include('blocks.slideshow')
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

    @include('blocks.news')
    <!-- .block-brands -->
    @include('blocks.vendors')
@endsection
