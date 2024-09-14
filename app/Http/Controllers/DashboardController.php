<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Get today's date
        $today = Carbon::today();

        // Get sales made today
        $salesToday = Sale::whereDate('created_at', $today)->get();

        // Calculate total income for the day
        $totalIncomeToday = $salesToday->sum('total_price');

        // Pass the sales data and total income to the view
        return view('dashboard', [
            'salesToday' => $salesToday,
            'totalIncomeToday' => $totalIncomeToday,
        ]);
    }
}
