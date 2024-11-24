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


    <!-- Search Bar -->
    <div class="search-bar-container" style="text-align: center; margin-bottom: 30px;">
        <input type="text" id="live-search" placeholder="Looking for something specific?" style="padding: 10px; width: 80%; max-width: 400px; font-size: 16px; border: 1px solid #ccc; border-radius: 5px;" />
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
                            <button type="submit" class="cartBtn">
                                <svg class="cart" fill="white" viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0 24C0 10.7 10.7 0 24 0H69.5c22 0 41.5 12.8 50.6 32h411c26.3 0 45.5 25 38.6 50.4l-41 152.3c-8.5 31.4-37 53.3-69.5 53.3H170.7l5.4 28.5c2.2 11.3 12.1 19.5 23.6 19.5H488c13.3 0 24 10.7 24 24s-10.7 24-24 24H199.7c-34.6 0-64.3-24.6-70.7-58.5L77.4 54.5c-.7-3.8-4-6.5-7.9-6.5H24C10.7 48 0 37.3 0 24zM128 464a48 48 0 1 1 96 0 48 48 0 1 1 -96 0zm336-48a48 48 0 1 1 0 96 48 48 0 1 1 0-96z"></path>
                                </svg>
                                ADD TO CART
                            </button>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('#live-search').on('keyup', function() {
            var searchTerm = $(this).val();

            $.ajax({
                url: "<?= base_url('store/liveSearch') ?>",
                method: "GET",
                data: {
                    search: searchTerm
                },
                success: function(response) {
                    $('.product-grid').empty();
                    if (response.length > 0) {
                        $.each(response, function(index, product) {
                            var productHTML = `
                            <div class="product-item">
                                <a href="<?= base_url('product-details') ?>/${product.product_id}">
                                    <img src="http://localhost/tulippstudio/assets/images/products/${product.image_url}" alt="${product.name}" />
                                </a>
                                <a href="<?= base_url('product-details') ?>/${product.product_id}">
                                    <h3>${product.name}</h3>
                                </a>
                                <p>Quantity Available: ${product.product_quantity}</p>
                                <p id="total-price-${product.product_id}">Price: ₹${product.price}</p>
                            </div>
                        `;
                            $('.product-grid').append(productHTML);
                        });
                    } else {
                        $('.product-grid').append('<p>No products found.</p>');
                    }
                }
            });
        });
    });
</script>

<?php include 'footer.php' ?>