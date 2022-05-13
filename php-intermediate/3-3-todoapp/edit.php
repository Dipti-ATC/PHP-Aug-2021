<!-- 
  9-1. Import the database connection.
  9-2. Use PDO to get the task's current name using the ID route parameter.
  9-3. Echo the current task name value to the text input.
  9-4. Set the ID route parameter as the value of the hidden input.
  9-5. Use PDO to update the task's name when the form is submitted.
        Ensure that the task cannot be given an empty name and redirect
        the user to "index.php" if the update is successful.
 -->
 
<?php 
require_once(__DIR__ . "/inc/header.php");
require_once(__DIR__ . "/inc/database.php");
$errors=[];
$taskName="";
if ($_SERVER['REQUEST_METHOD']=="GET" && !empty($_GET['id'])){
  $sql ="SELECT * FROM `tasks` WHERE id = :id";
  $stmt= $pdo->prepare($sql);//prepare statment 
  $stmt->bindParam(":id", $param_id );//bind parameter
  $param_id= trim($_GET['id']);// assigning value

  if($stmt->execute() && $stmt->rowCount()== 1){
    $row=$stmt->fetch(PDO::FETCH_ASSOC);
    $taskName = $row['name'];
  }else{
    array_push($errors, "Task not found");
  }
}
if($_SERVER['REQUEST_METHOD']=="POST"){
  $updatedTask = trim($_POST['new_name']);
  if(strlen($updatedTask)<5){
    array_push($errors, "Enter more than five characters");
  }else{
    $sql = "UPDATE `tasks` SET name = :name WHERE id =:id";
    
  // UPDATE `tasks`SET name = "update" WHERE id=6;
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $param_id);
    $stmt->bindParam(":name", $param_name);
    $param_id = trim($_POST['id']);
    $param_name= $updatedTask;
    $stmt->execute();
    header("location: index.php");

}
}

?>

<div id="page-wrapper">
  <div class="container py-5">
    <div id="content" class="border rounded bg-white shadow-sm px-3 py-2">
      <h1 class="display-4 mb-4 text-center">Editing Task</h1>
      <form method="POST">

        <div class="row">

          <div class="col order-md-2">
            <div class="input-group mb-3">
              <input type="text" name="new_name" class="form-control" value="<?php echo $taskName; ?>">
              <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
              <button type="submit" class="btn btn-primary" type="button">Update</button>
            </div>
          </div>

          <div class="col-md-2 order-md-1">
            <a href="index.php" class="btn btn-danger w-100 mb-3">Cancel</a>
          </div>

        </div>

      </form>

    </div>
  </div>
</div>

<?php require_once(__DIR__ . "/inc/footer.php") ?>