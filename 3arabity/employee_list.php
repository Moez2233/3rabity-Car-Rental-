<?php
$conn = mysqli_connect('localhost','root','','3arabity');
$sql = "SELECT employees.*,departments.name AS department_name FROM employees,departments WHERE departments.id =employees.department_id ";
$data = mysqli_query($conn,$sql);
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee List</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>

  </head>
  <body>
    <?php include 'navbar.php' ?>
    <div class="container">
      <div class="row">
        <h1 class="display-1">Employees List</h1>
        <a class="btn btn-dark" href="employee_new">New Employee</a>
        <table class="table table-dark table-bordered table-striped">
          <tr>
          <td><b>ID</b></td>
          <td><b>Image</b></td>
          <td><b>Name</b></td>
          <td><b>Phone</b></td>
          <td><b>Address</b></td>
          <td><b>Email</b></td>
          <td><b>Department</b></td>
          <td><b>Basic Salary</b></td>
          <td><b>Actions</b></td>

          </tr>
          <?php while ($employee=mysqli_fetch_assoc($data)) {?>
          <tr>
            <td><?php echo $employee["id"]; ?></td>
            <td><?php echo $employee["image"]; ?></td>
            <td><?php echo $employee["name"]; ?></td>
            <td><?php echo $employee["phone"]; ?></td>
            <td><?php echo $employee["address"]; ?></td>
            <td><?php echo $employee["email"]; ?></td>
            <td><?php echo $employee["department_name"]; ?></td>
            <td><?php echo $employee["basic_salary"]; ?></td>

            <td>
              <a class="btn btn-primary" href="employee_edit.php?id=<?php echo $employee["id"]; ?>">Edit</a>
              <a class="btn btn-danger" href="employee-delete.php?id=<?php echo $employee["id"]; ?>">Delete</a>
            </td>
          </tr>
          <?php } ?>

        </table>
      </div>
    </div>






  </body>
</html>
