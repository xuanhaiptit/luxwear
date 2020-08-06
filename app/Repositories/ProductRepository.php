<?php


namespace App\Repositories;

use App\List_image;
use App\Product_size;
use App\Product;
use App\Repositories\ProductSizeRepository;
use Bosnadev\Repositories\Eloquent\Repository;
use App\Repositories\BaseRepository;
use File;
use Input;

class ProductRepository extends Repository implements RepositoryInterface
{
    public function model()
    {
        return "App\Product";
    }

    public function addProduct($request)
    {
        $product = new $this->model();
        $product->product_name = $request->product_name;
        $product->product_name_en = $request->product_name_en;
        $product->alias = changeTitle($request->product_name);
        $product->price_new = $request->price_new;
        $product->price_old = $request->price_old;
        $product->desc = $request->desc;
        $product->content = $request->content;
        $product->desc_en = $request->desc_en;
        $product->content_en = $request->content_en;
        $product->qty_product = $request->qty_product;
        $product->admin_id = get_data_user('admin');
        $product->cate_product_detail_id = $request->sltcate_detail;
        $product->selling_product = $request->selling_product;
        $product->featured_product = $request->featured_product;
        $product->status = $request->radio_status;
        if ($request->hasFile('fimage'))
        {
            $file = $request->file('fimage'); // lấy file image
            $file_name = $file->getClientOriginalName();
            $product->image = $file_name;
            $file->move('resources/upload/product/', $file_name);
        }
        $product->save();
        // list_image
        $product_id = $product->id; // lấy id

        $amount_size = array_filter($request->amount_size);
        for ($i = 0; $i < count($request->size_product); $i++)
        {
            $product_size = new Product_size();
            $product_size->product_id = $product_id;
            $product_size->size_id = $request->size_product[$i];
            $product_size->amount = $amount_size[$i];
            $product_size->save();
        }
        if ($request->hasFile('hinhchitiet'))
        {
            foreach ($file = $request->file('hinhchitiet') as $file)
            {
                $product_img = new List_image();
                if (isset($file))
                {
                    $file_name = $file->getClientOriginalName();
                    $product_img->image = $file_name;
                    $product_img->product_id = $product_id;
                    $file->move('resources/upload/product_detail/', $file_name);
                    $product_img->save();
                }
            }
        }
    }

    public function updateProduct($request, $id, $product_sizes)
    {
        $product = $this->model->find($id);
        $product->product_name = $request->input('product_name');
        $product->product_name_en = $request->input('product_name_en');
        $product->alias = changeTitle($request->input('product_name'));
        $product->price_new = $request->input('price_new');
        $product->price_old = $request->input('price_old');
        $product->desc = $request->input('desc');
        $product->content = $request->input('content');
        $product->desc_en = $request->input('desc_en');
        $product->content_en = $request->input('content_en');
        $product->qty_product = $request->input('qty_product');
        $product->cate_product_detail_id = $request->input('sltcate_detail');
        $product->selling_product = $request->input('selling_product');
        $product->featured_product = $request->input('featured_product');
        $product->status = $request->input('radio_status');

        $img_current = 'resources/upload/product/' . $request->input('img_current');
        if ($request->hasFile('fimage'))
        {
            $file = $request->file('fimage');
            $file_name = $file->getClientOriginalName();
            $product->image = $file_name;
            $file->move('resources/upload/product/', $file_name);
            if (File::exists($img_current))
            {
                File::delete($img_current);
            }
        }
        $product->save();
        // list-images

        $id_size_old = array();
        foreach ($product_sizes as $v)
        {
            array_push($id_size_old, $v->id);
        }
        $amount_size = array_filter($request->amount_size);
        $id_size_new = array();
        for ($i = 0; $i < count($request->size_product); $i++)
        {
            array_push($id_size_new, intval($request->size_product[$i]));
            if (in_array(intval($request->size_product[$i]), $id_size_old))
            {
                // update size
                $product_size_update = Product_size::query()->where('product_id', '=', $id)->where('size_id', '=', $request->size_product[$i])->first();
                $product_size_update->amount = $amount_size[$i];
                $product_size_update->save();
            }
            else
            {
                // add size
                $product_size = new Product_size();
                $product_size->product_id = $id;
                $product_size->size_id = $request->size_product[$i];
                $product_size->amount = $amount_size[$i];
                $product_size->save();
            }
        }
        foreach ($id_size_old as $id_size)
        {
            if (!in_array($id_size, $id_size_new))
            {
                $product_size_delete = Product_size::query()->where('product_id', '=', $id)->where('size_id', '=', $id_size)->first();
                $product_size_delete->delete();
            }
        }

        if ($request->hasFile('list_fImages'))
        {
            foreach ($request->file('list_fImages') as $file)
            {
                $product_img = new List_image();
                if (isset($file))
                {
                    $product_img->image = $file->getClientOriginalName();
                    $product_img->product_id = $id;
                    $file->move('resources/upload/product_detail/', $file->getClientOriginalName());
                    $product_img->save();
                }
            }
        }
    }

    //delete id
    public function get_del_product($id)
    {
        $list_image = $this->model->withoutGlobalScopes()->findOrFail($id)->fimage;
        foreach ($list_image as $image)
        {
            File::delete('resources/upload/product_detail/' . $image['image']);// xóa hình trong list_image
        }
        $product = $this->model->withoutGlobalScopes()->findOrFail($id);
        File::delete('resources/upload/product/' . $product['image']);
    }

    //delete img
    public function get_del_img($id, $request)
    {
        $idHinh = (int)$request->get('idHinh');
        $image_detail = List_image::withoutGlobalScopes()->findOrFail($idHinh);
        if (!empty($image_detail))
        {
            $img = 'resources/upload/product_detail/' . $image_detail->image;
            if (File::exists($img))
            {
                File::delete($img);
            }
            $image_detail->delete();
        }
    }

    // delete all
    public function get_del_all($request)
    {
        $array = $request->input('id');
        $product = $this->model->withoutGlobalScopes()->whereIn('id', $array);
        foreach ($product as $image)
        {
            File::delete('resources/upload/product/' . $image['image']);// xóa hình trong list_image
        }
        $product->delete();
    }

    // sort position
    public function findOrFailPosition($id)
    {
        $this->applyCriteria();
        $list_image = Product::join('list_image', 'product.id', '=', 'list_image.product_id')
            ->where('list_image.product_id', '=', $id)
            ->orderBy('list_image.position', 'asc')
            ->get();
        return $list_image;
    }

    public function sortPosition($request)
    {
        $menu = List_image::orderBy('position', 'ASC')->get();
        $itemId = $request->get('itemId');
        $itemIndex = $request->get('itemIndex');
        foreach ($menu as $item)
        {
            return List_image::where('id', '=', $itemId)->update(['position' => $itemIndex]);
        }
    }


    /**
     * @inheritdoc
     */
    public function findById(int $id)
    {
        return $this->model->where('id', $id)->first();
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function findOrFail($id, $columns = array('*'))
    {
        return $this->model->findOrFail($id, $columns);
    }

    public function orderBy($columns, $value)
    {
        return $this->model->orderBy($columns, $value);
    }

    public function getchangeStatus($request)
    {
        $model = $this->model::find($request->id);
        if (!$model)
        {
            echo "error";
        }
        else
        {
            $model->status = $request->status;
            $model->save();
        }
    }
}
