<?php
session_start();
if(!isset($_SESSION['email'])){
   echo "<script>location.href='login.php';</script>";
}

  include "conn.php";
               if(isset($_GET['id'])){
               	$id =  $_GET['id'];

               	?>
<?php
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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
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
   		   	  	     <li class="nav-item"><a href="Sales.php" class="nav-link"><i class="fas fa-align-center"></i>sales and report</a></li>
   		   	  	      <li class="nav-item"><a href="supply.php" class="nav-link"><i class="fas fa-database"></i>suppliers</a></li>
   		   	  	      <li class="nav-item"><a href="Account.php" class="nav-link"><i class=" fab fa-teamspeak"></i>Accounts</a></li>
   		   	  	      <li class="nav-item"><a href="logout.php" class="nav-link "><i class="fas fa-users"></i>logout</a></li>
   		   	  	      
   		   	      </ul>
   		   	   </div>
   		   	 
   		   </div>
   		   <div class="col-sm-9 col-md-10 mt-4 ">
   		   	 
   		   	
   		   	 <div class="row">
   		   	    <div class="col-md-4 ml-4">
   		   	    	<!-- Card -->
<div class="card">

  <!-- Card image -->
				  <?php
				   
				   $sql = "select * from product where productid='$id'";
				   $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_assoc($result);
                    if(isset($_POST['sale'])){
                     $pid = $row['productid'];	
                      $avail;
                      $productname = $row['pname'];
                      $qty = $row['available'];
                      $price = $row['prince'];
                      $payment = $_POST['method'];
                      $saleqty = $_POST['qty'];
                      $totalamt = $price * $saleqty;

                      if($qty == 0){
                      	?>
                      	   <script>
                      	   	alert("out of stock can't make sale");
                      	   </script>
                      	<?php
                      }elseif($qty<$saleqty){
                         ?>
                          <script >
                          	alert("there is only <?php echo $qty ?> stock you can sale" );
                          </script>
                         <?php
                        $avail =0;
                      }else{
                      	$avail = $qty-$saleqty;
                      	$sql = "insert into slaes(productname,price,qty,totalamount,paymentmethod) value('$productname','$price','$saleqty','$totalamt','$payment')";
                      	$qr = mysqli_query($conn,$sql);
                      	if($qr){
                      		$sql = "update product set available='$avail' where productid='$pid'";
                      		if(mysqli_query($conn,$sql)){
                      			echo "<script>location.href='stock.php';</script>";
                      		}
                      	}
                      }
                      
                    }
				  ?>
  <div class="view overlay">
    <img class="card-img-top" src="img/<?php echo $row['img'];  ?>"
      alt="Card image cap">
    <a href="#!">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body">
    <div class="d-flex justify-content-between">
    	<h4 class="text-capitalize text-success"><?php echo $row['type'];  ?></h4>
    	<small class="text-capitalize text-success "><?php echo $row['available'];  ?> in stock</small>
    	<small class="text-capitalize text-success "><?php echo $row['brand'];  ?></small>
    </div>
    <form method="post" class="text-center border border-light" action="view.php?id=<?php echo $row['productid'];?>">
    	 <div class="md-form mb-5">
         
          <input type="number" id="form32" name="qty" class="form-control validate">
          <label data-error="wrong" data-success="right" for="form32">quantity</label>
        </div>
        <div class="md-form mb-5">
           <select class="browser-default custom-select mb-4" name="method">
        
        <option value="1" selected disabled>payment method</option>
        <option value="Mpesa">Mpesa</option>
        <option value="Cash">Cash</option>
       
    </select>
        </div>
        <div class="card-footer">
        	 <div class="text-center">
        	 	<div class="d-flex justify-content-between">
        	 		<button class="btn btn-success" type="submt" name="sale">sale</button>
        	 		<a href="!" class="btn btn-info">edit</a>
        	 	</div>
        	 </div>
        </div>
    </form>
  </div>
<?php
?>
</div>
<!-- Card -->
   		   	    </div>
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
  </body>
  </html>
	