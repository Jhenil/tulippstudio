<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings | Tulippstudio</title>
    <!-- Add the necessary stylesheets -->
    <link rel="stylesheet" href="http://localhost/tulippstudio/assets/admin/settings-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <div class="settings-page">
        <!-- Sidebar -->
        <div class="sidebar">
            <h2><a href="<?php echo base_url() ?>admin" class="sidebar-title">Tulippstudio</a></h2>
            <hr style="border: 1px solid white;">
            <ul>
                <li><a href="<?php echo base_url() ?>admin"><i class="fa-solid fa-chart-line"></i>&nbsp;Dashboard</a></li>
                <li><a href="<?php echo base_url() ?>admin/users"><i class="fa-solid fa-user-group"></i>&nbsp;Users</a></li>
                <li><a href="<?php echo base_url() ?>admin/products"><i class="fa-solid fa-basket-shopping"></i>&nbsp;Products</a></li>
                <li><a href="<?php echo base_url() ?>admin/orders"><i class="fa-solid fa-boxes-packing"></i>&nbsp;Orders</a></li>
                <li><a href="<?php echo base_url() ?>admin/sales"><i class="fa-solid fa-hand-holding-dollar"></i>&nbsp;Sales</a></li>
                <li><a href="<?php echo base_url() ?>admin/settings" class="active"><i class="fa-solid fa-gear"></i>&nbsp;Settings</a></li>
                <li><a href="<?php echo base_url() ?>admin/logout"><i class="fa-solid fa-right-from-bracket"></i>&nbsp;Logout</a></li>
            </ul>
        </div>

        <!-- Settings Content -->
        <div class="settings-content">
            <h1>Settings</h1>

            <!-- Account Settings -->
            <section class="account-settings">
                <h2>Account Settings</h2>
                <form action="update_account" method="post">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" value="<?php echo $admin['username']; ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $admin['email']; ?>" required>

                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password">

                    <button type="submit">Update Account</button>
                </form>
            </section>

            <!-- Site Settings -->
            <section class="site-settings">
                <h2>Site Settings</h2>
                <form action="update_site_settings" method="post" enctype="multipart/form-data">
                    <label for="site-title">Site Title:</label>
                    <input type="text" id="site-title" name="site_title" value="<?php echo $settings['site_title']; ?>" required>

                    <label for="logo">Logo:</label>
                    <input type="file" id="logo" name="logo">

                    <button type="submit">Update Site</button>
                </form>
            </section>

            <!-- Other Settings -->
            <section class="other-settings">
                <h2>Other Settings</h2>
                <form action="update_other_settings" method="post">
                    <label for="notifications">Receive Notifications:</label>
                    <select id="notifications" name="notifications">
                        <option value="enabled" <?php echo ($settings['notifications'] == 'enabled') ? 'selected' : ''; ?>>Enabled</option>
                        <option value="disabled" <?php echo ($settings['notifications'] == 'disabled') ? 'selected' : ''; ?>>Disabled</option>
                    </select>

                    <label for="theme">Site Theme:</label>
                    <select id="theme" name="theme">
                        <option value="light" <?php echo ($settings['theme'] == 'light') ? 'selected' : ''; ?>>Light</option>
                        <option value="dark" <?php echo ($settings['theme'] == 'dark') ? 'selected' : ''; ?>>Dark</option>
                    </select>

                    <button type="submit">Update Settings</button>
                </form>
            </section>
        </div>
    </div>
</body>

</html>