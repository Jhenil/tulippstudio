<?php include 'header.php' ?>
<!-- Home Section -->
<!-- <section id="home" class="background-image">
  <div class="image-text-container">
    <div class="overlay-text">
      Check Out Our Latest Additions! <br>
      Explore Now! <br>
      <a class="store-button" href="<?php // echo base_url(); 
                                    ?>store">View All Products</a>
    </div>
  </div>
</section> -->

<section id="home">
  <div class="image-text-container">
    <div class="background-image"></div>
    <div class="overlay"></div>
    <div class="overlay-text">
      <p>Check Out Our Latest Additions! <br>
        Explore Now! <br></p>
      <a class="store-button" href="<?php echo base_url(); ?>store">View All Products</a>
    </div>
  </div>
</section>


<!-- <img
      src="http://localhost/tulippstudio/assets/images/assets/tulippstudio.png"
      alt="Background with jewelry display"
      class="background-image"
      style="opacity: 0.7" /> -->

<!-- Featured Products Section -->
<section id="featured-products">
  <h2>Featured Products</h2>
  <div class="hr-center">
    <hr width="10%" style="background-color: black; border: 1px solid #ecbcbf; margin-bottom: 20px;" />
  </div>
  <div class="product-grid">
    <?php foreach ($products as $product) { ?>
      <div class="product-item">
        <img src="http://localhost/tulippstudio/assets/images/products/<?php echo $product['image_url']; ?>" alt="<?php echo $product['name'] ?>" />
        <h3><?php echo $product['name']; ?></h3>
        <p>Price: ₹<?php echo $product['price']; ?></p>
        <a href="<?php echo base_url(); ?>store" class="info-button">More Info</a>
      </div>
    <?php } ?>
  </div>
</section>


<!-- About Section -->
<section id="about">
  <div class="about-content">
    <h2>About Tulippstudio</h2>
    <p>
      At Tulippstudio, each piece of jewelry is handcrafted with precision and passion. We specialize in creating unique and intricate designs using high-quality materials like beads, gemstones, and metals. Our pieces are thoughtfully designed to blend traditional craftsmanship with contemporary aesthetics, ensuring that every item is not just an accessory, but a work of art.
      <br>
      <br>
      We take pride in our attention to detail, from the selection of the finest beads to the meticulous assembly of each piece. Whether it's a delicate bracelet, a statement necklace, or a pair of elegant earrings, you can be sure that every item is made with care, love, and a deep appreciation for the art of jewelry making.
      <br>
      <br>
      Tulippstudio isn't just about jewelry; it's about telling stories through our creations. Every bead, every clasp, every twist of wire is part of a larger narrative that celebrates beauty, creativity, and individuality. Join us on this journey and discover pieces that resonate with your personal style and story.
    </p>
  </div>
</section>

<!-- Contact Us Section -->
<section id="contactUs">
  <div class="contact-content">
    <h2>Contact Us</h2>
    <p>We would love to hear from you! Reach out to us at:</p>
    <ul>
      <li>Email: support@tulipstudio.com</li>
      <!-- <li>Phone: +91 23456 78900</li> -->
      <!-- <li>Address: lalalalallalalalalal</li> -->
    </ul>
  </div>
</section>
<script>
  function increaseQuantity(productId) {
    let quantityInput = document.getElementById('quantity-' + productId);
    let currentQuantity = parseInt(quantityInput.value);
    let maxQuantity = parseInt(quantityInput.max);

    if (currentQuantity < maxQuantity) {
      quantityInput.value = currentQuantity + 1;
      updateTotalPrice(productId, <?php echo $product['price']; ?>);
    }
  }

  function decreaseQuantity(productId) {
    let quantityInput = document.getElementById('quantity-' + productId);
    let currentQuantity = parseInt(quantityInput.value);

    if (currentQuantity > 1) {
      quantityInput.value = currentQuantity - 1;
      updateTotalPrice(productId, <?php echo $product['price']; ?>);
    }
  }

  function updateTotalPrice(productId, basePrice) {
    let quantityInput = document.getElementById('quantity-' + productId).value;
    let totalPriceElement = document.getElementById('total-price-' + productId);

    let totalPrice = basePrice * quantityInput;
    totalPriceElement.innerHTML = 'Price: ₹' + totalPrice;

    document.getElementById('selected-quantity-' + productId).value = quantityInput;
  }
</script>
<?php include 'footer.php' ?>