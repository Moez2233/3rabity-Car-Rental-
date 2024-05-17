<?php
$conn = mysqli_connect('localhost','root','','3arabity');
$sql= "SELECT model.*,brands.name as brand_name FROM model,brands WHERE brands.id=model.brand_id";
$data= mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Models List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">Models List</h1>
        <a class="btn btn-dark" href="model_new">New Model</a>
        <table class="table table-dark table-bordered table-striped">
          <tr>
          <td><b>ID</b></td>
          <td><b>Name</b></td>
          <td><b>Brand</b></td>
          <td><b>Actions</b></td>
          </tr>
          <?php while($model = mysqli_fetch_assoc($data)) {?>
            <tr>
              <td><?php echo $model["id"]; ?></td>
              <td><?php echo $model["name"] ?></td>
              <td><?php echo $model["brand_name"] ?></td>

              <td>
                <a class="btn btn-primary" href="model_edit.php?id=<?php echo $model["id"]; ?>">Edit</a>
                <a class="btn btn-danger" href="model-delete.php?id=<?php echo $model["id"]; ?>">Delete</a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>

  </body>
</html>
