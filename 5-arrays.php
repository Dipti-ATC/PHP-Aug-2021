<?php
// 1. Create an array with 5 different animals
// 2. Push two more animals to the array
// 3. Remove your least favourite animal from the array
$animals = ["Dog","Monkey", "Cat", "Lamb", "Cow"];

array_push($animals, "Horse");
array_push($animals, "Lion");
array_splice($animals,2,1);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Essentials - 5. Arrays</title>
</head>

<!-- 4. Print your array between the preformatted <pre></pre> tags
as well as outside of them to see the difference.-->
<pre>
<?php print_r($animals); ?>
</pre>
<?php
echo "<br>";
 print_r($animals);
 
  ?>
<p>
    <!-- Echo the fourth and sixth elements from the array -->
    Animal 4: <?php echo $animals[3] ;?>
    <br>
    Animal 6: <?php echo $animals[5]; ?>
</p>

<p>
    <!-- Echo the quantity of elements in your array
See https://www.w3schools.com/php/func_array_count.asp for help -->

    The Animal Array has |number| elements <?php echo count($animals); ?>
</p>


<body>

</body>

</html>