<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Tulippstudio</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="http://localhost/tulippstudio/assets/images/assets/favicon.jpg" type="image/x-icon">

    <!-- stylesheet and script -->
    <link rel="stylesheet" href="http://localhost/tulippstudio/assets/admin/style.css">
    <!-- <script src="http://localhost/tulippstudio/assets/js/script.js"></script> -->

    <!-- icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <h2><a href="<?php echo base_url() ?>admin" class="sidebar-title">Tulippstudio</a></h2>
        <hr style="border: 1px solid white;">
        <ul>
            <?php $current_uri = uri_string(); ?>
            <li><a href="<?php echo base_url() ?>admin" class="<?php echo ($current_uri == 'admin') ? 'active' : ''; ?>"><i class="fa-solid fa-chart-line"></i>&nbsp;Dashboard</a></li>
            <li><a href="<?php echo base_url() ?>admin/users" class="<?php echo ($current_uri == 'admin/users') ? 'active' : ''; ?>"><i class="fa-solid fa-user-group"></i>&nbsp;Users</a></li>
            <li><a href="<?php echo base_url() ?>admin/products" class="<?php echo ($current_uri == 'admin/products') ? 'active' : ''; ?>"><i class="fa-solid fa-basket-shopping"></i>&nbsp;Products</a></li>
            <li><a href="<?php echo base_url() ?>admin/orders" class="<?php echo ($current_uri == 'admin/orders') ? 'active' : ''; ?>"><i class="fa-solid fa-boxes-packing"></i>&nbsp;Orders</a></li>
            <li><a href="<?php echo base_url() ?>admin/sales" class="<?php echo ($current_uri == 'admin/sales') ? 'active' : ''; ?>"><i class="fa-solid fa-hand-holding-dollar"></i>&nbsp;Sales</a></li>
            <!-- <li><a href="#">&nbsp;Notifications</a></li> -->
            <li><a href="<?php echo base_url() ?>admin/settings" class="<?php echo ($current_uri == 'admin/settings') ? 'active' : ''; ?>"><i class="fa-solid fa-gear"></i>&nbsp;Settings</a></li>
            <li><a href="<?php echo base_url() ?>admin/logout"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</a></li>
        </ul>
    </div>

    <script>
        console.log("<?php echo (current_url() == base_url('admin/users')) ? 'active' : 'false'; ?>");
        console.log("<?php echo current_url() ?>");
        console.log("<?php echo base_url('') ?>");
        console.log("<?php echo $current_uri ?>");
    </script>