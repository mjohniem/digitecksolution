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
                    <h3 class="page-title"> <i class="fa fa-desktop"></i> View All Products <small></small></h3>
					<hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    
<?php

                
//------------------------------------------->>> DELETE             

if(isset($_GET['did'])) {
$did = mysql_real_escape_string($_GET["did"]);
$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM products WHERE id='".$did."'"));
if($exist[0]>=1){
    
$res = mysql_query("DELETE FROM products WHERE id='".$did."'");

if($res){
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
DELETED Successfully! 
</div>";
}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs, Please Try Again. 
</div>";
}
}else{
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
NOT FOUND IN DATABASE (MAY ALREADY DELETED)
</div>";
}   
}
//------------------------------------------->>> DELETE         




//------------------------------------------->>>FEATURED
if(isset($_GET['featured'])) {
$id = mysql_real_escape_string($_GET['id']); 
$act = mysql_real_escape_string($_GET['act']); 
mysql_query("UPDATE products SET featured='".$act."' WHERE id='".$id."'");
//echo mysql_error();
}
//------------------------------------------->>>FEATURED

?>					
					
					
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
<th> ID# </th>
<th> Product Name </th>
<th> Price </th>
<th> Cat &rarr; Sub &rarr; Child </th>
<th> VIEW </th>
<th> FEATURED </th>
<th> DISCOUNT </th>
<th> ACTION </th>
</tr>

</thead><tbody>

<?php
$curr = mysql_fetch_array(mysql_query("SELECT currency FROM general_setting WHERE id='1'"));

$ddaa = mysql_query("SELECT id, name, rate, parent, featured, offtyp FROM products ORDER BY id");
    while ($data = mysql_fetch_array($ddaa))
    {

$parent = mysql_fetch_array(mysql_query("SELECT name, parent FROM childcat WHERE id='".$data[3]."'"));
$parent1 = mysql_fetch_array(mysql_query("SELECT name, parent FROM subcat WHERE id='".$parent[1]."'"));
$parent2 = mysql_fetch_array(mysql_query("SELECT name FROM cat WHERE id='".$parent1[1]."'"));



if($data[4]!=1){
$featured = "<a href=\"?id=$data[0]&amp;act=1&amp;featured=work\" class=\"btn btn-success btn-xs\"> <i class=\"fa fa-plus\"></i> ADD </a>";  
}else{
$featured = "<a href=\"?id=$data[0]&amp;act=0&amp;featured=work\" class=\"btn btn-danger btn-xs\"> <i class=\"fa fa-times\"></i> REMOVE </a>";
} 
  


if($data[5]==0){
$dscnt = "<a href=\"discountmanager.php?productid=$data[0]\" class=\"btn btn-success btn-xs\"> <i class=\"fa fa-plus\"></i> ADD </a>";  
}else{
$dscnt = "<a href=\"discountmanager.php?productid=$data[0]\" class=\"btn btn-warning btn-xs\"> <i class=\"fa fa-times\"></i> EDIT </a>";
} 
  


 echo "                                
 <tr>
 
   <td>$data[0]</td>
   <td>$data[1]</td>
   <td>$data[2] $curr[0]</td>
   <td>$parent2[0] &rarr; $parent1[0] &rarr; $parent[0]</td>
   <td><a href=\"#\" class=\"btn btn-info btn-xs\"> <i class=\"fa fa-desktop\"></i> VIEW </a></td>
   <td>$featured</td>
   <td>$dscnt</td>

   <td>
   <a href=\"editproduct.php?id=$data[0]\" class=\"btn purple btn-xs\"> <i class=\"fa fa-edit\"></i> EDIT </a>
   <a href=\"editimages.php?id=$data[0]\" class=\"btn purple-plum btn-xs\"> <i class=\"fa fa-file-image-o\"></i> EDIT IMAGES </a>
   <a href=\"?did=$data[0]\" class=\"btn red btn-xs\"> <i class=\"fa fa-times\"></i> DELETE </a>
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