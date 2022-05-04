<?php 
 if($_SERVER["REQUEST_METHOD"] == "POST"){
      print_r($_POST)  ;    
 }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Name: <input type="text" name= "name"><br>
        Email: <input type="text" name= "email"><br>
        Message: <input type="text" name= "message"><br>
        <input type="submit">


    </form>
</body>
</html>