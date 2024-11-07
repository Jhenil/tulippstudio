<?php include 'header.php' ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/user-login.css'); ?>">
</head>

<div class="box">
    <div class="overlay">
        <div class="login-container">
            <h2>Register</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="save_user" method="post">
                <label for="user_fname">First Name</label>
                <input type="text" name="user_fname" required>

                <label for="user_lname">Last Name</label>
                <input type="text" name="user_lname" required>

                <label for="email">Email</label>
                <input type="email" name="email" required>

                <label for="password">Password</label>
                <input type="password" name="password" required>

                <label for="confirm_password">Confirm Password</label>
                <input type="password" name="confirm_password" required>

                <button type="submit">Register</button>
            </form>
            <a href="login">An existing tulip? Get in <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>