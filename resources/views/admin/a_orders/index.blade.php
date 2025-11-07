@extends('layout.app')


@section('content')

<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Заявки</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Заявки</div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

@if (session('success'))
        <div class="py-3 font-medium text-center text-secondary">
            {{ session('success') }}
        </div>
@endif  

@foreach ($orders as $order)
    <div class="product-item item py-5 flex items-center justify-between gap-3 border-b border-line pr-8 ">
        <div class="infor flex items-center gap-5">
            <div class="bg-img pl-8">
                <img src="{{ asset('storage/'. $order->phone->image) }}" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
            </div>
            <div class="heading6 px-6 pb-3">{{$order->phone->brand}} {{$order->phone->series}} {{$order->phone->generation}} {{$order->phone->variant}}</div>       
            <div class="heading6 px-6 pb-3">{{ number_format(($order->phone->price), 0, '', ' ') }} р</div>       
            <div class="heading6 px-6 pb-3">{{ $order->quantity }} шт.</div>       
            <div class="heading6 px-6 pb-3">{{ $order->user->name }}</div>         
        </div>
        <div class="block-button flex gap-5">
            <form action="{{ route('a_orders.update', $order) }}" method="POST" class="inline-block">
                @csrf
                @method('PUT')
                <button class="button-main rounded-full">Потдтвердить</button>
            </form>
            <form action="{{ route('a_orders.destroy', $order) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button class="button-main rounded-full">Отклонить</button>
            </form>
        </div>
    </div>
@endforeach




@endsection