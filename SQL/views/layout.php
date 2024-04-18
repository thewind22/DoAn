<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle; ?></title>
    <!-- Thêm các tài nguyên CSS và JavaScript của Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Ví dụ: -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css\layout.css">

</head>
<body>

<header>
    <nav class="navbar navbar-expand-lg" style="background-color: #3498db; color: #fff;">
        <!-- Thanh điều hướng -->
        <div class="mr-auto"> <!-- Sử dụng lớp mr-auto để di chuyển sang bên trái -->
        <?php if ($_SESSION['user']['RoleID'] == 1){?>
        <ul class="navbar-nav">
            
                <li class="nav-item"><a class="nav-link" href="index.php?action=home" style="color: #fff;">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=index" style="color: #fff;">Rooms</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=getAllUsers" style="color: #fff;">Users</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=getAllReservations" style="color: #fff;">Reservations</a></li>
        </ul>
        <?php } else { ?>
            <ul class="navbar-nav">
            
                <li class="nav-item"><a class="nav-link" href="index.php?action=home" style="color: #fff;">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=index" style="color: #fff;">Rooms</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=getReservationsByUserId" style="color: #fff;">Reservations</a></li>
        </ul>
        <?php } ?>

        </div>
        <?php if(isset($_SESSION['user'])) { ?>
            <ul class="navbar-nav">
                <li class="nav-item" style="color: #fff; padding-right: 10px; padding-left: 10px;">
                    <div>Xin chào, <?php echo $_SESSION['user']['UserName']; ?></div>
                    <div><?php echo $_SESSION['user']['Email']; ?></div>
                </li>

                <li class="nav-item" style="padding-right: 10px; padding-left: 10px;"> <!-- Thêm khoảng cách bằng CSS -->
                    <button class="nav-link-button" onclick="window.location.href='index.php?action=logout'">Logout</button>
                </li>


            </ul>
        <?php } else { ?>
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="index.php?action=login" style="color: #fff;">Login</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php?action=register" style="color: #fff;">Register</a></li>
            </ul>
        <?php } ?>
        <!-- Thêm các mục điều hướng khác ở đây -->
    </nav>
</header>



<main role="main" class="container">
    <!-- Nội dung chính của trang -->
    <?php echo $content; ?>
</main>

<footer class="footer mt-auto py-3" style="background-color: #3498db; color: #fff;">
    <!-- Chân trang -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 text-md-left text-center">
                <p class="mb-0">&copy; <?php echo date("Y"); ?> Tên Công ty. Tất cả quyền được bảo lưu.</p>
            </div>
            <div class="col-md-6 text-md-right text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#" style="color: #fff;">Trang chủ</a></li>
                    <li class="list-inline-item"><a href="#" style="color: #fff;">Giới thiệu</a></li>
                    <li class="list-inline-item"><a href="#" style="color: #fff;">Sản phẩm</a></li>
                    <li class="list-inline-item"><a href="#" style="color: #fff;">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12 text-center">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook" style="color: #fff;"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter" style="color: #fff;"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram" style="color: #fff;"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin" style="color: #fff;"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>




<!-- Thêm các tài nguyên JavaScript của Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Ví dụ: -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
</body>
</html>