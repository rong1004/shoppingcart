<link href="navbarcss.css" rel='stylesheet'> 

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="sidebar">
    <div class="col"><h>ADMIN</h></div>
  <div class="topnav-right">
  <a href="dashboard.php" class="<?php if ($first_part=="dashboard") {echo "active"; } else  {echo "noactive";}?>"><i class="fa fa-dashboard"></i></a>
    <a href="product.php" class="<?php if ($first_part=="product") {echo "active"; } else  {echo "noactive";}?>"><i class="fa fa-list-ul"></i></a>
    <a href="admin.php" class="<?php if ($first_part=="admin") {echo "active"; } else  {echo "noactive";}?>"><i class="fa fa-cog fa-fw"></i></a>
    <a href="account.php" class="<?php if ($first_part=="account") {echo "active"; } else  {echo "noactive";}?>"><i class="	fa fa-user-circle"></i></a>
    <a href="../../logout.php"><i class="fa fa-sign-out"></i></a>
   
  </div>
</div>

  

</script>

