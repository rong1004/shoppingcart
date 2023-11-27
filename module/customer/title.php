<?php
$id=$_GET['arduinoID'];

 include '../../config/connection.php';

 $totalprice = mysqli_query($connect,"select sum(itemlist.ItemPrice*cartlist.QUANTITY) 
										FROM cartlist INNER JOIN itemlist 
										ON cartlist.barcode=itemlist.ItemBarcode 
										where cartlist.arduinoID = '$id'; ");

?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>cart</title>
      <style>
		.title{
			/* margin-top:5px; */
			width: 100%;
			/* margin-left: 135px; */
        }
        .alignright{
        text-align: right;
        }
        .carttitle{
            
            font-size: 20px;
        }
        .resetbutton{
            
            padding-left: 35px;
            padding-right: 35px;
            border-radius: 27px;
            background-color: #ff0606;
        }

@media screen and (max-width: 600px) {
	.title{
			width: 100%;
            margin-top: 6px;
		 	margin: 0px; 
		  
	}
    .resetbutton{
            margin-top: 5px;
            
        }
}
</style>
   </head>
   <body>
   <div class="row title">
        <div class="col-8 carttitle">Cart List: <?php echo $id ?> </div>
        <div class="col-4 alignright" >
          <button class="resetbutton" onclick="reset()">Reset</button>
        </div>
    </div>

   </body>

   <script>

function reset( ) {
    var id=<?php echo $id ?>;
   $.ajax({
					 url:'deleteall.php',
					 method:'POST',
					 data:{
						 
						 arduinoid:id
				 
					 },
					 success:function(response){
						 alert(" updated");
					 }
				 });
 
}


</script>
</html>

