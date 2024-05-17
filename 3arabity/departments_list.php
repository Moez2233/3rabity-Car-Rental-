<?php
$conn=mysqli_connect('localhost','root','','3arabity');
$sql="SELECT * FROM departments";
$data=mysqli_query($conn,$sql);
 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>Departments List</title>
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <script src="js/bootstrap.bundle.min.js" charset="utf-8"></script>
   </head>
   <body>
     <?php include 'navbar.php' ?>
     <div class="container">
       <div class="row">
         <h1 class="display-1">Departments List</h1>
         <a class="btn btn-dark" href="department_new.php">New Department</a>
         <table class="table table-dark table-bordered table-striped">
           <tr>
             <td><b>ID</b></td>
             <td><b>Name</b></td>
             <td><b>Actions</b></td>
           </tr>
           <?php while($department=mysqli_fetch_assoc($data)){ ?>
             <tr>
               <td><?php echo $department["id"] ?></td>
               <td><?php echo $department["name"] ?></td>
               <td>
                 <a class="btn btn-primary" href="department_edit.php?id=<?php echo $department["id"]; ?>">Edit</a>
                 <a class="btn btn-danger" href="department-delete.php?id=<?php echo $department["id"]; ?>">Delete</a>
               </td>
             </tr>
          <?php } ?>
         </table>
       </div>
     </div>


   </body>
 </html>
