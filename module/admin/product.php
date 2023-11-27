<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$delimiter_array = array("/",".");
$replaced_str = str_replace($delimiter_array, '$', $path);
$components = explode('$', $replaced_str);
//  var_dump($components);
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
    <title>admin product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
		#productresults{
			background: #f0f0f0;
			width: 100%;
			height: 650px;
			overflow-y: scroll;
			border-radius: 15px;
			margin-top:20px;
	
		}
    @media screen and (max-width: 600px) {
      #productresults{
		/* width: 388px; */
		/* margin-left: -33px; */
		}
    }

	</style>
  </head>
  <body>

<div class="container">
	<div class="row">
		<?php include 'navbar.php';?>
	</div>
	
	<div class="row">
			
			<?php include 'product_addProduct.php';?>
	</div>
	<div class="row">
		<div class="form-group">
		<br />
			<h2>Display Product data</h2><br />
				<div class="input-group">
					
					<input type="text" name="search_text" id="search_text" placeholder="Search by Product Details" class="form-control" />
				</div>
		</div>
	</div>
	<div class="container">
			<div id="productresults">Loading...</div>
	</div>	</br>
	<div class="row"> 
		
        
		<button  onclick="location.href='report.php'">Generate Report</button>
          
        </div>		
		</br>
</div>


</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script >
	
$(document).ready(function(){

load_data();

// hello=setInterval( load_data, 5000);
function load_data(query)
{
 $.ajax({
  url:"productlisting_ajax.php",
  method:"POST",
  data:{query:query},
  success:function(data)
  {
    $('#productresults').html(data);
  }
 });
}



$('#search_text').keyup(function(){
 var search = $(this).val();
 if(search != '')
 {
  load_data(search);
//   clearInterval(hello);
 }
 else
 {
  load_data();
//   hello=setInterval( load_data, 5000);
 }
});
});


</script>