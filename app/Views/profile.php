<?php include 'header.php' ?>

<link rel="stylesheet" href="<?= base_url('assets/css/profile.css'); ?>">

<div class="profile-container">
    <h2>User Profile</h2>
    <?php
    $session = session();
    $id = $session->get('user_id');
    ?>
    <form action="update-profile/<?php echo $id ?>" method="post">
        <div class="profile-info">
            <label for="image">Update Image:</label>
            <input type="file" class="" id="image" name="profile_picture">
        </div>

        <div class="profile-info">
            <label for="image">Current Image:</label>
            <img src="<?= base_url() ?>assets/images/profile_pictures/<?= $user['profile_picture']; ?>" width="100">
        </div>

        <div class="profile-info">
            <label>First Name:</label>
            <input type="text" name="user_fname" value="<?= $user['user_fname'] ?>">
        </div>

        <div class="profile-info">
            <label>Last Name:</label>
            <input type="text" name="user_lname" value="<?= $user['user_lname'] ?>">
        </div>

        <div class="profile-info">
            <label>Email:</label>
            <input type="text" name="email" value="<?= $user['email'] ?>">
        </div>

        <div class="profile-info">
            <label for="password">Password:</label>
            <input type="password" name="password" placeholder="update your password">
        </div>

        <!-- <div class="profile-info">
        <label>Account Created At:</label>
        <span><?= $user['created_at'] ?></span>
    </div> -->

        <div class="profile-info">
            <label>Last Login:</label>
            <span><?= $user['last_login'] ?></span>
        </div>

        <div class="action-btn">
            <div class="action-btn">
                <button type="submit" class="btn-update">Update</button>
                <button type="button" class="btn-logout" onclick="window.location.href='<?= base_url('/logout') ?>'">Logout</button>
            </div>
        </div>
    </form>
</div>