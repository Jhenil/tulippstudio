<?php

namespace App\Controllers;

use App\Models\CartModel;
use App\Models\ProductsModel;

class Cart extends BaseController
{
    protected $productModel;
    protected $cartModel;

    public function __construct()
    {
        $this->productModel = new ProductsModel();
        $this->cartModel = new CartModel();
    }

    public function index()
    {
        $session = session();
        if (!$session->has('user_id')) {
            return redirect()->to('/login');
        }

        $user_id = $session->get('user_id');

        $cartModel = new CartModel();
        $cartItems = $cartModel->getCartByUserId($user_id);

        return view('cart', ['cartItems' => $cartItems]);
    }

    // public function addToCart($product_id)
    // {
    //     $session = session();
    //     if (!$session->has('user_id')) {
    //         return redirect()->to('/login');
    //     }

    //     $user_id = $session->get('user_id');
    //     $cartModel = new CartModel();

    //     $existingItem = $cartModel->where('user_id', $user_id)
    //                               ->where('product_id', $product_id)
    //                               ->first();

    //     if ($existingItem) {
    //         $newQuantity = $existingItem['quantity'] + 1;
    //         $cartModel->update($existingItem['cart_id'], ['quantity' => $newQuantity]);
    //     } else {
    //         $cartModel->insert([
    //             'user_id' => $user_id,
    //             'product_id' => $product_id,
    //             'quantity' => 1
    //         ]);
    //     }

    //     return redirect()->to('/cart');
    // }

    public function addToCart()
    {
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');
        $userId = session()->get('user_id');

        if (!$userId) {
            return redirect()->to(base_url('login'))->with('error', 'Please log in to add items to the cart');
        }

        // Retrieve product information
        $product = $this->productModel->find($productId);

        if ($product) {
            // Check if the product is already in the cart
            $existingCartItem = $this->cartModel->where('user_id', $userId)
                ->where('product_id', $productId)
                ->first();

            if ($existingCartItem) {
                // If already in cart, update quantity
                $newQuantity = $existingCartItem['quantity'] + $quantity;
                $this->cartModel->update($existingCartItem['cart_id'], ['quantity' => $newQuantity]);
            } else {
                // If not, insert a new cart item
                $this->cartModel->insert([
                    'user_id' => $userId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }

            return redirect()->to(base_url('cart'))->with('success', 'Product added to cart');
        } else {
            return redirect()->back()->with('error', 'Product not found');
        }
    }


    public function update()
    {
        $product_id = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity');

        $user_id = session()->get('user_id');

        if ($quantity == 0 || !$quantity) {
            return $this->removeFromCart($product_id);
        }

        // Update the cart in the database
        $this->cartModel->where('user_id', $user_id)
            ->where('product_id', $product_id)
            ->set(['quantity' => $quantity])
            ->update();

        return redirect()->to('/cart');
    }

    public function removeFromCart($product_id)
    {
        $cartModel = new CartModel();
        $cartModel->where('user_id', session()->get('user_id'))
            ->where('product_id', $product_id)
            ->delete();

        return redirect()->to('/cart');
    }

    public function clearCart()
    {
        $session = session();
        $user_id = $session->get('user_id');
        $cartModel = new CartModel();

        $cartModel->where('user_id', $user_id)->delete(); // Delete all items for this user

        return redirect()->to('/cart');
    }
}
