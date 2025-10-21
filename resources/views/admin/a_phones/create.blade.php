@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Добавить товар</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <a href={{ route('a_phones.index') }}>Товары</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Добавить</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        

<div class="my-account-block md:py-20 py-10">
    <div class="container">
        <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
        
            {{-- <div class="left xl:w-1/3 md:w-5/12 w-full xl:pr-[40px] lg:pr-[28px] md:pr-[16px]">
                <div class="user-infor bg-surface md:px-8 px-5 md:py-10 py-6 md:rounded-[20px] rounded-xl">
                    <div class="heading flex flex-col items-center justify-center">
                        <div class="avatar">
                            <img src="./assets/images/avatar/1.png" alt="avatar" class="md:w-[140px] w-[120px] md:h-[140px] h-[120px] rounded-full" />
                        </div>
                        <div class="name heading6 mt-4 text-center">Tony Nguyen</div>
                        <div class="mail heading6 font-normal normal-case text-center mt-1">hi.avitex@gmail.com</div>
                    </div>
                    <div class="menu-tab lg:mt-10 mt-6">
                        <div class="item px-5 py-4 flex items-center gap-3 cursor-pointer">
                            <i class="ph-bold ph-user text-xl"></i>
                            <div class="heading6">Account Details</div>
                        </div>
                        <div class="item px-5 py-4 flex items-center gap-3 cursor-pointer mt-2">
                            <i class="ph-bold ph-bag text-xl"></i>
                            <div class="heading6">Your Orders</div>
                        </div>
                        <div class="item px-5 py-4 flex items-center gap-3 cursor-pointer mt-2">
                            <i class="ph-bold ph-map-pin text-xl"></i>
                            <div class="heading6">My Address</div>
                        </div>
                        <div class="item px-5 py-4 flex items-center gap-3 cursor-pointer mt-2">
                            <i class="ph-bold ph-sign-out text-xl"></i>
                            <div class="heading6">Logout</div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="right max-w-4xl w-full mx-auto px-4 md:px-6 lg:px-10">
                <div class="text-content w-full">
                    <form action="{{ route('a_phones.store') }}" method='POST' enctype="multipart/form-data">
                        @csrf
                        <div class="grid sm:grid-cols-3 gap-4 gap-y-5">
                           
                            <!-- Строка 1 -->
                           
                            <div class=" py-3 font-medium text-center">
                                <b>Бренд</b>
                            </div>
                            <div>
                                <input type="text" id="value1" name="brand" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" placeholder="Введите или выберите..." required>
                            </div>
                            
                            <div class="relative w-full sm:w-auto">
                                <select id="select1" class="border border-line px-4 py-3 w-full rounded-lg appearance-none bg-transparent pr-10">
                                    <option value="">— Варианты —</option>
                                </select>
                                <i class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-xl pointer-events-none"></i>
                            </div>
                            

                            <!-- Строка 2 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Серия</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" id="value2" name="series" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" disabled required>
                            </div>
                            <div class="relative w-full sm:w-auto">
                                <select id="select2"  class="border border-line px-4 py-3 w-full rounded-lg appearance-none bg-transparent pr-10" disabled>
                                <option value="">— Сначала заполните первое поле —</option>
                                </select>
                                <i class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-xl pointer-events-none"></i>
                            </div>

                            <!-- Строка 3 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Поколение</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" id="value3" name="generation" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" disabled>
                            </div>
                            <div class="relative w-full sm:w-auto">
                                <select id="select3"  class="border border-line px-4 py-3 w-full rounded-lg appearance-none bg-transparent pr-10" disabled>
                                <option value="">— Сначала заполните первое поле —</option>
                                </select>
                                <i class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-xl pointer-events-none"></i>
                            </div>
                            
                            {{--         --}}       
                            <!-- Строка 4 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Вариант</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" id="value4" name="variant" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            </div>
                            <div class="relative w-full sm:w-auto">
                                <select id="select4"  class="border border-line px-4 py-3 w-full rounded-lg appearance-none bg-transparent pr-10" disabled>
                                <option value="">— Сначала заполните первое поле —</option>
                                </select>
                                <i class="ph-bold ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-xl pointer-events-none"></i>
                            </div>
                            
                            {{--         --}}      
                            <div class=" py-3 font-medium text-center">
                                <b>Цена</b>
                            </div>
                            <div>
                                <input type="text" id="value5" name="price" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" placeholder="Введите..." required>
                            </div>
                            <div></div>

                            <div class=" py-3 font-medium text-center">
                                <b>Количество</b>
                            </div>
                            <div>
                                <input type="text" id="value6" name="stock" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" placeholder="Введите..." required>
                            </div>
                            <div></div>
                     
                            <div class=" py-3 font-medium text-center">
                                <b>Изображение </b>
                            </div>
                            <div>
                                <input 
                                    type="file" 
                                    id="value7" 
                                    name="image" 
                                    class="border-line px-4 pt-3 pb-3 w-full rounded-lg"
                                    accept="image/*"
                                >
                            </div>

                     
                        </div>
                        <div class="block-button lg:mt-10 mt-6 text-center">
                            <button class="button-main">Сохранить товар</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection