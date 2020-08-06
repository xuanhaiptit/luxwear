<?php

namespace App\Http\Controllers;
use App\Post;
use App\Cate_post;
use Illuminate\Http\Request;
use App\Http\Requests\CatePostRequest;
use Yajra\DataTables\DataTables;

class CatePostController extends Controller
{
    public function get_list(){
    	return view('admin.cate_post.list');
    }
    public function getData(Request $request){
        if($request->ajax()){
            $cate_posts  = Cate_post::latest()->get();
            return DataTables::of($cate_posts)
                ->addColumn('action', function($cate_posts){
                    $button = '<a href="'.url('admin/cate_post/edit/'.$cate_posts->id).'" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                    $button .= '<button data-product="'.$cate_posts->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($cate_posts) {
                    return '<input type="checkbox" data-id="'.$cate_posts->id.'" name="checkItem" class="delete_checkbox" class="checkItem">';
                })
                ->addColumn('status', function ($cate_posts) {
                    $status = $cate_posts->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="'.$cate_posts->id.'" id="toggle-demo" name="status" class="toggle-class"
                            type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive"
                            '.$check.'
                            >';
                })
                ->rawColumns(['action','checkbox','status'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }
    public function get_add(){
    	return view('admin.cate_post.add');
    }
    public function post_add(CatePostRequest $request){
    	$cate = new Cate_post();
    	$cate->name = $request->txtcatename;
        $cate->name_en = $request->txtcatename_en;
    	$cate->alias = changeTitle($request->txtcatename);
    	$cate->keyword = $request->txtkeyword;
    	$cate->save();
    	return redirect()->route('get.list.cate_post')->with('success','Thêm mới danh mục thành công');
    }
    public function get_edit($id){
    	$cate = Cate_post::find($id);
    	return view('admin.cate_post.edit',compact('cate'));
    }
    public function post_edit($id,Request $request){
    	$this->validate($request,
    		['txtcatename'=>'required|unique:cate_post,name,'.$id,
                'txtcatename_en'=>'required|unique:cate_post,name,'.$id,],
            ['txtcatename.required'=>'Bạn chưa nhập tên danh mục',
        	 'txtcatename.unique'=>'Tên danh mục đã tồn tại',
                'txtcatename_en.required'=>'Bạn chưa nhập tên danh mục (en)',
                'txtcatename_en.unique'=>'Tên danh mục (en) đã tồn tại',]
    	);
    	$cate = Cate_post::find($id);
    	$cate->name = $request->txtcatename;
        $cate->name_en = $request->txtcatename_en;
    	$cate->alias = changeTitle($request->txtcatename);
    	$cate->keyword = $request->txtkeyword;
    	$cate->save();
    	return redirect()->route('get.list.cate_post')->with('success','Cập nhật danh mục thành công');
    }
    public function get_delete($id){
        $post = Post::select('*')->where('cate_post_id',$id)->count();
        if($post == 0){
            $cate_post = Cate_post::find($id);
            $cate_post->delete($id);
            return response()->json([
                'success' => true,
                'message' =>'Xóa thành công',
            ]);
        }else{
            return response()->json([
                'success' => false,
                'message' =>'Bạn không thể xóa danh mục có chứa bài viết',
            ]);
        }
    }
    public function get_hidden_cate_post($id){
        $cate_post = Cate_post::find($id);
        $cate_post->status = 0;
        $cate_post->save();
        return redirect()->route('get.list.cate_post')->with('success','Chuyển trạng thái thành công');
    }
    public function get_current_cate_post($id){
        $cate_post = Cate_post::find($id);
        $cate_post->status = 1;
        $cate_post->save();
        return redirect()->route('get.list.cate_post')->with('success','Chuyển trạng thái thành công');
    }

    public function changeStatusCatePost(Request $request){
        $cate_post = Cate_post::find($request->id);
        if(!$cate_post){
            echo "error";
        }else{
            $cate_post->status = $request->status;
            $cate_post->save();
            return response(['success'=>'Success']);
        }
    }

}
