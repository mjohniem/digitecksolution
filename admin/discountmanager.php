<?php
include ('include/header.php');
?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/clockface/css/clockface.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->

</head>
<body class="page-header-fixed page-sidebar-closed-hide-logo">


<?php
include ('include/sidebar.php');

$iidd = $_GET['productid'];
?>

 

		
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"><i class="fa fa-edit"></i> Manage Discount
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>

					
					
					
					
					
			<div class="row">
			<div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                
                       
		   
<?php


//------------------------------------------->>>REMOVE
if(isset($_GET['remove'])) {
$id = $_GET['productid']; 
mysql_query("UPDATE products SET offtyp='0', offamo='0', offtill='0' WHERE id='".$id."'");
echo mysql_error();
}
//------------------------------------------->>>REMOVE



if($_POST)
{



//------------------------------->> Post The Form Value

$typ = mysql_real_escape_string($_POST["typ"]);
$upto = mysql_real_escape_string($_POST["upto"]);
$amo = mysql_real_escape_string($_POST["amo"]);

//------------------------------->> Post The Form Value


	
$res = mysql_query("UPDATE products SET offtyp='".$typ."', offamo='".$amo."', offtill='".$upto."' WHERE id='".$iidd."'");
if($res){
	
	
echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Updated Successfully! 
</div>";
}else{
	echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
Some Problem Occurs, Please Try Again. 
</div>";
}

}


$old = mysql_fetch_array(mysql_query("SELECT name, rate, img, offtyp, offamo, offtill FROM products WHERE id='".$iidd."'"));
$curr = mysql_fetch_array(mysql_query("SELECT currency FROM general_setting WHERE id='1'"));
if($old[3]==0){
$typ = "NO DISCOUNT";
$sig = "";
$disamo = "0";
}elseif($old[3]==1) {
$typ = "PERCENT";
$sig = "%";
$per = $old[4]/100;
$dis = $old[1]*$per;
$disamo = $old[1]-$dis;

}elseif ($old[3]==2) {
$typ = "FLAT";
$sig = "$curr[0]";
$disamo = $old[1]-$old[4];
}

?>										


            <div class="row">
            <div class="col-md-4">

<strong>Product Name:</strong> <?php echo $old[0]; ?><br>
<strong>Product Price:</strong> <?php echo "$old[1] $curr[0]"; ?><br>
<strong>Discount Type:</strong> <?php echo $typ; ?><br>
<strong>Discount Amount:</strong> <?php echo "$old[4] $sig"; ?><br>
<strong>Discounted Price:</strong> <?php echo "$disamo $curr[0]"; ?><br>
<strong>Discount Till:</strong> <?php echo $old[5]; ?><br>
                    

<a href="?productid=<?php echo $iidd;?>&amp;remove=true" class="btn btn-info btn-block"> REMOVE FROM DISCOUNT</a>

</div>


<div class="col-md-8">


			         <div class="portlet-body form">
                    <form class="form-horizontal" action="" method="post" role="form">
                    <div class="form-body">
				


<div class="row">                                       
                    <div class="col-md-2">

                    <select name="typ" class="form-control input-lg">
                        <option value="1">PERCENT</option>
                        <option value="2">FLAT (<?php echo $curr[0] ?>)</option>
                    </select>

                    </div>

                    <div class="col-md-4">
                     <input class="form-control input-lg" name="amo" placeholder="Value" type="text">
                    </div>




                    <div class="col-md-6">
<div class="input-group input-lg date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
<span class="input-group-btn">
<button class="btn default" type="button">
<i class="fa fa-calendar"></i>
</button>
</span>
<input class="form-control" readonly="" type="text" name="upto" placeholder="DISCOUNT VALID TILL">
</div>

                    </div>






          </div>           
                  
<br><br>
					 
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn blue btn-block">UPDATE DISCOUNT</button>
                                                </div>
                                            </div>
											
                                        </div>
                                    </form>
                                </div>

</div>  </div>  

                            </div>
                        </div>		
                        </div><!---ROW-->		
					
					
					
					
					
					
			
					
					
					
					
					
					
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            
			


<?php
 include ('include/footer.php');
 ?>

        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="./assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
                <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/clockface/js/clockface.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->



        <script>
        
    
        
        </script>
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

</body>
</html>