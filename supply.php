
 <?php
 session_start();
if(!isset($_SESSION['email'])){
   echo "<script>location.href='login.php';</script>";
}

 include "conn.php";
 ?>
 <?php
     if(isset($_POST['supply'])){

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone =$_POST['phone'];
        $nationality = $_POST['nationaly'];
        $item = $_POST['item'];
        $sql = "insert into supply(sname,phone,nationality,supply,email) values('$name','$phone','$nationality','$item','$email')";
        $qr = mysqli_query($conn,$sql);
        if($qr){
          $msg="<div class='alert alert-warning'>supplier details submitted successfully</div>";
        }
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
 <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
       <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
     <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <link href="style.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	 
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
   		   	  	     <li class="nav-item"><a href="Sales.php" class="nav-link"><i class="fas fa-align-center"></i>sales and reports</a></li>
   		   	  	      <li class="nav-item"><a href="supply.php" class="nav-link"><i class="fas fa-database"></i>suppliers</a></li>
   		   	  	      <li class="nav-item"><a href="Account.php" class="nav-link"><i class=" fab fa-teamspeak"></i>Accounts</a></li>
   		   	  	      <li class="nav-item"><a href="logout.php" class="nav-link "><i class="fas fa-users"></i>logout</a></li>
   		   	  	      
   		   	      </ul>
   		   	   </div>
   		   	 
   		   </div>
   		   <div class="col-sm-9 col-md-10 mt-4 ">
   		   	 <div class="row text-center mx-4">
            <?php
             if(isset($msg)){
               echo $msg;
             }
            ?>
   		   	 	  <a class="btn btn-primary" data-toggle="modal" data-target="#modalRegisterForm">Suplier<i class="fas fa-plus fa-2x"></i></a>

              <div class="col-sm-9">
                <table class="table table-striped table-bordered" id="mytable">
                  <thead>
                    <th>Name</th>
                     <th>Email</th>
                    <th>phone</th>
                     <th>Supplier's item</th>
                     <th>Action</th>
                  </thead>
                  <tbody>
                    <?php 
                    $sql= "select * from supply";
                    $qr = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($qr)){
                       ?>
                         <tr>
                             <td class="text-uppercase text-secondary"><?php echo $row["sname"];?></td>
                             <td class="text-info"><?php echo $row["email"];?></td>
                             <td class="text-success text-capitalize"><?php echo $row["phone"];?></td>
                             <td><?php echo $row["supply"];?></td>
                             <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id'];?>">Remove</a></td>
                          </tr>            

                       <?php
                    }
                    ?>
                  </tbody>
                </table>
              </div>
   		   	 </div>
   		   	 
   		   </div><!--end of 2nd column-->
   		   	
   		 </div><!--end of row-->
   	</div>
     <!--footer -->
     <!--- suyppy modal -->
  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">supliers details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="supply.php" method="post">
      <div class="modal-body mx-3">
        
        <div class="md-form mb-5">
         
          <input type="text" id="orangeForm-name" name="name" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-name" >name</label>
        </div>
        <div class="md-form mb-5">
         
          <input type="email" id="orangeForm-email" name="email"  class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-email">email</label>
        </div>

        <div class="md-form mb-4">
         
          <input type="text" id="orangeForm-pass" name="phone" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">phone</label>
        </div>
        <div class="md-form mb-4">
        
          <input type="text" id="orangeForm-pass" name="nationaly" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">nationaly</label>
        </div>
        <div class="md-form mb-4">
          
          <input type="text" id="orangeForm-pass" name="item" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">supplied item</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange" name="supply">Submit</button>
      </div>
    </form>
    
    </div>
  </div>
</div>


      <!--- suyppy modal -->
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
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script> 
  <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>    
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/brands.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.0/js/mdb.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script>
     $(document).ready( function () {
    $('#mytable').DataTable();
} );
</script>
  </body>
  </html>