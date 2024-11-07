<?php

namespace App\Controllers;

use App\Models\ProductsModel;

class Home extends BaseController
{

    public function index(): string
    {
        $model = new ProductsModel();
        $data['products'] = $model->query("SELECT * FROM `products` WHERE `featured` = 1")->getResultArray();
        

        return view('index', $data);
    }

    public function store()
    {
        $model = new ProductsModel();
        // $products = $model->findAll();
        $products = $model->query("SELECT * FROM `products` WHERE `status`=1");
        $products = $products->getResultArray();

        return view('store',  ['products' => $products]);
    }
}
