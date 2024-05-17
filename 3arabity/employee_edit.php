<?php
if (isset($_POST["name"])) {
  $id=$_POST["id"];
  $image =$_POST["image"];
  $name =  $_POST["name"];
  $phone =  $_POST["phone"];
  $address = $_POST["address"];
  $email = $_POST["email"];
  $department_id = $_POST["department_id"];
  $basic_salary = $_POST["basic_salary"];
  $conn = mysqli_connect('localhost','root','','3arabity');
  $sql ="UPDATE employees SET image='$image',name='$name',phone='$phone',address='$address',email='$email',department_id='$department_id',basic_salary='$basic_salary'WHERE id='$id'";
  mysqli_query($conn,$sql);
  header("Location: employee_list.php");
}
$id=$_GET["id"];
$conn = mysqli_connect('localhost','root','','3arabity');
$sql = "SELECT * FROM employees WHERE id='$id'";
$sql_department="SELECT * FROM departments";
$employees_list = mysqli_query($conn,$sql);
$employee = mysqli_fetch_assoc($employees_list);
$departments_list=mysqli_query($conn,$sql_department);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Employee</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">Edit Employee</h1>
        <form action="employee_edit.php" method="post">
          <div class="form-group mb-4">
            <label >ID</label>
            <input class="form-control" type="text" name="id" value="<?php echo $employee["id"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label >Image</label>
            <input class="form-control" type="text" name="image" value="<?php echo $employee["image"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label >name</label>
            <input class="form-control" type="text" name="name" value="<?php echo $employee["name"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label >phone</label>
            <input class="form-control" type="text" name="phone" value="<?php echo $employee["phone"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label >address</label>
            <input class="form-control" type="text" name="address" value="<?php echo $employee["address"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label >email</label>
            <input class="form-control" type="email" name="email" value="<?php echo $employee["email"]; ?>">
          </div>
          <div class="form-group mb-4">
            <label >department id</label>
            <select class="form-control" name="department_id">
              <?php while ($department=mysqli_fetch_assoc($departments_list)) {?>
                <option <?php if ($department["id"]==$employee["department_id"]) {echo "SELECTED";} ?> value="<?php echo $department["id"];  ?>"><?php echo $department["name"]; ?></option>
              <?php  } ?>
            </select>
          </div>
          <div class="form-group mb-4">
            <label >basic salary</label>
            <input class="form-control" type="text" name="basic_salary" value="<?php echo $employee["basic_salary"]; ?>">
          </div>
          <button class="btn btn-success" type="submit" name="button">Save</button>
          <a class="btn btn-secondary" href="#">Back</a>
        </form>
      </div>
    </div>
  </body>
</html>
