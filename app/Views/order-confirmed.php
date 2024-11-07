<?php include 'header.php'; ?>

<div class="checkout-container">
    <h1>Order Placed Successfully!</h1>
    <p>Thank you for your order. You will receive a confirmation email shortly.</p>
    <h2>Order Details:</h2>
    <table>
        <tr>
            <th>Order Number:</th>
            <td><?php echo '123'; ?></td>
        </tr>
        <tr>
            <th>Shipper:</th>
            <td><?php echo 'Your Shipper Name'; ?></td>
        </tr>
        <tr>
            <th>Order Date:</th>
            <td><?php echo date('Y-m-d H:i:s'); ?></td>
        </tr>
        <tr>
            <th>Total Amount:</th>
            <td><?php echo '$' . number_format(50.00, 2); ?></td>
        </tr>
        <tr>
            <th>Shipping Address:</th>
            <td><?php echo '123 Street, City, State, Zip'; ?></td>
        </tr>
    </table>
    <a href="<?= base_url('store'); ?>" class="checkout-btn">Surf more!</a>
</div>

<?php include 'footer.php'; ?>