<?php include 'header.php' ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/user-login.css'); ?>">
</head>
<div class="box">
    <div class="overlay">
        <div class="login-container">
            <h2>Login</h2>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="error-message">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= site_url('login') ?>" method="post">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" required>

                <label for="password">Password:</label>
                <input type="password" name="password" id="password" required>

                <button type="submit" style="margin-bottom: 10px;">Login</button>
            </form>
            <a href="signup">New tulip to tulippstudio? <i class="fa-solid fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<script>
    window.onload = function() {
        window.scrollTo(0, 0);
    };
</script>
<?php include 'footer.php' ?>