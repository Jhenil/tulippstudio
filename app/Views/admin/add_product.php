<?php include 'header.php' ?>
<div class="product-form">
    <h1>Add a Product</h1>
    <form action="product/create" method="post" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Product Name" required>
        <textarea name="description" placeholder="Description"></textarea>
        <select name="cat_id" id="cat_id">
            <option value="" selected disabled>Select Category</option>
            <option value="1">Charms</option>
        </select>
        <select name="featured" id="featured">
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
        <input type="number" name="price" placeholder="Price" step="0.01" required>
        <input type="number" name="quantity" placeholder="Quantity" required>
        <input type="file" name="image" accept="image/*" required>
        <button type="submit">Add Product</button>
    </form>
</div>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.title = 'Add Product - Tulippstudio';
    });
</script>
<?php include 'footer.php' ?>