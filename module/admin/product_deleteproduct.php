<?php
  $name=$_GET['pname'];
  

    include '../../config/connection.php';


    $results = "SELECT * FROM itemlist WHERE Item_id = '$name' ";
    $result =mysqli_query($connect, $results);
    if (mysqli_num_rows($result) > 0) {
        // If data already exists, update age column with incremental value
        
        $sql = "DELETE FROM itemlist WHERE Item_id = '$name' ";
        if(mysqli_query($connect, $sql)){
    
        } else{
    
        }
        echo "Data DELETED successfully.";
         header("Location: product.php");
        
        
        
    } 

    mysqli_close($connect);

?>