@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Товары</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
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
        <th class="px-5 py-3 font-semibold text-black">Бренд</th> 
        <th class="px-5 py-3 font-semibold text-black">Серия</th>
        <th class="px-5 py-3 font-semibold text-black">Поколение</th>
        <th class="px-5 py-3 font-semibold text-black">Тип</th>
        <th class="px-5 py-3 font-semibold text-black">Цвет</th>
        <th class="px-5 py-3 font-semibold text-black">Память</th>
        <th class="px-5 py-3 font-semibold text-black">Цена</th>
        <th class="px-5 py-3 font-semibold text-black">Остаток</th>
        <th class="px-5 py-3 font-semibold text-black">Действия</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-line">
      @foreach ($phones as $phone)
        <tr class="hover:bg-gray-50">
          <td class="px-5 py-4">{{ $phone->id }} </td>
          <td class="px-5 py-4"> {{$phone->brand}} </td>
          <td class="px-5 py-4">{{ $phone->series }} </td>
          <td class="px-5 py-4">{{ $phone->generation }} </td>
          <td class="px-5 py-4">{{ $phone->variant }} </td>
          <td class="px-5 py-4">{{ $phone->color }} </td>
          <td class="px-5 py-4">{{ $phone->memory }} </td>
          <td class="px-5 py-4">{{ number_format(($phone->price), 0, '', ' ') }} ₽</td>
          {{-- <td class="px-5 py-4">{{ $phone->stock }} </td> --}}
          <td class="px-5 py-4">
            <div class="flex items-center gap-2" data-phone-id="{{ $phone->id }}">
                <button type="button"
                        class="w-6 h-6 flex items-center justify-center text-sm text-white bg-secondary2 rounded hover:bg-secondary"
                        onclick="changeStock(this, -1)">
                    –
                </button>
                <span class="min-w-[24px] stock-value">{{ $phone->stock }}</span>
                <button type="button"
                        class="w-6 h-6 flex items-center justify-center text-white text-sm bg-secondary2 rounded hover:bg-secondary"
                        onclick="changeStock(this, 1)">
                    +
                </button>
            </div>
          </td>
          <td class="px-5 py-4">
            <div class="flex justify-center space-x-2 data-phone-id='{{ $phone->id }}'">
              <a href={{ route('a_phones.edit', $phone->id) }} class="flex items-center justify-center p-1 rounded">
                  <i class="ph-bold ph-pencil text-2xl"></i>
              </a>
              <form action="{{ route('a_phones.destroy', $phone->id) }}" method="POST" class="inline-block">
                @csrf
                @method('DELETE')
                <button class="flex items-center justify-center p-1 rounded">
                    <i class="ph-bold ph-trash text-2xl"></i>
                </button>
              </form>
            </div>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>



@endsection