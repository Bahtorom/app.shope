@extends('layout.app')

@section('content')

  


<div class="breadcrumb-block style-shared">
  <div class="breadcrumb-main bg-linear overflow-hidden">
    <div class="container lg:pt-[134px] pt-24 pb-10 relative">
      <div class="main-content w-full h-full flex flex-col items-center justify-center relative z-[1]">
        <div class="text-content">
          <div class="heading2 text-center">Главная панель</div>
            <div class="link flex items-center justify-center gap-1 caption1 mt-3">
              <a href={{ route('pages.main') }}>Домашняя страница</a>
              <i class="ph ph-caret-right text-sm text-secondary2"></i>
              <div class="text-secondary2 capitalize">Dashboard</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="page-custom-dashboard">
  <div class="container">
  <!-- Статистика -->
  <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-10 mt-4">
    <div class="card text-center">
      <div class="text-title text-black mb-1">Всего заказов</div>
      <div class="heading3 text-black">{{ $all_orders }}</div>
    </div>
    <div class="card text-center">
      <div class="text-title text-black mb-1">Выручка</div>
      <div class="heading3 text-success">{{ number_format(($sum_paid_orders), 0, '', ' ') }} ₽</div>
    </div>
    <div class="card text-center">
      <div class="text-title text-black mb-1">Клиенты</div>
      <div class="heading3 text-purple">{{ $all_client }}</div>
    </div>
    <div class="card text-center">
      <div class="text-title text-black mb-1">Общий депозит</div>
      <div class="heading3 text-orange">{{ number_format(($all_deposit_clients), 0, '', ' ')}} ₽</div>
    </div>
  </div>

  <!-- Графики -->
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mt-4">
    <!-- Круговая диаграмма -->
    <div class="card">
      <div class="heading5 mb-4">Apple</div>
      <div class="chart-container">
        <canvas id="categoryChart"
          data-labels='@json($chartLabels)'
          data-values='@json($chartData)'>
        </canvas>
      </div>
    </div>
     <!-- Статистика -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-4 ">
      <div class="card text-center">
        <div class="text-title text-black mb-1">Количество покупок</div>
        <div class="heading3 text-black">{{ $all_paid_orders }}</div>
      </div>
      <div class="card text-center">
        <div class="text-title text-black mb-1">Количество отмен</div>
        <div class="heading3 text-success">{{ $all_cancel_orders }}</div>
      </div>
      <div class="card text-center">
        <div class="text-title text-black mb-1">Количество товара</div>
        <div class="heading3 text-purple">{{$all_count_phones}}</div>
      </div>
      <div class="card text-center">
        <div class="text-title text-black mb-1">Продаж за сегодня</div>
        <div class="heading3 text-orange">{{$purchase_today}}</div>
      </div>
    </div>
    <!-- Линейный график -->
    <div class="card">
      <div class="heading5 mb-4">Продажи по дням</div>
      <div class="chart-container">
        <canvas id="salesChart"
          data-days="{{ $daysInMonth }}"
          data-values='@json($data)'>
        </canvas>
      </div>
    </div>
  </div>


  <!-- Интерактивный элемент: прогресс по цели -->
  <div class="card mt-8">
    <div class="heading5 mb-4">Загруженность склада</div>
    <div class="w-full bg-line h-4 rounded-full overflow-hidden">
      <div class="h-full bg-green" style="width: {{ $procent_stock }}%"></div>
    </div>
    <div class="caption1 mt-2">{{ $procent_stock }}% — {{ $all_count_phones }} шт из {{ $end_stock }} шт</div>
  </div>

  </div>
</div>



@endsection