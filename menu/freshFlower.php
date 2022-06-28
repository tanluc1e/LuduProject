<?php

session_start();
include("../mysql/baglan.php");

?>
<!doctype html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/jpg" href="../images/logo1.png"/>
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

    <title>LUDU - Menu/Fresh Flower</title>
    <link rel="stylesheet" href="../css-file/design2.css">
    <link rel="stylesheet" href="../script.js">
    <link rel="stylesheet" href="../css-file/style.css">  
    <!--Header Start-->
    <header class="p-3 bg-dark text-white">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
                <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap">
                    <use xlink:href="#bootstrap"></use>
                </svg>
            </a>
            <img src="../images/index/logo1.png" width="100px"/>
            <ul class="snip1378 me-lg-auto" style="margin-left: 120px;"> 
                <li><a href="../index.php" class="nav-link px-2 ">HOME</a></li>
                <li><a href="../menu/menu.php" class="nav-link px-2 text-white">MENU</a></li>
                <li><a href="../product.php" class="nav-link px-2 text-white">PRODUCT</a></li>
                <li><a href="../introduce.php" class="nav-link px-2 text-white">INTRODUCE</a></li>
                <li><a href="../aboutUs.php" class="nav-link px-2 text-white">ABOUT US</a></li>
            </ul>
            <div class="col-md-3 col-lg-2 button-outline">
                    
                      <a class="btn cart btn-outline-light btn-floating m-1" href="cart.php" role="button"><i
                           class="fas fa-shopping-cart"></i></a>
                          <div class="btn-login-logout">
                          <?php
                           if (!empty($_SESSION['user_mail'])) { ?> 
                            <div class="dropdown">
                           <button class="btn-log-in btn btn-danger text-capitalize" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['user_name']; ?></button>
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
    <style>
        body {
            background: url(../images/bg.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

        }

        .container-fluid {
            border-top: 4px solid #d9534f;
            background-color: #5f5f5f;
            display: flex;  
            align-items: center;
        }

        /*kategori*/
        body .menu {
            list-style-type: none;

            margin: auto;

            padding: 0;

            overflow: hidden;

            width: 36.15%;
        }

        .menu li {
            float:left;
            text-align: center;
            margin: auto;
        }

        .menu li a {
            display: block;

            color: white;

            text-align: center;

            padding: 14px 16px;

            text-decoration: none;
        }

        .menu li  a:hover:not(.active) {

            background-color: #111;
        }

        .active {

            background-color: #d9534f;
        }

        /*end*/
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
</head>
<body>
<div class="container-fluid" style="width: 65" >
    <br>
    <br>
    <br>
    <ul class="menu" style="margin-left: 550px;">
        <li><a href="./freshFruit.php">FRESH FRUIT</a></li>
        <li><a class="active" href="./freshFlower.php">FRESH FLOWER</a></li>
        <li><a href="./package.php">PACKAGE FLOWER</a></li>
    </ul>
</div>
<!--     cards start-->
<div class="container" style="width: 100%">
    <br>
    <br>
    <br>



    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-3 g-4">
        <div class="col">
            <div class="card text-white bg-dark h-100">
                <img src="../images/product/hoahong.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bó Hoa Hồng</h5>
                    <p class="card-text">Hoa hồng luôn được gắn liền với một tình yêu cháy bỏng, nồng nàn hay nét đẹp kiêu sa, quyến rũ. Tuy nhiên, hoa hồng còn được biết đến như biểu tượng của tình mẫu tử thiêng liêng. Bó hoa hồng tình yêu rực rỡ tặng mẹ trong những ngày lễ đặc biệt sẽ là món quà tuyệt vời thay lời cảm ơn chân thành của bạn đến “đấng sinh thành”.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark h-100">
                <img src="../images/product/hoatulip.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bó Hoa Tulip</h5>
                    <p class="card-text">Hoa Tulip tượng trưng cho sự nổi tiếng, giàu có và tình yêu hoàn hảo. Có lẽ vì nó nở vào mùa xuân, khi bóng tối của những ngày đông đã bị xóa nhòa, Tulip còn trở thành biểu tượng cho cuộc sống vĩnh hằng.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark h-100">
                <img src="../images/product/hoahuongduong.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bó Hoa Hướng Dương</h5>
                    <p class="card-text">Hoa hướng dương tượng trưng cho sự đáng yêu, trung thành và trường thọ. Phần lớn ý nghĩa của hoa hướng dương bắt nguồn từ chính cái tên của nó, chính là mặt trời - một biểu tượng mãnh liệt của sự sống.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark h-100">
                <img src="../images/product/hoaly.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bó Hoa Ly</h5>
                    <p class="card-text">Hoa Ly từ lâu đã được mệnh danh là một loài hoa thanh cao và quý phái, nó không những tượng trưng cho sắc đẹp, đức hạnh mà còn là sự kiêu hãnh và cả tình yêu cao thượng, chung thủy. Chính bởi vậy, hoa Ly không chỉ thích hợp để dành tặng mẹ, người yêu mà còn rất thích hợp cho ngày chúc mừng, tốt nghiệp, khai trương...</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark h-100">
                <img src="../images/product/hoacamchuong.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bó Hoa Cẩm Chướng</h5>
                    <p class="card-text">Hoa cẩm chướng cũng có nhiều ý nghĩa rất hay. Hãy cùng tìm hiểu nhé. Ý nghĩa chung: Sự ái mộ - Sự thôi miên, quyến rũ - Tình yêu của phụ nữ - Niềm tự hào - Sắc đẹp - Tình yêu trong sáng và sâu đậm, thiết tha. Hoa cẩm chướng vàng: Sự từ chối, sự khinh thường, thất vọng, hối hận.</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark h-100">
                <img src="../images/product/hoadongtien.jpeg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Bó Hoa Đồng Tiền</h5>
                    <p class="card-text">Trong những dịp xuân về tết đến, hoa đồng tiền mang trên mình ý nghĩa tài lộc và may mắn. Từ xa xưa, mọi người tin rằng vào ngày Tết nếu có một chậu hoa đồng tiền trong nhà sẽ giúp gia chủ làm ăn phát đạt, gặp nhiều thành công. Bên cạnh đó, nó còn giúp hoá giải điềm xấu và mang lại vận may cho gia chủ.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!--cards end-->

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

</body>


