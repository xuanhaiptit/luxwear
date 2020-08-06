<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Bill_detail;
use App\Product;
use App\Post;
use App\Contact;
use Charts;
use DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function get_admin(Carbon $date){
        $d = getdate();
        $year=$d['year'];
        $January = DB::table('bill')
                ->where('bill.status','=',3)
                ->whereYear('bill.created_at','=', $year)
                ->whereMonth('bill.created_at','=', '01')
                ->sum('bill.total_bill');
        $February = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', '02')
            ->sum('bill.total_bill');
        $March = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', '03')
            ->sum('bill.total_bill');
        $April = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', '04')
            ->sum('bill.total_bill');
        $May = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', '05')
            ->sum('bill.total_bill');
        $June = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', '06')
            ->sum('bill.total_bill');
        $July = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', '07')
            ->sum('bill.total_bill');
        $August = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', '08')
            ->sum('bill.total_bill');
        $September = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', '09')
            ->sum('bill.total_bill');
        $October = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', 10)
            ->sum('bill.total_bill');
        $November = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', 11)
            ->sum('bill.total_bill');
        $December = DB::table('bill')
            ->where('bill.status','=',3)
            ->whereYear('bill.created_at', $year)
            ->whereMonth('bill.created_at', 12)
            ->sum('bill.total_bill');

        $bill = Bill::where(DB::raw("(DATE_FORMAT(created_at,'%Y'))"),date('Y'))->get();
        $chart = Charts::database($bill,'bar','highcharts')
            ->title("Bill")
            ->elementLabel("Total bill")
            ->dimensions(1000,500)
            ->responsive(true)
            ->groupByMonth(date("Y"),true);

        $total_product = Product::where('status',1)->count();
        $total_post = Post::where('status',1)->count();
        $total_contact = Contact::count();
        $total_bill = Bill::where('status','!=',4)->count();
        $sub_total = DB::table('bill')
            ->where('status','=',3)
            ->whereYear('created_at',$year)
            ->sum('total_bill');
        $sub_total_old = DB::table('bill')
            ->where('status','=',3)
            ->whereYear('created_at','2019')
            ->sum('total_bill');
        return view('admin.dashboard.index',compact('chart',
          'total_product',
            'total_post',
            'total_contact',
            'sub_total',
            'sub_total_old',
            'total_bill',
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December')
        );
    }
}
