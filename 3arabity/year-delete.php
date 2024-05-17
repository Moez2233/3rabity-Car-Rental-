<?php
$id=$_GET["id"];
$conn=mysqli_connect('localhost','root','','3arabity');
$sql="DELETE FROM years WHERE id='$id'";
mysqli_query($conn,$sql);
header("Location: years_list.php");

 ?>
