@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-img">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">{{ $brand??'' }}</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>

                        @if ($brand && $series && $generation)
                            <a href={{ route('shope', ['brand' => $brand])}}>{{ $brand }}</a>
                            <i class="ph ph-caret-right text-sm text-secondary2"></i>
                            <a href={{ route('shope', ['brand' => $brand, 'series' => $series])}}>{{ $series }}</a>
                            <i class="ph ph-caret-right text-sm text-secondary2"></i>
                            <div class="text-secondary2 capitalize">{{ $generation }} </div>

                        @elseif ($brand && $series)
                            <a href={{ route('shope', ['brand' => $brand])}}>{{ $brand }}</a>
                            <i class="ph ph-caret-right text-sm text-secondary2"></i>
                            <div class="text-secondary2 capitalize">{{ $series }} </div>
                        
                        @else
                            <div class="text-secondary2 capitalize">{{ $brand }} </div>
                        @endif
                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="news-block">
    <div class="container">
        {{-- <div class="heading3 text-center">News insight</div> --}}
            <div class="list-blog grid lg:grid-cols-4 sm:grid-cols-2 md:gap-[30px] gap-4 md:mt-10 mt-6">

                @foreach ($phones as $phone)
                    
                    <a href="#" class="blog-item style-one h-full cursor-pointer max-lg:hidden max-sm:block">
                        <div class="blog-main h-full block">
                            <div class="blog-thumb rounded-[20px] overflow-hidden">
                                <img src={{ asset('storage/'.$phone->image) }} alt="blog-img" class="w-full duration-500" />
                            </div>
                            <div class="blog-infor mt-3 text-center">
                                <div class="heading6 blog-title mt-3 duration-300"> {{ $phone->brand }} {{ $phone->series }} {{ $phone->generation }} {{ $phone->variant }}  </div>
                                <div class="blog-tag bg-green py-1 px-2.5 rounded-full text-button-uppercase inline-block">{{ $phone->price }} ₽</div>
                                
                                {{-- <div class="flex items-center gap-2 mt-2">
                                    <div class="blog-author caption1 text-secondary">by Leona Pablo</div>
                                    <span class="w-[20px] h-[1px] bg-black"></span>
                                    <div class="blog-date caption1 text-secondary">Dec 10, 2024</div>
                                </div> --}}
                            </div>
                        </div>
                    </a>
                @endforeach

            </div>
        </div>
    </div>
</div>


<div class="list-recent mt-8">
    <div class="heading6">Recently viewed phones</div>
    <div class="list-product pb-5 hide-product-sold grid xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 mt-4">
        @foreach ($phones as $phone)
            <div class="product-item grid-type" data-item="{{ $phone->id }}">
                <div class="product-main cursor-pointer block">
                    <!-- Thumbnail -->
                    <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                        <!-- Optional "New" tag (you can conditionally show it) -->
                        @if($phone->is_new)
                            <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">New</div>
                        @endif

                        <!-- Action buttons (Wishlist, Compare) -->
                        <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                            <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Add To Wishlist</div>
                                <i class="ph ph-heart text-lg"></i>
                            </div>
                            <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Compare Product</div>
                                <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                <i class="ph ph-check-circle text-lg checked-icon"></i>
                            </div>
                        </div>

                        <!-- Product images (main + hover) -->
                        <div class="product-img w-full h-full aspect-[3/4]">
                            <img class="w-full h-full object-cover duration-700" src="{{ asset('storage/' . $phone->image) }}" alt="{{ $phone->brand }} {{ $phone->model }}" />
                            <!-- Fallback or second image — if you have one, e.g., $phone->image_hover -->
                            <img class="w-full h-full object-cover duration-700" src="{{ asset('storage/' . $phone->image) }}" alt="{{ $phone->brand }} {{ $phone->model }}" />
                        </div>

                        <!-- Quick view & Add to cart buttons -->
                        <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                            <div class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">Quick View</div>
                            <div class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 bg-white hover:bg-black hover:text-white">Add To Cart</div>
                        </div>
                    </div>

                    <!-- Product info -->
                    <div class="product-infor mt-4 lg:mb-7">
                        <!-- Sold/Available progress (mock values — replace with real logic if needed) -->
                        <div class="product-sold sm:pb-4 pb-2">
                            <div class="progress bg-line h-1.5 w-full rounded-full overflow-hidden relative">
                                <div class="progress-sold bg-red absolute left-0 top-0 h-full" style="width: {{ ($phone->sold ?? 0) / (($phone->sold ?? 0) + ($phone->available ?? 100)) * 100 }}%"></div>
                            </div>
                            <div class="flex items-center justify-between gap-3 gap-y-1 flex-wrap mt-2">
                                <div class="text-button-uppercase">
                                    <span class="text-secondary2 max-sm:text-xs">Sold: </span>
                                    <span class="max-sm:text-xs">{{ $phone->sold ?? 12 }}</span>
                                </div>
                                <div class="text-button-uppercase">
                                    <span class="text-secondary2 max-sm:text-xs">Available: </span>
                                    <span class="max-sm:text-xs">{{ $phone->available ?? 88 }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Product name -->
                        <div class="product-name text-title duration-300">
                            {{ $phone->brand }} {{ $phone->series }} {{ $phone->generation }} {{ $phone->variant }}
                        </div>

                        <!-- Colors (if you have color variants) -->
                        <div class="list-color py-2 max-md:hidden flex items-center gap-3 flex-wrap duration-500">
                            @foreach($phone->colors ?? ['black', 'green', 'red'] as $color)
                                <div class="color-item bg-{{ $color }} w-8 h-8 rounded-full duration-300 relative">
                                    <div class="tag-action bg-black text-white caption2 capitalize px-1.5 py-0.5 rounded-sm">{{ $color }}</div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Price block -->
                        <div class="product-price-block flex items-center gap-2 flex-wrap mt-1 duration-300 relative z-[1]">
                            @if($phone->sale_price)
                                <div class="product-price text-title">{{ number_format($phone->sale_price, 0, '', ' ') }} ₽</div>
                                <div class="product-origin-price caption1 text-secondary2">
                                    <del>{{ number_format($phone->price, 0, '', ' ') }} ₽</del>
                                </div>
                                @php
                                    $discount = round(($phone->price - $phone->sale_price) / $phone->price * 100);
                                @endphp
                                <div class="product-sale caption1 font-medium bg-green px-3 py-0.5 inline-block rounded-full">-{{ $discount }}%</div>
                            @else
                                <div class="product-price text-title">{{ number_format($phone->price, 0, '', ' ') }} ₽</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection