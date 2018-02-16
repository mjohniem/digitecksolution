<?php
include ('include/header.php');
?>

<style type="text/css" media="print">
        @page 
        {
            size: auto;   /* auto is the current printer page size */
            margin: 10mm;  /* this affects the margin in the printer settings */
        }

        #prnt 
        {
            background-color:#FFFFFF;        
            margin: 100px;  /* the margin on the content before printing */
            padding: 20px;
       }
    </style>
    
  <script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>



</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">


<?php
include ('include/sidebar.php');
$iidd = mysql_real_escape_string($_GET['id']);
$ccdd = mysql_fetch_array(mysql_query("SELECT code  FROM orrdr WHERE id='".$iidd."'"));






if(isset($_GET['action'])) {

$act = mysql_real_escape_string($_GET['action']);
$do = mysql_real_escape_string($_GET['do']); 

if($act=="payment"){
mysql_query("UPDATE orrdr SET pst='".$do."' WHERE id='".$iidd."'");
echo mysql_error();
}

if($act=="delivery"){
mysql_query("UPDATE orrdr SET dst='".$do."' WHERE id='".$iidd."'");
echo mysql_error();
}

if($act=="status"){
mysql_query("UPDATE orrdr SET mst='".$do."' WHERE id='".$iidd."'");
if($do==2){
mysql_query("UPDATE carrrt SET ordered='0' WHERE code='".$ccdd[0]."'");
}else{
mysql_query("UPDATE carrrt SET ordered='1' WHERE code='".$ccdd[0]."'");
}


}



}







?>

 

		
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> Oreder
                        <small>View & Update</small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>


<?php

$odet = mysql_fetch_array(mysql_query("SELECT id, invid, usid, paydet, daddr, contactnum, code, tm, pst, dst, mst FROM orrdr WHERE id='".$iidd."'"));
$uname= mysql_fetch_array(mysql_query("SELECT name FROM users WHERE id='".$odet[2]."'"));



if($odet[8]==0){
$pst = "<b class=\"btn btn-warning btn-xs\"> Pending </b>";  
}else{
$pst = "<b class=\"btn btn-success btn-xs\"> Paid </b>";  
} 
  

if($odet[9]==0){
$dst = "<b class=\"btn btn-warning btn-xs\"> Pending </b>";  
}else{
$dst = "<b class=\"btn btn-success btn-xs\"> Delivered </b>";  
} 
  

if($odet[10]==0){
$mst = "<b class=\"btn btn-info btn-xs\"> Active </b>";  
}elseif($odet[10]==1){
$mst = "<b class=\"btn btn-success btn-xs\"> Completed </b>";  
}else{
$mst = "<b class=\"btn btn-danger btn-xs\"> Rejected </b>";  
} 
  
?>
<div class="row">

<div class="col-md-4">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box green-meadow">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-dollar"></i>Payment Status </div>
                                    <div class="tools">
<?php echo $pst; ?>
                                    </div>
                                </div>
                                <div class="portlet-body"  style="height: 200px;"> <b><?php echo $odet[3]; ?></b>
<br><br><br><br><br>
<div class="row">
<div class="col-sm-6">
<a href="?id=<?php echo $iidd; ?>&action=payment&do=0" class="btn btn-warning btn-block">PENDING</a>
</div>
<div class="col-sm-6">
<a href="?id=<?php echo $iidd; ?>&action=payment&do=1" class="btn btn-success btn-block">PAID</a>
</div>
</div>

                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
</div>


    
                    
                
<div class="col-md-4">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box green-meadow">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-paper-plane"></i>Delivery Status </div>
                                    <div class="tools">
<?php echo $dst; ?>
                                    </div>
                                </div>
                                <div class="portlet-body"  style="height: 200px;"> <h2><?php echo "$odet[4] ($odet[5])"; ?></h2>
<br>
<div class="row">
<div class="col-sm-6">
<a href="?id=<?php echo $iidd; ?>&action=delivery&do=0" class="btn btn-warning btn-block">PENDING</a>
</div>
<div class="col-sm-6">
<a href="?id=<?php echo $iidd; ?>&action=delivery&do=1" class="btn btn-success btn-block">DELIVERED</a>
</div>
</div>

                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
</div>


    
                    
                
<div class="col-md-4">
                            <!-- BEGIN Portlet PORTLET-->
                            <div class="portlet box green-meadow">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-shopping-cart"></i>Order Status </div>
                                    <div class="tools">
<?php echo $mst; ?>
                                    </div>
                                </div>
                                <div class="portlet-body" style="height: 200px;"><h2>ORDER # <?php echo $odet[1]; ?></h2>
<br><br><br>

<div class="row pull-bottom">
<div class="col-sm-4">
<a href="?id=<?php echo $iidd; ?>&action=status&do=0" class="btn btn-info btn-block">ACTIVE</a>
</div>
<div class="col-sm-4">
<a href="?id=<?php echo $iidd; ?>&action=status&do=1" class="btn btn-success btn-block">COMPLETED</a>
</div>
<div class="col-sm-4">
<a href="?id=<?php echo $iidd; ?>&action=status&do=2" class="btn btn-danger btn-block">REJECTED</a>
</div>
</div>

                                </div>
                            </div>
                            <!-- END Portlet PORTLET-->
</div>

</div><!--ROW-->
	
<hr>



<div class="col-md-8 col-md-offset-2">
                            <!-- BEGIN SAMPLE TABLE PORTLET-->
                            <div class="portlet box green">
                                <div class="portlet-title">
                                    <div class="caption">
                                        <i class="fa fa-list"></i>ORDER DETAILS </div>
                                    <div class="tools">
                                   <button onclick="printContent('prnt')" class="btn btn-info btn-sm">PRINT</button>
                                    </div>
                                </div>
                                <div class="portlet-body">

<div id="prnt">
<div class="row">
<div class="col-sm-8" style="max-width: 600px; float: left;">
 <h2> INVOICE # <?php echo $odet['invid']; ?></h2>   

 <b>INVOICE TO:</b> <?php echo $uname[0]; ?> <br>
 <b>DELIVERY ADDRESS:</b> <?php echo $odet['daddr']; ?> <br>
 <b>CONTACT NUMBER:</b> <?php echo $odet['contactnum']; ?> <br>
</div>    
<div class="col-sm-4" style="margin-top: 30px; max-width: 300px; float: right;">
<img src="<?php echo "$baseurl/images/logo.png"; ?>" alt="LOGO" style="width: 100%">

<?php 
$adrs = mysql_fetch_array(mysql_query("SELECT address, mobile, email, sitename FROM general_setting WHERE id='1'"));
 ?>


          <i class="fa fa-mobile"></i><span> <?php echo $adrs[1]; ?></span><br>
           <i class="fa fa-envelope"></i><span> <?php echo $adrs[2]; ?></span><br>
          <i class="fa fa-location-arrow"></i> <?php echo $adrs[0]; ?> <br>
</div>    

</div>
<hr>



                                    <div class="table">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> Product Name </th>
                                                    <th> Rate </th>
                                                    <th> Quantity </th>
                                                    <th> Subtotal </th>
                                                </tr>
                                            </thead>
                                            <tbody>




<?php

$curr = mysql_fetch_array(mysql_query("SELECT currency FROM general_setting WHERE id='1'"));
$full = 0;
$i=1;
$ddaa = mysql_query("SELECT pid, qty, rraate FROM carrrt WHERE code='".$odet[6]."' ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
$ppp = mysql_fetch_array(mysql_query("SELECT name, img FROM products WHERE id='".$data[0]."'"));   
$ttl = $data[2]*$data[1];
$full = $full+$ttl;
?>
  

     <tr>
     <td> <?php echo $i; ?> </td>
     <td> <?php echo $ppp[0]; ?> </td>
     <td> <?php echo "$data[2] $curr[0]"; ?> </td>
     <td> <?php echo $data[1]; ?> </td>
     <td> <?php echo "$ttl $curr[0]"; ?> </td>
     </tr>


<?php
$i++;
}
?>
         
     <tr>
     <td>  </td>
     <td>  </td>
     <td>  </td>
     <td> <b>TOTAL</b> </td>
     <td> <b><?php echo "$full $curr[0]"; ?></b> </td>
     </tr>


         


                                             
                                                
                                         
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- END SAMPLE TABLE PORTLET-->
                        </div>
                        </div>








<div style="margin-top: 1800px;"></div>









					
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
			


<?php

 include ('include/footer.php');
 ?>


</body>
</html>