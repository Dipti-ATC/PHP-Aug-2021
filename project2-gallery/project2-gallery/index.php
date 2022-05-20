<?php 
// same steps as quotes project
// foreach loop should display images wrapped in anchor tags
// add this attribute to your form to make it work:    enctype="multipart/form-data"
require_once(__DIR__ . "/inc/config.php");
 $sql= "SELECT * FROM images ";
 $stmt= $pdo->prepare($sql);
 $stmt->execute();
 $results= $stmt->fetchall(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Gallery</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>
    <h1>Gallery</h1>

    <form method="post" action="add_image.php">
        <input type="file" name="image" placeholder="Add an image">
        <input type="text" name="title" placeholder="Caption your image">
        <button type="submit">ADD IMAGE</button>
    </form>
    <section class="gallery">
		<?php 
		 	foreach($results as $result){
				 echo "<a href='image.php?id=".$result['id']."'><img src='".$result['path']. "'></a>";
			 }
				
		?>

    </section>
    <footer>&copy; Copyright <?php echo date('Y') ?> KJ Millar</footer>
</body>

</html>