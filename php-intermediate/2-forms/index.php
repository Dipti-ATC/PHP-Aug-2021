<!-- 
  In this exercise you will be creating a basic calculator.

  1. Use PHP to calculate the result of the inputs with the
     mathmatical operator chosen in the select dropdown.
     
    - Retain the input's values when the new page is loaded.
    - Echo an error if either value input is not numeric.
    
  2. Echo the result.
-->
<?php
$operator="add";
$value1="";
$value2="";

 if(isset($_POST['operator'])){
   $operator =$_POST['operator'];
 }
 if(isset($_POST['value1'])){
  $value1 =$_POST['value1'];

}
if(isset($_POST['value2'])){
  $value2 =$_POST['value2'];
}
 if(!is_numeric($value1)|| !is_numeric($value2)){
  $result = "Values are non-numeric";
  echo $operator. $value1 . $value2;
 }else{
  switch ($operator){
    case "add" :
      $result= $value1 + $value2;
      break;
    case "subtract" :
      $result= $value1 - $value2;
      break;
    case "multiply" :
      $result= $value1 * $value2;
      break;
    case "divide" :
      $result= $value1 / $value2;
      break;
    default :
    $result ="processing error ";
    break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>PHP Intermediate - 2. Forms</title>
</head>

<body>
    <form method="post">
        <input type="text" name="value1" placeholder="Value 1" value="<?php echo $value1;?>">
        <select name="operator" id="operator">
            <option value="add" <?php if ($operator == "add"){echo "selected";} ?>>Add</option>
            <option value="subtract" <?php if ($operator == "subtract"){echo "selected";} ?>>Subtract</option>
            <option value="multiply" <?php if ($operator == "multiply"){echo "selected";} ?>>Multiply</option>
            <option value="divide" <?php if ($operator == "divide"){echo "selected";} ?>>Divide</option>
        </select>
        <input type="text" name="value2" placeholder="Value 2" value="<?php echo $value2;?>">
        <input type="submit" value="Submit">
    </form>

    <p>
        <!-- Echo the result here -->
        result:
        <?php  echo $result; ?>
    </p>
</body>

</html>