<?php
include ('include/header.php');
?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
<link href="assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
		
		
		
		</head>
    <!-- END HEAD -->

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-content-white">
        
		
	
<?php
include ('include/sidebar.php');
?>
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                    
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"> <i class="fa fa-desktop"></i> Order Awaitiong Delivery<small></small></h3>
					<hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    
                    <div class="row">
                        <div class="col-md-12">
                            
							
							<!-- BEGIN EXAMPLE TABLE PORTLET-->
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-dark">
                                        <!--i class="icon-settings font-dark"></i>
                                        <span class="caption-subject bold uppercase">AAA</span-->
                                    </div>
                                    <div class="tools"> </div>
                                </div>
                                <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover" id="sample_1">
                                        <thead>

										
										
<tr>
<th> ORDER ID# </th>
<th> Client Name </th>
<th> Dlivery Details </th>

<th> Payment</th>
<th> Delivery</th>
<th> Order Status </th>
<th> ACTION </th>
</tr>

</thead><tbody>

<?php

$ddaa = mysql_query("SELECT id, invid, usid, paydet, daddr, contactnum, code, tm, pst, dst, mst FROM orrdr WHERE dst='0' AND mst='0' ORDER BY id");
    while ($data = mysql_fetch_array($ddaa))
    {

$uuuu = mysql_fetch_array(mysql_query("SELECT name FROM users WHERE id='".$data[2]."'"));



if($data[8]==0){
$pst = "<b class=\"btn btn-warning btn-xs\"> Pending </b>";  
}else{
$pst = "<b class=\"btn btn-success btn-xs\"> Paid </b>";  
} 
  

if($data[9]==0){
$dst = "<b class=\"btn btn-warning btn-xs\"> Pending </b>";  
}else{
$dst = "<b class=\"btn btn-success btn-xs\"> Delivered </b>";  
} 
  

if($data[10]==0){
$mst = "<b class=\"btn btn-info btn-xs\"> Active </b>";  
}elseif($data[10]==1){
$mst = "<b class=\"btn btn-info btn-xs\"> Completed </b>";  
}else{
$mst = "<b class=\"btn btn-danger btn-xs\"> Rejected </b>";  
} 
  



 echo "                                
 <tr>
 
   <td>$data[1]</td>
   <td>$uuuu[0]</td>
   <td>$data[4] ($data[5]) </td>

   <td>$pst</td>
   <td>$dst</td>
   <td>$mst</td>

   <td>
   <a href=\"orderaction.php?id=$data[0]\" class=\"btn purple btn-xs\"> <i class=\"fa fa-edit\"></i> VIEW / ACTION </a>
   </td>
   


</tr>";
	
	}
?>
				
			

                                            

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- END EXAMPLE TABLE PORTLET-->
                            
                        </div>
                    </div><!-- ROW-->
					
					
					
					
					
			
			
		
					
					
					
					
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
            
			
			
			
			
			
			
			
			
			
			
			
			
			
			
		
      <?php
 include ('include/footer.php');
 ?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/scripts/datatable.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
		
		 <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
 
 </body>
</html>