@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Редактиировать товар</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <a href={{ route('a_phones.index') }}>Товары</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Редактировать</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        

<div class="my-account-block md:py-20 py-10">
    <div class="container">
        <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
            <div class="right max-w-4xl w-full mx-auto px-4 md:px-6 lg:px-10">
                <div class="text-content w-full">
                    <form action="{{ route('a_phones.update', $a_phone->id) }}" method='POST' enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="grid sm:grid-cols-3 gap-4 gap-y-5">

                            <!-- Строка 1 -->
                           
                            <div class=" py-3 font-medium text-center">
                                <b>Бренд</b>
                            </div>
                            <div>
                                <input type="text"name="brand" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" value="{{ $a_phone->brand }}" required>
                            </div>
                            
                            <div class=" py-3 font-medium text-center">
                                {{ $a_phone->brand }}
                            </div>
                            

                            <!-- Строка 2 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Серия</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="series" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" value="{{ $a_phone->series }}" required>
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_phone->series }}
                            </div>

                            <!-- Строка 3 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Поколение</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="generation" value="{{ $a_phone->generation }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_phone->generation }}
                            </div>
                            
                            {{--         --}}       
                            <!-- Строка 4 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Вариант</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="variant" value="{{ $a_phone->variant }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_phone->variant }}
                            </div>
                            

                            <!-- Строка 5 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Цвет</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="color" value="{{ $a_phone->color }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_phone->color }}
                            </div>
                            
                            <!-- Строка 6 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Память</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="memory" value="{{ $a_phone->memory }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_phone->memory }}
                            </div>
                            
                            {{--         --}}      
                            <div class=" py-3 font-medium text-center">
                                <b>Цена</b>
                            </div>

                            <div>
                                <input type="text"  name="price" value="{{ $a_phone->price }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" >
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_phone->memory }}
                            </div>

                            {{--         --}}  
                            <div class=" py-3 font-medium text-center">
                                <b>Количество</b>
                            </div>
                            <div>
                                <input type="text" value="{{ $a_phone->stock }}" name="stock" class="border-line px-4 pt-3 pb-3 w-full rounded-lg"  >
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_phone->stock }}
                            </div>

                            {{--         --}}  

                            <div class=" py-3 font-medium text-center">
                                <b>Описание</b>
                            </div>

                            <div>
                                <textarea value="{{ $a_phone->description }}" name="description" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" ></textarea>
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_phone->description }}
                            </div>

                            {{--         --}}  

                     
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
                            <div class="bg-img px-12">
                                <img src="{{ asset('storage/'. $a_phone->image) }}" alt="img" class="w-[100px] aspect-square flex-shrink-0 rounded-lg" />
                            </div>

                     
                        </div>
                        <div class="block-button lg:mt-10 mt-6 text-center">
                            <button class="button-main">Обновить товар</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection