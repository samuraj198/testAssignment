<?php

namespace App\Http\Controllers;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $visits = Visit::select(
            DB::raw("HOUR(created_at) as hour"),
            DB::raw("count(distinct ip_address) as unique_count")
        )->whereDate('created_at', today())
        ->groupBy('hour')
        ->orderBy('hour', 'asc')
        ->get();

        $times = $visits->pluck('hour')->toArray();
        $counts = $visits->pluck('unique_count')->toArray();

        $cityVisits = Visit::select('city', DB::raw('count(*) as total'))
        ->groupBy('city')
        ->orderBy('total', 'desc')
        ->get();
        $cities = $cityVisits->pluck('city')->toArray();
        $cityCounts = $cityVisits->pluck('total')->toArray();

        return view('dashboard', compact('times', 'counts', 'cities', 'cityCounts'));
    }
}
