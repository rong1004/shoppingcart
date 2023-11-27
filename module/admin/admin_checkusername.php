<?php 

$username_staff     = $_GET['username'];


include '../../config/connection.php';



$results = "SELECT * FROM admin WHERE username = '$username_staff'";
    $result =mysqli_query($connect, $results);
    if (mysqli_num_rows($result) > 0) {
        // If data already exists, update age column with incremental value
       echo "Username already taken!";
		
      ?><script>
        document.getElementById('button').disabled = true;
      </script><?php 
    } else {
        echo "";
        ?><script>
        document.getElementById('button').disabled = false;
      </script><?php
    }

mysqli_close($connect);
?>
