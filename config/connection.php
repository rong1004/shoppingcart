<?php
include 'dbcredential.php';

$connect = mysqli_connect($servername, $username, $password, $dbname);

if(!$connect){
	die("Connection failed: " .mysqli_connect_error());
}
else{
    // echo 'good';
}

?>