<?php 
//Check nếu chưa có user_mail (chưa đăng nhập) sẽ trả về trang login.php
if(session_id() == '') session_start();
if (isset($_SESSION['user_mail']) == false) {
    header("location: login.php");
    exit();
} 

//GET CURRENT VALUES FROM DATABASE (User_name, Address, Phone)
$conn_gcv = mysqli_connect("localhost", "tanluc1", "tanluc1", "ludu");
$gcv_mail = $_SESSION['user_mail'];
$gcv_sql = "SELECT * FROM Users WHERE user_mail='$gcv_mail'";
$gcv_query = mysqli_query($conn_gcv, $gcv_sql);
if ($row = mysqli_fetch_assoc($gcv_query)) { 
    $current_address = $row['address'];
    $current_phone = $row['phone'];
	$current_username = $row['user_name'];
}

//GET VALUES FROM SESSION
$get_user_name = $_SESSION['user_name'];
$get_user_mail = $_SESSION['user_mail'];
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<meta charset="utf-8">
  <title>LUDU - Cập nhật thông tin</title>
  <link rel="icon" type="image/jpg" href="images/logo1.png"/>
  <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>

  <div class="wrapper">
	<div class="account-container">
		<h1>Your Profile</h1>
		<span class="line"></span>
		<h2><?php echo $_SESSION['user_mail'] ?></h2>
		<span class="line"></span>
		<form method="POST" action="">
			<div class="form-group">
				<input name="user_name" type="text" class="form-control" required value="<?php echo $current_username ?>" disabled>
			</div>
			<div class="form-group">
				<input name="address" type="text" class="form-control" required value="<?php echo $current_address ?>" disabled>
			</div>
			<div class="form-group">
				<input name="phone" type="phone" class="form-control" required value="<?php echo $current_phone ?>" disabled>
			</div>
            <a href="./changepassword.php" class="btn">Change Information</a>
      <a href="index.php" class="btn" style="margin-right:8px;">Back</a>
		</form>
	</div>
</div>  

<!-- css  -->

<style>
  * {
	 box-sizing: border-box;
}
 html {
	 background: rgba(38, 38, 38, .92);
	 font-family: 'Lato', sans-serif;
	 font-weight: 400;
}
 .wrapper {
	 height: 100vh;
	 position: relative;
   background-color: rgba(38, 38, 38, 0.92)
}
 .wrapper .password-container {
	 display: none;
	 top: 23%;
}
 .wrapper .account-container {
	 top: 30%;
}
 .wrapper .account-container, .wrapper .password-container {
	 position: absolute;
	 left: 50%;
	 transform: translate(-50%, -50%);
	 width: 700px;
	 padding: 0 150px;
	 border-radius: 8px;
	 margin: 96px auto 0 auto;
	 box-shadow: 0 6px 24px rbga(0, 0, 0, 1);
}
 .wrapper .account-container h1, .wrapper .password-container h1, .wrapper .account-container h2, .wrapper .password-container h2, .wrapper .account-container h3, .wrapper .password-container h3 {
	 text-align: center;
	 margin: 6px 0;
	 padding: 0;
	 color: white;
}
 .wrapper .account-container h1, .wrapper .password-container h1 {
	 font-size: 22px;
	 font-weight: 400;
}
 .wrapper .account-container h2, .wrapper .password-container h2 {
	 font-size: 16px;
	 font-weight: 200;
}
 .wrapper .account-container h3, .wrapper .password-container h3 {
	 font-size: 12px;
	 color: #9b9b9b;
	 font-weight: 200;
}
 .wrapper .account-container .line, .wrapper .password-container .line {
	 height: 1px;
	 width: 36px;
	 background: #9b9b9b;
	 display: block;
	 margin: 24px auto;
}
 .wrapper .account-container form, .wrapper .password-container form {
	 margin: 48px 0;
}
 .wrapper .account-container form .form-group, .wrapper .password-container form .form-group {
	 margin: 12px 0;
	 position: relative;
	 display: inline-block;
}
 .wrapper .account-container form .form-group:first-child, .wrapper .password-container form .form-group:first-child {
	 margin-top: 0;
}
 .wrapper .account-container form .form-group label, .wrapper .password-container form .form-group label {
	 font-size: 16px;
	 color: #878787;
	 font-weight: 200;
	 margin: 24px 0;
	 position: absolute;
	 z-index: 2;
	 left: 24px;
	 top: 26px;
	 pointer-events: none;
	 transition: transform 100ms ease;
	 transform: translateY(-30px);
}
 .wrapper .account-container form .form-group .helper-text, .wrapper .password-container form .form-group .helper-text {
	 font-size: 14px;
	 color: #878787;
	 font-weight: 200;
	 text-align: right;
	 display: inline-block;
	 position: absolute;
	 right: 0px;
}
 .wrapper .account-container form .form-group input, .wrapper .password-container form .form-group input {
	 width: 400px;
	 padding: 24px 24px 18px;
	 border: none;
	 border-radius: 4px;
	 outline: 0 none;
	 position: relative;
	 color: black;
	 font-weight: 200;
}
 .wrapper .account-container form .form-group input:focus + label, .wrapper .password-container form .form-group input:focus + label, .wrapper .account-container form .form-group input:valid + label, .wrapper .password-container form .form-group input:valid + label {
	 font-size: 12px;
	 transform: translateY(-40px);
}
 .wrapper .account-container form .form-group input:focus, .wrapper .password-container form .form-group input:focus {
	 transition: 0.125s all ease-in-out;
	 box-shadow: inset 0 0 0 2px #179be5, 0 6px 24px rgba(0, 0, 0, .50);
}
 .wrapper .account-container form .btn, .wrapper .password-container form .btn {
	 border-radius: 48px;
	 background: #d9534f;
	 border: none;
	 color: white;
	 font-size: 16px;
	 font-weight: 200;
	 padding: 12px 24px;
	 margin: 12px 0;
	 outline: none;
	 float: right;
}


</style>
