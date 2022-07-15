<?php

session_start();
include("mysql/connect.php");

//Kiểm tra nếu đã đăng nhập (get user_mail == true) sẽ lấy giá trị từ database
if(session_id() == '') session_start();
if (isset($_SESSION['user_mail']) == true) {
    //GET CURRENT VALUES FROM DATABASE (User_name)
    $gcv_mail = $_SESSION['user_mail'];
    $gcv_sql = "SELECT * FROM Users WHERE user_mail='$gcv_mail'";
    $gcv_query = mysqli_query($conn, $gcv_sql);
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
    <!--Black Background-->
    <style>
        body {
            background: url(images/bg.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
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
    <title>LUDU - Trang chủ</title>
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
                <li><a href="index.php" class="nav-link px-2 text-secondary">HOME</a></li>
                <li><a href="menu/menu.php" class="nav-link px-2 text-white">MENU</a></li>
                <li><a href="product.php" class="nav-link px-2 text-white">PRODUCT</a></li>
                <li><a href="introduce.php" class="nav-link px-2 text-white">INTRODUCE</a></li>
                <li><a href="aboutUs.php" class="nav-link px-2 text-white">ABOUT US</a></li>
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
                           <li><a class="dropdown-item" href="./profile.php">Profile</a></li>
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
<div class="container-fluid">

    <!-- Carousel Start -->
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner" style=" width:100%; height: 700px !important;">
            <div class="carousel-item active">
                <img src="./images/index/tsvety-frukty-iagody.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./images/index/6-63037_fruits.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="./images/index/still-life-with-flowers-fruits-table_392895-86331.webp" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!--Carousel End-->
    <br>
    <br>
    <!--Cards Start-->
    <div class="card-group">
        <div class="card bg-dark">
            <img src="https://i.pinimg.com/564x/80/c4/b7/80c4b726ef6187a25ba9d1eb09c12656.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a class="btn btn-danger text-capitalize"  href="menu/menu.php"
                        type="button">MENU</a>
                </div>
                <p class="card-text"></p>
            </div>
        </div>
        <div class="card bg-dark">
            <img src="https://i.pinimg.com/564x/bd/40/17/bd4017dff143b63b363736ec66c82fcc.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a class="btn btn-danger text-capitalize" href="product.php"
                     type="button">PRODUCT</a>
                </div>
                <p class="card-text"></p>
            </div>
        </div>
        <div class="card bg-dark">
            <img src="https://i.pinimg.com/564x/18/6c/b5/186cb5d86c94cb42edb584c312d68538.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a class="btn btn-danger text-capitalize" href="introduce.php"
                     type="button">INTRODUCE</a>
                </div>
                <p class="card-text"></p>
            </div>
        </div>
    </div>
    <!--Cards End-->

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

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
</body>
</html>
