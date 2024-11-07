<?php include 'header.php' ?>

<section id="checkout">
    <h2>Checkout</h2>
    <div class="hr-center">
        <hr width="10%" style="background-color: black; border: 1px solid #ecbcbf; margin-bottom: 20px;" />
    </div>

    <div class="cart-container">
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product Image</th>
                    <th>Product Name</th>
                    <th>Order Quantity</th>
                    <th>Price (₹)</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $item) { ?>
                    <tr class="cart-item">
                        <td>
                            <img src="<?php echo base_url() ?>/assets/images/products/<?= $item['image_url'] ?>" alt="<?= $item['name'] ?>" style="width: 100px; height: auto;">
                        </td>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>₹<?= $item['price'] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <form action="<?= base_url('checkout/process') ?>" method="post">
            <button type="submit" class="checkout-button">Place Order</button>
        </form>
    </div>


</section>

<?php include 'footer.php' ?>