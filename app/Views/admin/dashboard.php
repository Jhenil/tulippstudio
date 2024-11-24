<?php include 'header.php' ?>
<!-- Main Content -->
<div class="main-content">
    <div class="header">
        <h1>Admin Dashboard</h1>
    </div>
    <div class="widgets">
        <div class="widget">
            <h3><?php

                date_default_timezone_set('Asia/Kolkata');
                $hour = date('H');
                $dayTerm = ($hour >= 19) ? "Nighty" : (($hour >= 17) ? "Evening" : (($hour >= 12) ? "Afternoon" : "Morning"));
                echo "Good " . $dayTerm . ",";
                ?></h3>
            <p>
                <span id="greeting">
                    <?= $admin_name ?? "Admin" ?>!
                </span>
            </p>
        </div>
        <div class="widget">
            <h3>Total Sales</h3>
            <p>
                <span id="total-sales">
                    ₹<?= $total_sales ?>
                </span>
            </p>
        </div>
        <div class="widget">
            <h3>Total Orders</h3>
            <p>
                <span id="total-orders">
                    <?= $total_orders ?>
                </span>
            </p>
        </div>
        <div class="widget">
            <h3>Total Users</h3>
            <p>
                <span id="total-users">
                    <?= $total_users ?>
                </span>
            </p>
        </div>
    </div>
    <!-- <div class="table-section">
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
            </tbody>
        </table>
    </div> -->
</div>
<?php include 'footer.php' ?>