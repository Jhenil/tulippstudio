<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';
    protected $allowedFields = [
        'order_id',
        'user_id',
        'total_amount',
        'status',
        'created_at',
        'updated_at'
    ];

    public function getOrders()
    {
        // return $this->select('sales.*, products.name AS product_name, users.user_fname, users.user_lname, users.email')
        //     ->join('products', 'products.product_id = sales.product_id')
        //     ->join('users', 'users.user_id = sales.user_id', 'users.user_fname')
        //     ->findAll();
        return $this->db->table('orders')
            ->select('orders.order_id, orders.total_amount, orders.status, orders.created_at, users.user_fname')
            ->join('users', 'orders.user_id = users.user_id')
            ->get()
            ->getResultArray();

        // return $this->findAll();
    }

    public function updateStatus($id, $status)
    {
        return $this->update($id, ['status' => $status]);
    }
}
