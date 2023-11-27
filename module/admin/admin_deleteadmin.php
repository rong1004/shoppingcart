<?php
  $name=$_GET['name'];
  

    include '../../config/connection.php';


    $results = "SELECT * FROM admin WHERE ID_admin = '$name' ";
    $result =mysqli_query($connect, $results);
    if (mysqli_num_rows($result) > 0) {
        // If data already exists, update age column with incremental value
        
        $sql = "DELETE FROM admin WHERE ID_admin = '$name' ";
        if(mysqli_query($connect, $sql)){
    
        } else{
    
        }
        echo "Data DELETED successfully.";
        header("Location: admin.php");
        
        
        
    } 

    mysqli_close($connect);

?>