<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\OrderModel;

class Orders extends BaseController
{
    public function orders()
    {
        $ordersModel = new OrderModel();
        $data['orders'] = $ordersModel->getOrders();

        return view('admin/orders', $data);
    }

    public function updateOrderStatus()
    {
        $ordersModel = new OrderModel();
        $orderId = $this->request->getPost('order_id');
        $status = $this->request->getPost('status');

        if ($ordersModel->updateStatus($orderId, $status)) {
            return redirect()->to('/admin/orders')->with('status', 'Order status updated successfully.');
        } else {
            return redirect()->to('/admin/orders')->with('status', 'Failed to update order status.');
        }
    }
}
