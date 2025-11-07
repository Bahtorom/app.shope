@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-img">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">{{ $brand??'' }}</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>

                        @if ($brand && $series && $generation && $variant)
                            <a href={{ route('pages.shope', ['brand' => $brand])}}>{{ $brand }}</a>
                            <i class="ph ph-caret-right text-sm text-secondary2"></i>
                            <a href={{ route('pages.shope', ['brand' => $brand, 'series' => $series])}}>{{ $series }}</a>
                            <i class="ph ph-caret-right text-sm text-secondary2"></i>
                            <a href={{ route('pages.shope', ['brand' => $brand, 'series' => $series, 'generation' => $generation])}}>{{ $generation }} </a>
                            <i class="ph ph-caret-right text-sm text-secondary2"></i>
                            <div class="text-secondary2 capitalize">{{ $variant }} </div>

                        @elseif ($brand && $series && $generation )
                            <a href={{ route('pages.shope', ['brand' => $brand])}}>{{ $brand }}</a>
                            <i class="ph ph-caret-right text-sm text-secondary2"></i>
                            <a href={{ route('pages.shope', ['brand' => $brand, 'series' => $series])}}>{{ $series }}</a>
                            <i class="ph ph-caret-right text-sm text-secondary2"></i>
                            <div class="text-secondary2 capitalize">{{ $generation }} </div>

                        @elseif ($brand && $series)
                            <a href={{ route('pages.shope', ['brand' => $brand])}}>{{ $brand }}</a>
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


<script>
    window.Laravel = {
        csrfToken: "{{ csrf_token() }}",
        isLoggedIn: {{ Auth::check() ? 'true' : 'false' }},
        loginUrl: "{{ route('login') }}",
        cartAddUrl: "{{ route('pages.cart.append') }}"
    };
</script>


<div class="list-recent mt-8">
    @foreach ($phones as $brand => $seriesList)
        @foreach ($seriesList as $series => $generations)
            @foreach ($generations as $generation => $phoneGroup)
                {{-- Заголовок группы --}}
                <div class="heading6 mt-8 mb-4 text-center">
                    {{ $brand }} {{ $series }} {{ $generation }}
                </div>
                    
                <div class="list-product pb-5 hide-product-sold grid xl:grid-cols-4 sm:grid-cols-3 grid-cols-2 md:gap-[30px] gap-4 mt-4 pl-8 pr-8">
                    @foreach ($phoneGroup as $phone)
                        @php
                            $inCart = in_array($phone->id, $cartPhone)
                        @endphp
                        <div class="product-item grid-type" data-item="{{ $phone->id }}">
                            <div class="product-main cursor-pointer block">
                                {{-- {{ $phone-> }} --}}
                                <!-- Thumbnail -->
                                <div class="product-thumb bg-white relative overflow-hidden rounded-2xl">
                                    <!-- Optional "New" tag (you can conditionally show it) -->
                                    
                                    <div class="product-tag text-button-uppercase bg-green px-3 py-0.5 inline-block rounded-full absolute top-3 left-3 z-[1]">New</div>
                                

                                    <!-- Action buttons (Wishlist, Compare) -->
                                    <div class="list-action-right absolute top-3 right-3 max-lg:hidden">
                                        {{-- <div class="add-wishlist-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Добавить в Избранное</div>
                                            <i class="ph ph-heart text-lg"></i>
                                        </div> --}}
                                        {{-- <div class="compare-btn w-[32px] h-[32px] flex items-center justify-center rounded-full bg-white duration-300 relative mt-2">
                                            <div class="tag-action bg-black text-white caption2 px-1.5 py-0.5 rounded-sm">Compare Product</div>
                                            <i class="ph ph-arrow-counter-clockwise text-lg compare-icon"></i>
                                            <i class="ph ph-check-circle text-lg checked-icon"></i>
                                        </div> --}}
                                    </div>

                                    <!-- Product images (main + hover) -->
                                    <div class="product-img rounded-[20px] overflow-hidden">
                                        <img class="w-full h-full object-cover duration-700" src="{{ asset('storage/' . $phone->image) }}" alt="{{ $phone->brand }} {{ $phone->model }}" />
                                    </div>

                                    <!-- Quick view & Add to cart buttons -->
                                    <div class="list-action grid grid-cols-2 gap-3 px-5 absolute w-full bottom-5 max-lg:hidden">
                                        <a href="{{ route('pages.ticket', $phone) }}" class="quick-view-btn w-full text-button-uppercase py-2 text-center rounded-full duration-300 bg-white hover:bg-black hover:text-white">Просмотр</a>
                                        <button class="add-cart-btn w-full text-button-uppercase py-2 text-center rounded-full duration-500 {{ $inCart ? 'bg-black text-white' : 'bg-white hover:bg-black hover:text-white' }}" 
                                            data-phone-id="{{ $phone->id }}" @if ($inCart) disabled @endif>
                                            {{ $inCart ? 'В корзине' : 'В корзину' }}
                                        </button>
                                    </div>
                                </div>
                                <div class="text-secondary2 text-xs mt-2 pl-4">Остаток: <b>{{$phone->stock}}</b> шт.</div>

                                <div class="blog-infor text-center ">
                                    <div class="heading6 blog-title duration-300"> {{ $phone->brand }} {{ $phone->series }} {{ $phone->generation }} {{ $phone->variant }}  </div>
                            
                                    
                                    <div class="blog-tag bg-green py-1 px-2.5 rounded-full text-button-uppercase inline-block mt-2">{{ number_format ($phone->price, 0, '', ' ') }} ₽</div>                      
                                </div>                                                                        
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endforeach
    @endforeach
</div>

@endsection