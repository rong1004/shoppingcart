
<?php

    $arduinoID = $_POST["arduinoid"];
    $barcode=$_POST["barcode"];
    $quantity=$_POST["name"];
    include '../../config/connection.php';


    $results = "SELECT * FROM cartlist WHERE arduinoID = '$arduinoID' AND barcode = '$barcode'";
    $result =mysqli_query($connect, $results);
    if (mysqli_num_rows($result) > 0) {
        // If data already exists, update age column with incremental value
        while($row = mysqli_fetch_array($result)){ 
            
            $currentquantity = $row['QUANTITY'];
            $newQuantity= $currentquantity + 1; 
        }
        $sql = "UPDATE cartlist SET quantity='$newQuantity' WHERE arduinoID = '$arduinoID' AND barcode = '$barcode'";
        if(mysqli_query($connect, $sql)){
            
        } else{
    
        }
        echo "Data updated successfully.";
        
    } else 
    
    {
        $sql = "INSERT INTO cartlist VALUES ('','$arduinoID ','$barcode','','$quantity' )";
        if(mysqli_query($connect, $sql)){
    
        } else{
    
        }
        echo "Data inserted successfully.";
    }

    mysqli_close($connect);

?>
