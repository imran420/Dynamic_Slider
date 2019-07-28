<?php
include_once 'dbconnect.php';

if(!empty($_GET['id'])){
   
    
   
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    
    if($db->connect_error){
       die("Connection failed: " . $db->connect_error);
    }
    
    $result = $db->query("SELECT image FROM images WHERE id = {$_GET['id']}");
    
    if($result->num_rows > 0){
        $imgData = $result->fetch_assoc();
        
        header("Content-type: image/jpg"); 
        echo $imgData['image']; 
    }else{
    }
}
?>