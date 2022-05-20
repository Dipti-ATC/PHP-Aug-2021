<?php
// Step 5. Include config file
// Step 6. if $_GET['id'] is set, fetch one quote WHERE id matches $_GET['id']
// Step 7. else redirect the user to index.php
// Test. Print_r the result.
// Step 8. Echo the results details in the blanks in html

require_once(__DIR__ . "/inc/config.php");

if(isset($_GET['id'])){
	$sql ="SELECT * FROM images WHERE id = :id";
	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":id", $_GET['id']);
	$stmt->execute();
	$result= $stmt->fetch(PDO::FETCH_ASSOC);

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>View a quote</title>
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<main>
		<div class='view-single'>
			<img src="<?php echo $result['path']; ?>">
			<h5><?php echo $result['title']; ?></h5>
			<a href='index.php'>Go back</a>
		</div>
	</main>
	<footer>&copy; Copyright <?php echo date('Y') ?> KJ Millar</footer>
</body>
</html>