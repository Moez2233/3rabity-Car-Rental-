<?php
$conn = mysqli_connect('localhost','root','','3arabity');
$sql="SELECT cars.*,model.name AS model_name,colors.name AS color_name,years.name AS year_name FROM cars,model,colors,years WHERE model.id=cars.model_id AND colors.id=cars.color_id AND years.id=cars.year_id";
$data = mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cars List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">Cars List</h1>
        <a class="btn btn-dark mt-5 " href="cars_new.php">New Car</a>
        <table class="table table-dark table-bordered table-striped">
          <tr>
          <td><b>ID</b></td>
          <td><b>Image</b></td>
          <td><b>Model</b></td>
          <td><b>Color</b></td>
          <td><b>Plate Number </b></td>
          <td><b>Year</b></td>
          <td><b>Price Per Hour</b></td>
          <td><b>Actions</b></td>
          </tr>
          <?php while ($car= mysqli_fetch_assoc($data)) {?>
            <tr>
              <td><?php echo $car["id"]; ?></td>
              <td><?php echo $car["image"] ?></td>
              <td><?php echo $car["model_name"] ?></td>
              <td><?php echo $car["color_name"] ?></td>
              <td><?php echo $car["plate_number"] ?></td>
              <td><?php echo $car["year_name"] ?></td>
              <td><?php echo $car["price_per_hour"] ?></td>
              <td>
                <a class="btn btn-primary" href="cars_edit.php?id=<?php echo $car["id"]; ?>">Edit</a>
                <a class="btn btn-danger" href="cars-delete.php?id=<?php echo $car["id"]; ?>">Delete</a>
              </td>
          </tr>
          <?php } ?>
        </table>
      </div>
    </div>

  </body>
</html>
