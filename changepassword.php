<?php 
if(session_id() == '') session_start();
if (isset($_SESSION['user_mail']) == false) {
    header("location: login.php");
    exit();
} 
$get_user_name = $_SESSION['user_name'];
//print_r($_POST)
$error = "";
if(isset($_POST['btnchangepassword']) == true){
    //$oldpassword = $_POST['pass_old'];
    $newpassword_1 = $_POST['pass_new1'];
    $newpassword_2 = $_POST['pass_new2'];
    $conn = new mysqli('localhost', 'tanluc1', 'tanluc1', 'shikoba');
    $sql = "SELECT * FROM users WHERE user_name = ? AND password = ?";
    //$stmt = $conn->prepare($sql);
    //$stmt->execute([$get_user_name, $oldpassword]);
    //if($stmt->rowCount() == 0) {$error = "Mật khẩu cũ sai rồi";}
    if(strlen($newpassword_1)<6) {$error = "Mật khẩu mới quá ngắn";}
    if($newpassword_1!=$newpassword_2) {$error = "Mật khẩu mới không giống nhau";}

    /* SET PASSWORD */
    if($error==""){
      $sql = "UPDATE users SET password = ? WHERE user_name = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute([$newpassword_1, $get_user_name]);
      echo "Đã cập nhật mật khẩu mới!";
    }
}
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  
<div class="col-md-9 m-auto" >
 <div class="card">
  <div class="card-header bg-primary">ĐỔI MẬT KHẨU</div>
  <div class="card-body">
    <form class="form-horizontal" method="POST" action="" >

       <?php if($error!=""){ ?>
       <div class="alert alert-secondary"><?php echo $error?> </div>
       <?php } ?>

        <p>  <label class="control-label">Email:</label>             
             <input class="form-control" disabled  value="<?php echo $_SESSION['user_mail'] ?>">	 
        </p>
        <p> <label>Mật khẩu cũ</label>            
            <input type="password" class="form-control" name="pass_old" disabled value="<?php echo $_SESSION['password'] ?>"> 
        </p>
        <p> <label>Mật khẩu mới:</label>         
           <input type="password" class="form-control" name="pass_new1" >
        </p>
        <p><label>Gõ lại mật khẩu mới:</label>
          <input type="password" class="form-control" name="pass_new2" >
        </p>  
        <p><button type="submit" name="btnchangepassword" class="btn btn-warning">Đổi mật khẩu</button></p> 
    </form> 
  </div>
</div>
</div>    