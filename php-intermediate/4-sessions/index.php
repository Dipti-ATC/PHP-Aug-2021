<!-- 
  1. At the very top of this file, use logic to check whether the user is logged in.
      If not, prematurely end the script and redirect the user to the login page.

  2. At the bottom of this page we have a logout link that sends the user to logout.php.
      Create the file "logout.php" and add code that destroys the session and redirect the user to the login page.

  3. Test the code you wrote in step 2 by attempting to access index.php after clicking the logout link.
  
  4. Use PDO to populate the form fields with their current values when the page is loaded.
      Use the user's "ID" session variable when selecting from the database.
  
  5. Update the values in the database when the form is POSTED. 
      Remember to validate the email and ensure it's not already registered if it gets changed.

  6. Echo the user's ID from $_SESSION as a route parameter in the "view my card" link.
 -->

<?php 
session_start();
if(empty($_SESSION['id']))
{
  header("location:login.php");
  exit();
}
require_once(__DIR__ . "/inc/header.php");
require_once(__DIR__ . "/inc/database.php");
 $sql= "SELECT * FROM users WHERE id= :id";
 $stmt= $pdo->prepare($sql);
 $stmt->bindParam(":id", $_SESSION['id'] );
 $stmt->execute();
 $result= $stmt->fetch(PDO::FETCH_ASSOC);
 $errors =[];
 if($_SERVER['REQUEST_METHOD']== "POST"){
   //check fields are empty
      if(empty($_POST['email'])){
     array_push($errors, "Please enter your email");
   }else{
     $email = strtolower(trim($_POST['email']));
   }
   // validate email 
   if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    array_push($errors, "invalid email");
  }
   //prepare statement to check whether the email already exists
   $sql= "SELECT id FROM users where email = :email";
   $stmt = $pdo->prepare($sql);
   $stmt->bindParam(":email", $email);
   $stmt->execute();
   $found_my_id= $stmt->fetch(PDO::FETCH_ASSOC);
 
   if($found_my_id['id'] != $_SESSION['id'] && $stmt->rowCount() > 0){
     array_push($errors, "Email already exists");
   }
     // if no errors update the details in the database

     if(count($errors)== 0){
       $sql= "UPDATE users
             SET email =:email, phone =:phone, quote =:quote
             WHERE id= :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":phone", $_POST['phone']);
      $stmt->bindParam(":quote", $_POST['quote']);
      $stmt->bindParam(":id", $_SESSION['id']);
      $stmt->execute();
     }
    }

?>

<div class="container pt-5 h-100 align-items-center d-flex">
  <div class="row justify-content-center w-100">
    <div class="col-md-4">
      <div class="card mb-3 border-0">
        <div class="row g-2">

          <div class="card-body">
            <h1 class="card-title text-center"> <?php echo $result['full_name'];?> 's Business Card</h1>
            <p class="mt-2 text-center">
              <a href="card.php?id=<?php echo $_SESSION['id'];?>" target="_blank" rel="noopener">View My Card</a>
            </p>
            <hr>
            <form method="POST">
              <div class="mb-3">
              <?php  foreach($errors as $error){
      echo "<p class='text-danger'> {$error} </p>";
    }?>
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email" value= "<?php echo $result['email'] ;?>">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="phone" id="phone" value= "<?php echo $result['phone']; ?>">
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Favourite Quote</label>
                <input type="text" class="form-control" name="quote" id="quote" value= "<?php echo $result['quote']; ?>">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">Update</button>
              </div>

            </form>

            <p class="mt-2 text-center">
              <a href="logout.php" class="text-danger">Logout</a>
            </p>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require_once(__DIR__ . "/inc/footer.php") ?>