<!DOCTYPE html>
    <html>
    <head>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <style>
    *{box-sizing:border-box;}
    body{font-family: 'Open Sans', sans-serif; color:#333; font-size:14px; background-color:#dadada; padding:50px;}
    .form_box{width:80%; height:550px;  padding:10px; background-color:white;}
    input{padding:5px;  margin-bottom:5px;}
    input[type="submit"]{border:none; outlin:none; background-color:#679f1b; color:white;}
    .heading{background-color:#ac1219; color:white; height:40px; width:100%; line-height:40px; text-align:center;}
    .shadow{
      -webkit-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
    -moz-box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);
    box-shadow: 0px 0px 17px 1px rgba(0,0,0,0.43);}
    .pic{text-align:left; width:33%; float:left;}
    </style>
    <body>
     <div class="form_box shadow">
     <form method="post" action="feedbackinsert.php">
     <div class="heading">
       Feedback Form for Shopping Cart
     </div>
     <br/>
     <p>What do you think about the quality of our shopping cart?</p>
     <div>
        
       <div class="pic" >
         
         <input type="radio" name="quality" value="1" required> Bad
       </div>
       <div class="pic">
         
         <input type="radio" name="quality" value="2"> Okay
       </div>
       <div class="pic">
      
         <input type="radio" name="quality" value="3"> Normal
       </div>
       <div class="pic">
      
         <input type="radio" name="quality" value="4"> Good
       </div>
       <div class="pic">
      
         <input type="radio" name="quality" value="5"> Very Good
       </div>
     </div>
     <br>
     <br>
     <p>Do you have any suggestion for us? </p>
     <textarea name=" suggestion" rows="8" cols="40" required></textarea>
      <input type="submit" name="submit" value="Submit Form" >
    </form>
     </div>
    </body>
    </html>