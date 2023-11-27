<?php
//fetch.php
include '../../../config/connection.php';
$date = date('Y-m-d');
$query = "
		SELECT * FROM itemlist WHERE ItemAddedDate='$date' ORDER BY Item_id 
		";
	
    $result = mysqli_query($connect, $query);
//$row= mysqli_fetch_assoc( $result);
//print_r($row);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>cart</title>
	  <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	  <style>
		.listbox{
			/* padding: 10px; */
			/* background: #f0f0f0; */
			/* height:650px; */
			/* max-height: 650px; */
			/* overflow-y: scroll; */
			/* width: 735px; */
			/* margin-left: 270px; */

			/* height:550px;
			overflow-y: scroll;
			width: 1147px;
			position: absolute;
			left: 4%;
			border:1px solid black; */
}

@media screen and (max-width: 600px) {
	.listbox{
			width: 100%;
		 	margin: 0px; 
			padding: 0px;
		  
	}
	.listbox .item-box{
		/* margin:0px; */
		width: inherit;
	}
	.listbox .box{
		/* width: 26%; */
		/* border: 1px solid red; */
	}
	.listbox .box2{
		/* width: 40%; */
		/* border: 1px solid red; */
	}
	.listbox .box3{
		/* width: 26%; */
		/* border: 1px solid red; */
		/* padding-top: 10px; */
	}
	.listbox .img{
			width: 80px;
			height: 80px;
			/* background-color: black; */
			margin-top: 20px;
			margin-left: 5px;
			border-radius: 19%;
			border: 1px solid #e1e1e1;
			overflow: hidden;
		}
	 img{
			position: relative;
			width: 5px;
			height: inherit;
			
			
			
		}
  }
      

		.item-box{
			background-color: white;
			border: 5px solid #e1e1e1;
			height: inherit;
			/* width: 59%; */
			/* margin-left: 20%; */
			border-radius: 28px;
			display:flex;
		}

		.box{
			/* float: left; */
			width: 26%;
			/* height: 135px; */
			margin-left: 3px;
			/* margin-right: -19px; */
			/* margin-top: 7px; */
			font-family: system-ui;
			font-size: 18px;
			color: #606060;
			/* border: 1px solid black; */
			
			}
		.box2{
			/* float: left; */
			width: 50%;
			/* height: 135px; */
			/* margin-left: 21px; */
			/* margin-right: -19px; */
			/* margin-top: 7px; */
			font-family: system-ui;
			font-size: 18px;
			color: #606060;
			/* border: 1px solid black; */
			padding: 10px;
		}
		.box3{
			/* float: left; */
			width: 25%;
			/* height: 135px; */
			/* margin-left: 21px; */
			/* margin-right: -19px; */
			/* margin-top: 7px; */
			font-family: system-ui;
			font-size: 18px;
			color: #606060;
			/* border: 1px solid black; */
			display:grid;
			}
			
		.img{
			width: 130px;
			height: 130px;
			border-radius: 19%;
			overflow: hidden;
			border: 1px solid #e1e1e1;
			margin-top: 5px;
			margin-left: 17px;
		}
		img{
			position: relative;
			width: inherit;
			height: inherit;
			
			
			/* border: 1px solid black; */
		}
		.productitemlebel{
						width: 100%;
						/* margin-bottom: 12px; */
						display:flex;
						font-weight: bold;
						font-size: 10px;
						/* border: 1px solid black; */
					}
		.productitemlebelA{
						width: 15%;
						/* border: 1px solid black; */
						
					}
					.productitemlebelB{
						width: 80%;
						
					}
					.productitemlebelB	input[type=text], .productitemlebelB textarea {
						width: 100%;}
						.dot {
						height: 10px;
						width: 10px;
						background-color: #bbb;
						border-radius: 50%;
						display: inline-block;
						}
						.button{
					/* border: 1px solid black; */
				}	.light{
						font-weight: normal;
						font-style: italic;
					}

						.active{
							color: #13ff13;
							
						}	
						.noactive {
							color: #ff1313;
							
						}

						.active .dot{
							background-color: #13ff13;
							
						}	
						.noactive .dot {
							background-color: #ff1313;
							
						}
						button{
							width: 100%;
							border-radius: 8px;
							border: 0px;
							background-color: #13ff13;
							color: white;
							font-weight: bold;
							
						}
		.deletebutton{
            
            padding-left: 19px;
            padding-right: 19px;
            border-radius: 27px;
            background-color: #ff0606;
			/* margin-top:50px; */
			border:0px;
        }
				/* Chrome, Safari, Edge, Opera */
		input::-webkit-outer-spin-button,
		input::-webkit-inner-spin-button {
		-webkit-appearance: none;
		margin: 0;
		}

		/* Firefox */
		input[type=number] {
		-moz-appearance: textfield;
		
		width: 30px;}

	  </style>
   </head>
   <body>	
			 <?php 
					$total = "select * FROM itemlist WHERE ItemAddedDate='$date' ORDER BY Item_id ";
					if ($resulttotal = mysqli_query($connect, $total)) {
				
						// Return the number of rows in result set
						$rowcount = mysqli_num_rows( $resulttotal );
						
					 }
					 if ($rowcount > 0){
						// echo "total".$rowcount;
			?> 
				<!-- <table>
				<tr>
					<th>cartlist.barcode 		</th>
					<th>itemlist.ItemBarcode  </th>
					<th>itemlist.ItemImage </th>
					<th>itemlist.ItemName   </th>
					<th>itemlist.ItemPrice  </th>
					<th>cartlist.QUANTITY		</th>

				</tr> -->
				<?php 
				 
					$item_list=1;
				?>
			<div class='listbox'>
				<?php
				
				while($row = mysqli_fetch_array($result)){ 
				?>
				
					<div class="item-box">
						<div class="box">
						
						
						
							<div class="img">
								<img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['ItemImage']) ?>"  />
							
							</div>
						
						</div>
						<div class="box2">
						<?php   $Item_id=$row["Item_id"]    ?>
							<div class="productitemlebel">
								<div class="productitemlebelA">#</div>
								<div class="productitemlebelB"><input type="text" name="name" value="<?php echo $itembarcode=$row["ItemBarcode"]  ?>" disabled></div>
								
							</div>
							<div class="productitemlebel">
								<div class="productitemlebelA"><i class="fa fa-cube"></i></div>
								<div class="productitemlebelB"><textarea name="name" rows="3" disabled ><?php echo $row["ItemName"]     ?></textarea></div>
								
							</div>
							<div class="productitemlebel">
								<div class="productitemlebelA"><i class="fa fa-credit-card"></i></div>
								<div class="productitemlebelB"><input type="text" name="name" value="<?php echo "$" .$row["ItemPrice"]    ?>" disabled></div>
								
							</div>
						
						</div>
						
						<div class="box3">
						<div class="button">
							<div class="productitemlebel">
								
								<div class="productitemlebelB light"><?php echo $row["ItemAddedDate"]    ?></div>
							</div>
							</div>
							<div class="button">
							<div class="productitemlebel <?php if ($row["ItemStatus"] =="active") {echo "active"; } else  {echo "noactive";}?>">
								<div class="productitemlebelA"><span class="dot"></span></div>
								<div class="productitemlebelB"><?php echo $row["ItemStatus"]    ?></br></div>
							</div>
							</div>
							<div class="button">
							<div class="productitemlebel">
								<div class="productitemlebelB"><button onclick="location.href='product_editproduct.php?name=<?php echo $Item_id?>'">Edit</button></div>
								
								
							</div>
							</div>
							
						</div>

					</div>
					<br>
				

  					<?php $item_list++; 
				
				} 

				}else
				
				echo "No product added today ";
				
				
			
				
				
			
					
					?>
				
			</div>


   </body>

<script>








</script>
</html>