<!-- views/room/room_details.php -->
<?php

// Thiết lập tiêu đề của trang
$pageTitle = "user details";

// Bắt đầu đệm đầu ra
ob_start();
?>
    <h1>User Details</h1>
    <p>User ID: <?php echo $user['UserID']; ?></p>
    <p>User Name: <?php echo $user['UserName']; ?></p>
    <p>Email: <?php echo $user['Email']; ?></p>
    <p>Role: <?php echo $user['roleName']; ?></p>

    <?php
// Lấy nội dung đã được đệm ra
$content = ob_get_clean();

// Include file layout.php
include "views\layout.php";
?>
