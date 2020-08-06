<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use Auth;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\ChangePassRequest;
use Hash;
use File;
use DB;
use User;
class AdminController extends Controller
{
    public function getthem(){
    	return view('admin.admin.add');
    }
    public function postthem(AdminRequest $request){
    	$file = $request->file('fimage');
    	$file_name = $file->getClientOriginalName();
    	$admin = new Admin();
    	$admin->fullname = $request->fullname;
    	$admin->username = $request->username;
    	$admin->password = Hash::make($request->password);
    	$admin->remember_token= $request->_token;
    	$admin->email = $request->email;
    	$admin->avatar = $file_name;
    	$admin->phone = $request->phone;
    	$admin->address = $request->address;
    	$admin->gender = $request->sltgender;
    	//upload file
    	$file->move('resources/upload/admin/',$file_name);
    	$admin->save();
    	return redirect()->back()->with('success','Thêm thành công');
    }
    public function getsua($id){
    	$admin = Admin::find($id)->toArray();
    	return view('admin.admin.update',compact('admin'));
    }
    public function postsua(Request $request,$id){
    	$admin = Admin::find($id);
    	$admin->fullname = $request->fullname;
    	$admin->email = $request->email;
    	$admin->phone = $request->phone;
    	$admin->address = $request->address;
    	$admin->gender = $request->sltgender;

    	$img_current = 'resources/upload/admin/'.$request->img_current;
    	if(!empty($request->file('fimage'))){
    		$file = $request->file('fimage');
    		$file_name = $file->getClientOriginalName();
    		$admin->avatar = $file_name;
    		$file->move('resources/upload/admin/',$file_name);
    		if(File::exists($img_current)){
    			File::delete($img_current);
    		}
    	}else{
    		echo " Không có file";
    	}
    	$admin->save();
    	return redirect()->back()->with('success','Cập nhật thành công');
    }
    public function getchange_pass(){
    	return view('admin.admin.change_pass');
    }
    public function postchange_pass(ChangePassRequest $request){
    	$admin = Admin::find(get_data_user('admin'));
        // dd($admin);
        $pass_old = $request->pass_old;
        if(Hash::check($pass_old,$admin->password)){
            $admin->password = Hash::make($request->password);
            $admin->save();
            return redirect()->back()->with('success','Đổi mật khẩu thành công');
        }else{
            return redirect()->back()->with('danger','Mật khẩu cũ không chính xác');
        }
    	return redirect()->back()->with('danger','Mật khẩu cũ không đúng');
    }
}
