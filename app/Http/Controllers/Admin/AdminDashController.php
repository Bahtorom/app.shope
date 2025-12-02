<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\User;
use App\Models\Phone;
use Carbon\Carbon;

class AdminDashController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 1 строка 
        $all_orders = Purchase::whereNot('status', 'cart')->count();
        $sum_paid_orders = Purchase::where('status', 'paid')->sum('price_at_purchase');
        $all_client = User::count('id');
        $all_deposit_clients = User::sum('deposit');

        // 2 строка
        $all_paid_orders = Purchase::where('status', 'paid')->count();
        $all_cancel_orders = Purchase::whereIn('status', ['cancel', 'cancel_user'])->count();
        $all_count_phones = Phone::sum('stock');
        $purchase_today = Purchase::where('status', 'paid')->whereDate('purchased_at', today())->count();

        //1 diagramm
        $series_total_apple = Phone::select('series') // Берём название категории
                            ->selectRaw('SUM(stock) as total_stock') // Суммируем колонку `quantity`
                            ->groupBy('series') // Группируем по категориям
                            ->get(); // Выполняем запрос
        $chartLabels = $series_total_apple->pluck('series')->toArray();
        $chartData = $series_total_apple->pluck('total_stock')->toArray();

        //2 diagramm

        $year = 2025;
        $month = 12;

        // Границы месяца
        $startDate = Carbon::create($year, $month, 1)->startOfMonth();
        $endDate = Carbon::create($year, $month, 1)->endOfMonth();
        $daysInMonth = $startDate->daysInMonth;

        // Суммируем quantity по дням для paid-покупок в указанном месяце
        $purchases = Purchase::selectRaw("
            EXTRACT(DAY FROM purchased_at)::int as day,
            SUM(quantity)::int as total
        ")
            ->where('status', 'paid')
            ->whereBetween('purchased_at', [$startDate, $endDate])
            ->groupBy('day')
            ->pluck('total', 'day'); // ключ — день (1..31), значение — сумма quantity

        // Формируем полный массив данных (все дни месяца, даже без продаж = 0)
        $data = [];
        for ($day = 1; $day <= $daysInMonth; $day++) {
            $data[] = (int) ($purchases->get($day) ?? 0);
        }


        // Загруженность склада 
        $end_stock = 3000;
        $procent_stock = (int)(($all_count_phones / $end_stock) * 100);


        return view('admin.dashboard', compact('all_orders', 'sum_paid_orders', 'all_client', 'all_deposit_clients', 
                                                'all_paid_orders', 'all_cancel_orders', 'all_count_phones', 'purchase_today',
                                                'chartLabels', 'chartData', 'data', 'daysInMonth',
                                                'end_stock', 'procent_stock'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
