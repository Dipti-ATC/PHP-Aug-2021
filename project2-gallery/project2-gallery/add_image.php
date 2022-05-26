<?php 
// include config
// if server request method is post, then do the following, else redirect to home page
// 1. save posted values into variables
// 2. prepare sql insert query
// 3. try and catch block to send to database
// 4. Wrap the send-to-database code in an if statement that moves the actual image to the image folder
require_once(__DIR__ . "/inc/config.php");
// following information are coming as an associated array with file upload
// echo $_FILES['image']['tmp_name'] . "<br>";
// echo $_FILES['image']['name']."<br>";
// echo $_FILES['image']['type']. "<br>";
// echo $_FILES['image']['size']. "<br>";
// echo $_FILES['image']['error'];
if(isset($_POST['add_image']) && $_FILES['image']['error'] == 0){
    $title= $_POST['title'];
    $filePath= "img/". $_FILES['image']['name'];//file name
    $tmpPath= $_FILES['image']['tmp_name'];//file temp path
    $fileSize= $_FILES['image']['size']; //file size
    $maxAllowedSize= 5242844;//size in bytes
    $ext = strtolower(pathinfo($filePath,PATHINFO_EXTENSION));
    $allowedExtensions= ["jpeg","gif", "jpg","png"];
    // check file extension
    if(in_array($ext, $allowedExtensions)){
           // check file size
        if ($fileSize< $maxAllowedSize){
            if(!file_exists($filePath)){
                //move image to folder
                if(move_uploaded_file($tmpPath, $filePath)){
                //add the image path to the database
                $sql= "INSERT INTO images (`title`, `path`)
                    VALUES (:title, :path)";
                $stmt= $pdo->prepare($sql);
                $stmt->bindParam(":title",$title);
                $stmt->bindParam(":path",$filePath);
                $stmt->execute();
            }else{
                echo "error in file upload";
            }
        }else{
            echo "file already exists";
        }  
        }else{//---size check
        echo "file size is too big";
        }
    }else{
        echo "incorrect extension";
    }
}else{
    echo "file upload error";
}

?>