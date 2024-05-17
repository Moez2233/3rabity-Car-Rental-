<?php
if(isset($_POST["id"])){
  $id=$_POST["id"];
  $image =  $_POST["image"];
  $model_id =  $_POST["model_id"];
  $color_id =  $_POST["color_id"];
  $plate_number =  $_POST["plate_number"];
  $year_id = $_POST["year_id"];
  $price_per_hour = $_POST["price_per_hour"];
  $conn = mysqli_connect('localhost','root','','3arabity');
  $sql = "UPDATE cars SET image='$image',model_id='$model_id',color_id='$color_id',plate_number='$plate_number',year_id='$year_id',price_per_hour='$price_per_hour' WHERE id='$id'";
   mysqli_query($conn,$sql);
   header("Location: cars_list.php");
}
$id=$_GET["id"];
$conn = mysqli_connect('localhost','root','','3arabity');
$sql = "SELECT * FROM cars WHERE id='$id'";
$cars_list = mysqli_query($conn,$sql);
$car = mysqli_fetch_assoc($cars_list);
$sql="SELECT * FROM model";
$models_list=mysqli_query($conn,$sql);
$sql="SELECT * FROM colors";
$colors_list=mysqli_query($conn,$sql);
$sql="SELECT * FROM years";
$years_list=mysqli_query($conn,$sql);

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Cars</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <form action="cars_edit.php" method="post">
          <h1>Edit Car</h1>
          <div class="form-group mb-4">
            <label for="id">ID</label>
             <input class="form-control" type="text" name="id" value="<?php echo $car["id"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="image">Image</label>
             <input class="form-control" type="text" name="image" value="<?php echo $car["image"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="model_id">Model</label>
            <select class="form-control" name="model_id">
              <?php while ($model=mysqli_fetch_assoc($models_list)) {?>
                <option <?php if ($model["id"]==$car["model_id"]) {echo "SELECTED";} ?> value="<?php echo $model["id"]; ?>"><?php echo $model["name"]; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group mb-4">
            <label for="color_id">Color</label>
            <select class="form-control" name="color_id">
              <?php while ($color=mysqli_fetch_assoc($colors_list)) {?>
                <option <?php if($color["id"]==$car["color_id"]) {echo "SELECTED";} ?> value="<?php echo $color["id"]; ?>"><?php echo $color["name"]; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group mb-4">
            <label for="plate_number">Plate Number</label>
            <input class="form-control" type="text" name="plate_number" value="<?php echo $car["plate_number"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="year_id">Year</label>
            <select class="form-control" name="year_id">
              <?php while ($year=mysqli_fetch_assoc($years_list)) {?>
                <option <?php if ($year["id"]==$car["year_id"]) {echo "SELECTED";} ?> value="<?php echo $year["id"] ?>"><?php echo $year["name"] ?></option>
              <?php  } ?>

            </select>
          </div>
          <div class="form-group mb-4">
            <label for="price_per_hour">Price Per Hour</label>
            <input class="form-control" type="text" name="price_per_hour" value="<?php echo $car["price_per_hour"]; ?>">
          </div>
          <button class="btn btn-success" type="submit" name="button">Save</button>
          <a class="btn btn-secondary" href="#">Back</a>
        </form>
      </div>
    </div>

  </body>
</html>
