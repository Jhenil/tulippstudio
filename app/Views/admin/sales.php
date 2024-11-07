<?php include 'header.php'; ?>
<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <h1>Sales</h1>
    </div>

    <div class="table-section">
        <table>
            <thead>
                <tr>
                    <th>Sale ID</th>
                    <th>Product Name</th>
                    <th>User</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sales as $sale): ?>
                    <tr>
                        <td><?= $sale['id']; ?></td>
                        <td><?= $sale['product_name']; ?></td>
                        <td><?= $sale['user_fname'] . ' ' . $sale['user_lname']; ?></td>
                        <td><?= $sale['quantity']; ?></td>
                        <td>₹<?= $sale['total_price']; ?></td>
                        <td><?= ucfirst($sale['status']); ?></td>
                        <td><?= $sale['created_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php'; ?>