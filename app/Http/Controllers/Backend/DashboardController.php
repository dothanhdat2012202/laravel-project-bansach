<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        
    }
    public function index(){
        $revenuesByMonth = DB::table('invoices')
        ->select(DB::raw('YEAR(orderdate) as year'),DB::raw('MONTH(orderdate) as month'), DB::raw('SUM(total_amount) as total'))
        ->where('status',1)
        ->groupBy(DB::raw('YEAR(orderdate),MONTH(orderdate)'))
        ->get();


        $currentweekStartDate=Carbon::now()->startOfWeek();
        $currentweekEndDate=Carbon::now()->endOfWeek();
        $currentYear = Carbon::now()->year;

        $revenueThisYear = DB::table('invoices')
        ->select(DB::raw('SUM(total_amount) as total'))
        ->where('status', 1)
        ->whereYear('orderdate', $currentYear)
        ->first();
        
        $revenueThisWeek = DB::table('invoices')
        ->select(DB::raw('SUM(total_amount) as total'))
        ->where('status', 1)
        ->whereBetween('orderdate', [$currentweekStartDate, $currentweekEndDate])
        ->first();

        $ordersThisWeek = DB::table('invoices')
        ->where('status', 1)
        ->whereBetween('orderdate', [$currentweekStartDate, $currentweekEndDate])
        ->count();


        $labels = [];
        $data = [];
        $color =['#00FF00','#00FF00','#00FF00','#00FF00','#00FF00','#00FF00','#00FF00','#00FF00','#00FF00','#00FF00','#00FF00','#00FF00'];

        for($i=1;$i<=12;$i++){
            $month = date('F',mktime(0,0,0,$i,1));
            $count = 0;
            foreach($revenuesByMonth as $revenueByMonth)
            {
                if($revenueByMonth->month == $i)
                {
                    $count += $revenueByMonth->total;
                    break;
                }
            }
            array_push($labels,$month);
            array_push($data,$count);
        }
        $revenuedata = [
            'label' => 'revenuesByMonth',
            'data' => $data,
            'backgroundColor' => $color,
        ];
        $template='backend.dashboard.home.index1';
        return view('backend.dashboard.index',compact('template','revenuedata','revenueThisWeek','ordersThisWeek','revenueThisYear'));
    }
}
