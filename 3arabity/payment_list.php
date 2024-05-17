<?php
$conn = mysqli_connect('localhost','root','','3arabity');
$sql= "SELECT * FROM payment_method";
$data= mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Payment Methods List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
  <div class="container">
    <div class="row">
      <h1 class="display-1">Payment Methods List</h1>
      <a class="btn btn-dark mt-5 " href="payment_new.php">New Payment Method</a>
      <table class="table table-dark table-bordered table-striped ">
        <tr>
        <td><b>ID</b></td>
        <td><b>Name</b></td>
        <td><b>Actions</b></td>
        </tr>
        <?php while($payment_method = mysqli_fetch_assoc($data)) {?>
        <tr>
          <td><?php echo $payment_method["id"]; ?></td>
          <td><?php echo $payment_method["name"]; ?></td>
          <td>
            <a class="btn btn-primary" href="payment_edit.php?id=<?php echo $payment_method["id"]; ?>">Edit</a>
            <a class="btn btn-danger" href="payment-delete.php?id=<?php echo $payment_method["id"]; ?>">Delete</a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </div>
  </div>


  </body>
</html>
