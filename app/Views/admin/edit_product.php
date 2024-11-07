<?php include 'header.php' ?>
<div class="main-content">
    <div class="product-form">
        <h2>Edit Product</h2>

        <?php if (session()->getFlashdata('message')): ?>
            <!-- <p class="message"><?php echo session()->getFlashdata('message'); ?></p> -->
        <?php endif; ?>

        <form action="<?php echo base_url(); ?>admin/product/update/<?php echo $product['product_id']; ?>" method="post" enctype="multipart/form-data">

            <input type="hidden" name="id" value="<?php echo $product['product_id']; ?>">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo esc($product['name']); ?>" required><br><br>

            <label for="image">Image:</label>
            <input type="file" class="" id="image" name="image_url">

            <label for="image">Current Image:</label>
            <img src="<?= base_url(); ?>assets/images/products/<?php echo $product['image_url']; ?>" width="100">

            <br>
            <br>
            <label for="category">Category:</label>
            <select name="cat_id" id="cat_id">
                <option value="" selected disabled>Select Category</option>
                <option value="1" <?= $product['cat_id'] == '1' ? 'selected' : '' ?>>Charms</option>
            </select>

            <label for="featured">Featured?</label>
            <select name="featured" id="featured">
                <option value="1" <?= $product['featured'] == '1' ? 'selected' : '' ?>>Yes</option>
                <option value="0" <?= $product['featured'] == '0' ? 'selected' : '' ?>>No</option>
            </select>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo esc($product['description']); ?></textarea><br><br>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo esc($product['price']); ?>" step="0.01" required><br><br>

            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="<?php echo esc($product['quantity']); ?>" required><br><br>

            <button type="submit">Update Product</button>
        </form>
    </div>
</div>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.title = 'Edit Product - Tulippstudio';
    });
</script>
<?php include 'footer.php' ?>