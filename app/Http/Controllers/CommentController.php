<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Requests\CommentRequest;
use App\Comment;
use App\Product;
use App\User;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;


class CommentController extends Controller
{
    public function getlistcomment(){
    	return view('admin.comment.list');
    }
    public function getData(Request $request){

        if($request->ajax()){
            $comment  = Comment::latest()->get();
            return DataTables::of($comment)
                ->addColumn('action', function($comment){
                    $button = '<button data-product="'.$comment->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    return $button;
                })
                ->addColumn('fullname',function($comment){
                    return '<span>'.$comment['user']['fullname'].'</span>';
                })
                ->addColumn('product_name',function($comment){
                    return '<span>'.$comment['product']['product_name'].'</span>';
                })
                ->addColumn('checkbox', function ($comment) {
                    return '<input type="checkbox" data-id="'.$comment->id.'" name="checkItem" class="delete_checkbox" class="checkItem">';
                })
                ->addColumn('status', function ($comment) {
                    $status = $comment->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="'.$comment->id.'" id="toggle-demo" name="status" class="toggle-class"
                            type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive"
                            '.$check.'
                            >';
                })
                ->rawColumns(['action','checkbox','status','fullname','product_name'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }
    public function getxoa($id){
        $comment = Comment::find($id);
        $comment->delete($id);
        return response([
            'success'=>'true',
            'message'=>'Xóa thành công'
        ]);
    }
    public function get_delete_all(Request $request){
        $array = $request->input('id');
        $comment= Comment::whereIn('id', $array);
        $comment->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Success"
        ]);
    }
    public function changeStatusComment(Request $request){
        $comment= Comment::find($request->id);
        if(!$comment){
            echo "error";
        }else{
            $comment->status = $request->status;
            $comment->save();
            return response(['success'=>'Success']);
        }
    }

}
