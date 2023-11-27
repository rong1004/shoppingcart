<?php

$password    = $_GET['password'];
$error="";
if( strlen($password ) < 8 ) {
$error .= "Password too short!
";
}
if( strlen($password ) > 20 ) {
$error .= "Password too long!
";
}


if( !preg_match("#[0-9]+#", $password ) ) {
$error .= "Password must include at least one number!
";
}
if( !preg_match("#[a-z]+#", $password ) ) {
$error .= "Password must include at least one letter!
";
}
if( !preg_match("#[A-Z]+#", $password ) ) {
$error .= "Password must include at least one CAPS!
";
}
if( !preg_match("#[^A-Za-z0-9]+#", $password ) ) {
$error .= "Password must include symbol! eg.~`!@$%^*()_+{}|:<>?-=[]\;',./'
";
}
if($error){
echo "Password validation failure(your choise is weak): $error";
} else {
echo "Your password is strong.";
}
?>