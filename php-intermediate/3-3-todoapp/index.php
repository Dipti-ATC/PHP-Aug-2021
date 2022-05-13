<!-- 
  In this exercise you will be creating a Todo app using the PDO extension. 
  This will give you some time to practice different operations such as create, read, update and delete.

  1. Copy the SQL within "database.sql" and run it on your database to initialize it for this project.
  2. Open "inc/database.php" and ensure it has the correct database credentials. Include it in this file.
  3. Use PDO to to insert new tasks when they are submitted via the form. Use server side validation to prevent
      empty submissions from being added to the database.
  4. Use PDO to select all tasks from the database and Adjust the for loop so that all tasks get displayed.
  5. We want to make a confirmation dialgoue so that user's are required to confirm they want to delete a task before it is deleted.
      Ensure the task's ID is being echoed within the Delete link, then complete the numbered tasks in delete.php

  6. Use PHP logic to condtionally show "Mark Completed" or "Mark Incomplete" dependent on whether the task's
      "completed" value is true or false. Make sure the forms surrounding the buttons are included.
      
  7. To mark a task as complete, we are going to use a separate page that can be posted the ID of a task, and then mark it as complete.
      Echo the task's ID in the complete form's hidden input and then complete the numbered tasks in "complete.php"

  8. To mark a task as incomplete, we are going to use a separate page that can be posted the ID of a task, and then mark it as incomplete.
      Echo the task's ID in the incomplete form's hidden input and then complete the numbered tasks in "incomplete.php"

  9. We want users to be able to edit their tasks after they've been added. Echo the task's ID in the edit button's href,
      then open "edit.php" and complete the numbered tasks.

 -->

<?php 
  require_once(__DIR__ . "/inc/header.php");
  require_once(__DIR__ . "/inc/database.php");

  $errors=[];
  $newTask ="";
  if($_SERVER['REQUEST_METHOD']=='POST'){

    if(isset($_POST['task_name'])){
      $newTask= $_POST['task_name'];
      if(strlen($newTask)<5){
        array_push($errors, "Enter more than five characters");
      }else{
        
        $sql= "INSERT INTO `tasks` (`name`) VALUES (:name)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":name", $newTask);
        if(!$stmt->execute()){
         
          array_push($errors, "Error in adding task");
        }else{ 
          // echo "<script> alert ('task added correctly'); </script>";

        }
      }
      
    }
  }
?>

<div id="page-wrapper">
    <div class="container py-5">
        <div id="content" class="border rounded bg-white shadow-sm px-3 py-2">
            <h1 class="display-4 mb-4 text-center">Todo</h1>
            <form method="POST">

                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="task_name" placeholder="New Task">
                    <button type="submit" class="btn btn-primary" type="button">Add Task</button>
                </div>

            </form>
            <?php
    if(!count($errors)==0){
      foreach($errors as $error){
        echo "<ul> <li class= 'alert-danger' > ". $error ."</li></ul>";
      }
    }
  
  ?>
            <h2 class="h4 mt-4">My Tasks:</h2>

            <?php
              $sql= "SELECT * FROM `tasks` ORDER BY id DESC"; 
              $result= $pdo->query($sql);
              $rows= $result->fetchall(PDO::FETCH_ASSOC);
              foreach($rows as $task){
                      
            ?>
            <div class="card mb-2">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md">
                            <p class="card-text">
                                <?php echo $task['name'];  ?>
                            </p>
                        </div>
                        <div class="col-auto">
                          <?php  if(!$task['completed']){?>

                            <form action="complete.php" method="POST" class="d-inline-block">
                                <input type="hidden" name="id" value="<?php echo $task['id'];?>">
                                <button type="submit" class="btn btn-success">✔ Mark Completed</button>
                            </form>
                            <?php }else{ ?>

                            <form action="incomplete.php" method="POST" class="d-inline-block">
                                <input type="hidden" name="id" value="<?php echo $task['id'];?>">
                                <button type="submit" class="btn btn-warning">❌ Mark Incomplete</button>
                            </form>
                            <?php }?>


                            <a href="edit.php?id=<?php echo $task['id'];?>" class="btn btn-info">✏ Edit</a>

                            <a href="delete.php?id=<?php echo $task['id'];?>" class="btn btn-danger">🗑 Delete</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php require_once(__DIR__ . "/inc/footer.php") ?>