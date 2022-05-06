<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $emailError="";
    if(!empty($_POST['uEmail'])){
    $uName = htmlspecialchars($_POST['uName']);
    $uEmail = htmlspecialchars($_POST['uEmail']);
    $uPassword = htmlspecialchars($_POST['uPassword']);

    // echo trim($uName);  //trim removed spaces from the begining and ending
  echo $uName;
    echo $uEmail;
    if(preg_match('/^[a-zA-Z0-9]+$/',$uPassword)){ echo $uPassword;}
    else{echo "password is not in the required format";}
// you may use Filter_var() function with FILTER_VALIDATE_EMAIL to validate emails
    }else{
        $emailError = "enter email";}
          
    
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form and handler same file</title>
</head>

<body>
    <form action="" method="post">
        Name: <input type="text" name="uName">
        Email: <input type="text" name="uEmail">
        <p> <?php echo $emailError; ?></p>
        <!-- password validation for regular expression -->
        Password: <input type="text" name="uPassword" 
       > <p> hint: enter letters and numbers</p>
        <input type="submit" name="submit">
    </form>

    <?php }?>
</body>

</html>