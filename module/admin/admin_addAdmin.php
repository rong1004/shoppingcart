<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Shopping Card Calculator add admin</title>
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
		background-color: rgb(193, 250, 212);
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
			background:rgb(193, 250, 212);
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
		#usernameresult, #emailresult, #passwordresult{
			color: red;
			font-size: x-small;
			
		}

	</style>
   <body>
   <button class="addbutton" id="addbutton" onclick="openForm()">Add</button>
   <div class="backg" id="backg">
   								<div class="adminform" id="adminform"> 
								   	<div class="adminformtitle">
										<button class="previous" onclick="closeForm()"><h>&#8249;</h></button>
										<div class="title"><h>Add Admin details</h></div>
										 
									</div>
   												<div class="adminforminput"> 
												   <form name="myform" method="POST" action="admin_insertAdmin.php" onsubmit="return validateForm()"  enctype="multipart/form-data">

													<table>
														
														<tr>
															<th><label for="firstName">First Name:</label></th>
															<td><input type="text" name="first_name" id="firstName" required></td>
														</tr>
														<tr>
															<th><label for="lastName">Last Name:</label></th>
															<td><input type="text" name="last_name" id="lastName" required></td>
														</tr>
														<tr>
															<th><label for="Gender">Gender:</label></th>
															<td>
															<select id="Gender" name="gender" required>
															<option value="">Choose....</option>
																<option value="Male">Male</option>
																<option value="Female">Female</option>
															</select>
															</td>
														</tr>
														<tr>
															<th><label for="Address">Address:</label></th>
															<td><input type="text" name="address" id="Address" required></td>
														</tr>
														<tr>
															<th><label for="emailAddress">Email Address:</label></th>
															<td><input type="text" name="email" id="emailAddress" onChange="checkemail()" required>
															<div id="emailresult"></div>
															</td>
														</tr>
														<tr>
															<th><label for="username">username:</label></th>
															<td><input type="text" name="username_staff" id="username" onChange="checkusername()" required>
															<div id="usernameresult"></div>
															</td>
														</tr>
														<tr>
															<th><label for="password">Password:</label></th>
															<td><input type="password" name="password" id="password" onChange="checkpassword()" required>
															<div id="passwordresult"></div>
															</td>
														</tr>
														<tr>
															<th><label for="role">Role:</label></th>
															<td><select id="role" name="role" required>
																<option value="">Choose....</option>
																<option value="admin">Admin</option>
																<option value="staff">Staff</option>
															</select></td>
														</tr>
														<tr>
															<th></th>
															<td><input type="submit" value="Submit" id="button"></td>
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
		
		function checkusername(){
			var username=document.getElementById('username').value;
    		$.ajax({
    		    type: "GET",
    		    url: "admin_checkusername.php?username="+username,
			
    		    success : function(data) { 
					$('#usernameresult').html(data);

    		    }
    		}); 
		}
		function checkemail(){
			var emailAddress=document.getElementById('emailAddress').value;
    		$.ajax({
    		    type: "GET",
    		    url: "admin_checkemail.php?emailAddress="+emailAddress,
			
    		    success : function(data) { 
					$('#emailresult').html(data);

    		    }
    		}); 
		}
		function checkpassword(){
			var password=document.getElementById('password').value;
    		$.ajax({
    		    type: "GET",
    		    url: "admin_checkpassword.php?password="+password,
			
    		    success : function(data) { 
					$('#passwordresult').html(data);

    		    }
    		}); 
		}


// function submit( ) {

//    var firstName     =document.getElementById('firstName').value;
//    var lastName      =document.getElementById('lastName').value;
//    var Gender        =document.getElementById('Gender').value;
//    var Address       =document.getElementById('Address').value;
//    var emailAddress  =document.getElementById('emailAddress').value;
//    var username      =document.getElementById('username').value;
//    var password      =document.getElementById('password').value;
//    var role          =document.getElementById('role').value;
       
//    alert(firstName +lastName +Gender + Address + emailAddress + username + password +role );
//    $.ajax({
// 					 url:'admin_insertAdmin.php',
// 					 method:'POST',
// 					 data:{
//                   dfirstName:firstName,
//                   dlastName:lastName,
//                   dGender:Gender,
//                   dAddress:Address,
//                   demailAddress:emailAddress,
//                   dusername:username,
//                   dpassword:password,
//                   drole:role         
				 
// 					 },
// 					 success:function(response){
// 						 alert(response);
// 						 window.location.assign("admin.php");
// 					 },
//                 error:function(){
//                   alert("no responds");
//                 }
// 				 });
 
// }
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
</script>
</html>
