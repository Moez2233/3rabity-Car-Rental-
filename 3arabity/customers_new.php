<?php
if (isset($_POST["name"])) {
  $name = $_POST["name"];
  $image=$_POST["image"];
  $phone=$_POST["phone"];
  $address=$_POST["address"];
  $email=$_POST["email"];
  $bdate=$_POST["bdate"];
  $id_number=$_POST["id_number"];
  $id_image=$_POST["id_image"];
  $city_id=$_POST["city_id"];
  $conn = mysqli_connect('localhost','root','','3arabity');
  $sql ="INSERT INTO customers (name,image,phone,address,email,bdate,
  id_number,id_image,city_id)VALUES('$name','$image','$phone','$address',
  '$email','$bdate','$id_number','$id_image','$city_id')";

  mysqli_query($conn,$sql);
  header("Location: customers_list.php");
}
$conn=mysqli_connect('localhost','root','','3arabity');
$sql="SELECT * FROM cities";
$cities_list=mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Customer</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">New Customer</h1>
        <form action="customers_new.php" method="post">
          <div class="form-group mb-4">
            <label for="Name">Name</label>
            <input class="form-control" type="text" name="name">
          </div>
          <div class="form-group mb-4">
            <label for="Image">Image</label>
            <input class="form-control" type="text" name="image">
          </div>
          <div class="form-group mb-4">
            <label for="Phone">Phone</label>
            <input class="form-control" type="text" name="phone">
          </div>
          <div class="form-group mb-4">
            <label for="Address">Address</label>
            <input class="form-control" type="text" name="address">
          </div>
          <div class="form-group mb-4">
            <label for="Email">Email</label>
            <input class="form-control" type="email" name="email">
          </div>
          <div class="form-group mb-4">
            <label for="Bdate">Birthday Date</label>
            <input class="form-control" type="date" name="bdate">
          </div>
          <div class="form-group mb-4">
            <label for="ID Number">ID Number</label>
            <input class="form-control" type="text" name="id_number">
          </div>
          <div class="form-group mb-4">
            <label for="ID Image">ID Image</label>
            <input class="form-control" type="text" name="id_image">
          </div>
          <div class="form-group mb-4">
            <label for="City">City</label>
            <select class="form-control" name="city_id">
              <?php while($city=mysqli_fetch_assoc($cities_list)){ ?>
              <option value="<?php echo $city["id"]; ?>"><?php echo $city["name"]; ?></option>
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
