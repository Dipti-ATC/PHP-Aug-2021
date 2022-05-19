<!-- 
  
On this page we are going to be creating the functionality for the login form.
When the form is POSTED, select a user from the database by their email address.
If a user is found, compare the supplied password with the stored password.
If the passwords match, store their ID in a "user_id" session variable.
Remember, you must initialize a session before it can be manipulated.

Add usability features such as error handling.

Once the user has been "logged in", redirect them to index.php.

 -->

<?php 
require_once(__DIR__ . "/inc/database.php"); 
require_once(__DIR__ . "/inc/header.php"); 
session_start();
$errors =[];
if($_SERVER['REQUEST_METHOD']== "POST"){
  //check fields are empty
  
  if(empty($_POST['email'])){
    array_push($errors, "Please enter your email");
  }else{
    $email = strtolower(trim($_POST['email']));
  }
  if(empty($_POST['password'])){
    array_push($errors, "Please enter your password");
  }else{
    $password = trim($_POST['password']);
  }
  //if there is no error
  if(count($errors)==0){
    $sql= "SELECT * FROM users WHERE email =:email";
    $stmt= $pdo->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    if($stmt->rowCount()==1){
      $result= $stmt->fetch(PDO::FETCH_ASSOC); //$stmt->fetch(PDO::FETCH_ASSOC)
      if($password == $result['password'] ){
        $_SESSION['id'] = $result['id'];
        
        $_SESSION['name'] = $result['full_name'];
        header("location:index.php");
      } // if anytime you get confused echo the variable to check the values
      else{
        array_push($errors, "invalid credentials");
      }      
    }else{
      array_push($errors, "invalid credentials");
    }
  }
}
?>

<div class="container pt-5 h-100 align-items-center d-flex">
  <div class="row justify-content-center w-100">
    <div class="col-md-4">
      <div class="card mb-3 border-0">
        <div class="row g-2">

          <div class="card-body">
            <h1 class="card-title text-center">Login</h1>
            <hr>
            <form method="POST">
              <div class="mb-3">
                <?php  foreach($errors as $error){
      echo "<p class='text-danger'> {$error} </p>";
    }?>
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="email" id="email">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary px-5">Login</button>
                <p class="mt-2">
                  <a href="register.php">Register</a>
                </p>
              </div>

            </form>

          </div>
        </div>
      </div>

    </div>
  </div>
</div>

<?php require_once(__DIR__ . "/inc/footer.php") ?>