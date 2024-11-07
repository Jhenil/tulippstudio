<?php include 'header.php' ?>
<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <h1>Admin Dashboard</h1>
    </div>
    <div class="widgets">
        <div class="widget">
            <h3>Total Sales</h3>
            <p>₹<span id="total-sales">0.00</span></p>
        </div>
        <div class="widget">
            <h3>Total Orders</h3>
            <p><span id="total-orders">0</span></p>
        </div>
        <div class="widget">
            <h3>Total Users</h3>
            <p><span id="total-users">0</span></p>
        </div>
        <div class="widget">
            <h3>Low Stock Alerts</h3>
            <p><span id="low-stock">No alerts</span></p>
        </div>
    </div>
    <div class="table-section">
        <h2>Recent Orders</h2>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody id="orders-table">
                <!-- Dynamic Order Rows Here -->
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php' ?>