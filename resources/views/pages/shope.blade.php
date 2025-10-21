@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-img">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">IPhone</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href="index.html">Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">IPhone</div>
                    </div>
                </div>
            </div>
            <div class="bg-img absolute top-2 -right-6 max-lg:bottom-0 max-lg:top-auto w-1/3 max-lg:w-[26%] z-[0] max-sm:w-[45%]">
                <img src="/assets/images/title/iphone.webp" alt="img" class="" />
            </div>
        </div>
    </div>
</div>

<br>

<br>
<div class="list-product-block style-grid grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-4 gap-6 justify-center">

    <!-- Карточка 1  300x400 px или 400x500 px -->
    <div class="product-item group w-full max-w-xs"> <!-- max-w-xs = ~320px -->
        <div class="flex gap-4"> <!-- уменьшили gap между изображением и текстом -->
            <div class="product-img relative overflow-hidden rounded-lg w-24 h-24"> <!-- фиксированная маленькая картинка -->
                <img
                    src="/assets/images/title/iphone.webp"
                    alt="Casual T-Shirt"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                />
                <div class="action-btns absolute top-2 right-2 flex flex-col gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button class="w-7 h-7 flex items-center justify-center bg-white rounded-full shadow-sm hover:bg-gray-100">
                        <i class="ph ph-heart text-xs text-secondary2"></i>
                    </button>
                    <button class="w-7 h-7 flex items-center justify-center bg-white rounded-full shadow-sm hover:bg-gray-100">
                        <i class="ph ph-shopping-cart text-xs text-secondary2"></i>
                    </button>
                </div>
                <div class="sale-tag absolute top-2 left-2 bg-red-500 text-white text-[10px] font-bold px-1 py-0.5 rounded">
                    -20%
                </div>
            </div>

            <div class="product-info flex-1 min-w-0"> <!-- min-w-0 чтобы текст не вылезал -->
                <div class="category caption2 text-secondary2 truncate">T-Shirt</div>
                <h3 class="title heading6 mt-1 truncate">
                    <a href="#" class="hover:text-primary transition-colors">Casual Cotton T-Shirt</a>
                </h3>
                <div class="price mt-1 flex items-center gap-1">
                    <span class="heading6 font-bold text-primary">$24.99</span>
                    <span class="caption2 text-secondary2 line-through">$31.99</span>
                </div>
                <div class="rating flex items-center mt-1">
                    <div class="flex text-amber-400">
                        <i class="ph-fill ph-star text-xs"></i>
                        <i class="ph-fill ph-star text-xs"></i>
                        <i class="ph-fill ph-star text-xs"></i>
                        <i class="ph-fill ph-star text-xs"></i>
                        <i class="ph ph-star text-xs"></i>
                    </div>
                    <span class="caption2 text-secondary2 ml-1">(42)</span>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary py-1 px-3 rounded-full text-xs font-medium">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Карточка 2 -->
    <div class="product-item group w-full max-w-xs">
        <!-- Повторите структуру выше -->
               <div class="flex gap-4"> <!-- уменьшили gap между изображением и текстом -->
            <div class="product-img relative overflow-hidden rounded-lg w-24 h-24"> <!-- фиксированная маленькая картинка -->
                <img
                    src="/assets/images/title/iphone.webp"
                    alt="Casual T-Shirt"
                    class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                />
                <div class="action-btns absolute top-2 right-2 flex flex-col gap-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                    <button class="w-7 h-7 flex items-center justify-center bg-white rounded-full shadow-sm hover:bg-gray-100">
                        <i class="ph ph-heart text-xs text-secondary2"></i>
                    </button>
                    <button class="w-7 h-7 flex items-center justify-center bg-white rounded-full shadow-sm hover:bg-gray-100">
                        <i class="ph ph-shopping-cart text-xs text-secondary2"></i>
                    </button>
                </div>
                <div class="sale-tag absolute top-2 left-2 bg-red-500 text-white text-[10px] font-bold px-1 py-0.5 rounded">
                    -20%
                </div>
            </div>

            <div class="product-info flex-1 min-w-0"> <!-- min-w-0 чтобы текст не вылезал -->
                <div class="category caption2 text-secondary2 truncate">T-Shirt</div>
                <h3 class="title heading6 mt-1 truncate">
                    <a href="#" class="hover:text-primary transition-colors">Casual Cotton T-Shirt</a>
                </h3>
                <div class="price mt-1 flex items-center gap-1">
                    <span class="heading6 font-bold text-primary">$24.99</span>
                    <span class="caption2 text-secondary2 line-through">$31.99</span>
                </div>
                <div class="rating flex items-center mt-1">
                    <div class="flex text-amber-400">
                        <i class="ph-fill ph-star text-xs"></i>
                        <i class="ph-fill ph-star text-xs"></i>
                        <i class="ph-fill ph-star text-xs"></i>
                        <i class="ph-fill ph-star text-xs"></i>
                        <i class="ph ph-star text-xs"></i>
                    </div>
                    <span class="caption2 text-secondary2 ml-1">(42)</span>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary py-1 px-3 rounded-full text-xs font-medium">
                        Add to Cart
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Карточка 3 -->
    <div class="product-item group w-full max-w-xs">
        <!-- ... -->
    </div>

    <!-- Карточка 4 -->
    <div class="product-item group w-full max-w-xs">
        <!-- ... -->
    </div>

</div>
<br>
<br>
@endsection