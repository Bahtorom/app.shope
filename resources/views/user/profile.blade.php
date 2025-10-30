@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Профиль</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Профиль</div>
                    </div>
                </div>
            </div> 
        </div>
        @if (session('success_up'))
            <div class="py-3 font-medium text-center text-secondary">
                <b>{{ session('success_up') }}</b>
            </div>
        @endif
        @if (session('success'))
            <div class="py-3 font-medium text-center text-secondary">
                {{ session('success') }}
            </div>
        @endif  
    </div>
</div>

<div class="my-account-block md:py-20 py-10">
    <div class="container">
        <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
            <div class="left xl:w-1/3 md:w-5/12 w-full xl:pr-[40px] lg:pr-[28px] md:pr-[16px]">
                <div class="user-infor bg-surface md:px-8 px-5 md:py-10 py-6 md:rounded-[20px] rounded-xl">
                    <div class="heading flex flex-col items-center justify-center">
                        {{-- <div class="avatar">
                            <img src="./assets/images/avatar/1.png" alt="avatar" class="md:w-[140px] w-[120px] md:h-[140px] h-[120px] rounded-full" />
                        </div> --}}
                        <div class="name heading6 mt-4 text-center">{{ $user->name }}</div>
                        <div class="mail heading6 font-normal normal-case text-center mt-1">{{ $user->email }}</div>
                    </div>
                    <div class="menu-tab lg:mt-10 mt-6">
                        <div class="item px-5 py-4 flex items-center gap-3 cursor-pointer">
                            <i class="ph-bold ph-user text-xl"></i>
                            <div class="heading6">Реквизиты</div>
                        </div>
                        <div class="item px-5 py-4 flex items-center gap-3 cursor-pointer mt-2">
                            <i class="ph-bold ph-bag text-xl"></i>
                            <div class="heading6">Заказы</div>
                        </div>
                        <div class="item px-5 py-4 flex items-center gap-3 cursor-pointer mt-2">
                            <i class="ph-bold ph-sign-out text-xl"></i>
                            <div class="heading6">Выход</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="right xl:w-2/3 md:w-7/12 w-full xl:pl-[40px] lg:pl-[28px] md:pl-[16px] flex items-center">
                <div class="text-content w-full">
                    <form action="{{ route('profile.update', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="heading5 pb-4">Информация</div>
                        <div class="grid sm:grid-cols-2 gap-4 gap-y-5">
                            <div class="name">
                                <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="name" name="name" type="text" placeholder="Псевдоним" value="{{ old('name', $user?->name ?? '') }}" required />
                                @error('name')
                                    <div class="py-3 font-medium text-center text-red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="first-name">
                                <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="firstName" name="first_name" type="text" value="{{ old('first_name', $user?->first_name ?? '') }}" placeholder="Имя" />
                                @error('first_name')
                                    <div class="py-3 font-medium text-center text-red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="last-name">
                                <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="lastName" name="last_name" type="text" value="{{ old('last_name', $user?->last_name ?? '') }}" placeholder="Фамилия" />
                                @error('last_name')
                                    <div class="py-3 font-medium text-center text-red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="email">
                                <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="email" name="email" type="email" value="{{ old('email', $user?->email ?? '') }}" placeholder="Email" required />
                                 @error('email')
                                    <div class="py-3 font-medium text-center text-red">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="val_phone">
                                <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="val_phone"  name="val_phone" type="text" value="{{ old('val_phone', $user?->val_phone ?? '') }}" placeholder="Номер телефона" />
                                @error('val_phone')
                                    <div class="py-3 font-medium text-center text-red">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="block-button lg:mt-10 mt-6">
                            <button class="button-main">Обновить учетную запись</button>
                        </div>
                    </form>
                    
                    <form action="{{ route('profile.updatepassword', $user) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="heading5 pb-4 lg:mt-10 mt-6">Сменить пароль</div>
                        <div class="pass">
                            <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="current_password" type="password" name="current_password" placeholder="Старый пароль *" required />
                            @error('current_password')
                                <div class="py-3 font-medium text-center text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="new-pass mt-5">
                            <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="newPassword" type="password" name="password" placeholder="Новый пароль *" required />
                            @error('password')
                                <div class="py-3 font-medium text-center text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="confirm-pass mt-5">
                            <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="confirmPassword" type="password" name="password_confirmation" placeholder="Подтвердите пароль *" required />
                            @error('password_confirmation')
                                <div class="py-3 font-medium text-center text-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="block-button lg:mt-10 mt-6">
                            <button class="button-main">Обновить пароль</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection