<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$delimiter_array = array("/",".","_");
$replaced_str = str_replace($delimiter_array, '$', $path);
$components = explode('$', $replaced_str);
//  var_dump($components);
$first_part = $components [4];

session_start();

	// echo "staffusername: ".$_SESSION["username"];
	// echo "staffrole: ".$_SESSION["role"];
if(!isset($_SESSION["id"])) {
	header("location:../../index.php");
	
}

?>
<?php
	
	if(isset($_POST["name"]))
	{
		$ID = $_POST['name'];
	}else{
		echo "no";
		$ID = $_GET['name'];
	}
    
    include '../../config/connection.php';
	 $results = "
		SELECT * FROM admin where ID_admin=$ID
		";
		$result = mysqli_query($connect, $results);
	while($row = mysqli_fetch_array($result)){ 
		$ID_admin=$row["ID_admin"]  ;
		$first_name=$row["first_name"] ;
		$last_name=$row["last_name"] ;
		$gender=$row["gender"] ;
		$address=$row["address"] ;
		$email=$row["email"] ;
		$username=$row["username"] ;
		$password=$row["passwords"] ;
		$role=$row["role"] ;
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
			background: rgb(46, 255, 123);
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
		background-color: rgb(46, 255, 123);
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
		.eyeinfield{
			margin-left:-28px;
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
												
												<div class="title"><h>Account details</h></div>
												
											</div>
														<div class="adminformeinput"> 
															<table>
																<tr>
																	<th><label for="ID_admin">ID admin:</label></th>
																	<td><input type="text" name="ID_admin" id="ID_admin" value="<?php echo $ID_admin; ?>" disabled></td>
																</tr>
																<tr>
																	<th><label for="firstName">First Name:</label></th>
																	<td><input type="text" name="first_name" id="firstName" value="<?php echo $first_name; ?>"></td>
																</tr>
																<tr>
																	<th><label for="lastName">Last Name:</label></th>
																	<td><input type="text" name="last_name" id="lastName" value="<?php echo $last_name; ?>"></td>
																</tr>
																<tr>
																	<th><label for="Gender">Gender:</label></th>
																	<td>
																		<select id="Gender" name="gender">
																			<option value="Male" <?php if($gender=="Male"){echo 'selected';}else{echo ' ';} ?>>Male</option>
																			<option value="Female" <?php if($gender=="Female"){echo 'selected';}else{echo ' ';} ?>>Female</option>
																		</select></td>
																</tr>
																<tr>
																	<th><label for="Address">Address:</label></th>
																	<td><input type="text" name="address" id="Address" value="<?php echo $address; ?>"></td>
																</tr>
																<tr>
																	<th><label for="emailAddress">Email Address:</label></th>
																	<td><input type="text" name="email" id="emailAddress" value="<?php echo $email; ?>"></td>
																</tr>
																<tr>
																	<th><label for="username">username:</label></th>
																	<td><input type="text" name="username" id="username" value="<?php echo $username; ?>"></td>
																</tr>
																<tr>
																	<th><label for="password">Password:</label></th>
																	<td><input type="password" name="password" id="password" value="<?php echo $password; ?>">
																		<i class="fa fa-eye eyeinfield" onclick="myFunction()"></i>
																	</td>
																</tr>
																<tr>
																	<th><label for="role">Role:</label></th>
																	<td><input type="text" name="role" id="role" value="<?php echo $role; ?>" disabled></td>
																</tr>
																
																<tr>
																	<th></th>
																	<td><input type="submit" onclick="submit()" value="Update" ></td>
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
		function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
function submit( ) {
	var ID_admin     =document.getElementById('ID_admin').value;
   var firstName     =document.getElementById('firstName').value;
   var lastName      =document.getElementById('lastName').value;
   var Gender        =document.getElementById('Gender').value;
   var Address       =document.getElementById('Address').value;
   var emailAddress  =document.getElementById('emailAddress').value;
   var username      =document.getElementById('username').value;
   var password      =document.getElementById('password').value;
   var role          =document.getElementById('role').value;
       
//    alert(firstName +lastName +Gender + Address + emailAddress + username + password +role );
   $.ajax({
					 url:'admin_updateAdminmysql.php',
					 method:'POST',
					 data:{
						ID_admin:ID_admin,
                  dfirstName:firstName,
                  dlastName:lastName,
                  dGender:Gender,
                  dAddress:Address,
                  demailAddress:emailAddress,
                  dusername:username,
                  dpassword:password,
                  drole:role         
				 
					 },
					 success:function(response){
						 alert("successful updated");
						 window.location.assign("admin.php");
					 },
                error:function(){
                  alert("no responds");
                }
				 });
 
}

</script>
</html>
