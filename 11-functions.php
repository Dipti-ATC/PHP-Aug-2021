<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Essentials - 11. Functions</title>
</head>

<body>

    <?php
    /*Note: if you are using VSCode and the text overflows the width of your screen,
press alt+z or go to the "view" menu and select "toggle word wrap" */

    //1. Create a function that echos "Hello World!" to the browser.
    //   Call your function.
        function greetings (){
            echo "Hello world";
        }
        greetings();

    ?>

    <br>

    <?php
    //2a. The area of a rectangle can be calculated by multiplying width and length.
    //   Create a function with two arguments that can calculate the area of a rectangle
    //   The function should echo "A rectangle of length $l and width $w has an area of $area"
 function calculateArea($w, $l){
      $area= $w * $l;
      echo "A rectangle of length $l and width $w has an area of $area";
 }
 calculateArea(20, 14);

    //2b. Use your function to calculate the area of of something with a length of 20 and a width of 14


    ?>

    <br>

    <?php
    //3a. A client needs a function to calculate postage rates based on the area of a flat envelope.
    //   Create a function that takes a length and width, and calculates the area of
    //   the envelope.
    //   Then within the same function, use logical statements to *return* the shipping cost as a float value.
    //  - Parcels with an area less than 35 cost $3.50
    //  - Parcels with an area between 35 and 110 cost $5.00
    //  - Parcels with an area greater than 110 cost $9.00

    function calculatePostageRate($w, $l){
        $area= $w * $l;
        if ($area <35){
            return 3.50;
        }else if($area <110 ){
            return "5.00";
        }else{
            return 9.00;
        }
   }

    //3b. Use your function find the cost to ship the following envelopes
    ?>
    <p>An envelope that is 5 wide and 6 long costs $
    <?php echo calculatePostageRate(5, 6); ?>-- to ship
        
    </p>
    <p>An envelope that is 7 wide and 8 long costs $
    <?php echo calculatePostageRate(7, 8); ?>-- to ship
    </p>
    <p>An envelope that is 15 wide and 12 long costs $
    <?php echo calculatePostageRate(15, 12); ?>-- to ship
    </p>


    <?php
    //4a. Sales tax within america can be complicated and varies by state.
    //    Create a function that can take a state's name and a monetary value as an input.
    //    Then search the provided array to find the state's tax rate and multiply it with the value.
    //    Return the new value.
    
        function calculateTax($state, $amount)
        {
            $tax_rates = [
                'illinois' => 1.0625,
                'new-york' => 1.045,
                'california' => 1.0725,
                'oregon' => 1,
                'texas' => 1.0625
            ];
               if (array_key_exists($state, $tax_rates )){
                //    echo $tax_rates[$state] * $amount;
                return $tax_rates[$state] * $amount ;
               }else {
                   return "Error";
               }
        }

    //4b. Using your postage rate and tax functions,
    //    calculate the post-tax cost for sending the following envelopes.
    ?>
    <p>An envelope that is 7 wide and 4 long costs
        $--<?php echo calculatePostageRate(7, 4); ?> 
        to ship from New York  
        <?php echo calculateTax("new-york", calculatePostageRate(7, 4));?>
    </p>
    <p>An envelope that is 20 wide and 17 long costs
        $--your function()-- to ship from California (post-tax)
    </p>

    <!-- 
        EXTRAS: Alter your tax calculator so that it will return "error" if
        the state array key does not exist. In the real world you will want
        to make sure you always handle edge cases where invalid data is provided.
        Research the array_key_exists() function to help you.
     -->

</body>

</html>