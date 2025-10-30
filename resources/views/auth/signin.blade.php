@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Вход</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Аутентификация</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
<div class="login-block md:py-20 py-10">
    <div class="container">
        <div class="content-main flex gap-y-8 max-md:flex-col">
            <div class="left md:w-1/2 w-full lg:pr-[60px] md:pr-[40px] md:border-r border-line">
                <div class="heading4">Логин</div>
                <form class="md:mt-7 mt-4" method="POST" action={{ route('login') }}>
                    @csrf
                        @if ($errors->has('email'))
                            <div class="mt-2 text-secondary">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    <div class="email">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="username" type="email" name="email" placeholder="Имя пользователя или адрес электронной почты *" required />
                    </div>
                    <div class="pass mt-5">
                        <input class="border-line px-4 pt-3 pb-3 w-full rounded-lg" id="password" type="password" name= "password" placeholder="Пароль *" required />
                    </div>
                    <div class="flex items-center justify-between mt-5">
                        <div class="flex items-center">
                            <div class="block-input">
                                <input type="checkbox" name="remember" id="remember" />
                                <i class="ph-fill ph-check-square icon-checkbox text-2xl"></i>
                            </div>
                            <label for="remember" class="pl-2 cursor-pointer">Запомнить меня</label>
                        </div>
                        <a href="#!" class="font-semibold hover:underline">Забыли свой пароль? </a>
                    </div>
                    <div class="block-button md:mt-7 mt-4">
                        <button class="button-main">Вход</button>
                    </div>
                </form>
            </div>
            <div class="right md:w-1/2 w-full lg:pl-[60px] md:pl-[40px] flex items-center">
                <div class="text-content">
                    <div class="heading4">Новый клиент!</div>
                    <div class="mt-2 text-secondary">Станьте частью нашей растущей семьи новых клиентов! Присоединяйтесь к нам сегодня и откройте для себя мир эксклюзивных преимуществ, предложений и индивидуального подхода.</div>
                    <div class="block-button md:mt-7 mt-4">
                        <a href={{ route('signup') }} class="button-main">Регистрация</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection