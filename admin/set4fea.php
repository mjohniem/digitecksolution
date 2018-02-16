<?php
include ('include/header.php');
?>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-markdown/css/bootstrap-markdown.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-summernote/summernote.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->


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
                    <h3 class="page-title"><i class="fa fa-cogs"></i> Feature Setting
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>

					
					
					
					
					
			<div class="row">
			<div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post" role="form">
                                        <div class="form-body">

		   
<?php

if($_POST)
{



//------------------------------->> Post The Form Value
$text1 = mysql_real_escape_string($_POST["text1"]);
$text2 = mysql_real_escape_string($_POST["text2"]);
$text3 = mysql_real_escape_string($_POST["text3"]);
$text4 = mysql_real_escape_string($_POST["text4"]);


//------------------------------->> Post The Form Value

	

$res = mysql_query("UPDATE gen_fea4 SET text1='".$text1."', text2='".$text2."', text3='".$text3."', text4='".$text4."' WHERE id='1'");
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


$old = mysql_fetch_array(mysql_query("SELECT text1, text2, text3, text4  FROM gen_fea4 WHERE id='1'"));

?>										
										
						<img src="../images/4fea.jpg" alt="*" style="width: 100%;">		<br><br><br>		
										
							         
                                        
                                        
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>TEXT 1</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="text1" value="<?php echo $old[0]; ?>" type="text">
                    </div>
                    </div>

                                            
                                        
                                        
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>TEXT 2</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="text2" value="<?php echo $old[1]; ?>" type="text">
                    </div>
                    </div>

                                            
                                        
                                        
                    <div class="form-group">
                    <label class="col-md-3 control-label"><strong>TEXT 3</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="text3" value="<?php echo $old[2]; ?>" type="text">
                    </div>
                    </div>

                                			
										
										
					<div class="form-group">
                    <label class="col-md-3 control-label"><strong>TEXT 4</strong></label>
                    <div class="col-md-6">
                     <input class="form-control input-lg" name="text4" value="<?php echo $old[3]; ?>" type="text">
                    </div>
                    </div>

								
                     
                  

					 
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-6">
                                                    <button type="submit" class="btn blue btn-block">Submit</button>
                                                </div>
                                            </div>
											
                                        </div>
                                    </form>
                                </div>
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
        <script>
        
    
        
        </script>
        
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->

</body>
</html>