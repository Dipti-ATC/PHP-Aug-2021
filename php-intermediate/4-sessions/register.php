<!--
Use the posted form to create a new user within the database.
You should at minimum make the following validations
- No fields should be empty
- The supplied email should not already exist within the database 
and be valid.
  (You will need to use a select query to check whether an email is registered)
  (Use google to see how to validate an email in PHP. You can test this by changing the email input's type to a text field and entering random text)
- The password and confirm password fields should match.

Try to show errors individually for each field. See if you can write a function to keep the formatting consistent.

Hint: When storing a new email, make it lowercase first. Then, when you are checking whether an email is already registered, 
      use the string to lower function on the form input before making a database query so that we can ensure the check is case insensitive.

Create some new accounts to test your registration form. Look at the database to ensure everything is being inserted as expected.

If an account is successfully created, redirect the user to "register-success.php"
 -->

<?php 
require_once (__DIR__."/inc/database.php");
require_once(__DIR__ . "/inc/header.php");

$name = $email = $password = $confirm_password = "";
$errors =[
  'name'=>[],
  'email'=>[],
  'password'=>[],
  'server'=>[]
  ];
  function print_errors($field_name){
    global $errors; 
    foreach($errors[$field_name] as $error){
      echo "<p class='text-danger'> {$error} </p>";
    }
  }
  if($_SERVER['REQUEST_METHOD']== "POST"){
    //check fields are empty
    if(empty($_POST['name'])){
      array_push($errors['name'], "Please enter your name");
    }else{
      $name = trim($_POST['name']);
    }
    if(empty($_POST['email'])){
      array_push($errors['email'], "Please enter your email");
    }else{
      $email = strtolower(trim($_POST['email']));
    }
    if(empty($_POST['password'])){
      array_push($errors['password'], "Please enter your password");
    }else{
      $password = trim($_POST['password']);
    }
    //check password match
    if($password != trim($_POST['confirm_password'])){
      array_push($errors['password'], "password do not match");
    }
    // validate email 
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      array_push($errors['email'], "invalid email");
    }
    //prepare statement to check whether the email already exists
    $sql= "SELECT id FROM users where email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();
    if($stmt->rowCount() > 0){
      array_push($errors['email'], "Email already exists");
    }
    if(count($errors, COUNT_RECURSIVE) <=4){
      $sql= "INSERT INTO users (`full_name`, `email`, `password`)
            VALUES (:name, :email, :password)";
      $stmt= $pdo->prepare($sql);// prepare statement
      $stmt->bindParam(":name", $name);
      $stmt->bindParam(":email", $email);
      //this is part 2 hashing password, intially we stored password as a plain text
      //$stmt->bindParam(":password", $password);
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $stmt->bindParam(":password", $hashed_password);
      if($stmt->execute()){
        header("location: register-success.php");
      }else{
        array_push($errors['server'], "A server error occured");
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
                        <h1 class="card-title text-center">Register</h1>
                        <hr>
                        <form method="POST">
                            <div class="mb-3">
                            <?php print_errors('server');?>
                                <label for="name" class="form-label">Full Name</label>
                                <input type="text" class="form-control" name="name" id="name">
                                <?php print_errors('name');?>
                              </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" name="email" id="email">
                                <?php print_errors('email');?>
                              </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password">
                                <?php print_errors('password');?>
                              </div>
                            <div class="mb-3">
                                <label for="confirm_password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password"
                                    id="confirm_password">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary px-5">Register</button>
                                <p class="mt-2">
                                    <a href="login.php">Login</a>
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