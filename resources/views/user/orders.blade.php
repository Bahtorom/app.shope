@extends('layout.app')

@section('content')

<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Покупки</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Покупки</div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div>

<div class="overflow-x-auto rounded-lg border border-line">
    <table class="w-full text-center text-sm">
        <thead class="bg-silver">
            <tr>
                <th class="px-5 py-3 font-semibold text-black">Заказ</th>
                <th class="px-5 py-3 font-semibold text-black">Фото</th>
                <th class="px-5 py-3 font-semibold text-black">Модель</th>
                <th class="px-5 py-3 font-semibold text-black">Прайс</th>
                <th class="px-5 py-3 font-semibold text-black">Дата</th>
                <th class="px-5 py-3 font-semibold text-black">Количество</th>
                <th class="px-5 py-3 font-semibold text-black">Статус</th>
                <th class="px-5 py-3 font-semibold text-black">Действия</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-line">
            @foreach ($orders as $order)
                <tr>
                    <td class="px-5 py-4">{{ $order->id }}</td>
                    <td class="px-5 py-4">
                        <img src="{{ asset('storage/'. $order->phone->image) }}" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                    </td>
                    <td class="px-5 py-4">{{$order->phone->brand}} {{$order->phone->series}} {{$order->phone->generation}} {{$order->phone->variant}}</td>
                    
                    <td class="px-5 py-4"> {{ number_format(($order->phone->price), 0, '', ' ') }} р </td>
                    <td class="px-5 py-4">{{ $order->purchased_at }}</td>
                    <td class="px-5 py-4">{{ $order->quantity}} шт.</td>
                    <td class="px-5 py-4"> 
                        <span class="rounded-full py-1.5 px-8 w-full    @if ($order->status == 'paid') bg-success
                                                                        @elseif($order->status == 'pending') bg-yellow
                                                                        @elseif($order->status == 'cancel') bg-red
                                                                        @else bg-orange 
                                                                        @endif text-white">
                            @if ($order->status == 'paid')  Оплачено
                            @elseif($order->status == 'pending') В процессе
                            @elseif($order->status == 'cancel') Отказано
                            @else В отмене
                            @endif
                        </span>
                    </td>
                    <td class="px-5 py-4">
                        @if ($order->status == 'pending')
                            <form action="{{ route('orders.destroy', $order->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="flex items-center justify-center p-1 rounded">
                                    <i class="ph-bold ph-trash text-2xl"></i>
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
   
@endsection