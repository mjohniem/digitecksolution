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
                    <h3 class="page-title"><i class="fa fa-edit"></i> SET Home Text Sliders
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
$ttxt = mysql_real_escape_string($_POST["ttxt"]);
$btxt = mysql_real_escape_string($_POST["btxt"]);
$stxt = mysql_real_escape_string($_POST["stxt"]);


$res = mysql_query("INSERT INTO slider_home_text SET ttxt='".$ttxt."', btxt='".$btxt."', stxt='".$stxt."'");
echo mysql_error();
if($res){

echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
New Text Slider Added Successfully! 
</div>";
}else{

echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
Some Problem Occurs, Please Try Again. 
</div>";
}
}

?>                  


<div class="col-md-6 col-md-offset-3"><img src="../images/hts.jpg" alt="*" style="width: 100%;"><br><br><br> </div>

                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                        <div class="form-body"> 


              <div class="form-group">
              <label class="col-sm-3 control-label"><strong>Top Text</strong></strong></label>
              <div class="col-sm-6"><input type="text" name="ttxt" class="form-control input-lg"></div>          
                 </div>
        

              <div class="form-group">
              <label class="col-sm-3 control-label"><strong>Bold Text</strong></strong></label>
              <div class="col-sm-6"><input type="text" name="btxt" class="form-control input-lg"></div>          
                 </div>
        
              <div class="form-group">
              <label class="col-sm-3 control-label"><strong>Small Text</strong></strong></label>
              <div class="col-sm-6"><input type="text" name="stxt" class="form-control input-lg"></div>          
                 </div>
        
           
                                            <div class="row">
                                                <div class="col-md-offset-3 col-md-6">
                                                    <button type="submit" class="btn blue btn-block">ADD NEW</button>
                                                </div>
                                            </div>
                      
                                        </div>
                                    </form>
                                </div>
                            </div>




<?php


          
//------------------------------------------->>> DELETE             

if(isset($_GET['did'])) {
$did = $_GET["did"];
$exist = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM slider_home_text WHERE id='".$did."'"));
if($exist[0]>=1){
    
$res = mysql_query("DELETE FROM slider_home_text WHERE id='".$did."'");

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



$ddaa = mysql_query("SELECT id, ttxt, btxt, stxt FROM slider_home_text ORDER BY id");
echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {

echo "<div class=\"col-md-6 col-sm-12\" style='text-align:center;'>



<b style=\"font-weight:bold; min-height:40px;\">$data[1] </b>
<h3 style=\"font-weight:bold; min-height:40px;\">$data[2] </h3> $data[3] <br><br>

<a href=\"?did=$data[0]\" class='btn purple btn-block'>DELETE</a>
<br><br><br><br>
</div>";





}
?>                    
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