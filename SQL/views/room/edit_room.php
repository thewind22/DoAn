<?php
// Thiết lập tiêu đề của trang
$pageTitle = "Danh Sách Phòng";

// Bắt đầu đệm đầu ra
ob_start();
?>
    <h1 class="display-4">Edit Room</h1>
    <form method="POST" action="index.php?action=edit&RoomID=<?php echo $room['RoomID']; ?>">
        <div class="form-group">
            <label for="RoomNumber">Room Number:</label>
            <input type="text" class="form-control" name="RoomNumber" value="<?php echo $room['RoomNumber']; ?>" required>
        </div>
        <div class="form-group">
            <label for="RoomType">Room Type:</label>
            <input type="text" class="form-control" name="RoomType" value="<?php echo $room['RoomType']; ?>" required>
        </div>
        <div class="form-group">
            <label for="Price">Price:</label>
            <input type="text" class="form-control" name="Price" value="<?php echo $room['Price']; ?>" required>
        </div>
        <div class="form-group">
            <label for="Status">Status:</label>
            <input type="text" class="form-control" name="Status" value="<?php echo $room['Status']; ?>" required>
        </div>
        <div class="form-group">
            <label for="image">image:</label>
            <input type="text" class="form-control" name="image" value="<?php echo $room['image']; ?>" required>
        </div>
        <div class="form-group">
            <label for="model">model:</label>
            <input type="text" class="form-control" name="model" value="<?php echo $room['model']; ?>" required>
        </div>
        <div class="form-group">
            <label for="chitiet">chitiet:</label>
            <input type="text" class="form-control" name="chitiet" value="<?php echo $room['chitiet']; ?>" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

<?php
// Lấy nội dung đã được đệm ra
$content = ob_get_clean();

// Include file layout.php
include "views/layout.php";
?>
