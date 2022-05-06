<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Handler</title>
</head>
<body>
    <?php 
    // good practice to check the  form method
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $uName = htmlspecialchars($_POST['uName']);
    $uEmail = htmlspecialchars($_POST['uEmail']);
    }else{
        die('invalid reuest');
    }
    ?>
    <!-- <p>You entered name:  -->
        <?php // echo $_POST['uName'];?>
    <!-- </p> -->
    <!-- <p>You entered email: <?php  //echo $_POST['uEmail'];?></p> --> -->
     <!-- with validation -->
     <p>  <?php echo $uName;?>  </p>
 <p>  <?php echo $uEmail;?>  </p>

</body>
</html>