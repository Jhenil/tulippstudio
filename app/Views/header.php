<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/png" href="http://localhost/tulippstudio/assets/logo.jpg" />
    <link rel="stylesheet" href="http://localhost/tulippstudio/assets/css/style.css" />
    <title>Tulippstudio ♡ | Handmade Bead Jewelry</title>

    <!-- favicon -->
    <link rel="shortcut icon" href="http://localhost/tulippstudio/assets/images/assets/favicon.jpg" type="image/x-icon">

    <!-- icon link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<!-- <span style="border: 2px solid white;">🌷</span> -->

<body>
    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="logo">
            <a href="<?php echo base_url(); ?>" aria-label="tulippstudio Home">Tulippstudio ♡</a>
        </div>
        <ul class="nav-links" type="none">
            <li><a href="<?php echo base_url(); ?>#home" aria-label="Home">Home</a></li>
            <li><a href="<?php echo base_url(); ?>store" aria-label="Store">Store</a></li>
            <li><a href="<?php echo base_url(); ?>#about" aria-label="About Us">About</a></li>
            <li><a href="<?php echo base_url(); ?>#contactUs" aria-label="Contact Us">Contact Us</a></li>
            <!-- <li><a href="<?php base_url(); ?>profile"><i class="fa-solid fa-user-large"></i></a></li> -->

            <li class="dropdown">
                <a href="javascript:void(0);" class="dropbtn">Profile</a>
                <div class="dropdown-content">
                    <a href="<?php echo base_url(); ?>profile"><i class="fa-solid fa-user-large"></i> View Profile</a>
                    <a href="<?php echo base_url(); ?>orders">View Orders</a>
                    <a href="<?php echo base_url(); ?>logout">Logout</a>
                </div>
            </li>
            <li><a href="<?php echo base_url(); ?>cart"><i class="fa-solid fa-cart-shopping"></i></a></li>
        </ul>
        <div class="hamburger" aria-label="Menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
    <!-- <div class="loader"></div> -->