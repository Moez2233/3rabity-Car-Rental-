<?php
$id=$_GET["id"];
$conn=mysqli_connect('localhost','root','','3arabity');
$sql="DELETE FROM payment_method WHERE id='$id'";
mysqli_query($conn,$sql);
header("Location: payment_list.php");

 ?>
