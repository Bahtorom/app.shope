@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Редактировать пользователя</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <a href={{ route('a_users.index') }}>Клиенты</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Редактировать</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        
@if ($errors->any())
    <div class=" py-3 font-medium text-center text-red">
        <ul>
            @foreach ($errors->all() as $error)
                <li><b>{{ $error }}</b></li>
            @endforeach
        </ul>
    </div>
@endif

<div class="my-account-block md:py-20 py-10">
    <div class="container">
        <div class="content-main lg:px-[60px] md:px-4 flex gap-y-8 max-md:flex-col w-full">
            <div class="right max-w-4xl w-full mx-auto px-4 md:px-6 lg:px-10">
                <div class="text-content w-full">
                    <form action="{{ route('a_users.update', $a_user->id) }}" method='POST' enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="grid sm:grid-cols-3 gap-4 gap-y-5">

                            <!-- Строка 1 -->
                           
                            <div class=" py-3 font-medium text-center">
                                <b>Никнейм</b>
                            </div>
                            <div>
                                <input type="text"name="name" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" value="{{ $a_user->name }}" required>
                            </div>
                            
                            <div class=" py-3 font-medium text-center">
                                {{ $a_user->name }}
                            </div>
                            

                            <!-- Строка 2 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Email</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="email" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" value="{{ $a_user->email }}" required>
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_user->email }}
                            </div>

                            <!-- Строка 3 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Телефон</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="val_phone" value="{{ $a_user->val_phone }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_user->val_phone }}
                            </div>
                            
                            {{--         --}}       
                            <!-- Строка 4 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Имя</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="first_name" value="{{ $a_user->first_name }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_user->first_name }}
                            </div>
                            

                            <!-- Строка 5 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Фамилия</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="last_name" value="{{ $a_user->last_name }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_user->last_name }}
                            </div>
                            
                            <!-- Строка 6 -->

                            <div class=" py-3 font-medium text-center">
                                <b>Роль</b>
                            </div>
                            
                            <div class="flex flex-col sm:flex-row gap-2 mb-4">
                                <input type="text" name="role" value="{{ $a_user->role }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg">
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_user->role }}
                            </div>
                            
                            {{--         --}}      
                            <div class=" py-3 font-medium text-center">
                                <b>Депозит</b>
                            </div>

                            <div>
                                <input type="text"  name="deposit" value="{{ $a_user->deposit }}" class="border-line px-4 pt-3 pb-3 w-full rounded-lg" >
                            </div>

                            <div class=" py-3 font-medium text-center">
                                {{ $a_user->deposit }}
                            </div>

                            {{--         --}}                    
                     
                        </div>
                        <div class="block-button lg:mt-10 mt-6 text-center">
                            <button class="button-main">Обновить пользователя </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection