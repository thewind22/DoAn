<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Thêm Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Thêm CSS tùy chỉnh nếu cần */
        /* Ví dụ: */
        /* body { */
        /*     padding-top: 3rem; */
        /* } */
    </style>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center">Login</h1>
                        <?php if(isset($error)): ?>
                            <p class="text-danger"><?php echo $error; ?></p>
                        <?php endif; ?>
                        <form method="POST" action="index.php?action=login">
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Login</button>
                            <!-- Thay thế liên kết "register" bằng nút "Register" -->
                            <button type="button" class="btn btn-secondary btn-block" onclick="window.location.href='index.php?action=register';">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Thêm Bootstrap JavaScript và các thư viện JavaScript khác nếu cần -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
