<?php
include "conn.php";
session_start();
if(isset($_POST['login'])){
   $email = $_POST['email'];
   $pss = $_POST['pass'];
   $msg;

 $select = "select * from adminlogin where email='$email' and password ='$pss'";
 $qr = mysqli_query($conn,$select);
  $count = mysqli_num_rows($qr);
  if($count>0){
  $_SESSION['email'] = $email;
  header("location:dashboard.php");
  }else{
    $msg = "invalid email or password";
  }
   ?>
     
   <?php
}
?>


<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>computer sales and Inventory</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/brands.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <link href="style.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/mdb.min.css">
    </head>
    <style>
        body{
    margin: 0;
    padding: 0;
    background-color: #336EFF;
}
.main{
    padding: 200px;
}

    </style>
    <body>
        <div class="main">
            <!-- Default form login -->
            <?php
            if(isset($msg)){
                ?>
                 <div class="alert alert-warning"> 
                     <?php echo $msg; ?>
                 </div>
                <?php
            }
            ?>

<form class="text-center border border-light p-5" method="post" action="login.php">

    <p class="h4 mb-4">Computer sales and inventory</p>

    <!-- Email -->
    <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" name="email" placeholder="E-mail">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" name="pass" placeholder="Password">

    <div class="d-flex justify-content-around">
        <div>
            <!-- Remember me -->
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" name="" id="defaultLoginFormRemember">
                <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
            </div>
        </div>
        <div>
            <!-- Forgot password -->
            
        </div>
    </div>

    <!-- Sign in button -->
    <button class="btn btn-info btn-block my-4" name="login" type="submit">login</button>

</form>
<!-- Default form login -->
        </div>
        
        
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/brands.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
    </body>
</html>
