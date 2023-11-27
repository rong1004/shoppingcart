<?php
//fetch.php
include '../../config/connection.php';
if(isset($_POST["query"]))
	{
		$search = mysqli_real_escape_string($connect, $_POST["query"]);
		
		$query = "
		SELECT * FROM admin
		WHERE first_name LIKE '%".$search."%'
		OR    last_name  LIKE '%".$search."%' 
		OR    gender     LIKE '%".$search."%' 
		OR    address    LIKE '%".$search."%' 
		OR    email      LIKE '%".$search."%'
		OR    username   LIKE '%".$search."%'
		";
	}
else
	{
		$query = "
		SELECT * FROM admin ORDER BY ID_admin
		";
	}
	$result = mysqli_query($connect, $query)
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
			/* padding: 10px;
			background: #f0f0f0; */
			/* height:650px;
			max-height: 650px;
			overflow-y: scroll; */
			/* width: 735px; */
			/* margin-left: 270px; */
		}


			@media screen and (max-width: 600px) {
				.listbox{
						width: 100%;
						margin: 0px; 
						padding: 0px;
					
				}
				.listbox .item-box{
					/* margin:7px; */
					/* width: 370px; */
				}
				.listbox .box{
					/* width: 110px; */
					/* border: 1px solid red; */
				}
				.listbox .box2{
					/* width: 110px; */
					/* border: 1px solid red; */
				}
				.listbox .box3{
					/* width: 110px; */
					/* border: 1px solid red; */
					/* padding-top: 10px; */
				}
				.listbox .img{
						width: 100px;
						height: 100px;
						/* background: black; */
						margin-top: 10px;
						margin-left: 0px;
					}
				img{
						position: relative;
						width: inherit;
						height: inherit;
						overflow: hidden;
						border-radius: 19%;
						/* border: 1px solid black; */
					}
			}
				

					.item-box{
						background-color: white;
						border: 5px solid #e1e1e1;
						height: 150px;
						/* width: 59%; */
						/* margin-left: 20%; */
						border-radius: 28px;
					}

					.box{
						float: left;
				width: 26%;
				height: 135px;
				margin-left: 21px;
				margin-right: -19px;
				margin-top: 7px;
				font-family: system-ui;
				font-size: 18px;
				color: #606060;
				/* border: 1px solid black; */
				/* padding-top: 10px; */
				text-align: right;
						
						}
					.box2{
						float: left;
						width: 45%;
						height: 135px;
						margin-left: 21px;
						margin-right: -19px;
						margin-top: 7px;
						font-family: system-ui;
						font-size: 18px;
						color: #606060;
						padding-left: 20px;
						/* text-align: center; */
						/* border: 1px solid black; */
						/* padding-top: 10px; */
					}
					.box3{
						float: left;
						width: 20%;
						height: 135px;
						margin-left: 21px;
						margin-right: -19px;
						margin-top: 7px;
						font-family: system-ui;
						font-size: 18px;
						color: #606060;
						/* border: 1px solid black; */
						align-content: center;
				display: grid;
						}
						
					.img{
						width: 130px;
						height: 130px;
						
						margin-top: 5px;
						margin-left: 17px;
					}
					img{
						position: relative;
						width: inherit;
						height: inherit;
						overflow: hidden;
						border-radius: 19%;
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
					button{
							width: 100%;
							border-radius: 8px;
							border: 0px;
							background-color: #13ff13;
							color: white;
							font-weight: bold;
						}
					.deletebutton{
						
						padding-left: 25px;
						padding-right: 25px;
						border-radius: 27px;
						background-color: #4aff3b;
						margin-top:50px;
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
					
					width: 45px;}

	  </style>
   </head>
   <body>	
			<!-- <?php 
					$total = "select * FROM admin";
					if ($resulttotal = mysqli_query($connect, $total)) {
				
						// Return the number of rows in result set
						$rowcount = mysqli_num_rows( $resulttotal );
						
					 }
					 if ($rowcount > 0){
						echo "total".$rowcount;
			?> -->
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
			<div class='listbox' id='listbox'>
				<?php
				while($row = mysqli_fetch_array($result)){ 
				?>
				
					<div class="item-box">
						<div class="box">
						<!-- <i class="fa fa-user icon">Nama</i></br> -->
						<i class='fas fa-house-user'> User:</i></br>
						<i class="fa fa-envelope icon"> Email:</i></br>
						<i class="fa fa-venus-mars"> Gender:</i></br>
						<i class='fas fa-user-cog'> Role:</i></br>
						
						
						
						
						</div>
						<div class="box2">
						<!-- <?php echo $ID_admin=$row["first_name"]." "  .$row["last_name"]?></br> -->
						<?php   $ID_admin=$row["ID_admin"]    ?>
						<?php echo $row["username"]    ?></br>
						<?php echo $row["email"]    ?></br>
						<?php echo $row["gender"]    ?></br>
						<?php echo $row["role"]    ?></br>
						
						</div>
						
						<div class="box3">
						<div class="productitemlebel">
						<div class="productitemlebelB"><button onclick="location.href='admin_editAdmin.php?name=<?php echo $ID_admin?>'">Edit</button>
						</div>
						</div>
						</div>

					</div>
					<br>
				

  					<?php $item_list++; 
				
				} 

				}else
				
				echo "empty"?>
				
			</div>


   </body>

<script>








</script>
</html>