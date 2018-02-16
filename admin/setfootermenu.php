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
                    <h3 class="page-title"> <i class="fa fa-cogs"></i> SET FOOTER MENU <small></small></h3>
					<hr>
                    <!-- END PAGE TITLE-->
                    <!-- END PAGE HEADER-->
                    
<?php

                
//------------------------------------------->>> DELETE             

if(isset($_GET['did'])) {
$did = $_GET["did"];
$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM foot_menu WHERE id='".$did."'"));
if($exist[0]>=1){
    
$res = mysql_query("DELETE FROM foot_menu WHERE id='".$did."'");

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
  /*
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
NOT FOUND IN DATABASE (MAY ALREADY DELETED)
</div>";
*/
}   
}
//------------------------------------------->>> DELETE         


if(isset($_POST['head']))
{

$n1 = mysql_real_escape_string($_POST["n1"]);
$n2 = mysql_real_escape_string($_POST["n2"]);
$n3 = mysql_real_escape_string($_POST["n3"]);

mysql_query("UPDATE foot_head SET n1='".$n1."',  n2='".$n2."',  n3='".$n3."' WHERE id='1'");

}







if(isset($_POST['new']))
{
$parent = mysql_real_escape_string($_POST["parent"]);
$name = mysql_real_escape_string($_POST["name"]);


$err1=0;
$err2=0;

if(trim($name)=="")
      {
$err1=1;
}

if(trim($parent)=="")
      {
$err2=1;
}



$error = $err1+$err2;


if ($error == 0){
  
$res = mysql_query("INSERT INTO foot_menu SET name='".$name."', parent='".$parent."'");
if($res){
  
  
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Added Successfully! 
</div>";
}else{
  echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
Some Problem Occurs, Please Try Again. 
</div>";
}
} else {
  
if ($err1 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    

Name Can Not be Empty!!!

</div>";
}   

if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  

Parent Can Not be Empty !!!

</div>";
}   
  
}






}



$old = mysql_fetch_array(mysql_query("SELECT n1, n2, n3 FROM foot_head WHERE id='1'"));
?>				  
               
 <div class="row">



<form action="" method="post">

<div class="col-md-3">
<input type="text" class="form-control input-lg" name="n1" value="<?php echo $old[0]; ?>" placeholder="Footer Heading 1">
</div>

<div class="col-md-3">
<input type="text" class="form-control input-lg" name="n2" value="<?php echo $old[1]; ?>" placeholder="Footer Heading 2">
</div>

<div class="col-md-3">
<input type="text" class="form-control input-lg" name="n3" value="<?php echo $old[2]; ?>" placeholder="Footer Heading 3">
</div>

<div class="col-md-3">
<input type="submit" class="btn btn-success btn-block" name="head" value="UPDATE">
</div>


</form>


<br><br><hr><br>

</div>    	
			         
 <div class="row">



<form action="" method="post">

<div class="col-md-4">
<input type="text" class="form-control" name="name" placeholder="MENU NAME">
</div>



<div class="col-md-4">
<select name="parent" class="form-control">

  <option value="1"><?php echo $old[0]; ?></option>
  <option value="2"><?php echo $old[1]; ?></option>
  <option value="3"><?php echo $old[2]; ?></option>

</select>



</div>

<div class="col-md-4">
<input type="submit" class="btn btn-success btn-block" name="new" value="ADD NEW">
</div>


</form>


<br><br><hr><br>

</div>		









					
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
<th> Menu Name </th>
<th> Parent </th>
<th> ACTION </th>
</tr>

</thead><tbody>

<?php


$ddaa = mysql_query("SELECT id, name, parent FROM foot_menu ORDER BY id");
    while ($data = mysql_fetch_array($ddaa))
    {



if($data[2]==1){
$parent = mysql_fetch_array(mysql_query("SELECT n1 FROM foot_head WHERE id='1'"));  
}elseif($data[2]==2){
$parent = mysql_fetch_array(mysql_query("SELECT n2 FROM foot_head WHERE id='1'"));  
}elseif($data[2]==3){
$parent = mysql_fetch_array(mysql_query("SELECT n3 FROM foot_head WHERE id='1'"));  
}


 echo "                                
 <tr>
 
   <td>$data[1]</td>
   <td>$parent[0] </td>
   <td>
   <a href=\"editfootermenu.php?id=$data[0]\" class=\"btn purple btn-xs\"> <i class=\"fa fa-edit\"></i> EDIT / ADD TEXT </a>
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