<?php

class Reservation {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function addReservation($userId, $roomId, $bookingDate, $checkInDate, $checkOutDate, $status) {
        $query = "INSERT INTO Reservations (UserID, RoomID, BookingDate, CheckInDate, CheckOutDate, Status) VALUES ('$userId', '$roomId', '$bookingDate', '$checkInDate','$checkOutDate','$status','$status')";
        mysqli_query($this->connection, $query);
    }
    public function getAllReservations() {
        $query = "SELECT * FROM Reservations";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
    
    public function getReservationsByUserId($userId) {
        $userId = mysqli_real_escape_string($this->connection, $userId); // Tránh SQL injection
        $query = "SELECT * FROM Reservations WHERE UserID = '$userId'";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
    public function UpdateReservations( $ReservationID,$status) {
        $query = "UPDATE Reservations SET  Status = '$status' WHERE ReservationID = '$ReservationID'";
        mysqli_query($this->connection, $query);
    }


}
?>
