<?php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'school');
 // you may name it as you like but commnly used words are $conn, $link

 $conn= mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 if(!$conn){
     die("Connection failed: ". mysqli_connect_error());
 }
 $sql= "SELECT * FROM class";

 $result= mysqli_query($conn, $sql);
  if(mysqli_num_rows($result)>0){
      $rows= mysqli_fetch_all($result, MYSQLI_ASSOC);
     foreach ($rows as $class){
         echo "<br> My class id is :" . $class['classId']. 
         "<br> my course name is ". $class['className']. 
         " <br> my room number is ". $class['roomNo'];
     
  }

  <h1> <?php echo $class['classId']    ?>        </h1>

  <p>   <?php echo $class['className']    ?> </p>




?>