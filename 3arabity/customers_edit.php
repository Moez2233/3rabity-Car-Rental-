<?php
if (isset($_POST["name"])) {
  $id= $_POST["id"];
  $name = $_POST["name"];
  $image=$_POST["image"];
  $phone =  $_POST["phone"];
  $address =  $_POST["address"];
  $email =  $_POST["email"];
  $bdate = $_POST["bdate"];
  $id_number = $_POST["id_number"];
  $id_image = $_POST["id_image"];
  $city_id = $_POST["city_id"];
  $conn = mysqli_connect('localhost','root','','3arabity');
  $sql ="UPDATE customers SET name='$name',image='$image',phone='$phone',address='$address',email='$email',
  bdate='$bdate',id_number='$id_number',id_image='$id_image',city_id='$city_id' WHERE id='$id'";
  mysqli_query($conn,$sql);

  header("Location: customers_list.php");
}
$id=$_GET["id"];
$conn=mysqli_connect('localhost','root','','3arabity');
$sql_cities="SELECT * FROM cities";
$sql = "SELECT * FROM customers WHERE id='$id'";
$customers_list = mysqli_query($conn,$sql);
$customer = mysqli_fetch_assoc($customers_list);
$cities_list=mysqli_query($conn,$sql_cities);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="mysqli_fetch_row">
        <h1>Edit Customer</h1>
        <form action="customers_edit.php" method="post">
          <div class="form-group mb-4">
            <label for="id">ID</label>
            <input class="form-control" type="text" name="id" value="<?php echo $customer["id"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="Name">Name</label>
            <input class="form-control" type="text" name="name" value="<?php echo $customer["name"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="Image">Image</label>
            <input class="form-control" type="text" name="image" value="<?php echo $customer["image"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="Phone">Phone</label>
            <input class="form-control" type="text" name="phone" value="<?php echo $customer["phone"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="Address">Address</label>
            <input class="form-control" type="text" name="address" value="<?php echo $customer["address"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="Email">Email</label>
            <input class="form-control" type="email" name="email" value="<?php echo $customer["email"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="Bdate">Birthday Date</label>
            <input class="form-control" type="date" name="bdate" value="<?php echo $customer["bdate"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="ID Number">ID Number</label>
            <input class="form-control" type="text" name="id_number" value="<?php echo $customer["id_number"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="ID Image">ID Image</label>
            <input class="form-control" type="text" name="id_image" value="<?php echo $customer["id_image"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label for="City">City</label>
            <select class="form-control" name="city_id">
              <?php while($city=mysqli_fetch_assoc($cities_list)){ ?>
              <option <?php if($city["id"]== $customer["city_id"]){ echo "SELECTED";} ?> value="<?php echo $city["id"]; ?>"><?php echo $city["name"];?></option>
            <?php } ?>
            </select>
          </div>

          <button class="btn btn-success" type="submit" name="button">Save</button>
          <a class="btn btn-secondary" href="#">Back</a>
        </form>
      </div>
    </div>
  </body>
</html>
