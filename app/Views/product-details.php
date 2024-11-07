<?php include 'header.php' ?>

<div class="product-detail-container">
    <div class="product-image">
        <img src="<?= base_url("assets/images/products/" . $product['image_url']) ?>" alt="<?= $product['name'] ?>">
    </div>
    <div class="product-info">
        <h1><?= $product['name'] ?></h1>
        <p class="price">Price: <?= $product['price']; ?></p>
        <p class="description"><?= $product['description'] ?></p>
        <p>Quantity: <?php echo $product['product_quantity']; ?></p>
        <!-- Add to Cart Form -->
        <div class="product-actions">
            <div class="quantity-container">
                <div class="quantity-counter">
                    <button type="button" class="quantity-btn" onclick="decreaseQuantity(<?php echo $product['product_id']; ?>, <?php echo $product['price']; ?>)">-</button>
                    <input type="number" id="quantity-<?php echo $product['product_id']; ?>" name="quantity" value="1" min="1" max="<?php echo $product['product_quantity']; ?>" readonly />
                    <button type="button" class="quantity-btn" onclick="increaseQuantity(<?php echo $product['product_id']; ?>, <?php echo $product['price']; ?>)">+</button>
                </div>
            </div>
            <form action="<?= base_url('cart/add') ?>" method="post" class="buy-form">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>">
                <input type="hidden" id="selected-quantity-<?php echo $product['product_id']; ?>" name="quantity" value="1">
                <button type="submit" class="buy-button">Add to cart</button>
            </form>
        </div>
    </div>
</div>

<script src="http://localhost/tulippstudio/assets/js/store.js"></script>
<?php include 'footer.php' ?>