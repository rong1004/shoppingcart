<style>
h{
    font-size: xxx-large;
    font-weight: bolder;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
<button onclick="window.print()">Print report</button>
</br>
<h>Report</h>
<hr> 
<?php
include '../../config/connection.php';
$total = "select * FROM itemlist";
	if ($result = mysqli_query($connect, $total)) {

		// Return the number of rows in result set
		$rowcount = mysqli_num_rows( $result );
		
	 }
?>
</br>
<h2>
    <?php
    echo "Total no. of product: ".$rowcount;
    ?>
</h2>
<hr> 
</br>

<?php
//fetch.php
include '../../config/connection.php';

$output = '';
$query = "
		SELECT * FROM itemlist ORDER BY Item_id 
		";


$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>ItemImage </th>
     <th>ItemBarcode  </th>
     <th>ItemName    </th>
     <th>ItemStatus    </th>
     <th>ItemPrice    </th>
     <th>ItemDetail      </th>
	 <th>lastupdateby  </th>
	 <th>ItemAddedDate  </th>
	 
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td> <img src="data:image/jpg;charset=utf8;base64,'.base64_encode($row['ItemImage']).'" width = "60px" height = "60px" />  </td>
    <td>'.$row["ItemBarcode"].'</td>
    <td>'.$row["ItemName"].'</td>
    <td>'.$row["ItemStatus"].'</td>
    <td>'.$row["ItemPrice"].'</td>
    <td>'.$row["ItemDetail"].'</td>
	<td>'.$row["lastupdateby"].'</td>
	<td>'.$row["ItemAddedDate"].'</td>
	
	
   </tr>
  ';
 }

 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
