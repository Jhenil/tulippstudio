<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ProductsModel as ModelsProductsModel;
use CodeIgniter\API\ResponseTrait;

class Products extends BaseController
{

    public function index()
    {
        $model = new ModelsProductsModel();
        $data['products'] = $model->findAll();

        // Additional data for widgets and orders if needed
        // $data['totalSales'] = ...;
        // $data['totalOrders'] = ...;
        // $data['totalUsers'] = ...;
        // $data['lowStockAlerts'] = ...;
        // $data['recentOrders'] = ...;

        return view('Admin/products', $data);
    }

    public function add_product()
    {
        return view('Admin/add_product');
    }

    public function create()
    {
        $productModel = new ModelsProductsModel();

        $file = $this->request->getFile('image');

        $file_name = $file->getRandomName();
        $file_exp_name = explode('.', $file_name);
        $file_new_name = random_int(0, 9999) . "." . end($file_exp_name);
        if (!$file->move(ROOTPATH . 'assets/images/products', $file_new_name)) {
            echo "Failed to move the image file.";
        }
        $productModel->save([
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'cat_id'      => $this->request->getPost('cat_id'),
            'price'       => $this->request->getPost('price'),
            'product_quantity'    => $this->request->getPost('quantity'),
            'featured'    => $this->request->getPost('featured'),
            'image_url'   => $file_new_name,
        ]);

        return redirect()->to('admin/products')->with('message', 'Product added successfully!');
    }

    public function edit($id = null)
    {
        $model = new ModelsProductsModel();

        // Fetch product details
        $data['product'] = $model->find($id);

        // Check if product exists
        if (empty($data['product'])) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Product not found');
        }

        // Return the view
        return view('admin/edit_product', $data);
    }

    use ResponseTrait;
    public function update($id)
    {
        $model = new ModelsProductsModel();
        $link = service('uri');
        $id = $link->getSegment(4);
        // $id = $this->request->getPost('id');

        $image = $this->request->getFile('image_url');
        if ($image && $image->isValid() && !$image->hasMoved()) {
            $uploadPath = ROOTPATH . 'assets/images/products/';
            $image_new_name = random_int(0, 9999) . '.' . $image->getExtension();
            if (!$image->move($uploadPath, $image_new_name)) {
                return $this->respond([
                    'status' => false,
                    'message' => "Failed to move uploaded image.",
                ]);
            } else {
                $model->update($id, [
                    'image_url' => $image_new_name
                ]);
            }
        }

        $data = [
            'name'        => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'price'       => $this->request->getPost('price'),
            'product_quantity'    => $this->request->getPost('quantity'),
            'category_id' => $this->request->getPost('category_id'),
            'featured'    => $this->request->getPost('featured'),
        ];

        // Update the product
        $model->update($id, $data);

        // Redirect or return success message
        return redirect()->to('admin/products')->with('message', 'Product updated successfully');
    }


    public function delete($id)
    {
        $model = new ModelsProductsModel();
        $data = $model->find($id);
        if ($data['status'] == 1) {
            $product = $model->query("UPDATE `products` SET `status` = '0' WHERE `products`.`id` = $id;");
        }
        if ($data['status'] == 0) {
            $product = $model->query("UPDATE `products` SET `status` = '1' WHERE `products`.`id` = $id;");
        }
        // if ($data && $data['image_url']) {
        //     $filePath = 'http://localhost/tulippstudio/assets/images/products/' . $product['image_url'];
        //     if (file_exists($filePath)) {
        //         unlink($filePath);
        //     }
        // }
        return redirect()->to('admin/products');
    }
}
