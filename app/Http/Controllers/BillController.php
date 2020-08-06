<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bill;
use App\Bill_detail;
use SUM;
use App\Product;
use DB;
use Yajra\DataTables\DataTables;

class BillController extends Controller
{
    public function get_list(){
    	return view('admin.bill.list');
    }
    public function getData(Request $request){
        if($request->ajax()){
            $bill  = Bill::latest()->where('status','!=',4)->get();
            return DataTables::of($bill)
                ->addColumn('checkbox', function ($bill) {
                    return '<input type="checkbox" data-id="'.$bill->id.'" name="checkItem[]" class="delete_checkbox">';
                })
                ->addColumn('status', function ($bill) {
                    $status = $bill->status;
                    if($status == 0){ // ds
                        $result = '<a href="'.url('admin/bill/duyet/'.$bill->id).'" class="btn btn-success btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Duyệt</a>';
                        $result .= '<a href="'.url('admin/bill/huy/'.$bill->id).'" class="btn btn-danger btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Hủy</a>';
                        return $result;
                    }else if($status == 1){ // duyệt
                        $result = '<a href="'.url('admin/bill/vanchuyen/'.$bill->id).'" class="btn btn-info btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Vận chuyển</a>';
                        $result .= '<a href="'.url('admin/bill/huy/'.$bill->id).'" class="btn btn-danger btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Hủy</a>';
                        return $result;
                    }else if($status == 2){ // van chuyen
                        return $result = '<a href="'.url('admin/bill/thanhtoan/'.$bill->id).'" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Thanh toán</a>';
                    }else if($status == 3){ // đã thanh toán
                        return $result = '<span class="btn btn-warning btn-xs dt-edit" readonly="readonly" style="margin-right:16px;"> Đã thanh toán</span>';
                    }else if($status == 4){// hủy
                        return $result = '<span class="btn btn-danger btn-xs dt-edit" readonly="readonly" style="margin-right:16px;"> Đã hủy</span>';
                    }
                })
                ->addColumn('detail',function($bill){
                    $detail ='<a href="'.url('admin/bill/bill_detail/'.$bill->id).'" class="tbody-text btn btn-xs btn-show"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    return $detail;
                })
                ->addColumn('total_bill',function($bill){
                    $total_bill ='<span><i class="fa fa-usd" aria-hidden="true"> '.number_format($bill->total_bill,0,"," , ".").'  (đ)</i></span>';
                    return $total_bill;
                })
                ->rawColumns(['checkbox','status','detail','total_bill'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }


    // duyet
    public function get_duyet($id){
        $bill = Bill::find($id);
        $bill->status= 1;
        $bill->save();
        return redirect('admin/bill/list')->with('success','Xác nhận duyệt đơn hàng thành công');
    }

    // van chuyển
    public function get_vanchuyen($id){
        $bill = Bill::find($id);
        $bill->status= 2;
        $bill->save();
        return redirect('admin/bill/list')->with('success','Xác nhận chuyển đơn hàng sang vận chuyển');
    }
    // thanh toán
    public function get_thanhtoan($id){
        $bill = Bill::find($id);
        $bill->status= 3;
        $bill->save();
        return redirect('admin/bill/list')->with('success','Xác nhận đã thanh toán thành công');
    }
    // hủy
    public function get_huy($id){
        $bill = Bill::find($id);
        $bill->status= 4;
        $bill->save();
        return redirect('admin/bill/list')->with('success','Xác nhận đã hủy thành công');
    }

    public function getdanhsachhuy(){
        return view('admin.bill.danhsachhuy');
    }

    public function getCancel(Request $request){
        if($request->ajax()){
            $bill  = Bill::latest()->where('status',4)->get();
            return DataTables::of($bill)
                ->addColumn('checkbox', function ($bill) {
                    return '<input type="checkbox" data-id="'.$bill->id.'" name="checkItem[]" class="delete_checkbox">';
                })
                ->addColumn('status', function ($bill) {
                    return $result = '<span class="btn btn-danger btn-xs dt-edit" readonly="readonly" style="margin-right:16px;"> Đã hủy</span>';
                })
                ->addColumn('detail',function($bill){
                    $detail ='<a href="'.url('admin/bill/bill_detail/'.$bill->id).'" class="tbody-text btn btn-xs btn-show"><i class="fa fa-eye" aria-hidden="true"></i></a>';
                    return $detail;
                })
                ->rawColumns(['checkbox','status','detail'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }



    public function get_bill_detail($id){

    	$list = Bill_detail::select('*')->where('bill_id',$id)->get()->toArray();
    	$bill = Bill::select('*')->where('id',$id)->get()->toArray();
    	$total_qty = Bill_detail::select('*')->where('bill_id',$id)->sum('quality');
    	$total_price = Bill_detail::select('*')->where('bill_id',$id)->sum('sub_total');
        $check_print_bill = Bill::where('id',$id)->first();
    	return view('admin.bill.bill_detail',compact('list','bill','total_qty','total_price','check_print_bill'));
    }


    public function get_inhoadon($id){
        $bill= bill::select('*')->where('id',$id)->get();
        $bill_detail= bill_detail::where('bill_id',$id)->get();
        $total_price = Bill_detail::select('*')->where('bill_id',$id)->sum('sub_total');
        return view('admin.bill.inhoadon',compact('bill','bill_detail','total_price'));
    }

}
