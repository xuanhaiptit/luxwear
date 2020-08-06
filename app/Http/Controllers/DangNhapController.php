<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginAdminRequest;
use App\User;
use Cart;
use Illuminate\Support\MessageBag;
use Validator;

class DangNhapController extends Controller
{
    public function getLogin(){
        return view('pages.user.login');
    }
    public function postLogin(Request $request){
        $rules = [
            'username' =>'required',
            'password' =>'required|min:6|max:20'
        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ],200);
        }else{
            $auth = array('username'=>$request->username,'password'=>$request->password);
            if(Auth::attempt($auth)){
                $userstatus = Auth::User()->status;
                if($userstatus == 1 ){
                    return response([
                        'error' => false,
                        'message' => 'Đăng nhập thành công',
                    ],200);

                }else if($userstatus == 0){
                    return response([
                        'error' => true,
                        'message' => 'Đăng nhập thất bại',
                    ],200);
                }
            }else{
                $errors_new = new MessageBag(['errorAll'=>'Tên đăng nhập hoặc mật khẩu không chính xác']);
                return response()->json([
                    'error' => true,
                    'message'=> $errors_new,
                ],200);
            }
        }
    }
    public function get_logout(){
        Auth::logout();
        Cart::destroy();
        return redirect()->route('dang-nhap');
    }

}
