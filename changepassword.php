<?php 
//Check nếu chưa có user_mail (chưa đăng nhập) sẽ trả về trang login.php
if(session_id() == '') session_start();
if (isset($_SESSION['user_mail']) == false) {
    header("location: login.php");
    exit();
} 
$get_user_name = $_SESSION['user_name'];
$get_user_mail = $_SESSION['user_mail'];


//print_r($_POST)
$error = ""; 
$checksuccess = true;
if(isset($_POST['btnchangepassword']) == true){
    $password = $_SESSION['password'];
    $oldpassword = md5($_POST['pass_old']);
    $newpassword_1 = md5($_POST['pass_new1']);
    $newpassword_2 = md5($_POST['pass_new2']);
    $conn = new mysqli('localhost', 'tanluc1', 'tanluc1', 'shikoba');
    $sql = "SELECT * FROM users WHERE user_name = ? AND password = ?";

    $sql2 = "SELECT * FROM users WHERE (user_mail='$get_user_mail')";
    $db = mysqli_connect("localhost", "tanluc1", "tanluc1", "shikoba");
    $res = mysqli_query($db, $sql2);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($newpassword_1 == $row['password']) { 
            $_SESSION['message'] = "Trùng mật khẩu";  // added ;
            echo "<center>(Mật khẩu mới trùng mật khẩu cũ!)</center>";
            $checksuccess = false;
        } 
        if ($oldpassword != $row['password']) { 
          $_SESSION['message'] = "Sai mật khẩu";  // added ;
          echo "<center>(Sai mật khẩu cũ!)</center>";
          $checksuccess = false;
          $error = "Error!";
      }

    //$stmt = $conn->prepare($sql);
    //$stmt->execute([$get_user_name, $oldpassword]);
    //if($stmt->rowCount() == 0) {$error = "Mật khẩu cũ sai rồi";}
    if(strlen($newpassword_1)<6) {echo "<center>(Mật khẩu quá ngắn!)</center>"; $checksuccess = false; $error = "Error!";} 
    if($newpassword_1!=$newpassword_2) {echo "<center>(Mật khẩu mới không giống nhau!)</center>"; $checksuccess = false; $error = "Error!";}
    

    /* SET PASSWORD */
    if($error==""){
      $sql = "UPDATE users SET password = ? WHERE user_mail = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$newpassword_1, $get_user_mail]);
      if($checksuccess == true) {
        echo "<center>(Cập nhật mật khẩu thành công!)</center>";
      }
    }
  }
}

	/* -------------------------------------- SET USER INFORMATION ------------------------------------------------------ */
if(isset($_POST['btnsaveinformation']) == true){
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$get_address = $_SESSION['address'];
	$get_phone = $_SESSION['phone'];

	$conn = new mysqli('localhost', 'tanluc1', 'tanluc1', 'shikoba');
	$sql = "UPDATE users SET address = ? , phone = ? WHERE user_mail = ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$address, $phone, $get_user_mail]);
	if($checksuccess == true) {
	  echo "<center>(Cập nhật thông tin thành công)</center>";
	}
	
}

?>


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  
  <div class="wrapper">
	
	<div class="password-container">
		<h1>Change Password</h1>
		<span class="line"></span>
		<form method="POST" action="">
      <div class="form-group">
        <p class="helper-text">Old password</p>
        <input type="password" class="form-control" name="pass_old" required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu cũ')" oninput="setCustomValidity('')"> 
				<label>Old password</label>
				<p class="helper-text">Minimum 6 characters</p>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name="pass_new1" required oninvalid="this.setCustomValidity('Vui lòng nhập mật khẩu mới')" oninput="setCustomValidity('')">
				<label>New password</label>
				<p class="helper-text">Minimum 6 characters</p>
			</div>
			<div class="form-group">
        <input type="password" class="form-control" name="pass_new2" required oninvalid="this.setCustomValidity('Vui lòng nhập lại mật khẩu mới')" oninput="setCustomValidity('')">
				<label>Confirm new password</label>
			</div>
			<a class="back">Back to My Account</a>
			<button type="submit" name="btnchangepassword" class="btn">Confirm</button>
		</form>
	</div>

	<div class="account-container">
		<h1>My Account</h1>
		<span class="line"></span>
		<h2><?php echo $_SESSION['user_mail'] ?></h2>
		<span class="line"></span>
		<form method="POST" action="">
			<div class="form-group">
				<input name="user_name" type="text" class="form-control" required value="<?php echo $_SESSION['user_name'] ?>">
				<label>User name</label>
			</div>
			<div class="form-group">
				<input name="address" type="text" class="form-control" required value="<?php echo $_SESSION['address'] ?>">
				<label>Address</label>
			</div>
			<div class="form-group">
				<input name="phone" type="phone" class="form-control" required value="<?php echo $_SESSION['phone'] ?>">
				<label>Phone number</label>
			</div>
			<a class="change-password">Change Password</a>
			<button type="submit" name="btnsaveinformation" class="btn">Save</button>
      <a href="index.php" class="btn" style="margin-right:8px;">Back</a>
		</form>
	</div>
</div>  
<script src="https://code.jquery.com/jquery-2.2.4.min.js" ></script>
<script id="rendered-js">
$(".change-password").click(function (e) {
  e.preventDefault();
  $(".password-container").show({});
});

$(".change-password").click(function (e) {
  e.preventDefault();
  $(".account-container").hide({});
});

$(".back").click(function (e) {
  e.preventDefault();
  $(".account-container").show({});
});

$(".back").click(function (e) {
  e.preventDefault();
  $(".password-container").hide({});
});
    </script>

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
 .wrapper .account-container form .btn:hover, .wrapper .password-container form .btn:hover {
	 transition: 0.125s all ease-in-out;
	 background: #ac2925;
}
 .wrapper .account-container form .change-password, .wrapper .password-container form .change-password, .wrapper .account-container form .back, .wrapper .password-container form .back {
	 color: white;
	 margin-top: 24px;
	 font-weight: 200;
	 float: left;
   text-decoration: none;
}
 .wrapper .account-container form .change-password:hover, .wrapper .password-container form .change-password:hover, .wrapper .account-container form .back:hover, .wrapper .password-container form .back:hover {
	 color: #d9534f;
	 cursor: pointer;
}
 

</style>
