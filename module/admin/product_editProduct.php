<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$delimiter_array = array("/",".","_");
$replaced_str = str_replace($delimiter_array, '$', $path);
$components = explode('$', $replaced_str);
//  var_dump($components);
$first_part = $components [4];

?>

<?php
	
	$ID = $_GET['name'];
    
    include '../../config/connection.php';
	 $results = "
		SELECT * FROM itemlist where Item_id=$ID
		";
		$result = mysqli_query($connect, $results);
	while($row = mysqli_fetch_array($result)){ 
		$Item_id		=$row["Item_id"]  ;
		$ItemImage		=$row["ItemImage"] ;
		$ItemBarcode	=$row["ItemBarcode"] ;
		$ItemName		=$row["ItemName"] ;
		$ItemStatus		=$row["ItemStatus"] ;
		$ItemPrice 		=$row["ItemPrice"] ;
		$ItemDetail		=$row["ItemDetail"] ;
		$lastupdateby 	=$row["lastupdateby"] ;
		$ItemAddedDate	=$row["ItemAddedDate"] ;
	}
	 
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	<style>
		.adminforme{
			background: rgb(193, 250, 212);
			position: absolute;
			display:block;
			z-index: 10;
			width: 550px;
         	height: 699px;
			padding: 0px;
			margin-left: 372px;
			padding-left: 15px;
			padding-right: 15px;
         /* margin-left: 370px; */
		}
      .adminformeinput{
		border:1px solid black;
        background: white;
		width: 515px;
		padding: 15px;
      }
	  .adminformetitle{
		height:54px;
	  }
		.previous:hover {
		background-color: #ddd;
		color: black;
		}

		.previous {
		width: 31px;
		text-align: center;
		height: 54px;
		background-color: rgb(193, 250, 212);
		color: black;
		border: 0px;
		}
		.addbutton{

			display: block;
			position: absolute;
			width: 80px;
			height: 40px;
			margin-left: 1124px;
			background: #00abff;
			color: white;
			border: 0px;
			border-radius: 13px;
			margin-top: 26px;
		}
		.title{
			margin-left: 44px;
		}
		table{
			width: 476px;
			height: 427px;
		}
		table, td, th, tr{
			/* border:1px solid black; */
			
		}
		th{
			text-align:right;
		}
		.backgEdit{
			display:block;
			background: rgb(46, 255, 123);
			position: absolute;
			height: 706px;
			z-index: 10;
			
		}
		.img{
			width: 130px;
    		height: 130px;
    		margin-top: -2px;
    		margin-left: 51px;
		}
		img{
			position: relative;
			width: inherit;
			height: inherit;
			overflow: hidden;
			border-radius: 19%;
			/* border: 1px solid black; */
		}
		@media screen and (max-width: 600px) {
			
			.adminforme{
				margin-left: -7px;
				width: 396px;
			}
			.addbutton{
				margin-left: 316px;
			}
			.adminformeinput{
				width:372px;
			}
			table{
			width: 372px;
			
		}


		}
.hidden {
  display: none;
}

	</style>
  </head>
  <body>




    <div class="container">
		<div class="row">
			<?php include 'navbar.php';?>
			
		</div>
		<div class="backgEdit" id="backgEdit">
											<div class="adminforme" id="adminforme"> 
												<div class="adminformetitle">
													<button class="previous" onclick="window.location.assign('product.php');"><h>&#8249;</h></button>
													<div class="title"><h>Product details</h></div>
													
												</div>
															<div class="adminformeinput"> 
															
													<table><form name="myform" method="POST" action="product_updateProductmysql.php" onsubmit="return validateForm()" enctype="multipart/form-data">
															
														<tr>
															<th><label for="Item_id">Item_id:</label></th>
															<td><input type="text" name="Item_id" id="Item_id" value="<?php echo $Item_id; ?>" disabled></td>
																<input type="text" class="hidden" name="Item_id" id="Item_id" value="<?php echo $Item_id; ?>" >
														</tr>
														<tr>
															<th><label for="img">Image:</label></th>
															<td><div class="img">
																	<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($ItemImage) ?>"  />
																
																</div>
																<input type="file" name="Picture"></td>
														</tr>
														<tr>
															<th><label for="ItemBarcode">ItemBarcode:</label></th>
															<td><input type="text" name="ItemBarcode" id="ItemBarcode" value="<?php echo $ItemBarcode; ?>"></td>

														</tr>
														<tr>
															<th><label for="ItemName">ItemName:</label></th>
															<td><input type="text" name="ItemName" id="ItemName" value="<?php echo $ItemName; ?>"></td>

														</tr>
														<tr>
															<th><label for="ItemStatus">ItemStatus:</label></th>
															<td><select id="ItemStatus" name="ItemStatus">
																<option value="active"  <?php if($ItemStatus=="active"){echo 'selected';}else{echo ' ';} ?>>Active</option>
																<option value="inactive" <?php if($ItemStatus=="inactive"){echo 'selected';}else{echo ' ';} ?>>Inactive</option>
                                                			</select></td>

														</tr>
														<tr>
															<th><label for="ItemPrice">ItemPrice:</label></th>
															<td><input type="text" name="ItemPrice" id="uItemPrice" value="<?php echo $ItemPrice; ?>"></td>

														</tr>
														<tr>
															<th> <label for="ItemDetail">ItemDetail:</label></th>
															<td><input type="text" name="ItemDetail" id="ItemDetail" value="<?php echo $ItemDetail; ?>"></td>
														</tr>
														<tr>
															<th> <label for="lastupdateby">lastupdateby:</label></th>
															<td><input type="text" name="lastupdateby" id="lastupdateby" value="<?php echo $lastupdateby; ?>" disabled></td>
														</tr>
														<tr>
															<th> <label for="ItemAddedDate">ItemAddedDate:</label></th>
															<td><input type="text" name="ItemAddedDate" id="ItemAddedDate" value="<?php echo $ItemAddedDate; ?>" disabled></td>
														</tr>
														<tr>
															<th></th>
															<td><input type="submit" name="submit" value="Update"></form> 
															<button  onclick="location.href='product_deleteproduct.php?pname=<?php echo $Item_id?>'">DeleteProduct</button>
													</td>
															
														</tr>
													</table>
																
																
																<!-- </form> -->
															</div>
											</div>

		</div>
		
						
    </div>
    
  </body>


   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
   <script>

function submit( ) {

	var ItemImage	  	=document.getElementById('ItemImage').value;
   	var ItemBarcode  	=document.getElementById('ItemBarcode').value;
   	var ItemName	  	=document.getElementById('ItemName').value;
   	var ItemStatus	  	=document.getElementById('ItemStatus').value;
   	var ItemPrice 	  	=document.getElementById('ItemPrice').value;
   	var ItemDetail	  	=document.getElementById('ItemDetail').value;
   	
       
   alert(ItemImage	+ ItemBarcode + ItemName	  + ItemStatus	  + ItemPrice 	  + ItemDetail );
   $.ajax({
					//  url:'product_updateProductmysql.php',
					 method:'POST',
					 data:{
						dItem_id    :Item_id,
						dItemImage	:ItemImage	,
						dItemBarcode :ItemBarcode ,
						dItemName	:ItemName	,
						dItemStatus	:ItemStatus	,
						dItemPrice 	:ItemPrice 	,
						dItemDetail	:ItemDetail	
					 },
					 success:function(response){
						 alert(response);
						 window.location.assign("product.php");
					 },
                error:function(){
                  alert("no responds");
                }
				 });
 
}
function validateForm(){
	
	let x = document.myform.uItemPrice.value; 
	
 	if (isNaN(x)) {
 	  alert("Enter Numeric value on itemprice field only. e.g., '99.99'");
 	  return false;
 	}

}

</script>
</html>

