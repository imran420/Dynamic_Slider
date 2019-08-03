<?php
include_once 'dbconnect.php';

                
//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

//Check connection
if($db->connect_error){
    die("Connection failed: " . $db->connect_error);
}

//Get image data from database
$result = $db->query("SELECT id, created FROM images order by created DESC  limit 4");
$delete="update";
While($imgData = $result->fetch_assoc()){        
    echo "<div> <img data-u='image' src='display.php?id=". $imgData['id'] . "' ></div>"; 
    echo "<div><tr><td>".$imgData['id']."</td><td><a href='update.php?id=".$imgData['id']."'>".$delete."</a></td></tr></div>";
    
}
?>