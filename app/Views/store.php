<?php include 'header.php' ?>

<section id="half-home">
    <div class="half-image-text-container">
        <div class="background-image"></div>
        <div class="overlay"></div>
        <div class="overlay-text">
            <p class="our-store">Welcome to the store!</p>
            <hr width="30%" color="#ecbcbf" style="border: 0; height: 1px; box-shadow: 0px 0px 25px #ecbcbf;">
        </div>
    </div>
</section>

<!-- Store Section -->
<section id="store">
    <h2 align='center' style="color: #ecbcbf;">Tulippstudio Store</h2>
    <div class="hr-center">
        <hr width="10%" style="background-color: black; border: 1px solid #ecbcbf; margin-bottom: 20px;" />
    </div>
    <div class="product-grid">
        <?php if (!empty($products)) { ?>
            <?php foreach ($products as $product) { ?>
                <div class="product-item">
                    <a href="<?php echo base_url('product-details/' . $product['product_id']); ?>">
                        <img src="http://localhost/tulippstudio/assets/images/products/<?php echo $product['image_url']; ?>" alt="<?php echo $product['name'] ?>" />
                    </a>
                    <a href="<?php echo base_url('product-details/' . $product['product_id']); ?>">
                        <h3><?php echo $product['name']; ?></h3>
                    </a>
                    <p>Quantity Available: <?php echo $product['product_quantity']; ?></p>
                    <p id="total-price-<?php echo $product['product_id']; ?>">Price: ₹<?php echo $product['price']; ?></p>
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
            <?php } ?>
        <?php } else { ?>
            <p>No products available.</p>
        <?php } ?>
    </div>
</section>

<script src="http://localhost/tulippstudio/assets/js/store.js"></script>
<?php include 'footer.php' ?>