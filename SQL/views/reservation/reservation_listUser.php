
<?php

// Thiết lập tiêu đề của trang
$pageTitle = "Reservation list";

// Bắt đầu đệm đầu ra
ob_start();
?>
    <h1 class="display-4">All Reservation</h1>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
            <th>Room ID</th>
                <th>User Name</th>
                <th>Room Name</th>
                <th>Booking Date</th>
                <th>Check In Date</th>
                <th>Check Out Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Reservations as $Reservation): ?>
                <tr>
                    <td><?php echo $Reservation['ReservationID']; ?></td>
                    <td><?php echo $Reservation['UserID']; ?></td>
                    <td><?php echo $Reservation['RoomID']; ?></td>
                    <td><?php echo $Reservation['BookingDate']; ?></td>
                    <td><?php echo $Reservation['CheckInDate']; ?></td>
                    <td><?php echo $Reservation['CheckOutDate']; ?></td>
                    <td><?php echo $Reservation['Status']; ?></td>
            
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
