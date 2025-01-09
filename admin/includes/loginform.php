<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập vào hệ thống</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    
    <style>
        body {
            background: linear-gradient(120deg, #4B79A1, #283E51);
            min-height: 100vh;
        }
        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        .form-control {
            border-radius: 10px;
            padding: 12px;
        }
        .btn {
            padding: 12px;
            border-radius: 10px;
            font-weight: 500;
        }
        .social-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #dee2e6;
        }
        .divider span {
            padding: 0 1rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-7">
                    <div class="card p-4">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                
                                <h4 class="fw-bold">Xin Chào!</h4>
                                <p class="text-muted">Vui lòng đăng nhập tài khoản để vào trang admin</p>

                                <div id="loginAlert" class="alert alert-danger" role="alert">
                                    <?php 
                                    if(isset($errorMsg)) {
                                        echo $errorMsg;
                                        echo "<script>document.getElementById('loginAlert').style.display = 'block';</script>";
                                    }
                                    ?>
                                </div>
                            </div>

                            <!-- Login Form -->
                            <form method="post">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="email" name="email" 
                                               placeholder="Nhập email">
                                    </div>
                                </div>

                                <div class="mb-4">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Nhập mật khẩu">
                                    </div>
                                </div>

                                <button type="submit" name="btnSubmit" 
                                        class="btn btn-primary w-100 mb-3">
                                    Login
                                </button>

                                <div class="divider">
                                    <span>hoặc tiếp tục với</span>
                                </div>

                                <!-- Social Login -->
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-light w-50 social-btn">
                                        <i class="fab fa-google text-danger"></i>
                                        Google
                                    </a>
                                    <a href="#" class="btn btn-light w-50 social-btn">
                                        <i class="fab fa-facebook text-primary"></i>
                                        Facebook
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>