<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cate_product;
use App\Cate_Product_Detail;
use DB;
class SearchController extends Controller
{
    public function getSearch(Request $request){
        $keyword = $request->keyword;
        $search_product = DB::table('cate_product_detail')
            ->join('product','cate_product_detail.id','=','product.cate_product_detail_id')
            ->where('cate_product_detail.status',1)
            ->where('product.status',1)
            ->where('product_name','like','%'.$request->keyword.'%')
            ->orwhere('price_new',$request->keyword)
            ->paginate(8);
        $num_rows = DB::table('cate_product_detail')
            ->join('product','cate_product_detail.id','=','product.cate_product_detail_id')
            ->where('cate_product_detail.status',1)
            ->where('product.status',1)
            ->where('product_name','like','%'.$request->keyword.'%')
            ->orwhere('price_new',$request->keyword)
            ->get()
            ->toArray();
        return view('pages.search.search_product',compact('search_product','num_rows','keyword'));
    }
    public function postSearch(Request $request){
        $keyword =$request->get('keyword');
        $data = Product::where('product_name','like','%'.$request->keyword.'%')->get();
        $output = '<ul class="dropdown-menu" style="display:block; position:relative;width: 100%">';
        foreach($data as $row)
        {
            $url = asset("resources/upload/product/$row->image");
            $output .= '<li style="border-bottom: 1px solid #594949;">
                            <a style="width: 25%!important;" href="'.url('ctsp/'.$row->id).'/'.$row->alias.'"><img style="width: 100px;" src="'.$url.'"></a>
                            <a style="width: 100%!important;white-space: pre-line;" href="'.url('ctsp/'.$row->id).'/'.$row->alias.'">'.$row->product_name.'</a>
                        </li>';
        }
        $output .= '</ul>';
        echo $output;
    }
}
