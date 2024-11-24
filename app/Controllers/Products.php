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

    public function search()
    {
        $searchTerm = $this->request->getGet('search');

        $productModel = new ProductsModel();

        if ($searchTerm) {
            $products = $productModel->searchProducts($searchTerm);
        } else {
            $products = $productModel->findAll();
        }

        return view('store', ['products' => $products]);
    }


    public function liveSearch()
    {
        $searchTerm = $this->request->getGet('search');  // Retrieve search term from the query string

        $productModel = new ProductsModel();  // Instantiate the model

        // If a search term is provided, search for products
        if ($searchTerm) {
            $products = $productModel->searchProducts($searchTerm);
        } else {
            // If no search term, return all products
            $products = $productModel->findAll();
        }

        // Return the result as JSON
        return $this->response->setJSON($products);
    }
}
