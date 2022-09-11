<?php
include "conn.php";
session_start();
if(!isset($_SESSION['email'])){
   echo "<script>location.href='login.php';</script>";
}

?>
 
 
<!DOCTYPE html>
  <html>
  <head>
  	<title>Dashboard</title>
  </head>
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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	 
	<link rel="stylesheet" type="text/css" href="../css/style.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	 <style>
	 	li a:active{
	 	 	background-color:green;
	 	 }
                 .navbar{
                     background-color: #5499C7 !important;
                 }
                 .sidebar{
                     height: 90vh;
                 }
	 </style>
  <body>
   <nav class="navbar navbar-dark fixed top bg-success flex-md-nowrap p-2 shadow d-print-none" > <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.jsp">Computer Sales And Inventory<a/>
     
   </nav>

   	<div class="container-fluid">
   		 <div class="row">
   		   <div class="col-md-2 bg-light sidebar py-5 ">
   		   	 <div class="sidebar-sticky">
   		   	  <ul class="nav flex-column">
   		   	  	   <li class="nav-item "><a href="dashboard.php" class="nav-link  active"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
   		   	  	    <li class="nav-item"><a href="stock.php" class="nav-link"><i class="fab fa-accessible-icon"></i>Stocks</a></li>
   		   	  	     <li class="nav-item"><a href="Sales.php" class="nav-link"><i class="fas fa-align-center"></i>sales and reports</a></li>
   		   	  	      <li class="nav-item"><a href="supply.php" class="nav-link"><i class="fas fa-database"></i>suppliers</a></li>
   		   	  	      <li class="nav-item"><a href="Account.php" class="nav-link"><i class=" fab fa-teamspeak"></i>Accounts</a></li>
   		   	  	      <li class="nav-item"><a href="logout.php" class="nav-link "><i class="fas fa-users"></i>logout</a></li>
   		   	  	      
   		   	      </ul>
   		   	   </div>
   		   	 
   		   </div>
   		   <div class="col-sm-9 col-md-10 mt-4 ">
   		   	 <div class="row text-center mx-4">
   		   	 	<div class="col-sm-4">
   		   	 		<div class="card text-white bg-success mb-2 " style="max-width: 18rem;">
   		   	 			<div class="card-header">Stock</div>
   		   	 			<div class="card-body">
   		   	 			<div class="card-title">
                  <?php
                 $sql = "select * from  product";
                 $qr = mysqli_query($conn,$sql);
                 $count = mysqli_num_rows($qr);
                 ?>
                  <h4 class="text-primary"><?php echo  $count;?></h4>
                 <?php
                ?>
                </div>
   		   	 			<a href="stock.php" class="btn text-white">view</a>
   		   	 			</div>
   		   	 		</div>
   		   	 	</div>
   		   	 	<div class="col-sm-4">
   		   	 		<div class="card text-white bg-info mb-2" style="max-width: 18rem;">
   		   	 			<div class="card-header">Sales</div>
   		   	 			<div class="card-body">
   		   	 			<div class="card-title">
                <?php
                 $sql = "select * from slaes";
                 $qr = mysqli_query($conn,$sql);
                 $count = mysqli_num_rows($qr);
                 ?>
                  <h4><?php echo  $count;?></h4>
                 <?php
                ?>
                 
                </div>
   		   	 			<a href="sales.php" class="btn text-white">View</a>
   		   	 			</div>
   		   	 		</div>
   		   	 	</div>
   		   	 	<div class="col-sm-4">
   		   	 		<div class="card text-white bg-danger mb-2" style="max-width: 18rem;">
   		   	 			<div class="card-header">Suppliers</div>
   		   	 			<div class="card-body">
   		   	 			<div class="card-title">
   		   	 				 <?php
                 $sql = "select * from  supply";
                 $qr = mysqli_query($conn,$sql);
                 $count = mysqli_num_rows($qr);
                 ?>
                  <h4 class="text-success"><?php echo  $count;?></h4>
                 <?php
                ?>
   		   	 			</div>
   		   	 			<a href="supply.php" class="btn text-white">view</a>
   		   	 			</div>
   		   	 		</div>
   		   	 	</div>
   		   	 </div>
   		   	   <div class="text-center mx-5 mt-5">
   		   	      <p class="text-center bg-dark text-white p-2">Supplies</p>
                              <table class="table">
                                  <thead>
                         	<tr>
                         		<th scope="col">Supplier Name</th>
                         		<th scope="col">Email</th>
                         		<th scope="col">Item</th>
                         	</tr>
                         </thead>
                         <tbody>
                            <?php
                              $sql = "select * from supply";
                               $qr = mysqli_query($conn,$sql);
                               while($row = mysqli_fetch_assoc($qr)){
                                  ?>
                                    <tr>
                                      <td class="text-capitalize text-success"><?php echo $row['sname']; ?></td>
                                       <td class="text-dark font-weight-bold text-capitalize"><?php echo $row['email']; ?></td>
                                        <td class="text-primary text-capitalize"><?php echo $row['supply']; ?></td>
                                    </tr>
                                  <?php
                               }
                              ?>
                         </tbody>
                         </table>
                         
                        
   		   	   </div>
   		   </div><!--end of 2nd column-->
   		   	
   		 </div><!--end of row-->
   	</div>
     <!--footer -->
      <div class="container-fluid  bg-dark text-white">
         <div class="row">
           <div class="col-md-8">
             <span><strong style="">Follow us:</strong></span>
            <a href="" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
            <a href="" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
            <a href="" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
          <a href="" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
        </div>
      <div class="col-md-4 text-right">
      <small>Designed by @alii &copy; <?php echo date('Y',time()); ?></small>
      <small><a href="#" class="btn btn-info">computer sales</a></small>
    </div>
  </div>
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