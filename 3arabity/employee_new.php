<?php
if (isset($_POST["name"])) {
  $image =  $_POST["image"];
  $name =  $_POST["name"];
  $phone =  $_POST["phone"];
  $address = $_POST["address"];
  $email = $_POST["email"];
  $department_id = $_POST["department_id"];
  $basic_salary = $_POST["basic_salary"];
  $conn = mysqli_connect('localhost','root','','3arabity');
  $sql ="INSERT INTO employees (image,name,phone,address,email,department_id,basic_salary)VALUES('$image','$name','$phone','$address','$email','$department_id','$basic_salary')";
  mysqli_query($conn,$sql);
  header("Location: employee_list.php");
}
$conn=mysqli_connect('localhost','root','','3arabity');
$sql="SELECT * FROM departments";
$departments_list=mysqli_query($conn,$sql);
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>New Employee</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">New employee</h1>
        <form action="employee_new.php" method="post">
            <div class="form-group mb-4">
              <label >Image</label>
              <input class="form-control" type="text" name="image">
            </div>
            <div class="form-group mb-4">
              <label >Name</label>
              <input class="form-control" type="text" name="name">
            </div>
            <div class="form-group mb-4">
              <label >Phone</label>
              <input class="form-control" type="text" name="phone">
            </div>
            <div class="form-group mb-4">
              <label >Address</label>
              <input class="form-control" type="text" name="address">
            </div>
            <div class="form-group mb-4">
              <label >Email</label>
              <input class="form-control" type="email" name="email">
            </div>
            <div class="form-group mb-4">
              <label >Department ID</label>
              <select class="form-control" name="department_id">
                <?php while ($department=mysqli_fetch_assoc($departments_list)) { ?>
                  <option value="<?php echo $department["id"]; ?>"> <?php echo $department["name"]; ?></option>
                <?php  } ?>

              </select>
            </div>
            <div class="form-group mb-4">
              <label >Basic Salary</label>
              <input class="form-control" type="text" name="basic_salary">
            </div>
          <button class="btn btn-success" type="submit" name="button">Save</button>
          <a class="btn btn-secondary" href="#">Back</a>
        </form>
      </div>
    </div>

  </body>
</html>
