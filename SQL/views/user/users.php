<?php

// Thiết lập tiêu đề của trang
$pageTitle = "user_list";

// Bắt đầu đệm đầu ra
ob_start();
?>
    <h1 class="display-4">All Users</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>User ID</th>
                <th>User Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['UserID']; ?></td>
                <td><?php echo $user['UserName']; ?></td>
                <td><?php echo $user['Email']; ?></td>
                <td><?php echo $user['roleName']; ?></td>
                <td>
                    <a class="btn btn-info btn-sm" href="index.php?action=getUserById&UserID=<?php echo $user['UserID']; ?>">View</a>
                    <a class="btn btn-warning btn-sm" href="index.php?action=updateUser&UserID=<?php echo $user['UserID']; ?>">Edit</a>
                    <a class="btn btn-danger btn-sm" href="index.php?action=deleteUser&UserID=<?php echo $user['UserID']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

<?php
// Lấy nội dung đã được đệm ra
$content = ob_get_clean();

// Include file layout.php
include "views\layout.php";
?>
