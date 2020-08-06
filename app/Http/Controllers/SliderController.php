<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Http\Request;
use App\Slider;
use App\User;
use App\Http\Requests\SliderRequest;
use File;
use Alert;
use Yajra\DataTables\DataTables;

class SliderController extends Controller
{
    public function get_list(){
        $slider  = Slider::latest()->get();
        return view('admin.slider.list');
    }
    public function getData(Request $request){
        if($request->ajax()){
            $slider  = Slider::latest()->get();
            return DataTables::of($slider)
                ->addColumn('action', function($slider){
                    $button = '<a href="'.url('admin/slider/edit/'.$slider->id).'" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>Edit</a>';
                    $button .= '<button type="button" data-product="'.$slider->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span>Delete</button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($slider) {
                    return '<input type="checkbox" data-id="'.$slider->id.'" name="checkItem[]" class="delete_checkbox">';
                })
                ->addColumn('image', function ($slider) {
                    $url = asset("resources/upload/slider/$slider->image");
                    return '<img src='.$url.' border="0"  class="img-rounded" align="center" />';
                })
                ->addColumn('status', function ($slider) {
                    $status = $slider->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="'.$slider->id.'" id="toggle-demo" name="status" class="toggle-class"
                            type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive"
                            '.$check.'
                            >';
                })
                ->rawColumns(['action','checkbox','image','status'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }
    public function get_add(){
    	$slider = Slider::select('*')->get()->toArray();
        return view('admin.slider.add',compact('slider'));
    }
    public function post_add(SliderRequest $request){
    	$file = $request->file('fimage');
    	$file_name = $file->getClientOriginalName();
    	$slider = new Slider();
    	$slider->name  = $request->title;
    	$slider->image = $file_name;
    	$slider->admin_id = get_data_user('admin');
    	// upload image
    	$file->move('resources/upload/slider/',$file_name);
    	$slider->save();
    	return redirect()->route('get.list.slider')->with('success','Thêm mới slider thành công');
    }
    public function get_edit($id){
    	$slider = Slider::find($id);
    	return view('admin.slider.edit',compact('slider'));
    }
    public function post_edit(Request $request,$id){
    	$this->validate($request,
    		['name'=>'required|unique:slider,name,'.$id],
            ['name.required'=>'Bạn chưa nhập tên slider',
                'name.unique'=>'Tên slider đã tồn tại']
    	);
    	$slider = Slider::find($id);
    	$slider->name  = $request->name;

    	$img_current = 'resources/upload/slider/'.$request->img_current;
        if(!empty($request->file('fimage'))){
            $file = $request->file('fimage'); // lấy file image
            $file_name = $file->getClientOriginalName();
            $slider->image= $file_name;
            $file ->move('resources/upload/slider/',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo "k có file";
        }
        $slider->save();
        return redirect()->route('get.list.slider')->with('success','Cập nhật slider thành công');

    }
    public function get_delete($id){
    	$slider = Slider::find($id);
        File::delete('resources/upload/slider/'.$slider['image']);
    	$slider->delete($id);
    	return response()->json([
    	    'success' => true,
            'message' =>'Thành công',
            'error' => 'Thất bại',
        ]);
    }
    public function get_delete_all(Request $request){
        $array = $request->input('id');
        $slider = Slider::whereIn('id', $array);
        foreach($slider as $image){
            File::delete('resources/upload/slider/'.$image['image']);// xóa hình trong list_image
        }
        $slider->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Success"
        ]);
    }

    public function changeStatusSlider(Request $request){
        $slider = Slider::find($request->id);
        if(!$slider){
            echo "error";
        }else{
            $slider->status = $request->status;
            $slider->save();
            return response()->json(['success'=>'Thay đổi trạng thái thành công']);
        }
    }

}
