<?php
if (isset($_POST["name"])){
  $name=$_POST["name"];
  $code=$_POST["code"];
  $conn=mysqli_connect('localhost','root','','3arabity');
  $sql="INSERT INTO colors (name,code) VALUES ('$name','$code')";
  mysqli_query($conn,$sql);
  header("Location: colors_list.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Color</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1>New Color</h1>
        <form  action="colors_new" method="post">
          <div class="form-group mb-4">
            <label for="Name">Name</label>
            <input class="form-control" type="text" name="name">
          </div>
          <div class="form-group mb-4">
            <label for="Code">Code</label>
            <input class="form-control" type="text" name="code">
          </div>
          <button class="btn btn-success" type="submit" name="button">Save</button>
          <a class="btn btn-secondary" href="#">Back</a>
        </form>
      </div>
    </div>

  </body>
</html>
