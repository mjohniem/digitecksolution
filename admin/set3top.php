<?php
include ('include/header.php');
?>

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
                    <h3 class="page-title"> Set TOP 3 Static Images
                        <small></small>
                    </h3>
                    <!-- END PAGE TITLE-->

					<hr>





    <?php
    
if($_POST)
{


 /////--------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>> 1
if (empty($_FILES['bgimg1']['name'])) {

}else{
// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../images/";
    $extention = strrchr($_FILES['bgimg1']['name'], ".");
    $new_name = "block1";
    $bgimg = $new_name.'.jpg';
    $uploaddir = $folder . $bgimg;
    move_uploaded_file($_FILES['bgimg1']['tmp_name'], $uploaddir);

    //------------------>>> RESIZE
include_once("abirimageclass.php");
$target_file = $folder.$bgimg;
$resized_file = $folder.$bgimg;
$wmax = 370;
$hmax = 220;
$ext = ".jpg";
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $ext);

//------------------>>> RESIZE
}
 /////--------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>> 1

 /////--------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>> 2
if (empty($_FILES['bgimg2']['name'])) {

}else{
// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../images/";
    $extention = strrchr($_FILES['bgimg2']['name'], ".");
    $new_name = "block2";
    $bgimg = $new_name.'.jpg';
    $uploaddir = $folder . $bgimg;
    move_uploaded_file($_FILES['bgimg2']['tmp_name'], $uploaddir);

    //------------------>>> RESIZE
include_once("abirimageclass.php");
$target_file = $folder.$bgimg;
$resized_file = $folder.$bgimg;
$wmax = 370;
$hmax = 220;
$ext = ".jpg";
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $ext);

//------------------>>> RESIZE
}
 /////--------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>> 2

 /////--------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>> 3
if (empty($_FILES['bgimg3']['name'])) {

}else{
// IMAGE UPLOAD //////////////////////////////////////////////////////////
    $folder = "../images/";
    $extention = strrchr($_FILES['bgimg3']['name'], ".");
    $new_name = "block3";
    $bgimg = $new_name.'.jpg';
    $uploaddir = $folder . $bgimg;
    move_uploaded_file($_FILES['bgimg3']['tmp_name'], $uploaddir);

    //------------------>>> RESIZE
include_once("abirimageclass.php");
$target_file = $folder.$bgimg;
$resized_file = $folder.$bgimg;
$wmax = 370;
$hmax = 220;
$ext = ".jpg";
ak_img_resize($target_file, $resized_file, $wmax, $hmax, $ext);

//------------------>>> RESIZE
}
 /////--------------------------------------------->>>>>>>>>>>>>>>>>>>>>>>>> 1


}
?>

<div class="row">


<div class="col-md-4">

<form action="" method="post" enctype="multipart/form-data" >
                 
            <div class="form-group">
              <div class="col-sm-12"><input name="bgimg1" type="file" id="bgimg" /></div>
              <input name="abir" type="hidden" value="bgimg" />
              <br>
              <br>
<button type="submit" class="btn btn-primary btn-block">UPLOAD</button>
            </div>
                
          </form>
<img src="../images/block1.jpg"  alt="IMG" style="width: 100%;">
</div>





<div class="col-md-4">

<form action="" method="post" enctype="multipart/form-data" >
                 
            <div class="form-group">
              <div class="col-sm-12"><input name="bgimg2" type="file" id="bgimg" /></div>
              <input name="abir" type="hidden" value="bgimg" />
              <br>
              <br>
<button type="submit" class="btn btn-primary btn-block">UPLOAD</button>
            </div>
                
          </form>
<img src="../images/block2.jpg"  alt="IMG" style="width: 100%;">
</div>





<div class="col-md-4">

<form action="" method="post" enctype="multipart/form-data" >
                 
            <div class="form-group">
              <div class="col-sm-12"><input name="bgimg3" type="file" id="bgimg" /></div>
              <input name="abir" type="hidden" value="bgimg" />
              <br>
              <br>
<button type="submit" class="btn btn-primary btn-block">UPLOAD</button>
            </div>
                
          </form>
<img src="../images/block3.jpg"  alt="IMG" style="width: 100%;">
</div>





  </div>


<?php
include ('include/footer.php');
?>


</body>
</html>