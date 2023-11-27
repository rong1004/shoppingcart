<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Shopping Card Calculator add product</title>
     </head>
     <style>
		.adminform{
			background: rgb(193, 250, 212);
			position: absolute;
			display:none;
			z-index: 10;
			width: 550px;
         	height: 850px;
			padding: 0px;
			margin-left: 372px;
			padding-left: 15px;
			padding-right: 15px;
         /* margin-left: 370px; */
		}
      .adminforminput{
		border:1px solid black;
        background: white;
		width: 515px;
		padding: 15px;
      }
	  .adminformtitle{
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
		background-color:rgb(193, 250, 212);
		color: black;
		border: 0px;
		}
		.addbutton{

			display: block;
			position: absolute;
			width: 80px;
			height: 40px;
			margin-left: 1180px;
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
      .backg{
			display:none;
			background: rgb(193, 250, 212);
			position: absolute;
			height: 706px;
			z-index: 10;
			
		}
		@media screen and (max-width: 600px) {
			.adminform{
				margin-left: -7px;
				width: 396px;
			}
			.addbutton{
				margin-left: 316px;
			}
			.adminforminput{
				width:372px;
			}
			table{
			width: 372px;
			
		}

		}

	</style>
   <body>
   <button class="addbutton" id="addbutton" onclick="openForm()">Add</button>
   <div class="backg" id="backg">								
                     <div class="adminform" id="adminform"> 
								   	<div class="adminformtitle">
										<button class="previous" onclick="closeForm()"><h>&#8249;</h></button>
										<div class="title"><h>Add Product details</h></div>
										 
									   </div>
   												<div class="adminforminput">
                                       <form name="myform" method="POST" action="product_insertProduct.php" onsubmit="return validateForm()"  enctype="multipart/form-data">

													<table>
														<tr>
															<th><label for="img">Image:</label></th>
															<td><input type="file" name="Picture" required></td>
                                             
               
														</tr>
														<tr>
															<th><label for="ItemBarcode">ItemBarcode:</label></th>
															<td><input type="text" name="ItemBarcode" id="ItemBarcode" required></td>

														</tr>
														<tr>
															<th><label for="ItemName">ItemName:</label></th>
															<td><input type="text" name="ItemName" id="ItemName" required></td>

														</tr>
														<tr>
															<th><label for="ItemStatus">ItemStatus:</label></th>
															<td><select id="ItemStatus" name="ItemStatus" required>
															<option value="">Choose....</option>
                                                   <option value="active">Active</option>
                                                   <option value="inactive">Inactive</option>
                                                </select></td>

														</tr>
														<tr>
															<th><label for="ItemPrice">ItemPrice:</label></th>
															<td><input type="text" name="ItemPrice" id="ItemPrice" required></td>

														</tr>
														<tr>
															<th> <label for="ItemDetail">ItemDetail:</label></th>
															<td><input type="text" name="ItemDetail" id="ItemDetail" required></td>
														</tr>
														<tr>
															<th></th>
															<td><input type="submit" name="submit" value="Add"></td>
														</tr>
													</table>
													</form> 

													
													<!-- </form> -->
												</div>
								</div>
                        </div>
                     </body>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	  <script>

function closeForm( ) {
	
	document.getElementById("adminform").style.display = "none";
	document.getElementById("addbutton").style.display = "block";
	document.getElementById("backg").style.display = "none";
}
function openForm( ) {
	
	document.getElementById("adminform").style.display = "block";
	document.getElementById("backg").style.display = "block";
	//document.getElementById("addbutton").style.display = "none";
}
function validateForm(){
	let x = document.myform.ItemPrice.value; 
 	if (isNaN(x)) {
 	  alert("Enter Numeric value on itemprice field only. e.g., '99.99'");
 	  return false;
 	}

}
</script>
</html>

