<?php
$conn = mysqli_connect('localhost','root','','3arabity');
$sql = "SELECT * FROM colors";
$data = mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Colors List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">Colors List</h1>
        <a class="btn btn-dark mt-5 " href="colors_new">New Colors</a>
        <table class="table table-dark table-bordered table-striped ">
          <tr>
          <td><b>ID</b></td>
          <td><b>Name</b></td>
          <td><b>Code</b></td>
          <td><b>Actions</b></td>
          </tr>
          <?php while ($color=mysqli_fetch_assoc($data)) {?>
          <tr>
            <td><?php echo $color["id"]; ?></td>
            <td><?php echo $color["name"]; ?></td>
            <td><?php echo $color["code"]; ?></td>
            <td>
              <a class="btn btn-primary" href="colors_edit.php?id=<?php echo $color["id"]; ?>">Edit</a>
              <a class="btn btn-danger" href="colors-delete.php?id=<?php echo $color["id"]; ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
        </table>
      </div>
    </div>
  </body>
</html>
