<?php
$conn = mysqli_connect('localhost','root','','3arabity');
$sql= "SELECT * FROM brands";
$data= mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Brands List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
  <div class="container">
    <div class="row">
      <h1 class="display-1">Brands List</h1>
      <a class="btn btn-dark mt-5 " href="brands_new">New Brand</a>
      <table class="table table-dark table-bordered table-striped ">
        <tr>
        <td><b>ID</b></td>
        <td><b>Name</b></td>
        <td><b>Actions</b></td>
        </tr>
        <?php while($brand = mysqli_fetch_assoc($data)) {?>
        <tr>
          <td><?php echo $brand["id"]; ?></td>
          <td><?php echo $brand["name"]; ?></td>
          <td>
            <a class="btn btn-primary" href="brands_edit.php?id=<?php echo $brand["id"]; ?>">Edit</a>
            <a class="btn btn-danger" href="brands-delete.php?id=<?php echo $brand["id"]; ?>">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>


  </body>
</html>
