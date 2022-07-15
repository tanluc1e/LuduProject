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

        /*------------------------------------------------
           Home Page
       -------------------------------------------------*/

        .hexagon-item:first-child {
            margin-left: 0;
        }
        
        .container-introduce{
            margin-bottom: 30px;
            margin-top: 35px;
        }
        .page-home {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            vertical-align: middle;
            border-top: 4px solid #d9534f;
        }

        .page-home .overlay {
            background-color: rgba(14, 17, 24, 0.97);
        }

        .pt-table {
            display: table;
            width: 100%;
            height: -webkit-calc(100vh - 4px);
            height: -moz-calc(100vh - 4px);
            height: calc(100vh - 4px);
        }

        .pt-tablecell {
            display: table-cell;
            vertical-align: middle;
        }

        .overlay {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }

        .relative {
            position: relative;
        }

        .preloader.active .loading-mask {
            width: 0;
        }
        /* end */
        
        h5{
            font-weight: 400;
            font-size: 3rem;
        }

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
    <title>LUDU - Giới thiệu</title>
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
                <li><a href="introduce.php" class="nav-link px-2 text-secondary">INTRODUCE</a></li>
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
<main class="site-wrapper">
    <div class="pt-table desktop-768">
        <div class="pt-tablecell page-home relative" style="background-image: url(https://scontent.fesb3-2.fna.fbcdn.net/v/t1.6435-9/37904225_688725644825738_6160377175833837568_n.jpg?_nc_cat=107&ccb=1-5&_nc_sid=e3f864&_nc_ohc=mmYcEQ-g-N4AX9lbi4P&_nc_ht=scontent.fesb3-2.fna&oh=00_AT9iEiiSnIY863LcnCZ-Mg5islvP-jmzDMbr1QG03OxayQ&oe=620128D6);
    background-position: center;
    background-size: cover;">
            <div class="overlay"></div>


            <div class="container container-introduce">
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col">
                        <div class="card text-white bg-dark h-100">
                            <img src="images/introduce/fruit.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-danger">FRESH FRUIT</h5>
                                <p class="card-text">● Với mục tiêu đáp ứng tối đa nhu cầu của các khách hàng, trái cây tươi được cung cấp tại LUDU Store rất đa dạng về chủng loại, không chỉ có những mặt hàng quen thuộc, có nguồn gốc từ Việt Nam mà còn đa dạng những loại mới lạ, được nhập khẩu từ Mỹ, Hàn Quốc, Canada, Úc, Nam Phi... <br>
                                ● Tất cả trái cây tươi được bán tại LUDU Store bạn sẽ thấy từng loại trái cây nào cũng có nguồn gốc, xuất xứ rõ ràng.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-dark h-100">
                            <img src="images/introduce/flower.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-danger">FRESH FLOWER</h5>
                                <p class="card-text">● Từ lâu “HOA” không
                                    thể thiếu trong đời sống của
                                    chúng ta ngày nay nay.<br>
                                    ● LUDU Store chuyên cung cấp các loại hoa tươi với giá cả hợp lý nhất thị trường. Tại LUDU Store, các loại hoa tươi sẽ được cắm nhiều kiểu, đa dạng chủng loại, mẫu mã. Bao gồm: hoa chúc mừng, hoa sinh nhật, hoa ngày lễ, hoa tang lễ,
                                    <br>
                                    ● Bên cạnh việc cố gắng để đem đến cho khách hàng những mẫu hoa tươi, chúng tôi còn luôn nỗ lực cố gắng để có thể cập nhật các mẫu cắm mới đang là xu hướng của thị trường.

                                 </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card text-white bg-dark h-100">
                            <img src="images/introduce/baobi.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title fw-bold text-danger">PACKAGE FLOWER</h5>
                                <p class="card-text">● Không chỉ đơn giản là "HOA" với sologan "Nâng niu Từng Cánh Hoa". <br>
                                    ● Sản phẩm bao bì của LUDU Store, với từng loại
                                    thiết kế riêng biệt, sáng tạo, độc đáo. Luôn luôn đem đến sản phẩm chất lượng cao đến cho khách hàng, chất lượng sản phẩm tạo nên thương hiệu.
                                    <br>
                                    ● Nếu bạn là cửa hàng hoa tươi nhỏ muốn tạo một thương
                                    hiệu riêng cho mình hãy để  LUDU Store giúp bạn làm điều
                                    đó.
                                    LUDU Store chuyên cung cấp các loại bao bì về ngành hoa.
                             </p>
                            </div>
                        </div>
                    </div>
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
</main>