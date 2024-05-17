<?php
if (isset($_POST["name"])) {
  $id= $_POST["id"];
  $name= $_POST["name"];
  $code=$_POST["code"];
  $conn =mysqli_connect('localhost','root','','3arabity');
  $sql="UPDATE colors SET name = '$name',code='$code' WHERE id='$id'";
  mysqli_query($conn,$sql);
  header("Location: colors_list.php");
}
$id=$_GET["id"];
$conn = mysqli_connect('localhost','root','','3arabity');
$sql = "SELECT * FROM colors WHERE id='$id'";
$data = mysqli_query($conn,$sql);
$color = mysqli_fetch_assoc($data);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Color</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">Edit Color</h1>
        <form action="colors_edit.php" method="post">
          <div class="form-group mb-4">
            <label for="id">ID</label>
            <input class="form-control" type="text" name="id" value="<?php echo $color["id"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="Name">Name</label>
            <input class="form-control" type="text" name="name" value="<?php echo $color["name"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="Code">Code</label>
            <input class="form-control" type="text" name="code" value="<?php echo $color["code"]; ?>">
          </div>
          <button class="btn btn-success" type="submit" name="button">Save</button>
          <a class="btn btn-secondary" href="#">Back</a>
        </form>
      </div>
    </div>

  </body>
</html>
