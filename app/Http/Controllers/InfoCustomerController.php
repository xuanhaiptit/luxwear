<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Bill_detail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use File;
use Validator;

class InfoCustomerController extends Controller
{
    public function get_update_ttcx(){
        return view('pages.user.update_info_account');
    }
    public function post_update_ttcx(Request $request){
        $user = Auth::user();
        $rules = [
            'display_name'=>'required',
            'user_email' => 'required|unique:users,email,'.$user->id,
            'user_tel'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users,phone,'.$user->id,
            'user_address'=>'required',
        ];
        $messages = [
            'display_name.required' => 'Vui lòng nhập Họ tên',
            'user_email.required' => 'Vui lòng nhập Email',
            'user_email.unique'=>'Email đã tồn tại',
            'user_tel.required'=>'Vui lòng nhập Số điện thoại',
            'user_tel.regex' => 'Định dạng số điện thoại không hợp lệ',
            'user_tel.unique'=>'Số điện thoại đã tồn tại',
            'user_tel.min'=>'Độ dài gồm 10 kí tự',
            'user_address.required'=>'Vui lòng nhập Địa chỉ',
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => $validator->errors(),
            ]);
        }else{
            $user->fullname = $request->display_name;
            $user->phone = $request->user_tel;
            $user->email = $request->user_email;
            $user->address = $request->user_address;
            $user->gender = $request->sltgender;
            $img_current = 'resources/upload/user/'.$request->img_current;// tạo input hidden có name là img_current~~~ nhu7 là thư mục chưa image
            if($request->hasFile('image')){
                $file = $request->file('image'); // lấy file image
                $file_name =$file->getClientOriginalName();
                $user->avatar = $file_name;
                $file->move('resources/upload/user/',$file_name);
                if(File::exists($img_current)){
                    File::delete($img_current);
                }
            }
            $user->save();
            return response()->json([
                'error' => false,
                'message' => 'Cập nhật thành công',
            ]);
        }
    }
    public function getlichsugiaodich($id){
        $bill = Bill::where('user_id',$id)
                ->get()
                ->toArray();
        return view('pages.history.lichsugiaodich',compact('bill'));
    }
    public function getchitiethoadonkh($id){
        $bill_detail = Bill_detail::where('bill_id',$id)->get()->toArray();
        $total_qty = Bill_detail::select('*')->where('bill_id',$id)->sum('quality');
        $total_price = Bill_detail::select('*')->where('bill_id',$id)->sum('sub_total');
        return view('pages.history.chitiethoadonkh',compact('bill_detail','total_qty','total_price'));
    }
    public function gethuydonhang($id){
        $bill = Bill::find($id);
        $bill->status= -1;
        $bill->save();
        return redirect()->back();
    }

}
