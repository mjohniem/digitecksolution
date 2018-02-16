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
                    <h3 class="page-title"><i class="fa fa-plus"></i> Add New Product
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
$rate = mysql_real_escape_string($_POST["rate"]);
$parent = mysql_real_escape_string($_POST["child"]);
$quick = mysql_real_escape_string($_POST["quick"]);
$description = mysql_real_escape_string($_POST["description"]);
$delivery = mysql_real_escape_string($_POST["delivery"]);
$vid = mysql_real_escape_string($_POST["vid"]);
$stock = mysql_real_escape_string($_POST["stock"]);
$sho = mysql_real_escape_string($_POST["sho"]);




///-------------------------------->>GRAB features 
/*
$savefea = "";
$features = $_POST['features'];
foreach ($features as $fnum){
$savefea = "$savefea,$fnum";
}
$savefea = substr($savefea, 1);
*/
///-------------------------------->>GRAB features




$err1=0;
$err2=0;




////////////////////-------------------->> TITLE ki faka??

 if(trim($name)=="")
      {
$err1=1;
}

if($parent=="" || $parent=="0")
      {
$err2=1;
}

$error = $err1+$err2;


if ($error == 0){






if (empty($_FILES['bgimg']['name'])) {
$bgimg = "nopic.jpg";
}else{
// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../productimages/";
    $extention = strrchr($_FILES['bgimg']['name'], ".");
    $new_name = time();
    $bgimg = $new_name.$extention;
    $uploaddir = $folder . $bgimg;
    move_uploaded_file($_FILES['bgimg']['tmp_name'], $uploaddir);

    //------------------>>> RESIZE
include_once("abirimageclass.php");
$target_file = $folder.$bgimg;
$resized_file = $folder.$bgimg;
$wmax = 700;
$hmax = 850;
$ext = ".jpg";
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $ext);


//------------------>>> RESIZE



//////////////////////////////////////////////////////////////////////////
}






$res = mysql_query("INSERT INTO products SET name='".$name."', rate='".$rate."', parent='".$parent."', img='".$bgimg."', quick='".$quick."', description='".$description."', delivery='".$delivery."', vid='".$vid."', stock='".$stock."', sho='".$sho."', features='0'");
echo mysql_error();
if($res){
    echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
PRODUCT Added Successfully!
</div>";












//--------------------------->>>>> Multiple Image

$assignto = mysql_fetch_array(mysql_query("SELECT id FROM products WHERE name='".$name."' AND rate='".$rate."' AND parent='".$parent."' AND img='".$bgimg."' ORDER BY id DESC"));

extract($_POST);
    $error=array();
    $extension=array("jpeg","jpg","png","gif");
    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name)
            {
                

                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                if(in_array($ext,$extension))
                {
$dt = date("YmdHis", time());
$random = rand(100000,999999);
$fnm = $file_name;
    
    $string = strtolower($fnm);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", "", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "_", $string);
    $ok = substr("$string", 0, -3);
    
$fnl = "$dt$random$ok";
                        $filename=basename($file_name,$ext);
                        $newFileName=$fnl.".jpg";
                        move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../productimages/".$newFileName);
 //$aa = "$aa,$newFileName";     

mysql_query("INSERT INTO moreimg SET assignto='".$assignto[0]."', img='".$newFileName."'");
echo mysql_error();

  //------------------>>> RESIZE
//include_once("abirimageclass.php");
    $folder = "../productimages/";

$target_file = $folder.$newFileName;
$resized_file = $folder.$newFileName;
$wmax = 700;
$hmax = 850;
$ext = ".jpg";
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $ext);
//------------------>>> RESIZE

                }
                else
                {
                    array_push($error,"$file_name, ");
                }
            }
//$aa = substr($aa, 1);
//echo "$aa";
//--------------------------->>>>> Multiple Image



















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

Title Can Not be Empty!!!

</div>";
}       
if ($err2 == 1){
echo "<div class=\"alert alert-danger alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    

Parent Not be Empty!!!

</div>";
}

}




}

$curr = mysql_fetch_array(mysql_query("SELECT currency FROM general_setting WHERE id='1'"));

?>  								
										
										
		
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                        <div class="form-body">	
                
            <div class="form-group">
              <label class="col-sm-3 control-label">PRODUCT NAME</label>
              <div class="col-sm-6"><input name="name" value="" class="form-control" type="text"></div>
            </div>

            
            <div class="form-group">
              <label class="col-sm-3 control-label">PRODUCT PRICE</label>
              
              <div class="col-sm-6">                

                <div class="input-group mb15">
                  <input class="form-control" name="rate" type="text">
                  <span class="input-group-addon"><?php echo $curr[0]; ?></span>
                </div>

                </div>
                
                
            </div>

       






          
          

            <div class="form-group">
              <label class="col-sm-3 control-label">PRODUCT CATEGORY</label>
              <div class="col-sm-6">
<select id="cat" name="cat" class="form-control input-lg">
  <option value="">--</option>
<?php
$ddaa = mysql_query("SELECT id, name FROM cat ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
       echo "<option value=\"$data[0]$data[1]\">$data[1]</option>";
   }
?>
</select>
              
              </div>
            </div>
            
          
            
            <div class="form-group">
              <label class="col-sm-3 control-label">SUB CATEGORY</label>
              <div class="col-sm-6">

<select id="subcat" name="subcat" class="form-control input-lg">
  <option value="">--</option>
  

<?php
$ddaa = mysql_query("SELECT id, name, parent FROM subcat ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
  $pnm = mysql_fetch_array(mysql_query("SELECT name FROM cat WHERE id='".$data[2]."'"));    
       echo "<option value=\"$data[0]$data[1]\" class=\"$data[2]$pnm[0]\">$data[1]</option>";
   }
?>

</select>
              
              </div>
            </div>
            
          
            
            <div class="form-group">
              <label class="col-sm-3 control-label">CHILD CATEGORY</label>
              <div class="col-sm-6">

<select id="child" name="child" class="form-control input-lg">
  <option value="">--</option>



<?php
$ddaa = mysql_query("SELECT id, name, parent FROM childcat ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {
  $pnm = mysql_fetch_array(mysql_query("SELECT name FROM subcat WHERE id='".$data[2]."'"));    
       echo "<option value=\"$data[0]\" class=\"$data[2]$pnm[0]\">$data[1]</option>";
   }
?>




</select>
              
              </div>
            </div>
            
          
            
            
                        <div class="form-group">
              <label class="col-sm-3 control-label">Main IMAGE</label>
              <div class="col-sm-3"><input name="bgimg" type="file" id="bgimg" /></div>
              <div class="col-sm-3"><b style="color:red; font-weight: bold;"> ONE IMAGE ONLY</b></div>
          
                 </div>
                        <div class="form-group">
              <label class="col-sm-3 control-label">Other IMAGE</label>
              <div class="col-sm-3"><input type="file" name="files[]" multiple></div>
              <div class="col-sm-3"><b style="color:red; font-weight: bold;"> MULTIPLE IMAGE</b></div>
          
                 </div>
        
   
            <div class="form-group">
              <label class="col-sm-3 control-label">Youtube Video Code</label>
              <div class="col-sm-6"><input name="vid" class="form-control" type="text"></div>
              <div class="col-sm-3"><b style="color:red; font-weight: bold;"> Put 0 if Not Applicable</b></div>
            </div>



            <div class="form-group">
              <label class="col-sm-3 control-label">Quick Overview</label>
              <div class="col-sm-6">
              <textarea id="" placeholder="" class="wysihtml5 form-control" rows="10" name="quick"></textarea>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-3 control-label">Product Description</label>
              <div class="col-sm-6">
              <textarea id="" placeholder="" class="wysihtml5 form-control" rows="10" name="description"></textarea>
              </div>
            </div>



            <div class="form-group">
              <label class="col-sm-3 control-label">Delivery Details</label>
              <div class="col-sm-6">
              <textarea id="" placeholder="" class="wysihtml5 form-control" rows="10" name="delivery"></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Stock</label>
              <div class="col-sm-3"><input name="stock" class="form-control" type="text"></div>
              <div class="col-sm-6"><b style="color:red; font-weight: bold;"> Put 0 if Not Applicable (ALWAYS AVAILABLE)</b></div>
            </div>

     
            <div class="form-group">
              <label class="col-sm-3 control-label">Show Quantity</label>
              <div class="col-sm-6">

              <select name="sho" id="" class="form-control">
                  <option value="1">Show Available Quantity Number </option>
                  <option value="0">Don't Show Available Number </option>
              </select>
              </div>
            </div>

     <br/><br/>


 <!--div class="form-group">
              <label class="col-sm-3 control-label">Feature</label>
<div class="col-md-6">
<div class="checkbox-list">
<?php 


echo "<label class=\"checkbox-inline\"><input id=\"features\" name=\"features[]\" value=\"0\" type=\"checkbox\"><b>NOT APPLICABLE </b></label><br><br>
";


        $ddaa = mysql_query("SELECT id, details FROM features ORDER BY id");
    echo mysql_error();
    while ($data = mysql_fetch_array($ddaa))
    {                                       
echo "<label class=\"checkbox-inline\"><input id=\"features\" name=\"features[]\" value=\"$data[0]\" type=\"checkbox\"><i>$data[1]</i></label><br><br>
";

    }
?>

</div></div></div-->
 
 




<br/><br/>
<!--textarea id="wysiwyg2" placeholder="DELIVERY DETAILS....." class="form-control" rows="10" name="delivery"></textarea><br/><br/-->

         
          

          




					 
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