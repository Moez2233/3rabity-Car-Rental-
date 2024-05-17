<?php
$id=$_GET["id"];
$conn=mysqli_connect('localhost','root','','3arabity');
$sql="DELETE FROM brands WHERE id='$id'";
mysqli_query($conn,$sql);
header("Location: brands_list.php");
 ?>
