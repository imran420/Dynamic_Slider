<?php

include_once 'dbconnect.php';
error_reporting(0);

if(isset($_POST["submit"])){
    $id=$_GET['id'];
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        $dataTime = date("Y-m-d H:i:s");
        echo "$id"; 
        $qr="UPDATE images SET image='$imgContent', created='$dateTime' WHERE id='$id'";
        if($db->query($qr) === true){
            echo "File uploaded successfully. <a href='update.php'>Upload More</a>";
        }else{
            echo "File upload failed, <a href='update.php'>please try again</a>.";
        } 
    }else{
        echo "You have not selected any image. <a href='update.php'>please try again</a>.";
    }
    $db->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<body>
<br><br>
    <form action="" method="post" enctype="multipart/form-data">
        Select image to upload:<br><br>
        <input type="file" name="image"/><br><br>
	    <input type="submit" name="submit" value="UPDATE"/>
    </form>
</body>
</html>