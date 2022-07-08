<?php
session_start();
error_reporting(0);
include("mysql/connect.php");

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
<html>
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

    <title>LUDU - Giỏ hàng</title>
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
                <li><a href="aboutUs.php" class="nav-link px-2 text-white">ABOUT US</a></li>
            </ul>
            <div class="col-md-3 col-lg-2 button-outline">
                    
                      <a class="btn cart btn-outline-secondary btn-floating m-1" href="cart.php" role="button"><i
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
    <style>
        table, th, tr {
            text-align: center;
            color: #ffffff;
        }

        .title2 {
            text-align: center;
            color: #ffc107;

            padding: 2%;
        }

        h2 {
            text-align: center;
            color: #ffc107;
            background-color: #efefef;
            padding: 2%;
        }

        table th {
            background-color: #ffffff;
            color: #ffc107;
        }

        body {
            background: url(images/bg.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;

        }

        .container-fluid {
            border-top: 4px solid #ffc107;
        }

        .btn-primary {
            color: #000000;
            background-color: #ffc107;
            border-color: #ffc107;
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
        .text-red-color{
            color: #d9534f;
        }
        .text-red-color2{
            color: #FF3346;
        }
    </style>
</head>

<div class="container-fluid">
    <div class="container" style="width: 65%">
        <div style="clear: both"></div>
        <h3 class="title2 text-red-color">GIỎ HÀNG</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="30%" class="text-red-color">Tên sản phẩm</th>
                    <th width="10%" class="text-red-color">Số lượng</th>
                    <th width="13%" class="text-red-color">Giá</th>
                    <th width="10%" class="text-red-color">Tổng</th>
                    <th width="17%" class="text-red-color">Quản lý</th>
                </tr>

                <?php



                $id = $_SESSION['id'];
                $sql = "SELECT * FROM cart WHERE user_id=$id";
                $result = $conn->query($sql);

                $sql1 = "SELECT SUM(Quantity*price) AS total FROM cart where user_id=$id";
                $result1 = $conn->query($sql1);
                while ($row = $result->fetch_assoc()){
                $total = 0;
                $productid=$row["id"];
                $total_each_product = $row["quantity"] * $row["price"];
                

                ?>

                <tr>
                    <td><?php echo $row["pname"]; ?></td>
                    <td><?php echo $row["quantity"]; ?></td>
                    <td><?php echo number_format($row['price'], 3); ?> VND</td>
                    <td>
                        <?php echo number_format($total_each_product, 3); ?> VND
                    </td>
                    <td><a href="cart.php?action=delete&id=<?php echo $row["id"]; ?>"><span
                                    class="text-warning" >Xoá <?php echo $row["id"]; ?></span></a></td>
                    <?php
                }
                ?>
                </tr>
                <?php while ($row1 = $result1->fetch_assoc()){ ?>
                <tr>
                    <td colspan="3" align="right" class="fs-3 text-red-color2 fw-bold">Tổng cộng:</td>
                    <th align="right" class="fs-4 text-red-color2"><?php echo number_format($row1['total'], 3); }?> VND</th>
                    <td></td>

                </tr>

                </table>
                <?php
                if (isset($_GET["action"])) {
                if ($_GET["action"] == "delete") {
                    $sql2="DELETE FROM `cart` WHERE id=$productid";
                    $result2=$conn->query($sql2);
                    echo '<script>window.location="cart.php"</script>';
                }
                }
                ?>

            <div class="text-end">
                <a href="order.php" type="button" class="btn btn-danger">Xác nhận</a>
            </div>
        </div>
    </div>
</div>
</div>
</div>

</main>

