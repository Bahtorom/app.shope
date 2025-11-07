@extends('layout.app')


@section('content')

<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">{{$brand}}</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Карточка товара</div>
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
@php
    $inCart = in_array($phone->id, $cartPhone)
@endphp

<div class="store-list md:py-20 py-10">
    <div class="container">
        <div class="item bg-surface overflow-hidden rounded-[20px] ">
            <div class="flex items-center lg:justify-end relative max-lg:flex-col">
                <img src="{{ asset('storage/' . $phone->image) }}" alt="{{ $phone->brand }} {{ $phone->model }}" alt="bg-img" class="w-1/3 aspect-video flex-shrink-0 rounded-lg" />
                <div class="text-content lg:w-1/2 lg:pr-20 lg:pl-[100px] lg:py-14 sm:py-10 py-6 max-lg:px-6">
                    <div class="heading3">{{ $phone->brand }} {{ $phone->series }} {{ $phone->generation }} {{ $phone->variant }} </div>
                    <div class="heading4">{{ $phone->color }} {{ $phone->memory }} </div>
                               
                   <div class="heading6 text-silver mt-12"> Цена: <b>{{ number_format(($phone->price), 0, '', ' ')}} ₽</b></div>
                        
                    <div class="flex lg:gap-10 gap-6 mt-12">
                        <div class="w-1/2">
                            <button class="add-cart-btn w-full  text-button-uppercase py-2 text-center rounded-full duration-500 {{ $inCart ? 'bg-black text-white' : 'bg-white hover:bg-black hover:text-white' }}" 
                                    data-phone-id="{{ $phone->id }}" 
                                    @if($inCart) disabled @endif>
                                {{ $inCart ? 'В корзине' : 'Добавить в корзину' }}
                            </button>
                        </div>
                    </div>

                    <div class="list-featrue lg:mt-10 mt-6">
                        <div class="heading6">Характеристики:</div>
                        <div class="text-secondary mt-2">{{$phone->description}}</div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection