<?php include 'header.php' ?>
<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <h1>Manage Products</h1>
        <a href="add_product">Add Product</a>
    </div>
    <!-- Product Management Section -->
    <div class="product-management">
        <div class="header">
            <h2></h2>
        </div>
        <div class="table-section">
            <h2>Product List</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Featured?</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= $product['product_id']; ?></td>
                            <td><?= $product['name']; ?></td>
                            <td><?= $product['description']; ?></td>
                            <td>₹<?= $product['price']; ?></td>
                            <td><?= $product['product_quantity']; ?></td>
                            <td>
                                <?php if ($product['featured'] == "1") {
                                    echo "Yes";
                                }
                                if ($product['featured'] == "0") {
                                    echo "No";
                                } ?>
                            </td>
                            <td>
                                <?php if (!empty($product['image_url'])): ?>
                                    <img src="http://localhost/tulippstudio/assets/images/products/<?php echo $product['image_url'] ?>" alt="<?= $product['name']; ?>" style="max-width: 100px; max-height: 100px;">
                                <?php else: ?>
                                    No image
                                <?php endif; ?>
                            </td>
                            <td>
                                <a class="delete" href="product/delete/<?php echo $product['product_id']; ?>">
                                    <!-- onclick="return confirm('Are you sure?');" -->
                                    <?php if ($product['status'] == "1") {
                                        echo "Inactive";
                                    }
                                    if ($product['status'] == "0") {
                                        echo "Active";
                                    } ?>

                                </a>
                                <a class="edit" href="product/edit/<?php echo $product['product_id']; ?>">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        document.title = 'Products - Tulippstudio';
    });
</script>
<?php include 'footer.php' ?>