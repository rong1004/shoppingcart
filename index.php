<?php
   session_start(); 
    $message="";
    if(count($_POST)>0) {
        include 'config/connection.php';
        //$conn = mysqli_connect("localhost", "root", "", "shoppingcart");
		 // Check connection
         if($connect === false){
            die("ERROR: Could not connect. "
                . mysqli_connect_error());
        }
        
        $results = "
        select * from admin WHERE username='" . $_POST["username"] . "' and passwords = '". $_POST["password"]."'
        ";
        
        $result = mysqli_query($connect, $results);
        //$result = mysqli_query($connect,"select * from admin WHERE username='" . $_POST["username"] . "' and password = '". $_POST["password"]."'");
       
        $row  = mysqli_fetch_array($result);
        if(is_array($row)) {
        $_SESSION["id"] = $row['ID_admin'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["role"] = $row['role'];
        } else {
          ?>
          <script>
          alert('Invalid login details!! Please try again!!')
          </script>
          <?php
        }
    }
    if(isset($_SESSION["id"])) {
        header("location:module/admin/dashboard.php");
    }
?>


<!DOCTYPE html>
<html>
<head>
	<title>User Login</title>
    <link rel="stylesheet" href="style.css">
<style>

</style>

</head>
<body>

<div class="container">

		<h2>SHOPPING CART CALCULATOR ADMIN LOGIN</h2>
	
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<label for="username">User Name:</label>
		<input type="text" name="username" placeholder="username" required>
		<br>
        <label for="password">Password:</label>
		<input type="password" name="password" placeholder="Password" id="myPassword" required>
        <input type="checkbox" onclick="myFunction()">Show Password
        <br>
		<br>
		<button type="submit" name="login_admin" align='center'>Sign In</a></button>
		
		
	</form>
	</div>
</body>
</html>

<script>
function myFunction() {
  var x = document.getElementById("myPassword");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>