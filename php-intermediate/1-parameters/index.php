<?php
/*
  Below, some information about various cars is stored in the $cars array. 
  You are to use route parameters to find an element in the $cars array based on its index.
  
  1. Use the array_key_exists function within an if statement to check 
      whether the index given exists in the array. Display an errror if it does not.
      Remember to check if the parameter is set before using it.
  3. Extract the car from the cars array and store it in a new $car variable.
  4. Echo the car's details from the new $car variable in the space provided.
*/

$cars = [
  [
    "make" => "Volkswagen",
    "model" => "Golf",
    "year" => 2010
  ],
  [
    "make" => "Holden",
    "model" => "Spark",
    "year" => 2016
  ],
  [
    "make" => "Honda",
    "model" => "Fit",
    "year" => 2016
  ],
  [
    "make" => "Ford",
    "model" => "Fiesta",
    "year" => 2012
  ]
];

if(isset($_GET['id']) && array_key_exists($_GET['id'], $cars)){
  $car = $cars[$_GET['id']];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP Intermediate - 1. Parameters</title>
</head>

<body>
  <p>
    ID: "ID FROM ROUTE PARAMETER"<br> <?php echo $_GET['id'];?><br>
    Make: <?php echo $car['make'];?><br>
    Model: <?php echo $car['model'];?><br>
    Year: <?php echo $car['year'];?><br><br>
      </p>

    <?php } else { echo "id not found";} ?>
</body>

</html>