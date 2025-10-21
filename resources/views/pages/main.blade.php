@extends('layout.app')

@section('content')

<!-- Slider -->

<div class="slider-block style-one bg-linear xl:h-[860px] lg:h-[800px] md:h-[580px] sm:h-[500px] h-[350px] max-[420px]:h-[320px] w-full">
    <div class="slider-main h-full w-full">
        <div class="swiper swiper-slider h-full relative">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="slider-item h-full w-full relative">
                        <div class="container w-full h-full flex items-center relative">
                            <div class="text-content basis-1/2">
                                <div class="text-sub-display">Распродажа! Скидка до 25%!</div>
                                <div class="text-display md:mt-5 mt-2">Гаджеты на любой сезон</div>
                                <a href="shop-breadcrumb-img.html" class="button-main md:mt-8 mt-3">Перейти в магазин</a>
                            </div>
                            <div class="sub-img absolute sm:w-1/2 w-3/5 2xl:-right-[60px] -right-[16px] bottom-0"> <!--  670 * 805 -->
                                <img src="/assets/images/title/macbook.jpg" alt="bg1-1" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-item h-full w-full relative">
                        <div class="container w-full h-full flex items-center relative">
                            <div class="text-content basis-1/2">
                                <div class="text-sub-display">Распродажа! Скидка до 25%!</div>
                                <div class="text-display md:mt-5 mt-2">IPhone на каждый вкус и цвет</div>
                                <a href="shop-breadcrumb-img.html" class="button-main md:mt-8 mt-3">Перейти в магазин </a>
                            </div>
                            <div class="sub-img absolute sm:w-1/2 w-3/5 2xl:-right-[60px] -right-[16px] bottom-0">
                                <img src="/assets/images/title/iphone.webp" alt="bg1-2" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="slider-item h-full w-full relative">
                        <div class="container w-full h-full flex items-center relative">
                            <div class="text-content basis-1/2">
                                <div class="text-sub-display">Распродажа! Скидка до 25%!</div>
                                <div class="text-display md:mt-5 mt-2">Dyson - это любовь твоей девушки</div>
                                <a href="shop-breadcrumb-img.html" class="button-main md:mt-8 mt-3">Перейти в магазин</a>
                            </div>
                            <div class="sub-img absolute sm:w-1/2 w-3/5 2xl:-right-[60px] -right-[16px] bottom-0">
                                <img src="/assets/images/title/dyson.jpg" alt="bg1-3" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</div>
</div>


<div class="benefit-block md:pt-20 pt-10">
<div class="container">
    <div class="list-benefit grid items-start lg:grid-cols-4 grid-cols-2 gap-[30px]">
        <div class="benefit-item flex flex-col items-center justify-center">
            <i class="icon-phone-call lg:text-7xl text-5xl"></i>
            <div class="heading6 text-center mt-5">24/7 Служба Поддержки</div>
        </div>
        <div class="benefit-item flex flex-col items-center justify-center">
            <i class="icon-return lg:text-7xl text-5xl"></i>
            <div class="heading6 text-center mt-5">Возврат денег в течение 14 дней</div>
        </div>
        <div class="benefit-item flex flex-col items-center justify-center">
            <i class="icon-guarantee lg:text-7xl text-5xl"></i>
            <div class="heading6 text-center mt-5">Наша Гарантия</div>
        </div>
        <div class="benefit-item flex flex-col items-center justify-center">
            <i class="icon-delivery-truck lg:text-7xl text-5xl"></i>
            <div class="heading6 text-center mt-5">Доставка по всему миру</div>
        </div>
        <div></div>
    </div>
</div>
</div>

@endsection