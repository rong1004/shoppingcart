<?php
//fetch.php
include '../../../config/connection.php';

$total = mysqli_query($connect,"select count(quality_score) FROM feedback");					
    while($ttotalprice = mysqli_fetch_array($total)){
          $counttotalr=$ttotalprice["count(quality_score)"];}		


 $totals = mysqli_query($connect,"select sum(quality_score) FROM feedback");					
     while($ttotalprice = mysqli_fetch_array($totals)){
           $sumtotal=$ttotalprice["sum(quality_score)"];}					
         
if($counttotalr==0){
    $counttotal=1;
}else{
    $counttotal=$counttotalr;
}
          $score= number_format((float)$sumtotal/$counttotal, 1, '.', '')
?>

<style>
.productNumber{
    padding: 12px;
}
p{
    font-family: Arial, Helvetica, sans-serif;
    color: #6e6e6e;
    
    margin-bottom: -2px;

}

h2{
    font-size:47px;
}
.checked {
  color: orange;
  position: relative;
    bottom: -33px;
}
.tt{
    display:flex;
}
</style>

<body>
    <div class="productNumber">
    <div class="tt">
        <h2><?php
            echo $score;
    ?></h2><span class="fa fa-star checked"></span>
    </div>
    <p>based on <?php echo $counttotalr; ?> ratings </p>
       
    </div>
</body>