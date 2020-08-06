<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\User;
use App\Http\Requests\PageRequest;
use Yajra\DataTables\DataTables;

class PageController extends Controller
{
    public function get_list(){
    	return view('admin.page.list');
    }

    public function getData(Request $request){
        if($request->ajax()){
            $pages  = Page::latest()->get();
            return DataTables::of($pages)
                ->addColumn('action', function($pages){
                    $button = '<a href="'.url('admin/page/edit/'.$pages->id).'" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                    $button .= '<button data-product="'.$pages->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($pages) {
                    return '<input type="checkbox" data-id="'.$pages->id.'" name="checkItem" class="delete_checkbox" class="checkItem">';
                })
                ->addColumn('status', function ($pages) {
                    $status = $pages->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="'.$pages->id.'" id="toggle-demo" name="status" class="toggle-class"
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
    	return view('admin.page.add');
    }
    public function post_add(PageRequest $request){
    	$page = new page();
    	$page->page_title  = $request->page_title;
        $page->page_title_en  = $request->page_title_en;
    	$page->alias = changeTitle($request->page_title);
    	$page->desc = $request->desc;
    	$page->content = $request->content;
        $page->content = $request->content_en;
        $page->desc_en = $request->desc_en;
    	$page->admin_id = get_data_user('admin');
    	$page->save();
    	return redirect()->route('get.list.page')->with('success','Thêm trang thành công');
    }
    public function get_edit($id){
    	$page = page::find($id);
    	return view('admin.page.edit',compact('page'));
    }
    public function post_edit(Request $request,$id){
    	$this->validate($request,
            ['page_title'=>'required|unique:page,page_title,'.$id,
                'page_title_en'=>'required|unique:page,page_title_en,'.$id,],
            ['page_title.unique' => 'Tiêu đề trang (vn) đã tồn tại',
                'page_title_en.unique' => 'Tiêu đề trang (en) đã tồn tại',]
    	);
    	$page = page::find($id);
    	$page->page_title  = $request->page_title;
        $page->page_title_en  = $request->page_title_en;
    	$page->alias = changeTitle($request->page_title);
    	$page->desc = $request->desc;
    	$page->content = $request->content;
        $page->content = $request->content_en;
        $page->desc_en = $request->desc_en;
    	$page->save();
        return redirect()->route('get.list.page')->with('success','Cập nhật thành công');
    }
    public function get_delete($id){
        $page = page::find($id);
        $page->delete($id);
        return response()->json([
            'success' => true,
            'message' =>'Xóa thành công',
        ]);
    }

    public function get_delete_all(Request $request){
        $array = $request->input('id');
        $page= page::whereIn('id', $array);
        $page->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Success"
        ]);
    }
    public function changeStatusPage(Request $request){
        $page = Page::find($request->id);
        if(!$page){
            echo "error";
        }else{
            $page->status = $request->status;
            $page->save();
            return response(['success'=>'Success']);
        }
    }
}
