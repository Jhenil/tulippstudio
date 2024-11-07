<?php

namespace App\Models;

use CodeIgniter\Model;

class SalesModel extends Model
{
    protected $table = 'sales';
    protected $allowedFields = [
        'product_id',
        'user_id',
        'quantity',
        'total_price',
        'status',
        'created_at',
        'updated_at'
    ];

    public function getSalesWithDetails()
    {
        return $this->select('sales.*, products.name AS product_name, users.user_fname, users.user_lname, users.email')
            ->join('products', 'products.product_id = sales.product_id')
            ->join('users', 'users.user_id = sales.user_id')
            ->findAll();
    }
}
