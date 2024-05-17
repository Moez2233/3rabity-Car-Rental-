<?php
$id=$_GET["id"];
$conn=mysqli_connect('localhost','root','','3arabity');
$sql="DELETE FROM model WHERE id='$id'";
mysqli_query($conn,$sql);
header("Location: model_list.php");

 ?>
