<?php

namespace App\Http\Controllers;

use App\Product;
use App\List_image;
use App\Repositories\CateProductDetailRepository;
use App\Repositories\RepositoryInterface;
use App\Repositories\ImageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use File;
use Input;
use App\Repositories\ProductRepository;
use App\Repositories\Product_sizeRepository;

use Yajra\DataTables\DataTables;


class ProductController extends Controller
{
    protected $productRepo;
    protected $imageRepo;
    protected $cate_product_detailRepo;
    protected $product_sizeRepo;

    public function __construct(ProductRepository $productRepo, CateProductDetailRepository $cate_product_detailRepo, ImageRepository $imageRepo, ProductSizeRepository $productSizeRepo)
    {
        $this->productRepo = $productRepo;
        $this->imageRepo = $imageRepo;
        $this->cate_product_detailRepo = $cate_product_detailRepo;
        $this->product_sizeRepo = $productSizeRepo;
    }

    public function get_list()
    {

//        $product_size = $this->product_sizeRepo->all();
//        var_dump($product_size);die;
        $products = $this->productRepo->all();
        return view('admin.product.list', compact('products', 'product_size'));
    }

    public function getData(Request $request)
    {
        if ($request->ajax())
        {
            $products = $this->productRepo->all();
            return DataTables::of($products)
                ->addColumn('action', function ($products)
                {
                    $button = '<a href="' . url('admin/product/product_edit/' . $products->id) . '" class="btn btn-primary btn-xs dt-edit" style="margin-right:16px;"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>';
                    $button .= '<button data-product="' . $products->id . '" class="btn btn-danger btn-xs dt-delete delete"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>';
                    return $button;
                })
                ->addColumn('checkbox', function ($products)
                {
                    return '<input type="checkbox" data-id="' . $products->id . '" name="checkItem" class="delete_checkbox" class="checkItem">';
                })
                ->addColumn('image', function ($products)
                {
                    $url = asset("resources/upload/product/$products->image");
                    return '<img src=' . $url . ' border="0"  class="img-rounded" align="center" />';
                })
                ->addColumn('status', function ($products)
                {
                    $status = $products->status;
                    $check = $status ? 'checked' : '';
                    return '<input data-id="' . $products->id . '" id="toggle-demo" name="status" class="toggle-class"
                            type="checkbox" data-onstyle="success"
                            data-offstyle="danger" data-toggle="toggle"
                            data-on="Active" data-off="InActive"
                            ' . $check . '
                            >';
                })
                ->addColumn('cate_product', function ($products)
                {
                    $cate_detail = $this->cate_product_detailRepo->findById($products['cate_product_detail_id']);
                    return $cate_detail->name;
                })
                ->addColumn('product_name', function ($products)
                {
                    $product_info = "<span>$products->product_name</span><br>";
                    $product_info .= '
                                        <span><i class="fa fa-usd" aria-hidden="true"> ' . number_format($products->price_new, 0, ",", ".") . '  (đ)</i></span>
                                       ';
                    return $product_info;
                })
                ->rawColumns(['action', 'checkbox', 'image', 'status', 'cate_product', 'product_name'])
                ->make(true);
        }
        return response()->json([
            'message' => 'oke',
        ]);
    }


    public function changeStatusProduct(Request $request)
    {
        $product = $this->productRepo->getchangeStatus($request);
        return response()->json(['success' => 'Thay đổi trạng thái thành công']);
    }

    public function get_add(Request $request)
    {
        $cate_detail = $this->cate_product_detailRepo->all();
        return view('admin.product.add', compact('cate_detail'));
    }

    public function post_add(Request $request)
    {
        $rules = [
            'product_name' => 'required|unique:product,product_name',
            'product_name_en' => 'required|unique:product,product_name_en',
            'price_new' => 'required',
            'fimage' => 'required|image',
            'selling_product' => 'required',
            'featured_product' => 'required',
            'qty_product' => 'required',
        ];
        $message = [
            'product_name.required' => 'Vui lòng nhập tên sản phẩm (vn)',
            'product_name.unique' => 'Tên sản phẩm (vn) này đã tồn tại',
            'product_name_en.required' => 'Vui lòng nhập tên sản phẩm (en)',
            'product_name_en.unique' => 'Tên sản phẩm (en) này đã tồn tại',
            'price_new.required' => 'Vui lòng nhập giá mới',
            'fimage.required' => 'Vui lòng upload image',
            'fimage.image' => 'File này không phải là image',
            'selling_product.required' => 'Vui lòng chọn sản phẩm bán chạy',
            'featured_product.required' => 'Vui lòng chọn sản phẩm nổi bật',
            'qty_product.required' => 'Vui lòng nhập số lượng tồn kho',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails())
        {
            return response()->json([
                'error' => true,
                'message' => $validator->errors(),
            ]);
        }
        else
        {
            $this->productRepo->addProduct($request);
            return response()->json([
                'error' => false,
                'message' => 'Thêm thành công',
            ]);
        }
    }

    public function get_edit($id)
    {
        $cate_detail = $this->cate_product_detailRepo->all();
        $product = $this->productRepo->findOrFail($id);
        $list_image = $this->productRepo->findOrFailPosition($id);
        return view('admin.product.edit', compact('cate_detail', 'product', 'list_image'));
    }

    public function post_edit(Request $request, $id, Product $product)
    {
        $rules = [
            'product_name' => 'required|unique:product,product_name,' . $id,
            'product_name_en' => 'required|unique:product,product_name_en,' . $id,
            'price_new' => 'required',
            'fimage' => 'image',
            'qty_product' => 'required',
        ];
        $message = [
            'product_name.required' => 'Vui lòng nhập tên sản phẩm (vn)',
            'product_name.unique' => 'Tên sản phẩm (vn) này đã tồn tại',
            'product_name_en.required' => 'Vui lòng nhập tên sản phẩm (en)',
            'product_name_en.unique' => 'Tên sản phẩm (en) này đã tồn tại',
            'price_new.required' => 'Vui lòng nhập giá mới',
            'fimage.image' => 'File này không phải là image',
            'qty_product.required' => 'Vui lòng nhập số lượng tồn kho',
        ];
        $validator = Validator::make($request->all(), $rules, $message);
        if ($validator->fails())
        {
            return response()->json([
                'error' => true,
                'message' => $validator->errors(),
            ]);
        }
        else
        {
            $this->productRepo->updateProduct($request, $id);
            return response()->json([
                'error' => false,
                'message' => 'Cập nhật thành công',
            ]);
        }
    }

    // ajax delete img
    public function getDeleteImages(Request $request, $id)
    {
        if ($request->ajax())
        {
            $this->productRepo->get_del_img($id, $request);
            return "oke";
        }
    }

    public function post_sortTable(Request $request)
    {
        if ($request->ajax())
        {
            $this->productRepo->sortPosition($request);
            return "oke";
        }
    }

    public function get_delete($id)
    {
        $this->productRepo->get_del_product($id);
        $this->productRepo->delete($id);
        return response()->json([
            'success' => true,
            'message' => 'success',
        ]);
    }

    public function get_delete_all(Request $request)
    {

        $this->productRepo->get_del_all($request);
        return response()->json([
            'success' => true,
            'message' => "Success"
        ]);
    }
}
