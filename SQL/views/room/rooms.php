<?php
// Thiết lập tiêu đề của trang
$pageTitle = "Danh Sách Phòng";

// Bắt đầu đệm đầu ra
ob_start();
?>

<a class="btn btn-primary mb-3" href="index.php?action=add">Add Room</a>
<div class="container mt-5">
    <h1><?php echo $pageTitle; ?></h1>
    <div class="row">
        <?php 
        // Kiểm tra xem biến $rooms đã được thiết lập chưa
        if(isset($rooms)) {
            while ($row = mysqli_fetch_assoc($rooms)) { ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Thay thế 'path_to_image' bằng đường dẫn thực tế đến hình ảnh phòng -->
                        <img class="card-img-top" src="im/<?php echo $row['image']; ?>" alt="Hình ảnh phòng">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['RoomType']; ?></h5>
                            <p class="card-text">Giá: <?php echo $row['Price']; ?></p>
                            <p class="card-text">Trạng thái: <?php echo $row['Status']; ?></p>
                            <!-- Các nút hành động -->
                            <a href="index.php?action=details&RoomID=<?php echo $row['RoomID']; ?>" class="btn btn-primary btn-sm">Xem Chi Tiết</a>
                            <?php 
                            // Kiểm tra quyền truy cập của người dùng
                            if (isset($_SESSION['user']['RoleID']) && $_SESSION['user']['RoleID'] == 1) { ?>
                                <a href="index.php?action=edit&RoomID=<?php echo $row['RoomID']; ?>" class="btn btn-warning btn-sm">Chỉnh Sửa</a>
                                <a href="index.php?action=delete&RoomID=<?php echo $row['RoomID']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa phòng này?')">Xóa</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        <?php 
            }
        } else {
            echo "<p>Không có phòng nào được tìm thấy.</p>";
        }
        ?>
    </div>
</div>

<?php
// Lấy nội dung đã được đệm ra
$content = ob_get_clean();

// Include file layout.php
include "views/layout.php";
?>
