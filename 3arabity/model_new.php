<?php
if(isset($_POST["name"])){
  if (isset($_POST["name"])){
    $name=$_POST["name"];
    $brand_id=$_POST["brand_id"];
    $conn=mysqli_connect('localhost','root','','3arabity');
    $sql="INSERT INTO model (name,brand_id) VALUES ('$name','$brand_id')";
    mysqli_query($conn,$sql);
    header("Location: model_list.php");
}
$conn=mysqli_connect('localhost','root','','3arabity');
$sql="SELECT * FROM brands";
$brands_list=mysqli_query($conn,$sql);
 ?>

 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>New Model</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
   </head>
   <body>
     <?php include 'navbar.php' ?>
     <div class="container">
       <div class="row">
         <h1>New Model</h1>
         <form  action="model_new" method="post">
           <div class="form-group mb-4">
             <label for="Name">Name</label>
             <input class="form-control" type="text" name="name">
           </div>
           <div class="form-group mb-4">
             <label for="brand_id">Brand</label>
             <select class="form-control" name="brand_id">
               <?php while ($brand=mysqli_fetch_assoc($brands_list)) {?>
               <option value="<?php echo $brand["id"]; ?>"><?php echo $brand["name"]; ?></option>
               <?php   } ?>
             </select>
           </div>
           <button class="btn btn-success" type="submit" name="button">Save</button>
           <a class="btn btn-secondary" href="#">Back</a>
         </form>
       </div>
     </div>
   </body>
 </html>
