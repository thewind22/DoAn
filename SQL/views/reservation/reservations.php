<?php
$pageTitle = "Reservation Page"; // Đặt tiêu đề tùy ý cho trang này

ob_start();

// Bắt đầu phiên làm việc để sử dụng $_SESSION
?>

<?php
// Kiểm tra phương thức của request và lấy RoomID từ URL (nếu tồn tại)
$roomId = '';
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['RoomID'])) {
    $roomId = $_GET['RoomID'];
}
?>

<div class="container">
    <h2><?php echo $pageTitle; ?></h2>

    <form action="index.php?action=addReservation" method="POST"> 
        <!-- Thêm trường ẩn để truyền RoomID từ URL -->
        <input type="hidden" name="RoomID" value="<?php echo $roomId; ?>">
        
        <!-- Thay thế bằng các trường ẩn -->
    
        <input type="hidden" class="form-control" name="UserID" value="<?php echo isset($_SESSION['user']['UserID']) ? $_SESSION['user']['UserID'] : ''; ?>" required placeholder="User ID">
        
     
       

        <div class="form-group">
            <label for="CheckInDate">Check In Date:</label> 
            <input type="date" class="form-control" name="CheckInDate" id="CheckInDate" required>
        </div>
        
        <div class="form-group">
            <label for="CheckOutDate">Check Out Date:</label> 
            <input type="date" class="form-control" name="CheckOutDate" id="CheckOutDate" required>
        </div>
        
        <div class="form-group">
            <label for="BookingDate">Booking Date:</label> 
            <input type="date" class="form-control" name="BookingDate" id="BookingDate" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
        
        <!-- Thêm trường Status mặc định là 'Pending' -->
        <input type="hidden" name="Status" value="Pending"> 
        
        <button type="submit" class="btn btn-primary">Book Now</button> 
    </form>
</div>

<?php 
$content = ob_get_clean(); 
include "views/layout.php"; 
?>
