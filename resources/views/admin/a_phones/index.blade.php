@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Товары</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Товары</div>
                    </div>
                </div>
            </div>
            <div class="mb-4 flex justify-end mt-8">
                <a href={{ route('a_phones.create') }} class="button-main w-full sm:w-auto bg-white border border-black text-black text-center uppercase py-2 px-4">
                    Добавить продукт
                </a>
            </div>  
        </div>
    </div>
</div>
        

  


<div class="overflow-x-auto rounded-lg border border-line">
  <table class="w-full text-center text-sm">
    <thead class="bg-silver">
      <tr>
        <th class="px-5 py-3 font-semibold text-black">ID</th>
        <th class="px-5 py-3 font-semibold text-black">Брэнд</th> 
        <th class="px-5 py-3 font-semibold text-black">Серия</th>
        <th class="px-5 py-3 font-semibold text-black">Поколение</th>
        <th class="px-5 py-3 font-semibold text-black">Тип</th>
        <th class="px-5 py-3 font-semibold text-black">Цена</th>
        <th class="px-5 py-3 font-semibold text-black">Остаток</th>
        <th class="px-5 py-3 font-semibold text-black">Действия</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-line">
      {{-- @foreach ($users as $user) --}}
        <tr class="hover:bg-gray-50">
          <td class="px-5 py-4">1</td>
          <td class="px-5 py-4">Apple</td>
          <td class="px-5 py-4">Iphone</td>
          <td class="px-5 py-4">Pro Max</td>
          <td class="px-5 py-4">17</td>
          <td class="px-5 py-4">1000$</td>
          <td class="px-5 py-4">6</td>
          <td class="px-5 py-4">
            <a href="#!" class="button-main text-center py-1.5 px-3 text-sm">Изменить</a>
          </td>
        </tr>
      {{-- @endforeach --}}
    </tbody>
  </table>
</div>


@endsection