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
                    <h3 class="page-title"><i class="fa fa-plus"></i> Add New Payment Method
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>

					
					
					
					
					
			<div class="row">
			<div class="col-md-12">
                            <!-- BEGIN SAMPLE FORM PORTLET-->
                            <div class="portlet light bordered">
                                

	   
<?php

if($_POST)
{

$name = mysql_real_escape_string($_POST["name"]);
$ins = mysql_real_escape_string($_POST["ins"]);
$need = mysql_real_escape_string($_POST["need"]);


$err1=0;
////////////////////-------------------->> TITLE ki faka??

 if(trim($name)=="")
      {
$err1=1;
}


$error = $err1;

if($error==0){

$res = mysql_query("INSERT INTO payment SET name='".$name."', ins='".$ins."', need='".$need."'");
echo mysql_error();
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

}




}


?>  								
										
										
		
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post">

                                        <div class="form-body">	
                
            <div class="form-group">
              <label class="col-sm-3 control-label">METHOD NAME</label>
              <div class="col-sm-6"><input name="name" value="" class="form-control" type="text"></div>
            </div>

            
   


            <div class="form-group">
              <label class="col-sm-3 control-label">Payment Instruction</label>
              <div class="col-sm-6">
              <textarea id="" placeholder="" class="form-control" rows="2" name="ins"></textarea>

              </div>
            </div>

   


            <div class="form-group">
              <label class="col-sm-3 control-label">What You need to very the payment</label>
              <div class="col-sm-6">
              <textarea id="" placeholder="" class="form-control" rows="2" name="need"></textarea>
              <div class="col-sm-3"><b style="color:red; font-weight: bold;"> Put 0 if Not Applicable</b></div>
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
<script src="http://www.appelsiini.net/projects/chained/jquery.chained.js"></script>
<script>
    $("#subcat").chained("#cat");
$("#child").chained("#subcat");
</script>
</body>
</html>