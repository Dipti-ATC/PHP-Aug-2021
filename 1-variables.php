<?php
//1. Define a variable to hold your name
$name= "Tom";
$age= 30;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP Essentials - 1. Variables</title>
</head>
<body>
    <p>
        <?php
        /* 1. 
        2. Echo "my name is "
         3. Echo the variable that's holding your name
        4. Echo your age (" my age is: <age>")
        */
        echo "My name is ". $name;
        echo "<br>";
        echo "my age is " . $age;
        echo $message;
        $message ="gfdhgf";
        // $_num;
        // $1ab;
        // $a1;
        echo "test
        is 
        my 
        "
        echo  'Tom said\'Time is a money'";
        
      

        ?>
    </p>

    <p>
        <?php
        // 5. Using concatenation, Refactor steps 2-4 into a single line of code below
        echo "My name is ". $name . " my age is :20";

        ?>
    </p>

</body>

</html>