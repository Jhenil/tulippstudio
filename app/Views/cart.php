<?php include 'header.php'; ?>

<section id="cart-page">
    <h1>Your Shopping Cart</h1>
    <br>
    <?php if (!empty($cartItems)) { ?>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Product Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $grandTotal = 0;
                foreach ($cartItems as $item) {
                    $itemTotal = $item['price'] * $item['quantity'];
                    $grandTotal += $itemTotal;
                ?>
                    <tr>
                        <td>
                            <img src="http://localhost/tulippstudio/assets/images/products/<?php echo $item['image_url']; ?>"
                                alt="<?php echo $item['name']; ?>"
                                style="width: 100px; height: auto;" />
                        </td>
                        <td><?php echo $item['name']; ?></td>
                        <td id="price-<?php echo $item['product_id']; ?>">₹<?php echo $item['price']; ?></td>
                        <td class="quantity-container">
                            <div class="quantity-container">
                                <button type="button" class="quantity-btn" onclick="decreaseQuantity(<?php echo $item['product_id']; ?>, <?php echo $item['price']; ?>)">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <input type="number" id="quantity-<?php echo $item['product_id']; ?>" max="<?php echo $item['product_quantity']; ?>" name="quantity" value="<?php echo $item['quantity']; ?>" readonly />
                                <button type="button" class="quantity-btn" onclick="increaseQuantity(<?php echo $item['product_id']; ?>, <?php echo $item['price']; ?>,  <?php echo $item['product_quantity']; ?>)">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button type="button" class="quantity-btn red" onclick="removeItem(<?php echo $item['product_id']; ?>)">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                            <form action="<?= base_url('cart/update') ?>" method="post" class="buy-form" id="form-<?php echo $item['product_id']; ?>">
                                <input type="hidden" name="product_id" value="<?php echo $item['product_id']; ?>">
                                <input type="hidden" id="selected-quantity-<?php echo $item['product_id']; ?>" name="quantity" value="<?php echo $item['quantity']; ?>">
                            </form>
                        </td>
                        <td>₹<?php echo $itemTotal; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="total">
            <h3>Grand Total: ₹<?php echo $grandTotal; ?></h3>
            <form action="<?= base_url('checkout/process') ?>" method="post">
                <button type="submit" class="update-btn">Place Order</button>
            </form>
        </div>
    <?php } else { ?>
        <p>Your cart is empty.</p>
    <?php } ?>
</section>


<script src="http://localhost/tulippstudio/assets/js/cart.js"></script>
<?php include 'footer.php'; ?>