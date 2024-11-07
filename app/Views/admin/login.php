<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Tulippstudio Admin</title>
    <link rel="stylesheet" href="http://localhost/tulippstudio/assets/admin/login-style.css">
</head>

<body>
    <div class="slideshow">
        <div class="overlay"></div>
        <div class="overlay-text">
            <h1>Tulippstudio</h1>
            <h3><a href="http://localhost/tulippstudio/public/">Go Home</a></h3>
        </div>
    </div>
    <div class="r_box">
        <div class="login-container">
            <h1>Admin</h1>
            <form action="<?php echo base_url('admin/auth'); ?>" method="post">
                <!-- <label for="username">Username</label> -->
                <input type="text" id="username" placeholder="Admin ID" name="username" required style="margin-bottom: 15px;">

                <!-- <label for="password">Password</label> -->
                <input type="password" id="password" placeholder="Password" name="password" required>
                <button type="submit">Get In</button>
            </form>
        </div>
    </div>
    </div>
</body>

</html>