<?php
$id=$_GET['arduinoID'];

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Customer Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
      .title{
        margin-top: 6px;
        
        
      }
      .listing{
        height: 650px;
        width:100%;
        margin-top:5px;
        /* border:1px solid black; */
        overflow-y: scroll;
        /* margin-left: 10px; */
        background: #f0f0f0;
        
    padding-top: 8px;

			/* 
			width: 1147px;
			position: absolute;
			left: 4%;
			 */
      }
      
      .listingtotalPrice{
        background-color: #f0f0f0;
        border: 5px solid #e1e1e1;
        height: fit-content;
        width: 100%;
        border-radius: 10px;
        margin: 9px;
        padding: 8px;
      }
      .alignleft{
        margin-top: 17px;
        font-size: 20px;
        text-align: right;
        
      }
      .completebutton{
            
            padding-left: 35px;
            padding-right: 35px;
            border-radius: 27px;
            background-color: #4aff3b;
            margin-bottom: 10px;
            height:42px;
        }

      

      
      @media screen and (max-width: 600px) {
      .title{
        /* width: 100%; */
      }
      .listing{
        width: 100%;
      }
      .listingtotalPrice{
        background-color: #f0f0f0;
        border: 5px solid #e1e1e1;
        height: fit-content;
        width: 103px;
        border-radius: 10px;
        margin: 9px;
        padding: 8px;
      }
  
    }
    </style>
  </head>
  <body>



    <div class="row">
        <?php include 'navbar.php';?>
        
      </div>
    <div class="container">
      
      <div class="row">
        
        <div class="title"></div>
        
      </div>
      <div class="row">
        
        <div class="listing">Loading...</div>
        
        
      </div>
      <div class="row"> 
          <div class="col-8 alignleft"> Total Price</div>
          <div class="col-4 "> <div class="listingtotalPrice">Loading...</div></div>
          
        </div>
        <div class="row"> 
        <button class="completebutton" onclick="complete()">Submit</button>
          
        </div>
    </div>
    <div class="row">
        <?php include 'foot.php';?>
        
      </div>
    
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
$(document).ready(function(){

 load_data();

hello=setInterval( load_data, 5000);
 function load_data(query)
 {
  $.ajax({
   url:"title.php?arduinoID=<?php echo $id ?>",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('.title').html(data);
   }
  });
  $.ajax({
   url:"cart_ajax.php?arduinoID=<?php echo $id ?>",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
      $('.listing').html(data);
   }
  });
  $.ajax({
   url:"totalprice.php?arduinoID=<?php echo $id ?>",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('.listingtotalPrice').html(data);
   }
  });
 }
});

function complete() {
    var id=<?php echo $id ?>;
   $.ajax({
					 url:'addtocartlistmysql.php',
					 method:'POST',
					 data:{
						 
						 arduinoid:id
				 
					 },
					 success:function(response){
            location.replace("feedback.php"); 
					 }
				 });
 
}


</script>