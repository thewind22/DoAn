<?php
class Room {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
    

    public function getAllRooms() {
        $query = "SELECT * FROM rooms";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    public function getRoomById($roomId) {
        $query = "SELECT * FROM rooms WHERE RoomID = '$roomId'";
        $result = mysqli_query($this->connection, $query);
        $room = mysqli_fetch_assoc($result);
        return $room;
    }

    public function addRoom($roomNumber, $roomType, $price, $status, $image, $model, $chitiet) {
        $query = "INSERT INTO rooms (RoomNumber, RoomType, Price, Status, image, model, chitiet) VALUES ('$roomNumber', '$roomType', '$price', '$status','$image','$model','$chitiet')";
        mysqli_query($this->connection, $query);
    }

    public function updateRoom($roomId, $roomNumber, $roomType, $price, $status, $image, $model, $chitiet) {
        $query = "UPDATE rooms SET RoomNumber = '$roomNumber', RoomType = '$roomType', Price = '$price', Status = '$status', image = '$image', model = '$model', chitiet = '$chitiet' WHERE RoomID = '$roomId'";
        mysqli_query($this->connection, $query);
    }

    public function deleteRoom($roomId) {
        $query = "DELETE FROM rooms WHERE RoomID = '$roomId'";
        mysqli_query($this->connection, $query);
    }
    public function getRoomByRoomNumber($roomNumber) {
        $query = "SELECT * FROM rooms WHERE RoomNumber = '$roomNumber'";
        $result = mysqli_query($this->connection, $query);
        $room = mysqli_fetch_assoc($result);
        return $room;
    }
    
}
?>
