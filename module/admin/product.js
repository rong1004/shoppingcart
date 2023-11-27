
$(document).ready(function(){

 load_data();

hello=setInterval( load_data, 5000);
 function load_data(query)
 {
  $.ajax({
   url:"productlisting_ajax.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }



 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
   clearInterval(hello);
  }
  else
  {
   load_data();
   hello=setInterval( load_data, 5000);
  }
 });
});



