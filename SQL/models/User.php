<?php
class User {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function register($username, $email, $password) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $roleID = 1; // Gán roleID mặc định là 1
        $query = "INSERT INTO users (UserName, Email, Password, roleID) VALUES ('$username', '$email', '$hashedPassword', $roleID)";
        mysqli_query($this->connection, $query);
    }
    

    public function login($email, $password) {
        $query = "SELECT * FROM users WHERE Email = '$email'";
        $result = mysqli_query($this->connection, $query);
        $user = mysqli_fetch_assoc($result);
        if ($user && password_verify($password, $user['Password'])) {
            return $user;
        }
        return false;
    }

    public function getUserRoles($userId) {
        $query = "SELECT RoleName FROM roles WHERE RoleID IN (SELECT RoleID FROM user_roles WHERE UserID = '$userId')";
        $result = mysqli_query($this->connection, $query);
        $roles = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $roles[] = $row['RoleName'];
        }
        return $roles;
    }
    public function getAllusers() {
        $query = "SELECT users.*, roles.roleName FROM users LEFT JOIN roles ON users.roleID = roles.roleID";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }
    
    public function getuserById($userId) {
        $query = "SELECT users.*, roles.roleName FROM users LEFT JOIN roles ON users.roleID = roles.roleID WHERE userID = '$userId'";
        $result = mysqli_query($this->connection, $query);
        $user = mysqli_fetch_assoc($result);
        return $user;
    }
    
    public function updateuser($userId, $userName, $email, $rolerID) {
        $query = "UPDATE users SET userName = '$userName', email = '$email', roleID = '$rolerID' WHERE userID = '$userId'";
        mysqli_query($this->connection, $query);
    }
    
    public function deleteuser($userId) {
        $query = "DELETE FROM users WHERE userID = '$userId'";
        mysqli_query($this->connection, $query);
    }
}
?>
