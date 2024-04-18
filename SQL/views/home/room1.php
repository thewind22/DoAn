<?php



$pageTitle = "Reservation Page"; // Đặt tiêu đề tùy ý cho trang này

ob_start();



?>

    <main>
      <div id="container3D"></div>
    </main>

    <script type="module" src="web-3dmodel-threejs-main\js\main.js"></script>
    <?php
// Lấy nội dung đã được đệm ra
$content = ob_get_clean();

// Include file layout.php
include "views/layout.php";
?>
