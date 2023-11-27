<?php
if(isset($_POST["submit"])){
// $hostname='localhost';
// $username='root';
// $password='';
include '../../config/dbcredential.php';


session_start();
echo "staffusername: ".$_SESSION["username"];
$staffusername=$_SESSION["username"];
echo "staffrole: ".$_SESSION["role"];
try {
$dbh = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

$content = addslashes(file_get_contents($_FILES['Picture']['tmp_name']));

$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "INSERT INTO itemlist
VALUES ('','{$content}','".$_POST["ItemBarcode"]."','".$_POST["ItemName"]."','".$_POST["ItemStatus"]."','".$_POST["ItemPrice"]."','".$_POST["ItemDetail"]."','$staffusername',now())";


if ($dbh->query($sql)) {
    header("Location: product.php");
}
else{
echo "<script type= 'text/javascript'>alert('Data not successfully Inserted.');</script>";
}

$dbh = null;
}
catch(PDOException $e)
{
echo $e->getMessage();
}

}
?>