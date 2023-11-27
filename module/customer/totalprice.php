<?php
$id=$_GET['arduinoID'];

 include '../../config/connection.php';

 $totalprice = mysqli_query($connect,"select sum(itemlist.ItemPrice*cartlist.QUANTITY) 
										FROM cartlist INNER JOIN itemlist 
										ON cartlist.barcode=itemlist.ItemBarcode 
										where cartlist.arduinoID = '$id'; ");
                              $tpo="0.00";
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>cart</title>
	  
   
   </head>
   <body>
    	
    <div class="item-box1">
        <?php
        
    while($ttotalprice = mysqli_fetch_array($totalprice)){
      $tp=$ttotalprice["sum(itemlist.ItemPrice*cartlist.QUANTITY)"];}
      if($tp==NULL){
         echo $tpo;
      }else{
         echo $tp;
      }
      
    ?>
    </div>
    


   </body>
</html>