<?php

/*
7-1. Require "inc/database.php" so that our PDO connection can be used on this page.
7-2. Use the POSTED id value to update the task's to update the task's "completed" value to false.
7-3. Redirect the user's browser back to index.php with the header function.
*/
require_once(__DIR__ . "/inc/database.php");

$sql = "UPDATE `tasks` SET completed = false WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":id", $param_id);
$param_id= $_POST['id'];
$stmt->execute();
header("location: index.php");

?>