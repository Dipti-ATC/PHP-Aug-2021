<!-- 
    In this exercise you will be creating a basic chat app where users can post a message to a message board.

    1. Copy the SQL from within "chat.sql" and run it on your database to create the database for this task.
        Tip: SQL can be run from the SQL tab within PHPMyAdmin.
    2. Populate the database connection file "inc/database.php" with the credentials for your database and require it here.
    3. Create PHP code that inserts messages submitted through the form into the database using prepared statements.
        Add validation to ensure that messages cannot be inserted if they contain less than 5 characters
        or more than 255 characters. Add features to ensure the form has a good user experience.
    4. Create PHP code that queries the database for all messages ordered from newest to oldest.
        Turn the For loop into a foreach loop to loop over each message.
    5. Test your code by adding new messages through the form.

    Extras:
    - Use "$msg_date = strtotime($message['date'])" and "date("h:ia, d M Y", $msg_date)" 
        to format the message date from the database within your loop.
        If you wish to change the format within the date() function https://www.php.net/manual/en/datetime.format.php

 -->
<?php 

 require_once(__DIR__."/inc/database.php");
 $message="";
 $error=[];
 if ($_SERVER['REQUEST_METHOD']== "POST"){
   if(isset($_POST['message'])){
    $message = trim($_POST['message']);
   }
   if (strlen($message)<5){
     array_push($error, "You have entereed less than 5 characters");
   }
   if(strlen($message)>255)
   {
    array_push($error, " you have entered more then 255 characters");
   }
   if(!count($error)>0){
   $sql = "INSERT INTO messages (`message`) VALUES (?)";
   // INSERT INTO `messages` ( `message`) VALUES ('hello world')
   $stmt = mysqli_prepare($db, $sql) or die( mysqli_error($db) );// prepare statement
   mysqli_stmt_bind_param($stmt, 's', $param_message);// binding parameters
   $param_message= $message;
   mysqli_stmt_execute($stmt);
 }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>3-2-Database | Chat App</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
  #err{
    color:red;
  }
</style>
  </head>

<body>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-md-6">

        <h1 class="h4 mb-2">Share your Messages with the world...</h1>
        <form method="POST" >
          <div class="mb-1">
            <div class="form-floating">
              <textarea class="form-control" name="message" id="message" placeholder="Leave a comment here"
                style="height: 150px; resize: none;"></textarea>
              <label for="message">Your Message</label>
            </div>
          </div>
          <?php if(count($error)>0){
            foreach($error as $errormsg){
              echo "<p id= 'err'> ". $errormsg . "</p>";
            }
          }   ?>
          <button type="submit" class="btn btn-primary w-100">Submit</button>

        </form>

        <h1 class="h4 mt-4">Latest Messages:</h1>

        <?php 
          $sql= "SELECT * FROM messages ORDER BY date DESC";
          $result= mysqli_query($db, $sql);
          $rows= mysqli_fetch_all($result, MYSQLI_ASSOC);
          foreach ($rows as $message){
            $msg_date = strtotime($message['date']);
          
        ?>
        <div class="card mb-2">
          <div class="card-body">
            <p class="card-title text-muted"><?php echo date("h:ia, d M Y", $msg_date);?></p>
            <p class="card-text">
              <?php echo $message['message']; ?>
            </p>
          </div>
        </div>
        <?php } ?>
      </div>
    </div><!-- .row -->
  </div>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</body>

</html>