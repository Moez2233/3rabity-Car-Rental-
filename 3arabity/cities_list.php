<?php
$conn = mysqli_connect('localhost','root','','3arabity');
$sql = "SELECT * FROM cities";
$data = mysqli_query($conn,$sql);
// $city = mysqli_fetch_row($data);
// echo $city[1] ;
// $city = mysqli_fetch_row($data);
// echo $city[1] ;
// $city=mysqli_fetch_assoc($data);
// echo $city["name"];
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cities List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">Cities List</h1>
        <a class="btn btn-dark mt-5 " href="cities_new">New City</a>
        <table class="table table-dark table-bordered table-striped ">
          <tr>
          <td><b>ID</b></td>
          <td><b>Name</b></td>
          <td><b>Actions</b></td>
          </tr>
          <?php while ($city=mysqli_fetch_assoc($data)) {?>
          <tr>
            <td><?php echo $city["id"]; ?></td>
            <td><?php echo $city["name"]; ?></td>
            <td>
              <a class="btn btn-primary" href="cities_edit.php?id=<?php echo $city["id"]; ?>">Edit</a>
              <a class="btn btn-danger" href="cities-delete.php?id=<?php echo $city["id"]; ?>">Delete</a>
            </td>
          </tr>
        <?php } ?>
        </table>
      </div>
    </div>
  </body>
</html>
