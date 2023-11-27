<?php 
echo $Item_id=$_POST['Item_id'];

echo $ItemBarcode=$_POST['ItemBarcode'];
echo $ItemName	=$_POST['ItemName'];
echo $ItemStatus	=$_POST['ItemStatus'];
echo $ItemPrice 	=$_POST['ItemPrice'];
echo $ItemDetail	=$_POST['ItemDetail'];

?>

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
echo $date = date('Y-m-d');
try {
	$dbh = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);


if(empty($_FILES['Picture']['tmp_name'])) {
	$sql = "UPDATE itemlist SET 
                        
	
ItemBarcode	='$ItemBarcode',
ItemName	='$ItemName',
ItemStatus	='$ItemStatus',	
ItemPrice 	='$ItemPrice',	
ItemDetail	='$ItemDetail',
lastupdateby ='$staffusername',
ItemAddedDate ='$date'
	
	where Item_id= $Item_id ";

	
}else{
$content = addslashes(file_get_contents($_FILES['Picture']['tmp_name']));
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // <== add this line
$sql = "UPDATE itemlist SET 
                        
ItemImage	='$content',	
ItemBarcode	='$ItemBarcode',
ItemName	='$ItemName',
ItemStatus	='$ItemStatus',	
ItemPrice 	='$ItemPrice',	
ItemDetail	='$ItemDetail',
lastupdateby ='$staffusername',
ItemAddedDate ='$date'
		
	
	where Item_id= $Item_id ";
}

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