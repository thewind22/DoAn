<?php



$pageTitle = "Reservation Page"; // Đặt tiêu đề tùy ý cho trang này

ob_start();



?>
<style>
        /* Custom CSS */
        body {
            background-color: #f8f9fa;
        }
        

        .navbar {
            background-color: #3498db !important;
        }
        .black-text {
    color: black; /* Chỉ định màu chữ là đen */
  } 

        .navbar-brand,
        .navbar-nav .nav-link {
            color: #fff ;
        }

        .jumbotron {
            background-image: url('im/hi.jpg');
            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px 0;
        }

        .jumbotron h1 {
            font-size: 3.5rem;
            font-weight: bold;
        }

        .jumbotron p {
            font-size: 1.5rem;
        }

        .room-card {
            margin-bottom: 20px;
        }

        .room-card img {
            max-height: 200px;
            object-fit: cover;
        }
    </style>
<!-- Hero Section -->
<section class="jumbotron">
    <div class="container">
    <h1 class="display-4 black-text">Khách Sạn XYZ</h1>
    <p class="lead black-text">Trải nghiệm không gian thoải mái và dịch vụ tuyệt vời cùng chúng tôi.</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Đặt Phòng Ngay</a>
    </div>
</section>

<!-- Rooms Section -->
<section class="container">
    <h2 class="mb-4 text-center">Các Loại Phòng</h2>
    <div class="row">
        <div class="col-md-4">
            <div class="card room-card">
                <img src="im/don.jpg" class="card-img-top" alt="Phòng Đơn">
                <div class="card-body">
                    <h5 class="card-title">Phòng Đơn</h5>
                    <p class="card-text">Hoàn hảo cho khách du lịch cá nhân.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card room-card">
                <img src="im/doi.jpg" class="card-img-top" alt="Phòng Đôi">
                <div class="card-body">
                    <h5 class="card-title">Phòng Đôi</h5>
                    <p class="card-text">Lý tưởng cho cặp đôi hoặc bạn bè.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card room-card">
                <img src="im/suit.jpg" class="card-img-top" alt="Suite">
                <div class="card-body">
                    <h5 class="card-title">Suite</h5>
                    <p class="card-text">Trải nghiệm sự sang trọng và thoải mái tuyệt vời.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
// Lấy nội dung đã được đệm ra
$content = ob_get_clean();

// Include file layout.php
include "views\layout.php";
?>