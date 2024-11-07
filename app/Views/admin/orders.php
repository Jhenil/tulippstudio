<!-- orders.php -->
<?php include 'header.php' ?>
<div class="main-content">
    <div class="header">
        <h1>Manage Orders</h1>
    </div>
    <div class="orders-section">
        <?php if (!empty(session()->getFlashdata('status'))): ?>
            <div class="status-message"><?= session()->getFlashdata('status') ?></div>
        <?php endif; ?>
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Order Number</th>
                    <th>Customer Name</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td><?= $order['order_id']; ?></td>
                            <td><?= $order['customer_name']; ?></td>
                            <td>₹<?= $order['total_amount']; ?></td>
                            <td><?= ucfirst($order['status']); ?></td>
                            <td>
                                <form action="/admin/updateOrderStatus" method="post">
                                    <select name="status">
                                        <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="shipped" <?= $order['status'] == 'shipped' ? 'selected' : ''; ?>>Shipped</option>
                                        <option value="completed" <?= $order['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                                    </select>
                                    <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
                                    <button type="submit">Update</button>
                                </form>
                                <a href="/admin/deleteOrder/<?= $order['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No orders available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php' ?>