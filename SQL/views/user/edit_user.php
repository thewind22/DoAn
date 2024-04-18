<?php

// Thiết lập tiêu đề của trang
$pageTitle = "User edit";

// Bắt đầu đệm đầu ra
ob_start();
?>
    <h1>Edit User</h1>
    <form method="POST" action="">
        <label for="userName">User Name:</label><br>
        <input type="text" id="userName" name="userName" value="<?php echo $user['UserName']; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="text" id="email" name="email" value="<?php echo $user['Email']; ?>"><br>
        <label for="roleId">Role:</label><br>
        <input type="text" id="roleId" name="roleId" value="<?php echo $user['RoleID']; ?>"><br>
        <input type="submit" value="Update">
    </form>

    <?php
// Lấy nội dung đã được đệm ra
$content = ob_get_clean();

// Include file layout.php
include "views\layout.php";
?>
