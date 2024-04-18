
<?php
// Thiết lập tiêu đề của trang
$pageTitle = "Danh Sách Phòng";

// Bắt đầu đệm đầu ra
ob_start();
?>

<!-- Nội dung của trang -->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1><?php echo $pageTitle; ?></h1>
            <div class="card">
                <div class="card-body">
                    <?php if(isset($room)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Thay thế 'path_to_image' bằng đường dẫn thực tế đến hình ảnh phòng -->
                        <img class="card-img-top" src="im/<?php echo $room['image']; ?>" alt="Hình ảnh phòng">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $room['RoomType']; ?></h5>
                            <p class="card-text">Giá: <?php echo $room['Price']; ?></p>
                            <p class="card-text">Trạng thái: <?php echo $room['Status']; ?></p>
                            <p class="card-text">Mô tả: <?php echo $room['chitiet']; ?></p>
                            <!-- Các nút hành động -->
                            <a class="btn btn-warning btn-sm" href="index.php?action=addReservation&RoomID=<?php echo $room['RoomID']; ?>">Book Now</a>
                            <a class="btn btn-warning btn-sm" href="index.php?action=<?php echo $room['model']; ?>">3D</a>
                        </div>
                    </div>
                </div>
                <?php } else { ?>
                        <p>Không tìm thấy thông tin phòng.</p>
                    <?php } ?>
    </div>
</div>

<?php
// Lấy nội dung đã được đệm ra
$content = ob_get_clean();

// Include file layout.php
include "views/layout.php";
?>
