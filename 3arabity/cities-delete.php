<?php
$id=$_GET["id"];
$conn = mysqli_connect('localhost','root','','3arabity');
$sql="DELETE FROM cities WHERE id='$id'";
mysqli_query($conn,$sql);
header("Location: cities_list.php");


 ?>
