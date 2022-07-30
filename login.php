<?php
session_start();
include("mysql/connect.php");
error_reporting(0);

//Kiểm tra nếu đã đăng nhập (get user_mail == true) sẽ không cho truy cập trang login.php nữa, trả về index.php
if(session_id() == '') session_start();
if (isset($_SESSION['user_mail']) == true) {
    header("location: index.php");
    exit();
} 

        /* SIGN IN */
if (isset($_POST["login"])) {
    $email = $_POST["user_mail"];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE user_mail='$email'AND password= '$password'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    $sql1 = "SELECT * FROM admins WHERE user_name='$email'AND password='$password'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    // Lấy giá trị từ form database
    $_SESSION['user_mail'] = $row['user_mail'];
    $_SESSION['user_name'] = $row['user_name'];
    $_SESSION['password'] = $row['password'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['phone'] = $row['phone'];
    $_SESSION['address'] = $row['address'];

    if ($email = $row1["user_name"] and $password = $row1["password"]) {
        header('location: panel/index.php');}
        elseif($email = $row["user_mail"] and $password = $row["password"]){
          header('location: index.php');
    }
        else{
            echo "<script>
            alert('Lỗi! Vui lòng kiểm tra lại email và mật khẩu!')
            window.location.href='login.php'
        </script>";
        }
}
        /* SIGN UP */
if (isset($_POST['register_btn'])) {
    $user_name = $_POST['user_name'];
    $user_mail = $_POST['user_mail'];
    $password = md5($_POST['password']);
    $sql = "SELECT * FROM users WHERE (user_mail='$user_mail')";
    $query = "insert into users (user_mail,user_name,password) values('$user_mail','$user_name','$password')";
    $res = mysqli_query($db, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($user_mail == $row['user_mail']) {  
            $_SESSION['message'] = "Email have already";
            echo "<script>
            alert('Email đã được sử dụng')
            window.location.href='login.php'
        </script>";
        }
    } elseif (!empty($user_name) && !empty($password) && !empty($user_mail)) {
        

        mysqli_query($db, $query);

        header("location: login.php");
        die;
    }

}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LUDU - Đăng ký/Đăng nhập</title>
  <link rel="icon" type="image/jpg" href="images/logo1.png"/>
  <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
<!--font-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Ubuntu:ital@0;1&display=swap" rel="stylesheet">
<!--fontawesome -->
<script src="https://kit.fontawesome.com/cc5e355fff.js" crossorigin="anonymous"></script>
<!--bootstraps-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
          integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
  
  <link rel="stylesheet" href="./css-file/loginform.css">
  <script src="./css-file/script.js" async></script>

  <style>
        body {
            background: #212529 no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
  </style>
</head>


<body>
<a href="index.php" style="display: block;text-align: center;font-size: 15px;margin: 10px auto;color: #fff;text-transform: uppercase;padding: 15px 25px;text-decoration:none;width:fit-content;background-color: red; border-radius: 50px;box-shadow: 0 2px 25px red;">← BACK</a>
<div class="container" id="container">
  <!-------------------------------------------------------------- SIGN UP ------------------------------------------------------>
  <div class="form-container sign-up-container">
    <form method="POST">
      <h1>Create Account</h1>
      <input type="text" id="user_name" name="user_name" placeholder="Type your name..." required oninvalid="this.setCustomValidity('Vui lòng nhập tên tài khoản')" oninput="setCustomValidity('')"/>
      <input type="email" id="user_mail" name="user_mail" placeholder="Type your Email..." required oninvalid="this.setCustomValidity('Vui lòng nhập email')" oninput="setCustomValidity('')"/>
      <input type="password" id="password" name="password" placeholder="Type your password..." required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')" oninput="setCustomValidity('')"/>
      <button type="submit" name="register_btn">Sign Up</button>
    </form>
  </div>
  <!-------------------------------------------------------------- SIGN IN ------------------------------------------------------>
  <div class="form-container sign-in-container">
    <form method="POST" action="login.php">
      <h1>Sign in</h1>
      <input type="text" id="email" name="user_mail" placeholder="Type your Email" required oninvalid="this.setCustomValidity('Vui lòng nhập email!')" oninput="setCustomValidity('')"/>
      <input type="password" id="password" name="password" placeholder="Type your password" required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu')" oninput="setCustomValidity('')"/>
      <a href="#">Forgot your password?</a>
      <button name="login">Sign in</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Chào mừng bạn!</h1>
        <p>Để kết nối với chúng tôi hãy tiến hành đăng nhập tài khoản của bạn</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Xin chào bạn!</h1>
        <p>Hãy tạo tài khoản cho bạn và bắt đầu tham gia với chúng tôi</p>
        <button class="ghost" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>
</div>

<footer>
  <p>
    Email: Ludu2349@gmail.com <i class="fa fa-heart"></i> Make by
    <a target="_blank" href="https://florin-pop.com">LUDU STORE</a>
  </p>
</footer>
</body>

</html>
