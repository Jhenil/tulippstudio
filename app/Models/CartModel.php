<?php

namespace App\Models;

use CodeIgniter\Model;

class CartModel extends Model
{
    protected $table = 'cart';
    protected $primaryKey = 'cart_id';
    protected $allowedFields = ['user_id', 'product_id', 'quantity', 'created_at'];

    public function getCartByUserId($user_id)
    {
        return $this->where('user_id', $user_id)
                    ->join('products', 'products.product_id = cart.product_id')
                    ->select('cart.*, products.name, products.price, products.image_url, products.product_quantity')
                    ->findAll();
    }
}
