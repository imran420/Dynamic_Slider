<?php
include_once 'dbconnect.php';

if(isset($_POST["submit"])){
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false){
        $image = $_FILES['image']['tmp_name'];
        $imgContent = addslashes(file_get_contents($image));
	
        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
        

        if($db->connect_error){
            die("Connection failed: " . $db->connect_error);
        }
        
        $dataTime = date("Y-m-d H:i:s");
        
       
        $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', '$dataTime')");
        if($insert){
            echo "File uploaded successfully. <a href='upload.html'>Upload More</a>";
        }else{
            echo "File upload failed, <a href='upload.html'>please try again</a>.";
        } 
    }else{
        echo "You have not selected any image. <a href='upload.html'>please try again</a>.";
    }
}
?>