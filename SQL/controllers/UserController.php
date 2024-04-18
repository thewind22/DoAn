<?php
include 'models\User.php';

class UserController {
    private $userModel;

    public function __construct() {
        include 'models\db_connection.php';
        $this->userModel = new User($connection);
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $this->userModel->register($username, $email, $password);
            header("Location: index.php?action=login");
            exit;
        }
        include 'views/user/register.php';
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->login($email, $password);
            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: index.php?action=home");
                exit; // Thêm exit ở đây để ngăn chặn việc thực thi mã tiếp theo
            } else {
                $error = "Invalid email or password";
            }
        }
        include 'views/user/login.php';
    }
    

    public function logout() {
        session_start();
        unset($_SESSION['user']);
        session_destroy();
        header("Location: login.php");
        exit;
    }
    public function getAllUsers() {
        // Call the getAllusers() method from your database class
        $users = $this->userModel->getAllusers();
        include 'views\user\users.php';
    }
    public function getUserById($userId) {
        // Call the getuserById() method from your database class
        $user = $this->userModel->getuserById($userId);
        include 'views\user\user_details.php';
    }
    public function updateUser($userId) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Lấy dữ liệu từ form gửi đi
            $userName = $_POST['userName'];
            $email = $_POST['email'];
            $roleId = $_POST['roleId'];
    
            // Gọi hàm cập nhật thông tin người dùng
            $this->userModel->updateUser($userId, $userName, $email, $roleId);
    
            // Chuyển hướng trang về trang chính
            header("Location: index.php?action=getAllUsers");
            exit;
        }
    
        // Nếu không phải là phương thức POST, lấy thông tin người dùng để hiển thị form cập nhật
        $user = $this->userModel->getUserById($userId);
        include 'views\user\edit_user.php';
    }
    

    public function deleteUser($userId) {
        // Call the deleteuser() method from your database class
        $this->userModel->deleteuser($userId);
        header("Location: index.php?action=getAllUsers");
        exit;
    }

}
?>
