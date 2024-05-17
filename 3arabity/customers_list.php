<?php
$conn = mysqli_connect('localhost','root','','3arabity');
$sql = "SELECT customers.*,cities.name AS city_name FROM customers,cities WHERE cities.id=customers.city_id";
$data = mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customers List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">Customers List</h1>
        <a class="btn btn-dark mt-5 " href="customers_new">New Customer</a>
        <table class="table table-dark table-bordered table-striped ">
          <tr>
          <td><b>ID</b></td>
          <td><b>Image</b></td>
          <td><b>Name</b></td>
          <td><b>Phone</b></td>
          <td><b>Address</b></td>
          <td><b>Email</b></td>
          <td><b>Bdate</b></td>
          <td><b>ID Number</b></td>
          <td><b>ID Image</b></td>
          <td><b>City</b></td>
          <td><b>Actions</b></td>
          </tr>
          <?php while ($customer= mysqli_fetch_assoc($data)) {?>
          <tr>
            <td><?php echo $customer["id"]; ?></td>
            <td><?php echo $customer["image"]; ?></td>
            <td><?php echo $customer["name"]; ?></td>
            <td><?php echo $customer["phone"]; ?></td>
            <td><?php echo $customer["address"]; ?></td>
            <td><?php echo $customer["email"]; ?></td>
            <td><?php echo $customer["bdate"]; ?></td>
            <td><?php echo $customer["id_number"]; ?></td>
            <td><?php echo $customer["id_image"]; ?></td>
            <td><?php echo $customer["city_name"]; ?></td>
            <td >
              <a class="btn btn-primary" href="customers_edit.php?id=<?php echo $customer["id"]; ?>">Edit</a>
              <a class="btn btn-danger" href="customers-delete.php?id=<?php echo $customer["id"]; ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
        </table>
      </div>
    </div>
  </body>
</html>
