<?php
include "conn.php";
if(isset($_GET['id'])){

	 $id  = $_GET['id'];
     
	 $sql = "delete from supply where id='$id'";
	 $qr = mysqli_query($conn,$sql);
  if($qr){
  	echo "<script>location.href='supply.php';</script>";
  }
}
?>