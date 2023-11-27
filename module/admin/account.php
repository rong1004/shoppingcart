<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$delimiter_array = array("/",".");
$replaced_str = str_replace($delimiter_array, '$', $path);
$components = explode('$', $replaced_str);
// var_dump($components);
$first_part = $components [4];

session_start();

	// echo "staffusername: ".$_SESSION["username"];
	// echo "staffrole: ".$_SESSION["role"];
if(!isset($_SESSION["id"])) {
	header("location:../../index.php");
	
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
	<style>
		#result{
			/* height:550px;
			overflow-y: scroll;
			width: 1147px;
			position: absolute;
			left: 4%;
			border:1px solid black; */
			height: 550px;
        margin-top:5px;
        /* border:1px solid black; */
            overflow-y: scroll;
    margin-left: -363px;
    background: #f0f0f0;
    padding-top: 8px;
    width: 1250px;
    padding-left: 8px;
    padding-right: 8px;
		}
		@media screen and (max-width: 600px) {
      #result{
		width: 388px;
		margin-left: -33px;
		}
	}
	</style>
  </head>
  <body>
					
										
										<div id="resultacc">
                                               
                                        </div>
	
    
  </body>
</html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
var nameacc=<?php echo $_SESSION["id"] ?>;

 load_data();

//hello=setInterval( load_data, 5000);
 function load_data(query)
 {
  $.ajax({
   url:"account_accountedit.php",
   method:"POST",
   data:{name:nameacc},
   success:function(data)
   {
     $('#resultacc').html(data);
   }
  });
 }


});



</script>