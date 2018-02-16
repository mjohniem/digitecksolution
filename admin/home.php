<?php
include ('include/header.php');
?>

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">


<?php
include ('include/sidebar.php');
?>

 

		
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Dashboard
                        <small>Statistics</small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>


<?php


$ttlorder = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM orrdr"));
$oap = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM orrdr WHERE pst='0' AND mst='0'"));
$oad = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM orrdr WHERE dst='0' AND mst='0'"));

$oa = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM orrdr WHERE mst='0'"));
$od = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM orrdr WHERE mst='1'"));
$or = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM orrdr WHERE mst='2'"));
$numuser = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users"));

$numproduct = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM products"));


$pdes = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM products WHERE offtyp<>'0'"));
$phot = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM products WHERE featured='1'"));

?>



<!-- START -->
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<div class="dashboard-stat blue">
<div class="visual">
<i class="fa fa-shopping-cart"></i>
</div>
<div class="details">
<div class="number"><?php echo $ttlorder[0]; ?></div>
<div class="desc"> TOTAL  ORDER </div>
</div>
</div>
</div>
<!-- END -->



<!-- START -->
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<div class="dashboard-stat yellow">
<div class="visual">
<i class="fa fa-shopping-cart"></i>
</div>
<div class="details">
<div class="number"><?php echo $oap[0]; ?></div>
<div class="desc"> Awaiting Payment </div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
<div class="dashboard-stat yellow">
<div class="visual">
<i class="fa fa-shopping-cart"></i>
</div>
<div class="details">
<div class="number"><?php echo $oad[0]; ?></div>
<div class="desc"> Awaiting Delivery </div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<div class="dashboard-stat green">
<div class="visual">
<i class="fa fa-shopping-cart"></i>
</div>
<div class="details">
<div class="number"><?php echo $oa[0]; ?></div>
<div class="desc"> ACTIVE ORDER</div>
</div>
</div>
</div>
<!-- END -->
<!-- START -->
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<div class="dashboard-stat green">
<div class="visual">
<i class="fa fa-shopping-cart"></i>
</div>
<div class="details">
<div class="number"><?php echo $od[0]; ?></div>
<div class="desc"> DELIVERED </div>
</div>
</div>
</div>
<!-- END -->
<!-- START -->
<div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
<div class="dashboard-stat red">
<div class="visual">
<i class="fa fa-shopping-cart"></i>
</div>
<div class="details">
<div class="number"> <?php echo $or[0]; ?></div>
<div class="desc"> REJECTED </div>
</div>
</div>
</div>
<!-- END -->




				
<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="dashboard-stat purple">
<div class="visual">
<i class="fa fa-users"></i>
</div>
<div class="details">
<div class="number"> <?php echo $numuser[0]; ?></div>
<div class="desc">TOTAL CUSTOMER </div>
</div>
</div>
</div>
<!-- END -->



<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="dashboard-stat green">
<div class="visual">
<i class="fa fa-shopping-cart"></i>
</div>
<div class="details">
<div class="number"><?php echo $numproduct[0]; ?></div>
<div class="desc"> TOTAL PRODUCT</div>
</div>
</div>
</div>
<!-- END -->
    
<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="dashboard-stat blue">
<div class="visual">
<i class="fa fa-dollar"></i>
</div>
<div class="details">
<div class="number"> <?php echo $pdes[0]; ?></div>
<div class="desc">DISCOUNTED PRODUCT</div>
</div>
</div>
</div>
<!-- END -->



<!-- START -->
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="dashboard-stat blue">
<div class="visual">
<i class="fa fa-list"></i>
</div>
<div class="details">
<div class="number"> <?php echo $phot[0]; ?></div>
<div class="desc">HOT PRODUCT</div>
</div>
</div>
</div>
<!-- END -->

<!-- START -->
<!--div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
<div class="dashboard-stat green">
<div class="visual">
<i class="fa fa-check"></i>
</div>
<div class="details">
<div class="number"> 555 <?php ?></div>
<div class="desc">API PERMITTED USER </div>
</div>
</div>
</div-->
<!-- END -->

	
					
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
			


<?php

 include ('include/footer.php');
 ?>


</body>
</html>