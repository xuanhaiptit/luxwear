<?php

namespace App\Http\Controllers;

use App\Cate_Product_Detail;
use Illuminate\Http\Request;
use App\Post;
use App\Cate_post;
use App\Http\Requests\PostRequest;
use File;
use Yajra\DataTables\DataTables;

class PostController extends Controller
{
    public function get_list(){
    	return view('admin.post.list');
    }

    public function getData(Request $request){
        if($request->ajax()){
            $posts  = Post::latest()->get();
            return DataTables::of($posts)
                ->addColumn('action', function($posts){
                    $button = '<a href="'.url('admin/post/edit/'.$posts->id).'" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                    $button .= '<button data-product="'.$posts->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($posts) {
                    return '<input type="checkbox" data-id="'.$posts->id.'" name="checkItem" class="delete_checkbox" class="checkItem">';
                })
                ->addColumn('image', function ($posts) {
                    $url = asset("resources/upload/post/$posts->image");
                    return '<img src='.$url.' border="0"  class="img-rounded" align="center" />';
                })
                ->addColumn('status', function ($posts) {
                    $status = $posts->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="'.$posts->id.'" id="toggle-demo" name="status" class="toggle-class"
                            type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive"
                            '.$check.'
                            >';
                })
                ->addColumn('cate_post',function($posts){
                    $cate_post = Cate_post::where('id', $posts->cate_post_id)->first();
                    return  $cate_post->name;
                })
                ->rawColumns(['action','checkbox','image','status','cate_post'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }
    public function get_add(){
    	$cate_post = Cate_post::select('*')->get()->toArray();
    	return view('admin.post.add',compact('cate_post'));
    }
    public function post_add(PostRequest $request){
        //upload images
    	$file = $request->file('fimage');
    	$file_name = $file->getClientOriginalName();

    	$post = new Post();
    	$post->post_name  = $request->post_name;
        $post->post_name_en  = $request->post_name_en;
    	$post->alias = changeTitle($request->post_name);
    	$post->image = $file_name;
    	$post->desc = $request->desc;
    	$post->content = $request->content;
        $post->desc_en = $request->desc_en;
        $post->content_en = $request->content_en;
    	$post->admin_id = get_data_user('admin');
    	$post->cate_post_id = $request->sltcate_post;
    	$post->featured_post = $request->featured_post;
    	// upload image
    	$file->move('resources/upload/post/',$file_name);
    	$post->save();
    	return redirect()->route('get.list.post')->with('success','Thêm mới bài biết thành công');
    }
    public function get_edit($id){
    	$cate_post = Cate_post::select('*')->get()->toArray();
    	$post = Post::find($id);
    	return view('admin.post.edit',compact('cate_post','post'));
    }
    public function post_edit(Request $request,$id){
    	$this->validate($request,
    		['post_name'=>'required|unique:post,post_name,'.$id,
                'post_name_en'=>'required|unique:post,post_name_en,'.$id,],
            ['post_name.required'=>'Bạn chưa nhập tên bài viết (vn)',
                'post_name.unique' =>'Tên bài viết (vn) đã tồn tại',
                'post_name_en.required'=>'Bạn chưa nhập tên bài viết (en)',
                'post_name_en.unique' =>'Tên bài viết (en) đã tồn tại']
    	);
    	$post = Post::find($id);
    	$post->post_name  = $request->post_name;
        $post->post_name_en  = $request->post_name_en;
    	$post->alias = changeTitle($request->post_name);
    	$post->desc = $request->desc;
    	$post->content = $request->content;
        $post->desc_en = $request->desc_en;
        $post->content_en = $request->content_en;
    	$post->cate_post_id = $request->sltcate_post;
    	$post->featured_post = $request->featured_post;

    	$img_current = 'resources/upload/post/'.$request->img_current;
        if(!empty($request->file('fimage'))){
            $file = $request->file('fimage');
            $file_name = $file->getClientOriginalName();
            $post->image= $file_name;
            $file ->move('resources/upload/post/',$file_name);
            if(File::exists($img_current)){
                File::delete($img_current);
            }
        }else{
            echo "k có file";
        }
        $post->save();
        return redirect()->route('get.list.post')->with('success','Cập nhật bài biết thành công');
    }
    public function get_delete($id){
        $post = Post::find($id);
        File::delete('resources/upload/post/'.$post['image']);
        $post->delete($id);
        return response()->json([
            'success' => true,
            'message' =>'success',
        ]);
    }

    public function get_delete_all(Request $request){
        $array = $request->input('id');
        $post = Post::whereIn('id', $array);
        foreach($post as $image){
            File::delete('resources/upload/post/'.$image['image']);// xóa hình trong list_image
        }
        $post->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Success"
        ]);
    }

    public function changeStatusPost(Request $request){
        $post= Post::find($request->id);
        if(!$post){
            echo "error";
        }else{
            $post->status = $request->status;
            $post->save();
            return response(['success'=>'Success']);
        }
    }
}
