<!-- 
    In this exercise you will be using static SQL statements to generate a list of customers from the database.

    1. Copy the SQL query in "database.sql" and run it on your database.
        Tip: SQL can be run from the SQL tab within PHPMyAdmin.
    2. Populate "inc/database.php" with your database credentials and include it within this file.
    3. Use a static query to select all customers from the database.
    4. Use a loop to output each customer in the table below

 -->
<?php 
require_once(__DIR__."/inc/database.php");
// sql statement
$sql= "SELECT * FROM customers";
//rsult store the data coming from th query
 $result= mysqli_query($db, $sql);
 $rows= mysqli_fetch_all($result, MYSQLI_ASSOC);

  ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Intermediate 3-1. Customer List</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
  <div class="container my-5">
    <h1>Customers</h1>
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th scope="col">#ID</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        
        <?php  foreach($rows as $customer){?>
        <tr>
          <th scope="row"><?php echo $customer['id']; ?></th>
          <td><?php echo $customer['f_name']; ?></td>
          <td><?php echo $customer['l_name']; ?></td>
          <td><?php echo $customer['email']; ?></td>
        </tr>
        <?php }?>
      </tbody>
    </table>

  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>

</html>