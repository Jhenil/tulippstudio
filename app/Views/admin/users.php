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
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($users)): ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $user['username']; ?></td>
                            <td><?= $user['email']; ?></td>
                            <td><?= ucfirst($user['role']); ?></td>
                            <td><?= ucfirst($user['status']); ?></td>
                            <td>
                                <!-- Edit Form -->
                                <form action="/admin/updateUser" method="post">
                                    <input type="text" name="username" value="<?= $user['username']; ?>" required>
                                    <input type="email" name="email" value="<?= $user['email']; ?>" required>
                                    <select name="role">
                                        <option value="admin" <?= $user['role'] == 'admin' ? 'selected' : ''; ?>>Admin</option>
                                        <option value="user" <?= $user['role'] == 'user' ? 'selected' : ''; ?>>User</option>
                                    </select>
                                    <select name="status">
                                        <option value="active" <?= $user['status'] == 'active' ? 'selected' : ''; ?>>Active</option>
                                        <option value="inactive" <?= $user['status'] == 'inactive' ? 'selected' : ''; ?>>Inactive</option>
                                    </select>
                                    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">
                                    <button type="submit">Update</button>
                                </form>

                                <!-- Delete Action -->
                                <a href="/admin/deleteUser/<?= $user['id']; ?>" onclick="return confirm('Are you sure?');">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
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