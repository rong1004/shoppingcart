<?php 
$firstName          = $_POST['first_name'];     
$lastName           = $_POST['last_name'];      
$Gender             = $_POST['gender'];
$Address            = $_POST['address'];
$emailAddress       = $_POST['email'];
$username_staff     = $_POST['username_staff'];
$passwords          = $_POST['password'];
$role               = $_POST['role'];

include '../../config/connection.php';



$results = "SELECT * FROM admin WHERE username = '$username_staff'";
    $result =mysqli_query($connect, $results);
    if (mysqli_num_rows($result) > 0) {
        // If data already exists, update age column with incremental value
       
		?> <script>alert('Username already taken!! Please select a new username!! \n ThankYou!!!');</script><script> window.history.go(-1); </script><?php 
		
        
    } else {
				$sql = "INSERT INTO admin VALUES (NULL,'$firstName','$lastName','$Gender','$Address','$emailAddress','$username_staff','$passwords','$role' )";
				if(mysqli_query($connect, $sql)){

				} else{

				}
				echo "Data inserted successfully.";
				header("Location: admin.php");
    }









mysqli_close($connect);
?>

