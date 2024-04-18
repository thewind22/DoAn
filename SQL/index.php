<?php
include 'controllers/RoomController.php';
include 'controllers/UserController.php';
include 'controllers/HomeController.php';
include 'controllers/ReservationController.php';


$reservationController = new ReservationController();

$homeController = new HomeController();

$userController = new UserController();
$roomController = new RoomController();



// Kiểm tra xem người dùng đã đăng nhập hay chưa
session_start();
if (!isset($_SESSION['user'])) {
    // Nếu chưa đăng nhập và hành động không phải là 'login' hoặc 'register', chuyển hướng đến trang đăng nhập
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    if ($action !== 'login' && $action !== 'register') {
        header("Location: index.php?action=login");
        exit;
    }
}

$action = isset($_GET['action']) ? $_GET['action'] : 'getAllUsers';

$roomId = isset($_GET['RoomID']) ? $_GET['RoomID'] : null;
$userId = isset($_SESSION['user']['UserID']) ? $_SESSION['user']['UserID'] : null;



switch ($action) {
    case 'index':
        $roomController->index();
        break;
    case 'add':
        $roomController->add();
        break;

    case 'addReservation':
        $reservationController->addReservation();
        break;
    case 'getAllReservations':
        $reservationController->getAllReservations();
        break;
    
    case 'getReservationsByUserId':
        $reservationController->getReservationsByUserId($userId);
        break;
    case 'edit':
        $roomController->edit($roomId);
        break;
    case 'delete':
        $roomController->delete($roomId);
        break;
    
    case 'details':
        $roomController->details($roomId);
        break;
    case 'getAllUsers':
        $userController->getAllUsers();
            break;
    case 'getUserById':
        $userController->getUserById($userId);
        break;
    case 'updateUser':
        $userController->updateUser($userId);
        break;
    case 'deleteUser':
        $userController->deleteUser($userId);
        break;    
    case 'login':
        // Nếu hành động là 'login', xử lý đăng nhập
        $userController->login();
        break;
    case 'register':
          
            $userController->register();
            break;
    case 'home':
            $homeController->home();
            break;
    case 'room1':
            $homeController->room1();
            break;
    case 'logout':
        // Nếu hành động là 'logout', kết thúc phiên đăng nhập và chuyển hướng đến trang đăng nhập
        session_destroy();
        header("Location: index.php?action=login");
        exit;
    
    default:
        echo 'Invalid action.';
        break;
}
?>
