<!-- 
We're creating a checkout system for a hardware store and need some math
to calculate how much a user should pay for their items.

The prices of three items have been stored in variables for you to use.
The items do not have GST added.

1. Add the prices together and echo the total in the table below
2. Add GST (multiply your total by 1.15) and echo this in the table
3. You're advertising a finance scheme where shoppers can choose
   to pay a quarter of the total now and the rest later.
   Display this total after the table. 
 -->

<?php

$nails = 12.5;
$fence_pailing = 4.99;
$cement = 25;
$total= $nails + $fence_pailing + $cement ;
$gstTotal= $total * 1.15; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Essentials - 4. Numbers</title>

    <style>
        html {
            font-family: arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even):not(:last-child) {
            background-color: #eaeaea;
        }

        .totals {
            background-color: #b6c7dc;
            font-weight: bold;
        }

        .finance {
            font-size: 2rem;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h2>Shopping Cart</h2>

    <table>
        <tr>
            <th>Product</th>
            <th>Price</th>
        </tr>
        <tr>
            <td>Nails</td>
            <td>$<?php echo $nails ?></td>

        </tr>
        <tr>
            <td>Fence Pailing</td>
            <td>$<?php echo $fence_pailing ?></td>

        </tr>
        <tr>
            <td>Cement</td>
            <td>$<?php echo $cement ?></td>

        </tr>
        <tr class="totals">
            <td>Total</td>
            <td><?php echo $total;?></td>
        </tr>
        <tr class="totals">
            <td>Total+GST</td>
            <td><?php  echo round($gstTotal, 2);?></td>
        </tr>
    </table>

    <p class="finance">Buy NOW on Finance and only pay <!-- Echo Quarter of total --> today!
    </p>

</body>

</html>