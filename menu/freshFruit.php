<?php

session_start();
include("../mysql/connect.php");

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
    <link rel="stylesheet" href="../css-file/design2.css">
    <link rel="stylesheet" href="../script.js">
    <link rel="stylesheet" href="../css-file/style.css">        

    <title>LUDU - Menu/Fresh Fruit</title>
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
        /*------------------------------------------------
                    Home Page
                -------------------------------------------------*/

        .hexagon-item:first-child {
            margin-left: 0;
        }

        .page-home {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
            vertical-align: middle;
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

            background-color:  #d9534f;
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
<div class="container-fluid"  style="width: 100%" >
    <br>
    <br>
    <br>
    <ul class="menu" style="margin-left: 550px;">
        <li><a class="active" href="#index">FRESH FRUIT</a></li>
        <li><a href="./freshFlower.php">FRESH FLOWER</a></li>
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
                    <img src="../images/product/xoai.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Xoài Úc</h5>
                        <p class="card-text">Cây xoài Úc có nguồn gốc từ Australia, giống xoài Úc ở tỉnh Khánh Hoà là giống xoài ghép với tổ hợp lai gốc ghép địa phương xoài Canh Nông với mắt ghép xoài R2E2 du nhập từ Úc. Đây là giống đa phôi, thuộc nhóm chín trung bình, thời gian từ ra hoa đến thu hoạch 4,5 tháng.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark h-100">
                    <img src="../images/product/tao.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Táo Mỹ</h5>
                        <p class="card-text">Tại Mỹ, táo Envy được trồng chủ yếu tại tiểu bang Washington. - Giống táo này có quả to tròn, vỏ màu đỏ điểm thêm các sọc màu vàng, thịt giòn, ngọt, thơm đã trở thành giống táo cao cấp nhất, đặc biệt táo Envy khi cắt ra vẫn giữ được màu trắng không bị thâm như những loại táo khác.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark h-100">
                    <img src="../images/product/nho.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Nho Mỹ</h5>
                        <p class="card-text">Nho đen không hạt Mỹ được nhập khẩu từ Mỹ quả thon dài màu đen sẫm, không hạt và rất ngọt. Nho đen không hạt Mỹ nhìn sang trọng lịch sự và thường được dùng làm quà biếu. Nho đen không hạt Mỹ được trồng ở nhiều những nơi có khí hậu khô và ấm áp, đặc biệt ở các bang California, Washington với đa dạng các loại: Autumn Royal, Midnight Beauty, Sugrathirteen, Summer Royal và loại Autumn Royal là loại ngon hơn hẳn.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark h-100">
                    <img src="../images//product/duahau.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Dưa Hấu Nhật Bản</h5>
                        <p class="card-text">Những quả dưa hấu đặc biệt này có xuất xứ từ Tottori, một tỉnh nằm ở vùng Chugoku trên đảo Honshu, Nhật Bản. Mỗi quả dưa hấu có kích thước khổng lồ này được bán với giá 2.288 đôla Hong Kong (khoảng 6,5 triệu đồng). Ngoài loại dưa hấu này, Nhật Bản còn nổi tiếng với loại dưa hấu Densukes được trồng trên đảo Hokkaido.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark h-100">
                    <img src="../images/product/chery.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Cherry đỏ Canada</h5>
                        <p class="card-text">Trái Cherry là loại trái cây nhập khẩu sạch, rất ngon miệng và có giá trị dinh dưỡng rất cao. Do đó giá bán Cherry thường không rẻ nên trái Cherry thường được dùng làm quà biếu, quà tặng Tết. Ngoài ra, trái Cherry không chỉ là một loại thực phẩm ngon miệng mà còn là bí quyết làm đẹp của nhiều chị em phụ nữ do chứa nhiều Vitamin A, Vitamin C, chất chống Ôxy hóa, và Collagen giúp da đàn hồi và săn chắc.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card text-white bg-dark h-100">
                    <img src="../images/product/dualuoi.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Dưa Lưới Vàng</h5>
                        <p class="card-text">Giống dưa lưới vàng có nguồn gốc từ Tân Cương, Trung Quốc có các vết lưới màu trắng đan xen với nhau, hiện rõ trên vỏ dưa. Đối với dưa Việt Nam, khi chín lưới chằng chịt hơn.</p>
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



