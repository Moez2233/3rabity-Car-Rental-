<?php
$id=$_GET["id"];
$conn=mysqli_connect('localhost','root','','3arabity');
$sql="DELETE FROM cars WHERE id='$id'";
mysqli_query($conn,$sql);
header("Location: cars_list.php");
 ?>
