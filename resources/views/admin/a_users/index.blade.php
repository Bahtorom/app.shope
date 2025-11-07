@extends('layout.app')

@section('content')


<div class="breadcrumb-block style-shared">
    <div class="breadcrumb-main bg-linear overflow-hidden">
        <div class="container lg:pt-[134px] pt-24 pb-10 relative">
            <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
                <div class="text-content">
                    <div class="heading2 text-center">Клиенты</div>
                    <div class="link flex items-center justify-center gap-1 caption1 mt-3">
                        <a href={{ route('pages.main') }}>Домашняя страница</a>
                        <i class="ph ph-caret-right text-sm text-secondary2"></i>
                        <div class="text-secondary2 capitalize">Клиенты</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
        

    

<div class="overflow-x-auto rounded-lg border border-line">
  <table class="w-full text-center text-sm">
    <thead class="bg-silver">
      <tr>
        <th class="px-5 py-3 font-semibold text-black">ID</th>
        <th class="px-5 py-3 font-semibold text-black">Имя</th>
        <th class="px-5 py-3 font-semibold text-black">Email</th>
        <th class="px-5 py-3 font-semibold text-black">Роль</th>
        <th class="px-5 py-3 font-semibold text-black">Дата создания</th>
        <th class="px-5 py-3 font-semibold text-black">Баланс</th>
        <th class="px-5 py-3 font-semibold text-black">Действия</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-line">
      @foreach ($users as $user)
        <tr class="hover:bg-gray-50">
          <td class="px-5 py-4 font-medium">{{ $user->id }}</td>
          <td class="px-5 py-4">{{ $user->name }}</td>
          <td class="px-5 py-4">{{ $user->email }}</td>
          <td class="px-5 py-4">
            <span class="rounded-full py-1.5 px-8 w-full {{ ($user->role == 'admin') ? 'bg-purple' : 'bg-secondary' }} text-white">{{ $user->role }}</span>
          </td>
          <td class="px-5 py-4">
            <span class="inline-block px-2 py-1 bg-green-100 text-green-800 rounded">{{ $user->created_at }}</span>
          </td>
          <td class="px-5 py-4">{{ number_format(($user->deposit), 0, '', ' ') }} ₽</td>
          <td class="px-5 py-4">
            <a href="#!" class="button-main text-center py-1.5 px-3 text-sm">Изменить</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>


@endsection