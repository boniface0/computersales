 
 <?php
 session_start();
if(!isset($_SESSION['email'])){
   echo "<script>location.href='login.php';</script>";
}

  include "conn.php";
  if(isset($_POST['submit'])){
    $pname = $_POST['pname'];
    $type = $_POST['type'];
    $brand = $_POST['brand'];
    $prince = $_POST['prince'];
    $qty = $_POST['qty'];
    $avail =$qty;
    $specs = $_POST['specs'];
    $filename = $_FILES['img']['name'];
       ///geting file destination on server;
       $destination = 'img/' . $filename;
       ///getting file extension
       $extension = pathinfo($filename, PATHINFO_EXTENSION);
       ///tempolary file save in a server
       $file = $_FILES['img']['tmp_name'];
        
        $size = $_FILES['img']['size'];
        move_uploaded_file($file, $destination);
    $sql = "insert into product(pname,brand,type,specs,prince,qty,available,img) values('$pname','$brand','$type','$specs','$prince','$qty','$avail','$filename')";
    $qr = mysqli_query($conn,$sql);
   
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
                 .btn{
                     width: 200px;
                 }
	 </style>
  <body>
   <div class="div">
<a  class="btn btn-success  btn2"  data-toggle="modal" data-target="#modalContactForm">upload</a>
    
</div>


<!-- add document details --->
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Add Product </h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
          <form action="document.php" method="post" enctype="multipart/form-data"> 
        
          <div class="col-md-12">
               <div class="form">
                   <form action="document.php" method="post" enctype="multipart/form-data">
                   <div class="form-group">
                       <label for="">upload name</label>
                       <input type="text" name="up_name" class="form-control" id="upl_name">
                   </div>
                   <div class="form-group">
                       <label for="">upload description</label>
                       <input type="text" name="up_desc" class="form-control" id="upl_dec">
                   </div>
                   <div class="form-group">
                       <label for="">files</label>
                       <input type="file" name="up_file" class="form-control" id="upl_name">
                   </div>
                   <div class="form-group">
                       <input type="submit" class="btn btn-primary" name="btn" value="upload" id="bnnn">
                   </div>
                   </form>
               </div>
            </div>
         </form>
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
