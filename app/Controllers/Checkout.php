<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\OrderModel;
use App\Models\OrderItemModel;

class Checkout extends BaseController
{
    public function index()
    {
        $user_id = session()->get('user_id');
        $cartModel = new CartModel();
        $cartItems = $cartModel->getCartByUserId($user_id);

        return view('checkout', ['cartItems' => $cartItems]);
    }

    public function process()
    {
        $user_id = session()->get('user_id');
        $cartModel = new CartModel();
        $orderModel = new OrderModel();
        $orderItemsModel = new OrderItemModel();

        $cartItems = $cartModel->getCartByUserId($user_id);
        if (empty($cartItems)) {
            return redirect()->back()->with('error', 'Your cart is empty.');
        }

        // Start a transaction
        $db = \Config\Database::connect();
        $db->transStart();

        // Create the order
        $orderData = [
            'user_id' => $user_id,
            'total_amount' => array_sum(array_map(function ($item) {
                return $item['price'] * $item['quantity'];
            }, $cartItems)),
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $order_id = $orderModel->insert($orderData);

        // Insert each cart item as an order item
        foreach ($cartItems as $item) {
            $orderItemsModel->insert([
                'order_id' => $order_id,
                'product_id' => $item['product_id'],
                'order_quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        $cartModel->where('user_id', $user_id)->delete();

        $db->transComplete();

        if ($db->transStatus() === FALSE) {
            return redirect()->back()->with('error', 'Error placing order.');
        }

        return redirect()->to('order-confirmed');
    }

    public function order_confirmed()
    {
        // $user_id = session()->get('user_id');
        return view('order-confirmed');
    }
}
