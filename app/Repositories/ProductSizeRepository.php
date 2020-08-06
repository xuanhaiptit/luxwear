<?php


namespace App\Repositories;

use App\List_image;
use App\Product_size;
use Bosnadev\Repositories\Eloquent\Repository;
use App\Repositories\BaseRepository;
use File;
use Input;

class ProductSizeRepository extends Repository implements RepositoryInterface
{
    public function model()
    {
        return "App\Product_size";
    }

    /**
     * @inheritDoc
     */
    public function findById(int $id)
    {
        // TODO: Implement findById() method.
    }

    /**
     * @inheritDoc
     */
    public function findOrFail($id, $columns = array('*'))
    {
        // TODO: Implement findOrFail() method.
    }

    public function getchangeStatus($request)
    {
        // TODO: Implement getchangeStatus() method.
    }

    public function sizeProduct($id = NULL, $product_size_id = NULL)
    {
        $this->applyCriteria();
        if ($id == NULL && $product_size_id == NULL)
        {
            $sizeProduct = Product_size::join('size', 'product_size.size_id', '=', 'size.id')
                ->get();
            return $sizeProduct;
        }
        if ($id == NULL && $product_size_id != NULL)
        {
            $sizeProduct = Product_size::join('size', 'product_size.size_id', '=', 'size.id')
                ->where('product_size.id', '=', $product_size_id)
                ->get();
            return $sizeProduct;
        }
        $sizeProduct = Product_size::join('size', 'product_size.size_id', '=', 'size.id')
            ->where('product_size.product_id', '=', $id)
            ->get();
        return $sizeProduct;
    }

    public function productSize($product_id, $size_id)
    {
        $this->applyCriteria();
        $productSize = Product_size::query()->where('product_id', '=', $product_id)->where('size_id', '=', $size_id)->get();
        return $productSize;
    }

    public function deleteProductSize($product_id, $size_id)
    {
        Product_size::deleted()->where('product_id', '=', $product_id)->where('size_id', '=', $size_id)->get();
    }
}
