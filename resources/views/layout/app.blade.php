<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>App.Shope</title>
        <link rel="shortcut icon" href="/assets/images/fav.png" type="image/x-icon" />
        <link rel="stylesheet" href="/assets/css/swiper-bundle.min.css" />
        <link rel="stylesheet" href="/assets/css/style.css" />
        <link rel="stylesheet" href="/dist/output-scss.css" />
        <link rel="stylesheet" href="/dist/output-tailwind.css" />
    </head>

    <body>

        
        <div id="top-nav" class="top-nav style-one bg-black md:h-[44px] h-[30px]">
            <div class="container mx-auto h-full">
                <div class="top-nav-main flex justify-between max-md:justify-center h-full">
                    <div class="left-content flex items-center gap-5 max-md:hidden">
                        <div class="choose-type choose-language flex items-center gap-1.5">
                            <div class="select relative">
                                <p class="selected caption2 text-white">Russian</p>
                                <ul class="list-option bg-white">
                                    <li data-item="English" class="caption2 active">Russian</li>
                                    <li data-item="France" class="caption2">English</li>
                                </ul>
                            </div>
                            <i class="ph ph-caret-down text-xs text-white"></i>
                        </div>
                        <div class="choose-type choose-currency flex items-center gap-1.5">
                            <div class="select relative">
                                <p class="selected caption2 text-white">RUB</p>
                                <ul class="list-option bg-white">
                                    <li data-item="USD" class="caption2 active">USD</li>
                                    <li data-item="EUR" class="caption2">EUR</li>
                                </ul>
                            </div>
                            <i class="ph ph-caret-down text-xs text-white"></i>
                        </div>
                    </div>
                    <div class="text-center text-button-uppercase text-white flex items-center">Новые клиенты экономят 10% с промокодом GET10</div>
                    <div class="right-content flex items-center gap-5 max-md:hidden">
                        <a href="https://www.facebook.com/" target="_blank">
                            <i class="icon-facebook text-white"></i>
                        </a>
                        <a href="https://www.instagram.com/" target="_blank">
                            <i class="icon-instagram text-white"></i>
                        </a>
                        <a href="https://www.youtube.com/" target="_blank">
                            <i class="icon-youtube text-white"></i>
                        </a>
                        <a href="https://twitter.com/" target="_blank">
                            <i class="icon-twitter text-white"></i>
                        </a>
                        <a href="https://pinterest.com/" target="_blank">
                            <i class="icon-pinterest text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        
        <div id="header" class="relative w-full">
            <div class="header-menu style-one absolute top-0 left-0 right-0 w-full md:h-[74px] h-[56px] bg-transparent">
                <div class="container mx-auto h-full">
                    <div class="header-main flex justify-between h-full">
                        <div class="menu-mobile-icon lg:hidden flex items-center">
                            <i class="icon-category text-2xl"></i>
                        </div>
                        <div class="left flex items-center gap-16">
                            <a href={{ route('pages.main') }} class="flex items-center max-lg:absolute max-lg:left-1/2 max-lg:-translate-x-1/2">
                                <div class="heading4">App.Shope</div>
                            </a>
                            <div class="menu-main h-full max-lg:hidden">
                                <ul class="flex items-center gap-8 h-full">
                                    <li class="h-full relative">
                                        <a href={{ route('pages.shope', ['brand' => 'Apple'] ) }} class="text-button-uppercase duration-300 h-full flex items-center justify-center"> Apple </a>
                                        <div class="mega-menu absolute top-[74px] left-0 bg-white w-screen">
                                            <div class="container">
                                                <div class="flex justify-between py-8">
                                                    <div class="nav-link basis-2/3 grid grid-cols-4 gap-y-8">
                                                        <div class="nav-item">
                                                            <div class="text-button-uppercase pb-2">IPhone</div>
                                                            <ul>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'IPhone', 'generation' => '17']) }} class="link text-secondary duration-300 cursor-pointer">IPhone 17 </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'IPhone', 'generation' => '16']) }} class="link text-secondary duration-300 cursor-pointer"> IPhone 16 </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'IPhone', 'generation' => '15']) }} class="link text-secondary duration-300 cursor-pointer"> IPhone 15  </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'IPhone', 'generation' => '14']) }} class="link text-secondary duration-300 cursor-pointer"> IPhone 14 </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'IPhone']) }} class="link text-secondary duration-300 view-all-btn"> All </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nav-item">
                                                            <div class="text-button-uppercase pb-2">MacBook</div>
                                                            <ul>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'MacBook', 'generation' => 'Air']) }} class="link text-secondary duration-300 cursor-pointer"> MacBook Air </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'MacBook', 'generation' => 'Pro']) }} class="link text-secondary duration-300 cursor-pointer"> MacBook Pro </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'iMac']) }} class="link text-secondary duration-300 cursor-pointer"> iMac </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'MacBook' ]) }} class="link text-secondary duration-300 view-all-btn"> All </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="nav-item">
                                                            <div class="text-button-uppercase pb-2">Watch</div>
                                                            <ul>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'Watch', 'generation' => 'Ultra', 'variant' => '3'])}} class="link text-secondary duration-300 cursor-pointer"> Watch Ultra 3 </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'Watch', 'generation' => 'Series', 'variant' => '11']) }} class="link text-secondary duration-300 cursor-pointer"> Watch Series 11 </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'Watch', 'generation' => 'SE', 'variant' => '3']) }} class="link text-secondary duration-300 cursor-pointer"> Watch SE 3  </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'Watch', 'generation' => 'Series', 'variant' => '10']) }} class="link text-secondary duration-300 cursor-pointer"> Watch Series 10 </a>
                                                                </li>
                                                                <li>
                                                                    <a href={{ route('pages.shope', ['brand' => 'Apple', 'series' => 'Watch']) }} class="link text-secondary duration-300 view-all-btn"> All</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="h-full">
                                        <a href="#!" class="text-button-uppercase duration-300 h-full flex items-center justify-center"> Samsung </a>
                                    </li>

                                    <li class="h-full">
                                        <a href="#!" class="text-button-uppercase duration-300 h-full flex items-center justify-center"> Dyson </a>
                                    </li>

                                    <li class="h-full relative">
                                        <a href="#!" class="text-button-uppercase duration-300 h-full flex items-center justify-center"> Huawei </a> 
                                    </li>

                                    <li class="h-full relative">
                                        <a href="#!" class="text-button-uppercase duration-300 h-full flex items-center justify-center"> Xiaomi </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                     
                        <!-- Поиск -->
                        <div class="right flex gap-12">
                            <div class="max-md:hidden search-icon flex items-center cursor-pointer relative">
                                <i class="ph-bold ph-magnifying-glass text-2xl"></i>
                                <div class="line absolute bg-line w-px h-6 -right-6"></div>
                            </div>

                            <!-- Вход -->
                            <div class="list-action flex items-center gap-4">
                                @auth

                                  
                                    <div><b>{{Auth::user()->name}}</b></div>
                                    <div class="user-icon flex items-center justify-center cursor-pointer">
                                        <i class="ph-bold ph-user text-2xl"></i>
                                        <div class="login-popup absolute top-[74px] w-[320px] p-7 rounded-xl bg-white box-shadow-small">
                                            <div class="flex flex-col gap-0.5">
                                            <a href={{ route('profile.index') }} class="button-main w-full text-center ">Профиль</a>
                                            <a href={{ route('balance.index') }} class="button-main w-full bg-secondary text-center ">Баланс</a>
                                            <a href={{ route('orders.index') }} class="button-main w-full bg-secondary text-center ">Покупки</a>
                                            <form method="POST" action={{ route('logout') }}>
                                                @csrf
                                                <button type="submit" class="button-main w-full bg-white border border-black text-black text-center uppercase">Выход</button>
                                            </form>
                                            </div>
                                            <div class="bottom pt-4 border-t border-line"></div>
                                            <a href="#!" class="body1 hover:underline">Поддержка</a>
                                        </div>
                                    </div>    
                                    @if (Auth::check() && (Auth::user()->isAdmin()))
                                        <div class="lightbulb-icon flex items-center justify-center cursor-pointer">
                                            <i class="ph-bold ph-lightbulb text-2xl"></i>
                                            <div class="bulb-popup absolute top-[74px] w-[320px] p-7 rounded-xl bg-white box-shadow-small">
                                                <div class="flex flex-col gap-0.5">
                                                    <a href={{ route('admin.dashboard') }} class="button-main w-full bg-white border border-black text-black text-center uppercase">Главная</a>
                                                    <a href={{ route('a_users.index') }} class="button-main bg-secondary w-full text-center ">Клиенты</a>
                                                    <a href={{ route('a_phones.index') }} class="button-main bg-secondary w-full text-center ">Продукты</a>
                                                    <a href={{ route('a_orders.index') }} class="button-main w-full text-center ">Заявки</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif 
                                @else
                                    <div class="user-icon flex items-center justify-center cursor-pointer">
                                        <i class="ph-bold ph-user text-2xl"></i>
                                        <div class="login-popup absolute top-[74px] w-[320px] p-7 rounded-xl bg-white box-shadow-small">
                                            <a href={{ route('signin') }} class="button-main w-full text-center">Вход</a>
                                            <div class="text-secondary text-center mt-3 pb-4">
                                                У вас нет аккаунта?
                                                <a href={{ route('signup') }} class="text-black pl-1 hover:underline">Зарегистрируйтесь </a>
                                            </div>
                                            <div class="bottom pt-4 border-t border-line"></div>
                                            <a href="#!" class="body1 hover:underline">Поддержка</a>
                                        </div>
                                    </div>

                                @endauth

                                <!-- Избранное -->
                                {{-- <div class="max-md:hidden wishlist-icon flex items-center relative cursor-pointer">
                                    <i class="ph-bold ph-heart text-2xl"></i>
                                    <span class="quantity wishlist-quantity absolute -right-1.5 -top-1.5 text-xs text-white bg-black w-4 h-4 flex items-center justify-center rounded-full">2</span>
                                </div> --}}
                                <!-- Корзина -->
                                <div class="max-md:hidden cart-icon flex items-center relative cursor-pointer">
                                    <a href="{{ route('pages.cart') }}" class="ph-bold ph-handbag text-2xl"></a>
                                    <span class="quantity cart-quantity absolute -right-1.5 -top-1.5 text-xs text-white bg-black w-4 h-4 flex items-center justify-center rounded-full">{{$cartCount}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


       
            @yield('content')  

            
            <div id="footer" class="footer mt-4">
            <div class="footer-main bg-surface">
                <div class="container">
                    <div class="footer-bottom py-3 flex items-center justify-between gap-5 max-lg:justify-center max-lg:flex-col border-t border-line">
                        <div class="left flex items-center gap-8">
                            <div class="copyright caption1 text-secondary">©2025 App.Shope. Все права защищены.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        

        @include('partials.modal')
      

        <script src="/assets/js/phosphor-icons.js"></script>
        <script src="/assets/js/swiper-bundle.min.js"></script>
        <script src="/assets/js/main.js"></script>
        <script src="/assets/js/custom.js"></script>
    </body>
</html>
