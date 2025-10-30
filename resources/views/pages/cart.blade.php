@extends('layout.app')


@section('content')

<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Корзина</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Корзина</div>
                    </div>
                    <div class="heading5 text-center md:py-10 py-10">{{'баланс: ' . number_format(($user->deposit), 0, '', ' ') }} ₽ </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@if ($cartItems->isEmpty())
    <div class="heading5 px-6 pb-3">Корзина пуста</div> 

@else
    @foreach ($cartItems as $item)
        <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line pr-8 ">
            <div class="infor flex items-center gap-5">
                <div class="bg-img pl-8">
                    <img src="{{ asset('storage/'. $item->phone->image) }}" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                </div>
                <div class="heading5 px-6 pb-3">{{$item->phone->brand}} {{$item->phone->series}} {{$item->phone->generation}} {{$item->phone->variant}}</div>       
                <div class="heading5 px-6 pb-3">{{ number_format(($item->phone->price), 0, '', ' ') }} р</div>       
                <div class="heading5 px-6 pb-3">{{ $item->quantity }} шт.</div>       
            </div>
            <div class="block-button flex gap-5">
                <button class="button-main rounded-full">Просмотр</button>
                <button class="button-main rounded-full">Купить</button>
                <button class="button-main rounded-full">Удалить</button>
            </div>
        </div>
    @endforeach
@endif



@endsection