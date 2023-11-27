<?php
//fetch.php
include '../../../config/connection.php';

$total = "select * FROM itemlist WHERE ItemStatus='inactive'";
					if ($resulttotal = mysqli_query($connect, $total)) {
				
						// Return the number of rows in result set
						$rowcount = mysqli_num_rows( $resulttotal );
						
					 }
					

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

</style>

<body>
    <a href="product.php"><div class="productNumber">
        <p>No. of Inactive Product</p>
        <h2><?php echo $rowcount ?></h2>
    </div></a>
</body>