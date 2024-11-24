<!-- users.php -->
<?php include 'header.php' ?>
<div class="main-content">
    <div class="header">
        <h1>Manage Users</h1>
    </div>
    <div class="users-section">
        <?php if (!empty(session()->getFlashdata('status'))): ?>
            <div class="status-message"><?= session()->getFlashdata('status') ?></div>
        <?php endif; ?>
        <table class="users-table">
            <thead>
                <tr>
                    <th>Sr No.</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php $count = 1; ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $count ?></td>
                            <td><?= $user['user_fname']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= ucfirst($user['status']); ?></td>
                            <td>
                                <a class="delete" href="/admin/deleteUser/<?= $user['user_id']; ?>" onclick="return confirm('Are you sure?');">
                                    <i style="color: red;" class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php $count++; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">No users available</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'footer.php' ?>