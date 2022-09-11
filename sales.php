
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
        <link href="https://cdn.datatables.net/1.10.23/css/dataTables.bootstrap4.min.css">
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
   		   <div class="col-md-2 bg-light sidebar py-5  d-print-none">
   		   	 <div class="sidebar-sticky">
   		   	  <ul class="nav flex-column">
   		   	  	   <li class="nav-item "><a href="dashboard.php" class="nav-link  active"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>
   		   	  	    <li class="nav-item"><a href="stock.php" class="nav-link"><i class="fab fa-accessible-icon"></i>Stocks</a></li>
   		   	  	     <li class="nav-item"><a href="Sales.php" class="nav-link"><i class="fas fa-align-center"></i>sales report</a></li>
   		   	  	      <li class="nav-item"><a href="supply.php" class="nav-link"><i class="fas fa-database"></i>suppliers</a></li>
   		   	  	      <li class="nav-item"><a href="Account.php" class="nav-link"><i class=" fab fa-teamspeak"></i>Accounts</a></li>
   		   	  	      <li class="nav-item"><a href="logout.php" class="nav-link "><i class="fas fa-users"></i>logout</a></li>
   		   	  	      
   		   	      </ul>
   		   	   </div>
   		   	 
   		   </div>
   		   <div class="col-sm-9 col-md-10 mt-4 ">
   		   	 <div class="row text-center mx-4">
   		   	 	 <div class="col-md-12">
             
              
              <form action="sales.php" method="post" class="d-print-none">
                <div class="form-group">
                    <div class="form-row">
                      <div class="col-md-3">
                        <div class="form-group">
                          
                          <input type="date" name="from_date" class="form-control">
                        </div>
                      </div> <span>TO</span>
                       <div class="col-md-3">
                        <div class="form-group">
                          
                          <input type="date" name="to_date" class="form-control">
                        </div>
                      </div>
                       
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                            <button type="submit" name="name" class="btn btn-info">Report</button>
                         </div>
                    </div>
                 </div>

               
              </form>

                <table class="table table-striped table-bordered">
                                     <thead>
                                     <th>Product name</th>
                                        <th>quantity</th>
                                        <th>totalAmount</th>
                                        <th>payment method</th>
                                        <th>Date</th>
                                     </thead>
                                     <tbody>
                                        <?php
                                          if(isset($_POST['name'])){
                                          $from_date = $_POST['from_date'];
                                          $to_date = $_POST['to_date'];
                                          $select = "SELECT * FROM slaes WHERE date BETWEEN '$from_date' AND '$to_date'";
                                           $qr=mysqli_query($conn,$select);
                                           while ($row = mysqli_fetch_assoc($qr)) {
                                            ?>
                                             <tr>
                                           <td class="text-uppercase text-secondary"><?php echo $row["productname"];?></td>
                                           <td class="text-info"><?php echo $row["qty"];?></td>
                                           <td class="text-success text-capitalize"><?php echo $row["totalamount"];?></td>
                                           <td><?php echo $row["paymentmethod"];?></td>
                                           <td><?php echo $row["date"];?></td>
                                           
                                         </tr>

                                            <?php
                                             
                                           }
                                           ?>
                                             <tr>
                                                <?php
                                                 $select1 = "SELECT SUM(totalamount) as `TotalAmount` FROM slaes WHERE date BETWEEN '$from_date' AND '$to_date' ";
                                                 $qr = mysqli_query($conn,$select1);
                                                 $total = mysqli_fetch_array($qr);
                                                 ?>
                                                   <td colspan="5" class=" text-primary">
                                                     <h4 style="margin-left: 200px;"><?php echo "TOTAL AMOUNT : SH ".$total['TotalAmount']; ?></h4> 
                                                   </td>
                                                 <?php 
                                                 
                                                ?>
                                             </tr>
                                           <?php
                                         }else{

                                         }
                                        ?>
                                      
                                     </tbody>
                                 </table>
             </div>
              <div align="center">
          <input type="button" name="btn" class="btn btn-danger d-print-none" onclick="window.print()" value="Print">
          </div>
          
   		   	 </div>
   		   </div><!--end of 2nd column-->
   		   	
   		 </div><!--end of row-->
   	</div>
     <!--footer -->
      <div class="container-fluid  bg-dark text-white d-print-none">
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
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script>
     $(document).ready( function () {
    $('#mytable').DataTable();
} );
</script>
  </body>
  </html>