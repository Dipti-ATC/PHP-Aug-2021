<?php
/*
In this exercise we will be creating a
 two-dimentional array (An Array of Arrays)
 to store the product information for 
 Musical Instrument store.

1. Create a products array that contains
 three associative arrays.
   Within each associative array, 
   add key value pairs to store the Instrument's:
    - Name
    - Brand
    - Price 
   Make up your own values for each key
    and use indenting to keep your array easily readable.
*/
 $products= [
                [
                    'name'=> 'Guitar',
                    'brand'=> 'Fender',
                    'price'=> 200
                ],
                [
                    'name'=> 'Piano',
                    'brand'=> 'ABC',
                    'price'=> 500
                ],
                [
                    'name'=> 'Violin',
                    'brand'=> 'XYZ',
                    'price'=> 400
                ],
            ]
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Essentials - 6. Associative Arrays</title>
</head>

<body>
    <!-- 2. Print your array in between <pre>formated text tags -->
                <pre>
                    <?php print_r($products) ?>
                </pre>

    <?php
    // 3. Take the second element from your array and 
    //store it in a new variable
                $newProduct= $products[1];
    ?>

    <!-- 4. Using your new variable, echo out the relvant information
            in the second table row -->
    <table style="width:100%; border: 1px solid #dddddd;">
        <tr style="background: #dddddd;">
            <th>Product ID</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>2</td>
            <td> <?php echo $newProduct['name'] ?></td>
            <td><?php echo $newProduct['brand'] ?></td>
            <td><?php echo $newProduct['price'] ?></td>
        </tr>
    </table>

   
    ?>

</body>

</html>