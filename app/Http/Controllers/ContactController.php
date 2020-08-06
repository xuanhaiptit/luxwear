<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    public function getdanhsach(){
    	return view('admin.contact.list');
    }
    public function getData(Request $request){

        if($request->ajax()){
            $contact  = Contact::latest()->get();
            return DataTables::of($contact)
                ->addColumn('action', function($contact){
                    $button = '<button data-product="'.$contact->id.'" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($contact) {
                    return '<input type="checkbox" data-id="'.$contact->id.'" name="checkItem" class="delete_checkbox" class="checkItem">';
                })
                ->rawColumns(['action','checkbox'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }

     public function getxoa($id){
         $contact = Contact::find($id);
         $contact->delete($id);
         return response([
             'success'=>'true',
             'message'=>'Xóa thành công'
         ]);
     }
    public function get_delete_all(Request $request){
        $array = $request->input('id');
        $contact= Contact::whereIn('id', $array);
        $contact->delete();
        return response()->json([
            'success'=>true,
            'message'=>"Success"
        ]);
    }
}
