<?php
include 'models/Reservation.php';

class ReservationController {
    
    private $reservationModel;
    private $connection;  

    public function __construct() {
        include 'models/db_connection.php';
        $this->connection = $connection;  // Lưu trữ kết nối
        $this->reservationModel = new Reservation($connection);
    }

    public function addReservation() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            try {
                $roomId = $_POST['RoomID'];
                $userId = $_POST['UserID'];
                $bookingDate = $_POST['BookingDate'];
                $checkInDate = $_POST['CheckInDate'];
                $checkOutDate = $_POST['CheckOutDate'];
                $status = $_POST['Status'];

    
                // Thêm đặt phòng
                $this->reservationModel->addReservation($userId, $roomId, $bookingDate, $checkInDate, $checkOutDate, $status);
    
                // Nếu thành công, chuyển hướng với thông báo thành công
                header("Location: index.php?action=getAllReservations");
                exit;
            } catch (Exception $ex) {
                // Nếu có lỗi, chuyển hướng với thông báo lỗi
                header("Location: index.php?error_message=" . urlencode($ex->getMessage()));
                exit;
            }
        }

        // Lấy RoomID từ URL

        $roomId = $_GET['RoomID'];

        include 'views/reservation/reservations.php';
    }
    public function getAllReservations() {
        $Reservations = $this->reservationModel->getAllReservations();
        include 'views\reservation\reservation_list.php';
    }
    public function getReservationsByUserId($userId) {
        $userId = $_SESSION['user']['UserID'];
        $Reservations = $this->reservationModel->getReservationsByUserId($userId);
        include 'views\reservation\reservation_listUser.php';
    }
    public function UpdateReservations($ReservationID) {
        $status = $_POST['Status'];
        $Reservations = $this->reservationModel->getReservationsByUserId($ReservationID,$status);
        include 'views\reservation\reservation_listUser.php';
    }
    

    

}
?>
