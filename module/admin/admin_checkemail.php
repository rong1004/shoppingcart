<?php 

$emailAddress     = $_GET['emailAddress'];


include '../../config/connection.php';



$results = "SELECT * FROM admin WHERE email = '$emailAddress'";
    $result =mysqli_query($connect, $results);
    if (mysqli_num_rows($result) > 0) {
        // If data already exists, update age column with incremental value
       echo "email already taken!";
		
      ?><script>
        document.getElementById('button').disabled = true;
      </script><?php 
    } else {
        if (!filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            echo  "Invalid email format";
          }else{
            echo "";
        ?><script>
        document.getElementById('button').disabled = false;
      </script><?php
      }
        
    }

mysqli_close($connect);
?>
