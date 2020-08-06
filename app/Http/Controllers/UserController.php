<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\AdminRequest;
use File;
use Yajra\DataTables\DataTables;
use Validator;
use Input;

class UserController extends Controller
{
    public function get_list(Request $request){
    	return view('admin.users.list');
    }
    public function getData(Request $request){
        if($request->ajax()){
            $users  = User::latest()->get();
            return DataTables::of($users)
                ->addColumn('action', function($users){
                    $button = '<a href="'.url('admin/users/edit/'.$users->id).'" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit</a>';
                    $button .= '<button type="button" data-product="'.$users->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Delete</button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($users) {
                    return '<input type="checkbox" data-id="'.$users->id.'" name="checkItem[]" class="delete_checkbox">';
                })
                ->addColumn('avatar', function ($users) {
                    $url = asset("resources/upload/user/$users->avatar");
                    return '<img src='.$url.' border="0"  class="img-rounded" align="center" />';
                })
                ->addColumn('status', function ($users) {
                    $status = $users->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="'.$users->id.'" id="toggle-demo" name="status" class="toggle-class"
                            type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive"
                            '.$check.'
                            >';
                })
                ->rawColumns(['action','checkbox','avatar','status'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }
    public function get_edit($id){
    	$user = User::find($id);
    	return view('admin.users.edit',compact('user'));
    }
    public function post_edit(Request $request,$id){
        $this->validate($request,
            [
                'fullname'  =>'required',
                'email'     =>'required|email|unique:users,email,'.$id,
                'phone'  =>'required|unique:users,phone,'.$id,
                'address'  =>'required',
            ],
            ['fullname.required'=>'Bạn chưa nhập họ tên',
                'email.required'=>'Bạn chưa nhập email',
                'phone.required'=>'Bạn chưa nhập số điện thoại',
                'address.required'=>'Bạn chưa nhập địa chỉ',
                'email.email'=>'Email không đúng định dạng',
                'email.unique'=>'Email đã tồn tại',
                'phone.unique'=>'Số điện thoại đã tồn tại']
        );
    	$user = User::find($id);
    	$user->fullname = $request->fullname;
    	$user->email = $request->email;
    	$user->phone = $request->phone;
    	$user->address = $request->address;
    	$user->gender = $request->sltgender;

    	$img_current = 'resources/upload/user/'.$request->img_current;// tạo
    	if(!empty($request->file('fimage'))){
    		$file = $request->file('fimage');
    		$file_name = $file->getClientOriginalName();
    		$user->avatar = $file_name;
    		$file->move('resources/upload/user/',$file_name);
    		if(File::exists($img_current)){
    			File::delete($img_current);
    		}
    	}else{
    		echo " Không có file";
    	}
    	$user->save();
    	return redirect()->route('get.list.user')->with('success','Cập nhật thành công');
    }
    public function get_delete($id){
    	$user = user::find($id);
        File::delete('resources/upload/user/'.$user['avatar']);
        $user->delete($id);
        return response()->json([
            'success' => true,
            'message' =>'success',
        ]);
    }

    public function get_delete_all(Request $request){
        $array = $request->input('id');
        $user = User::whereIn('id', $array);
        foreach($user as $image){
            File::delete('resources/upload/user/'.$image['avatar']);// xóa hình trong list_image
        }
        $user->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Success"
        ]);
    }
    public function changeStatusUser(Request $request){
        $user = User::find($request->id);
        if(!$user){
            echo "error";
        }else{
            $user->status = $request->status;
            $user->save();
            return response()->json(['success'=>'Thay đổi trạng thái thành công']);
        }

    }
}
