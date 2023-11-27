<?php 
$ID_admin    = $_POST['ID_admin'];
$firstName    = $_POST['dfirstName'];
$lastName     = $_POST['dlastName'];
$Gender       = $_POST['dGender'];
$Address      = $_POST['dAddress'];
$emailAddress = $_POST['demailAddress'];
$username_staff   = $_POST['dusername'];
$passwords     = $_POST['dpassword'];
$role         = $_POST['drole'];
echo $passwords;
include '../../config/connection.php';

$sql = "UPDATE admin SET 
                        
                        first_name   ='$firstName',
                        last_name    ='$lastName',
                        gender       ='$Gender',
                        address      ='$Address',
                        email        ='$emailAddress',
                        username     ='$username_staff',
                        passwords     ='$passwords',
                        role         ='$role'
                        
                        where ID_admin= $ID_admin ";
if(mysqli_query($connect, $sql)){

} else{

}
echo "Data inserted successfully.";
echo $username;

mysqli_close($connect);
?>

