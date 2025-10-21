@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Регистрация</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Регистрация</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="mt-2 text-secondary text-center">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="register-block md:py-20 py-10">
    <div class="container">
        <div class="content-main flex gap-y-8 max-md:flex-col">
            <div class="left md:w-1/2 w-full lg:pr-[60px] md:pr-[40px] md:border-r border-line">
                <div class="heading4">Регистрация</div>
                <form class="md:mt-7 mt-4" method="POST" action={{ route('signup.store') }}>
                    @csrf

                    <div class="name">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" 
                        id="name" 
                        type="text"
                        name="name"
                        placeholder="Введите ваше имя (не более 10 символов) *" required />
                    </div>
                    <div class="email mt-5">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="email" 
                        name="email"
                        type="email" placeholder="Адрес электронной почты *" required />
                    </div>
                    <div class="pass mt-5">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="password" 
                        name="password"
                        type="password" placeholder="Пароль *" required />
                    </div>
                    <div class="confirm-pass mt-5">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" 
                        name="password_confirmation"
                        id="confirmPassword" type="password" placeholder="Повторите пароль *" required />
                    </div>
                    <div class="flex items-center mt-5">
                        <div class="block-input">
                            <input type="checkbox" name="remember" id="remember" />
                            <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                        </div>
                        <label for="remember" class="pl-2 cursor-pointer text-secondary2"
                            >Я согласен с 
                            <a href="#!" class="text-black hover:underline pl-1">Условиями использования</a>
                        </label>
                    </div>
                    <div class="block-button md:mt-7 mt-4">
                        <button class="button-main">Регистрация</button>
                    </div>
                </form>
            </div>
            <div class="right md:w-1/2 w-full lg:pl-[60px] md:pl-[40px] flex items-center">
                <div class="text-content">
                    <div class="heading4">У вас уже есть аккаунта?</div>
                    <div class="mt-2 text-secondary">Добро пожаловать! Войдите в систему, чтобы получить доступ к нашим товарам. Мы очень рады, что вы снова с нами!</div>
                    <div class="block-button md:mt-7 mt-4">
                        <a href={{ route('signin') }} class="button-main">Вход</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection