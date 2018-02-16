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
$iidd = $_GET['id'];
?>

 

		
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEADER-->
                   
                    <!-- BEGIN PAGE TITLE-->
                    <h3 class="page-title"><i class="fa fa-edit"></i> Edit Product
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


if(!isset($parent)){
$ppp = mysql_fetch_array(mysql_query("SELECT parent FROM products WHERE id='".$iidd."'"));
$parent = $ppp[0];
}

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
$img = mysql_fetch_array(mysql_query("SELECT img FROM products WHERE id='".$iidd."'"));
$bgimg = $img[0];
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






$res = mysql_query("UPDATE products SET name='".$name."', rate='".$rate."', parent='".$parent."', img='".$bgimg."', quick='".$quick."', description='".$description."', delivery='".$delivery."', vid='".$vid."', stock='".$stock."', sho='".$sho."' WHERE id='".$iidd."'");
echo mysql_error();
if($res){
    echo "<div class=\"alert alert-success alert-dismissable\">
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
PRODUCT Updated Successfully!
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
$old = mysql_fetch_array(mysql_query("SELECT name, rate, parent, img, quick, description, delivery, vid, stock, sho, features FROM products WHERE id='".$iidd."'"));
echo mysql_error();
?>  								
										
										
		
                                <div class="portlet-body form">
                                    <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                                        <div class="form-body">	
                
            <div class="form-group">
              <label class="col-sm-3 control-label">PRODUCT NAME</label>
              <div class="col-sm-6"><input name="name" value="<?php echo $old[0]; ?>" class="form-control" type="text"></div>
            </div>

            
            <div class="form-group">
              <label class="col-sm-3 control-label">PRODUCT PRICE</label>
              
              <div class="col-sm-6">                

                <div class="input-group mb15">
                  <input class="form-control" name="rate" value="<?php echo $old[1]; ?>" type="text">
                  <span class="input-group-addon"><?php echo $curr[0]; ?></span>
                </div>

                </div>
                
                
            </div>

       

<?php 

$parent = mysql_fetch_array(mysql_query("SELECT name, parent FROM childcat WHERE id='".$old[2]."'"));
$parent1 = mysql_fetch_array(mysql_query("SELECT name, parent FROM subcat WHERE id='".$parent[1]."'"));
$parent2 = mysql_fetch_array(mysql_query("SELECT name FROM cat WHERE id='".$parent1[1]."'"));
?>


          
          

            <div class="form-group">
              <label class="col-sm-3 control-label">PRODUCT CATEGORY</label>
              <div class="col-sm-6">

CURRENTLY LISTED AS :<b> <?php echo "$parent2[0] &rarr; $parent1[0] &rarr; $parent[0]"; ?></b> [DO NOT SELECT IF NOT NEED]

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
              <div class="col-sm-3">Current Image: <br> 
              <img src="../productimages/<?php echo $old[3]; ?>" alt="IMG" style="height: 100px;"></div>
          
                 </div>


        
   
            <div class="form-group">
              <label class="col-sm-3 control-label">Youtube Video Code</label>
              <div class="col-sm-6"><input name="vid" value="<?php echo $old[7]; ?>" class="form-control" type="text"></div>
              <div class="col-sm-3"><b style="color:red; font-weight: bold;"> Put 0 if Not Applicable</b></div>
            </div>



            <div class="form-group">
              <label class="col-sm-3 control-label">Quick Overview</label>
              <div class="col-sm-6">
              <textarea id="" placeholder="" class="wysihtml5 form-control" rows="10" name="quick"><?php echo $old[4]; ?></textarea>
              </div>
            </div>


            <div class="form-group">
              <label class="col-sm-3 control-label">Product Description</label>
              <div class="col-sm-6">
              <textarea id="" placeholder="" class="wysihtml5 form-control" rows="10" name="description"><?php echo $old[5]; ?></textarea>
              </div>
            </div>



            <div class="form-group">
              <label class="col-sm-3 control-label">Delivery Details</label>
              <div class="col-sm-6">
              <textarea id="" placeholder="" class="wysihtml5 form-control" rows="10" name="delivery"><?php echo $old[6]; ?></textarea>
              </div>
            </div>

            <div class="form-group">
              <label class="col-sm-3 control-label">Stock</label>
              <div class="col-sm-3"><input name="stock" class="form-control" value="<?php echo $old[8]; ?>" type="text"></div>
              <div class="col-sm-6"><b style="color:red; font-weight: bold;"> Put 0 if Not Applicable (ALWAYS AVAILABLE)</b></div>
            </div>

     
            <div class="form-group">
              <label class="col-sm-3 control-label">Show Quantity</label>
              <div class="col-sm-6">

              <select name="sho" id="" class="form-control">

<?php
if($old[9]==0){
  echo "<option value=\"0\">Don't Show Available Number [SELECTED] </option>";
}else{
  echo "<option value=\"1\">Show Available Quantity Number [SELECTED]</option>";
}

?>

                  <option value="1">Show Available Quantity Number </option>
                  <option value="0">Don't Show Available Number </option>
              </select>
              </div>
            </div>

     <br/><br/>


 
 
 




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