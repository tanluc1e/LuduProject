<?php

session_start();
include("mysql/baglan.php");

//Kiểm tra nếu đã đăng nhập (get user_mail == true) sẽ lấy giá trị từ database
if(session_id() == '') session_start();
if (isset($_SESSION['user_mail']) == true) {
    //GET CURRENT VALUES FROM DATABASE (User_name)
    $conn_gcv = mysqli_connect("localhost", "tanluc1", "tanluc1", "ludu");
    $gcv_mail = $_SESSION['user_mail'];
    $gcv_sql = "SELECT * FROM Users WHERE user_mail='$gcv_mail'";
    $gcv_query = mysqli_query($conn_gcv, $gcv_sql);
    if ($row = mysqli_fetch_assoc($gcv_query)) { 
	$current_username = $row['user_name'];
    }
} 

?>

<!doctype html>
<html lang="tr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="images/logo1.png"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css-file/design2.css">
    <link rel="stylesheet" href="./script.js">
    <link rel="stylesheet" href="./css-file/style.css">

    <style>
        body {
            background: url(../images/bg.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

        }

        .container-fluid {
            border-top: 4px solid #ffc107;
        }
    </style>
    <!--Black Background-->
    <style>
        .social-link {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            border-radius: 50%;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover,
        .social-link:focus {
            background: #ddd;
            text-decoration: none;
            color: #555;
        }
        .bg-dark{
           background-color: rgba(0, 0, 0, 0.2);
        }
        
        .btn-secondary:hover{
            
            color: #d9534f;
        }

        .container-fluid {
            border-top: 4px solid #d9534f;
            padding-left: 0px;
            padding-right: 0px;
        }

        .dropdown .btn-primary {
            background-color: white;
        }

        .dropdown-menu {
            background-color: white;
        }
        .text-white{
            font-size: 1.6rem;
        }
        .button-outline{
            display: flex;
            margin-bottom: 14px;
        }
        .btn-login-logout{
            display: flex;
            align-items: center;
        }
        .cart{
            display: flex;
            align-items: center;
            margin-left: 1px;
        }

        .btn-log-in{
            margin-bottom: 2px;
        }
    </style>
    <!--Black Background-->
    <title>LUDU - Thông tin cửa hàng</title>
</head>
<body>
<!--Header Start-->
<header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <img src="images/logo1.png" width="100px"/>
            <ul class="snip1378 me-lg-auto" style="margin-left: 120px;"> 
                <li><a href="index.php" class="nav-link px-2 text-white">HOME</a></li>
                <li><a href="menu/menu.php" class="nav-link px-2 text-white">MENU</a></li>
                <li><a href="product.php" class="nav-link px-2 text-white">PRODUCT</a></li>
                <li><a href="introduce.php" class="nav-link px-2 text-white">INTRODUCE</a></li>
                <li><a href="aboutUs.php" class="nav-link px-2 text-secondary">ABOUT US</a></li>
            </ul>
            <div class="col-md-3 col-lg-2 button-outline">
                    
                      <a class="btn cart btn-outline-light btn-floating m-1" href="cart.php" role="button"><i
                           class="fas fa-shopping-cart"></i></a>
                          <div class="btn-login-logout">
                          <?php
                           if (!empty($_SESSION['user_mail'])) { ?> 
                            <div class="dropdown">
                           <button class="btn-log-in btn btn-danger text-capitalize" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $current_username; ?></button>
                           <ul class="dropdown-menu">
                           <li><a class="dropdown-item" href="#">Profile</a></li>
                           <li><a class="dropdown-item" href="./changepassword.php">Change Password</a></li>
                       </ul>
                   

                        <a href="logout.php" type="button" class="btn btn-outline-light me-2">Log out</a>
                        <?php
                        } else { ?>
                            <a href="login.php" type="button" class="btn btn-outline-light me-2">Sign in/out</a>
                            <?php
                        }
                        ?>  
                    </div>
            </div>
        </div>
    </div>
</header>
<!--Header End-->
            <div class="container-fluid" style="padding:revert">
                <div class="bg-dark">
                    <div class="container py-5">
                        <div class="row h-100 align-items-center py-5">
                            <div class="col-lg-6">
                                <h1 class="display-4 text-danger">LUDU FRUIT</h1>
                                <p class="lead text-fluid mb-0 text-white">Chuyên cung cấp các loại trái cây tươi nhập khẩu giá rẻ nhất thị trường </p>
                            </div>
                            <div class="col-lg-6 d-none d-lg-block"><img src="./images/about_us/fruit.jpg" alt=""
                                                                         class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-dark py-5">
                    <div class="container py-5">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6 order-2 order-lg-1"><i
                                        class="fa fa-bar-chart fa-2x mb-3 text-light"></i>
                                <h2 class="font-weight-light text-danger">LUDU FLOWER</h2>
                                <p class="font-italic text-fluid mb-4 text-white">Hoa luôn mang vẻ đẹp kỳ diệu và chứa đựng biết bao thông điệp ý nghĩa, hoa còn là biểu trưng dành tặng phái nữ.Bởi thế, đây là phương tiện giúp mọi người gửi gắm tình yêu với người thân, bạn bè. Hoa tươi tại LuDu Store quyết tâm không ngừng học hỏi và sáng tạo để cho ra đời những tác phẩm nghệ thuật cắm hoa đặc sắc, ấn tượng và độc đáo nhất. Cung cấp thành công, toàn diện điện hoa trong nước và mở rộng ra thị trường quốc tế. Phát triển các ngành dịch vụ phụ để hỗ trợ cho việc cung cấp hoa và quà tặng. </p><a href="#"
                                                                                                         class="btn btn-light px-5 rounded-pill shadow-sm">Learn
                                    More</a>
                            </div>
                            <div class="col-lg-5 px-5 mx-auto order-1 order-lg-2"><img src="https://i.pinimg.com/564x/bd/40/17/bd4017dff143b63b363736ec66c82fcc.jpg" alt=""
                                                                                       class="img-fluid mb-4 mb-lg-0">
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-lg-5 px-5 mx-auto"><img src="images/about_us/baobi.jpg" alt=""
                                                                    class="img-fluid mb-4 mb-lg-0"></div>
                            <div class="col-lg-6">
                                <h2 class="font-weight-light text-danger">LUDU PACKAGE FLOWER</h2>
                                <p class="font-italic text-fluid mb-4 text-white">Sản phẩm bao bì của LUDU Store, với từng loại thiết kế riêng biệt, sáng tạo, độc đáo. Luôn luôn đem đến sản phẩm chất lượng cao đến cho khách hàng, chất lượng sản phẩm tạo nên thương hiệu.</p><a href="#"
                                      class="btn btn-light px-5 rounded-pill shadow-sm">Learn
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-dark py-5">
                    <div class="container py-5">
                        <div class="row mb-4">
                            <h2 class="display-5 font-weight-light text-light text-center fw-bold">OUR TEAM</h2>
                        </div>

                        <div class="row text-center">
                            <!-- Team item-->
                            <div class="col-xl-3 col-sm-6 mb-5">
                                <div class="bg-dark rounded shadow-sm py-5 px-4"><img
                                            src="./images/about_us/TanLuc.jpg" alt=""
                                            width="100"
                                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"
                                            style="width: 100px; height: 100px">
                                    <h5 class="mb-0 text-light fw-bold">Tan Luc</h5><span
                                            class="small text-uppercase text-danger">CEO - Founder</span>
                                    <section class="mb-4">
                                        <!-- Facebook -->
                                        <a class="btn btn-outline-light btn-floating m-1" style="border-radius: 25px"
                                           href="https://www.facebook.com/a123.1e/" role="button" target="_blank"
                                        ><i class="fab fa-facebook-f"></i
                                            ></a>

                                        <!-- Twitter -->
                                        <a class="btn btn-outline-light btn-floating m-1" style="border-radius: 25px"
                                           href="#!"
                                           role="button"
                                        ><i class="fab fa-twitter"></i
                                            ></a>
                                        <!-- Instagram -->
                                        <a class="btn btn-outline-light btn-floating m-1" style="border-radius: 25px"
                                           href="#!" role="button"
                                        ><i class="fab fa-instagram"></i
                                            ></a>

                                    </section>
                                    <!-- Section: Social media -->
                                </div>
                            </div>
                            <!-- End-->

                            <!-- Team item-->
                            <div class="col-xl-3 col-sm-6 mb-5">
                                <div class="bg-dark rounded shadow-sm py-5 px-4"><img
                                            src="./images/about_us/TheDuy.jpg" alt=""
                                            width="100"
                                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"
                                            style="width: 100px; height: 100px">
                                    <h5 class="mb-0 text-light fw-bold">Tran The Duy</h5><span
                                            class="small text-uppercase text-danger">CEO - Founder</span>
                                    <section class="mb-4">
                                        <!-- Facebook -->
                                        <a class="btn btn-outline-light btn-floating m-1" style="border-radius: 25px"
                                           href="https://www.facebook.com/duy.tranthe.9003" role="button" target="_blank"
                                        ><i class="fab fa-facebook-f"></i
                                            ></a>

                                        <!-- Twitter -->
                                        <a class="btn btn-outline-light btn-floating m-1" style="border-radius: 25px"
                                           href="#!"
                                           role="button"
                                        ><i class="fab fa-twitter"></i
                                            ></a>
                                        <!-- Instagram -->
                                        <a class="btn btn-outline-light btn-floating m-1" style="border-radius: 25px"
                                           href="#!" role="button"
                                        ><i class="fab fa-instagram"></i
                                            ></a>

                                    </section>
                                    <!-- Section: Social media -->
                                </div>
                            </div>
                            <!-- End-->

                        </div>
                    </div>
                </div>
            </div>

    <!--Footer Start-->
    <footer class="bg-dark text-center text-white">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/a123.1e/"
                   role="button" target="_blank"><i class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"><i class="fab fa-twitter"></i></a>
                <!-- Instagram -->
                <a class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/duy.tranthe.9003/"
                   role="button" target="_blank"><i class="fab fa-facebook-f"></i></a>

            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="www.ludustore.com.vn">ludustore.com.vn</a>
        </div>
        <!-- Copyright -->
    </footer>
    <!--Footer End-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>
</body>
</html>