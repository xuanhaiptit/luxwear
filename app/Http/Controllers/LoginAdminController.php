<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Validator;
use Hash;
use Alert;

class LoginAdminController extends Controller
{
    public function get_login_admin(){
    	return view('admin.login');
    }
    public function post_login_admin(Request $request){
        $rules = array(
            'username' =>'required',
            'password' =>'required|min:6|max:20'
        );
        $messages = array(
            'username.required' =>'Vui lòng nhập tên đăng nhập',
            'password.required' =>'Vui lòng nhập mật khẩu',
            'password.min'=>'Vui lòng nhập Password từ 6 đến 20 kí tự',
            'password.max'=>'Vui lòng nhập Password từ 6 đến 20 kí tự',
        );
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => $validator->errors()
            ],200);
        }else{
            $data = $request->only('username', 'password');
            if (Auth::guard('admin')->attempt($data)) {
                return response([
                    'error' => false,
                    'message' => 'Đăng nhập thành công'
                ],200);
            }else{
                $errors_new = new MessageBag(['errorAll'=>'Tên đăng nhập hoặc mật khẩu không chính xác']);
                return response()->json([
                    'error' => true,
                    'message1' => 'Tên đăng nhập hoặc mật khẩu không chính xác',
                    'message'=> $errors_new,
                ],200);
            }
        }

    }
    public function get_logout_admin(){
        Auth::guard('admin')->logout();
        alert()->success('Thành công','Đăng xuất thành công');
        return redirect(\URL::previous());
    }
}
