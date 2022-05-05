<?php

//1. Give string values to the variables below.
$my_name = "Aroha";
$favourite_thing_1 = "Sleeping";
$favourite_thing_2 = "Watching tv";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Essentials - 2. Strings</title>
</head>
<body>
    <p>
        <?php
        // 2. Use string interpolation to insert each variable in the echoed text.
        // 3. Add breaks so that the text echoes in the same format as below.

        $about_me =
            "My name is {$my_name},
        <br> my favourite things are:
        <br>- {$favourite_thing_1}
        <br>- $favourite_thing_2";

        echo $about_me ."<br>";
        echo 2+3 ."<br>";
        echo 2*3 ."<br>";
        echo 2/3 ."<br>";
        echo 2-3 ."<br>";
        
//  create a random number
echo "Random number: ";
 echo rand(1,20) . "<br>";
 echo "strlen :";
 echo strlen($favourite_thing_2);
 echo "<br>" . fmod (20, 7);
 echo "<br>" . round (1.5);
 echo "<br>" . round (2.5);

        ?>
    </p>
</body>

</html>