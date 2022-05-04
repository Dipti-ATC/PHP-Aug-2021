<!-- 
  In this exercise you will be creating a basic calculator.

  1. Use PHP to calculate the result of the inputs with the
     mathmatical operator chosen in the select dropdown.
     
    - Retain the input's values when the new page is loaded.
    - Echo an error if either value input is not numeric.
    
  2. Echo the result.
-->

<!DOCTYPE html>
<html lang="en">

<head>
  <title>PHP Intermediate - 2. Forms</title>
</head>

<body>
  <form method="post">
    <input type="text" name="value1" placeholder="Value 1">
    <select name="operator" id="operator">
      <option value="add">Add</option>
      <option value="subtract">Subtract</option>
      <option value="multiply">Multiply</option>
      <option value="divide">Divide</option>
    </select>
    <input type="text" name="value2" placeholder="Value 2">
    <input type="submit" value="Submit">
  </form>

  <p>
    <!-- Echo the result here -->
  </p>
</body>

</html>