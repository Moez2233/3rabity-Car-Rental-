<?php
if (isset($_POST["name"])) {
  $name=$_POST["name"];
  $conn= mysqli_connect('localhost','root','','3arabity');
  $sql="INSERT INTO years (name) VALUES ('$name')";
  mysqli_query($conn,$sql);
  header("Location: years_list.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Year</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">New Year</h1>
        <form action="years_new.php" method="post">
          <div class="form-group mb-4">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" >
          </div>
          <button class="btn btn-success" type="submit" name="button">Save</button>
          <a class="btn btn-secondary" href="#">Back</a>
        </form>
      </div>
    </div>

  </body>
</html>
