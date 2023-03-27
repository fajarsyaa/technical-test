<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $startDate = Carbon::now()->subDays(7);
        $endDate = Carbon::now();
        $collection = DB::table('vehicle_use_histories')
            ->select(DB::raw('DATE(created_at) as tanggal'), DB::raw('count(*) as jumlah'))
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy(DB::raw('DATE(created_at)'))
            ->get();

        $labels = collect([]);
        $datas = collect([]);

        foreach ($collection as $item) {
            $labels->push($item->tanggal);
            $datas->push($item->jumlah);
        }
        return view('backend.dashboard', ['labels' => $labels, 'datas' => $datas]);
    }
}
