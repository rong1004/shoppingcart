<?php

    $arduinoID = $_POST["arduinoid"];

    include '../../config/connection.php';


    $results = "SELECT * FROM cartlist WHERE arduinoID = '$arduinoID' ";
    $result =mysqli_query($connect, $results);
    if (mysqli_num_rows($result) > 0) {
        // If data already exists, update age column with incremental value
        
        $sql = "DELETE FROM cartlist WHERE arduinoID='$arduinoID' ";
        if(mysqli_query($connect, $sql)){
    
        } else{
    
        }
        echo "Data DELETED successfully.";
       
        
        
        
    } 

    mysqli_close($connect);

?>