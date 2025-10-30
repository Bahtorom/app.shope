@extends('layout.app')

@section('content')

<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Баланс</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Профиль</div>
                    </div>
                    <div class="heading2 text-center md:py-10 py-10">{{ number_format(($user->deposit), 0, '', ' ') }} ₽ </div>
                </div>
            </div> 
        </div>
    </div>
</div>



<div class="my-account-block md:py-10 py-10">
    <div class="container">
        <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
            <div class="right max-w-4xl w-full mx-auto px-4 md:px-6 lg:px-10">
                <div class="heading3 text-center">Внести депозит</div>
                <div class="text-content w-full md:py-20 py-10">
                     @if ($errors->any())
                    <div class=" py-3 font-medium text-center text-red">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li><b>{{ $error }}</b></li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form action="{{ route('balance.store') }}" method='POST' enctype="multipart/form-data">
                        @csrf
                        <div class="grid sm:grid-cols-2 gap-4 gap-y-5">
                            <div class=" py-3 font-medium text-center">
                                <b>Номер телефона</b>
                            </div>
                            <div>
                                <input type="text" id="val_phone" name="val_phone" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" placeholder="+7 и без пробелов" required>
                            </div>
                            <div class=" py-3 font-medium text-center">
                                <b>Сумма</b>
                            </div>
                            <div>
                                <input type="text" id="deposit" name="deposit" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" placeholder="Введите сумму" required>
                            </div>
                        </div>
                        <div class="block-button lg:mt-10 mt-6 text-center">
                            <button class="button-main">Пополнить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>    
@endsection