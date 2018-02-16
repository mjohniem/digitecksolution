<?php
include('include-global.php');
$iidd = mysql_real_escape_string($_GET['id']);


$parent2 = mysql_fetch_array(mysql_query("SELECT name FROM cat WHERE id='".$iidd."'"));

 



$titleofme = "$basetitle - $parent2[0]";

include('include-styles.php');

echo '</head><body>';

include('include-header.php');
include('include-navbar.php');
?>



  <!-- Breadcrumbs -->
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
             <li class="home"> <a title="Go to Home Page" href="<?php echo $baseurl; ?>">Home</a><span>&rarr; </span></li>


            <li class="category13"><strong><?php echo $parent2[0]; ?></strong></li>

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <section class="main-container col2-left-layout bounceInUp animated">
    <div class="category-description std">
        <div class="container">
          <div class="slider-items-products">
            <div id="category-desc-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col1 owl-carousel owl-theme">


                <?php

                $ddaa = mysql_query("SELECT id, img, btxt, stxt FROM slider_cat ORDER BY id");
                echo mysql_error();
                    while ($data = mysql_fetch_array($ddaa))
                    {
                ?>
                                    <!-- Item -->
                                    <div class="item"> <a href="#"><img alt="" src="<?php echo "$baseurl/images/slider_cat/$data[1]"; ?>"></a>
                                      <div class="cat-img-title cat-bg cat-box">
                                        <h2 class="cat-heading" style="color: #0088cc;"><?php echo $data[2]; ?></h2>
                                        <p><?php echo $data[3]; ?> </p>
                                      </div>
                                    </div>
                                    <!-- End Item -->
                <?php
                    }
                 ?>

              </div>
            </div>
          </div>
        </div>
    </div>
			
    <div class="container">
      <div class="row">
        <div class="col-main col-sm-9 col-sm-push-3">
          <article class="col-main">
            <div class="page-title">
              <h2><?php echo $parent2[0]; ?></h2>
            </div>
            
            
            <div class="category-products">
              <ul class="products-grid">




                <div id="load">

                </div>
                 <br>

                <div style="text-align: center;">
                    <img style="display:none; align: center;" id="loading" src="<?php echo $baseurl;?>/loader.gif" />
                </div>
                <br>
                <button id="lmore" class="btn btn-primary btn-block">Load More</button>
              </ul>
            </div>
          </article>
          <!--	///*///======    End article  ========= //*/// --> 
        </div>
        <div class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9">
          <aside class="col-left sidebar">
            

            <?php

            include('include-cat-left.php');
            include('include-cart-left.php');
             ?>
          </aside>
        </div>
      </div>
    </div>
  </section>
  <!-- Main Container End --> 


<?php
include('include-foot-service.php');
include('include-footer.php');
?>



<script>

 $(document).ready(function() {
        var last = 0;
        
        $.post( 
                  "<?php echo $baseurl;?>/api-main.php",
                  { 
          lstid: last,
          cid: "<?php echo $iidd; ?>"
          },
                  function(data) {
            
                     $('#load').append(data);

                     
           var sesh = $("#sesh").val();
            if(sesh==1){

                 $("#lmore").fadeOut("slow"); 

                       }
          
                  }
               );
         

});



$("#lmore").click(function() {
  
  var hit = $(document).height();
  var x = hit - 1000;
  var last = $("#lastuu").val();
   

        $("#loading").fadeIn();
        $.post( 
                  "<?php echo $baseurl;?>/api-main.php",
                  { 
          lstid: last,
          cid: "<?php echo $iidd; ?>"
          },
                  function(data) {

           $("#lastuu").removeAttr('id');
           $("#loading").delay(1500).fadeOut(1500); 
           
          $(data).hide().delay(3000).appendTo("#load").fadeIn(1000);


           var sesh = $("#sesh").val();
            if(sesh==1){

                 $("#lmore").fadeOut("slow"); 

                       }
                    }
               );
 
});

     

</script>





</body>
</html>