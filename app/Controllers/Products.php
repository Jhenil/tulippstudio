<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductsModel;
use CodeIgniter\HTTP\ResponseInterface;

class Products extends BaseController
{
    public function detail($id)
    {
        $productModel = new ProductsModel();

        $product = $productModel->find($id);

        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found');
        }

        return view('product-details', ['product' => $product]);
    }
}
