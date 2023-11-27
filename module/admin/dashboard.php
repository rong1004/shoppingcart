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
	.account{
		display:flex;
		width: inherit;
    	/* background: blue; */
	}
	.total{
		width: 50%;
		height: inherit;
		height: 150px;
	}
	.dash{
		/* background:black; */
		height: 350px;

	}
	.recentadded{
		background:white;
		height: 430px;
		padding-top: 20px
	}
	.resultbox{
		/* background:green; */
		height:360px;
		border-radius:20px;
		overflow-y: scroll;
		width:105%;
		margin-left:-10px;
	}
	.resultdash{
		background:white;
		height:130px;
		width:85%;
		margin-top:10px;
		margin-left:8%;
		border-radius:20px;
		
	}
	h3{
		margin-top: 12px;
		margin-bottom: -5px;
		font-family: Garamond, serif;
		font-weight: bold;
		font-size: 31px;
	}
	.recentaddedtitle{
		margin-bottom:14px;
	}
	@media screen and (min-width: 600px) {
		h3{
			margin-left: 70px;
		}
		.resultbox{
		/* background:green; */
		height:360px;
		border-radius:20px;
		overflow-y: scroll;
		width:100%;
		margin-left:0px;
	}
	}
	
   </style>
  </head>
  <body>




    <div class="container">
      <div class="row">
        <?php include 'navbar.php';?>
        
      </div>
      <div class="container dash">
		<div class="row">
			<h3>Dashboard</h3>
		</div>
	  					<div class="account">
							
									<div class="total">
									
										<div class="resultdash"  id="product">

										Loading...
										</div>
									</div>
									<div class="total">
									<div class="resultdash"  id="staff">

									Loading...
									</div>
									</div>
						</div>
						<div class="account">
							
								<div class="total">
								<div class="resultdash" id="totalinactive">

								Loading...
								</div>
								</div>
								<div class="total">
								<div class="resultdash"  id="totalactive">
								

								Loading...
								</div>
								</div>
						</div>
						
						
      </div>
	 
      <div class="container recentadded">
         <div class="row recentaddedtitle">
			<h3>Recent Added</h3>
		</div>
	  	<div class="resultbox" id="resultbox">

		  Loading...
		</div>
      </div>
    </div>
    
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){

 load_data();

//hello=setInterval( load_data, 5000);
 function load_data(query)
 {
  $.ajax({
   url:"daash_ajax/totalproduct_ajax.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
     $('#product').html(data);
   }
  });
  $.ajax({
   url:"daash_ajax/totalstaff_ajax.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
     $('#staff').html(data);
   }
  });
  $.ajax({
   url:"daash_ajax/totalactive_ajax.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
     $('#totalactive').html(data);
   }
  });
  $.ajax({
   url:"daash_ajax/totalinactive_ajax.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
     $('#totalinactive').html(data);
   }
  });
  $.ajax({
   url:"daash_ajax/addedtdy_ajax.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
     $('#resultbox').html(data);
   }
  });
 }


});



</script>