<?php

if(isset($_POST["arduinoid"])){
    $id=$_POST["arduinoid"];
    include '../../config/connection.php';

    $totalprice = mysqli_query($connect,"select sum(itemlist.ItemPrice*cartlist.QUANTITY) 
                                           FROM cartlist INNER JOIN itemlist 
                                           ON cartlist.barcode=itemlist.ItemBarcode 
                                           where cartlist.arduinoID = '$id'; ");
    while($ttotalprice = mysqli_fetch_array($totalprice)){
        echo $totalcartprice=$ttotalprice["sum(itemlist.ItemPrice*cartlist.QUANTITY)"];
    }
    $sql = "INSERT INTO cartlist_total VALUES (NULL,'$id','$totalcartprice')";
    if(mysqli_query($connect, $sql)){
      
        

    } else{

    }
    $results = "SELECT * FROM cartlist WHERE arduinoID = '$id' ";
    $result =mysqli_query($connect, $results);
    if (mysqli_num_rows($result) > 0) {
        // If data already exists, update age column with incremental value
        
        $sql = "DELETE FROM cartlist WHERE arduinoID='$id' ";
        if(mysqli_query($connect, $sql)){
    
        } else{
    
        }
        echo "Data DELETED successfully.";
       
        
        
        
    } 
    
    
    mysqli_close($connect);
}


?>