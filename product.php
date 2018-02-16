<?php
include('include-global.php');
$iidd = mysql_real_escape_string($_GET['id']);
$pdet = mysql_fetch_array(mysql_query("SELECT name, rate, parent, img, moreimg, quick, description, delivery, vid, stock, sho, features, offtyp, offamo, offtill, featured FROM products WHERE id='".$iidd."'"));

$titleofme = "$basetitle - $pdet[0]";

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

                <?php
                $parent = mysql_fetch_array(mysql_query("SELECT name, parent FROM childcat WHERE id='".$pdet[2]."'"));
                $parent1 = mysql_fetch_array(mysql_query("SELECT name, parent FROM subcat WHERE id='".$parent[1]."'"));
                $parent2 = mysql_fetch_array(mysql_query("SELECT name FROM cat WHERE id='".$parent1[1]."'"));

                $url0 = "$baseurl/childcategory/$pdet[2]/".urlmod($parent[0]);
                $url1 = "$baseurl/subcategory/$parent[1]/".urlmod($parent1[0]);
                $url2 = "$baseurl/category/$parent1[1]/".urlmod($parent2[0]);
                 ?>

                <li class=""> <a title="Go to <?php echo $parent2[0]; ?>" href="<?php echo $url2; ?>">
                <?php echo $parent2[0]; ?></a><span>&rarr; </span></li>

                <li class=""> <a title="Go <?php echo $parent1[0]; ?>" href="<?php echo $url1; ?>">
                <?php echo $parent1[0]; ?></a><span>&rarr; </span></li>

                <li class=""> <a title="Go to <?php echo $parent[0]; ?>" href="<?php echo $url0; ?>">
                <?php echo $parent[0]; ?></a><span>&rarr; </span></li>


            <li class="category13"><strong><?php echo $pdet['name']; ?></strong></li>
          

          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
        <div class="col-main">
             <div class="row">
   
                <div class="product-view">
     
                    <!--div class="product-next-prev"> <a class="product-next" href="#"><span></span></a> <a class="product-prev" href="#"><span></span></a> </div-->


                  <div class="product-essential">
                    <form action="#" method="post" id="product_addtocart_form">
                      <input name="form_key" value="6UbXroakyQlbfQzK" type="hidden">
                      <div class="product-img-box col-sm-5 col-xs-12">
                        <div class="new-label new-top-left"> New </div>
                        <div class="product-image">
                          <div class="large-image"> <a href="<?php echo "$baseurl/productimages/$pdet[3]"; ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20" > <img src="<?php echo "$baseurl/productimages/$pdet[3]"; ?>" alt=""> </a> </div>



                            <div class="flexslider flexslider-thumb">
                                <ul class="previews-list slides">

                                    <li><a href='<?php echo "$baseurl/productimages/$pdet[3]"; ?>' class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo "$baseurl/productimages/$pdet[3]"; ?>' "><img src="<?php echo "$baseurl/productimages/$pdet[3]"; ?>" alt = "Thumbnail 1" style="width: 76px; height: 90px;" /></a></li>



                                    <?php

                                        $ddaa = mysql_query("SELECT img FROM moreimg WHERE assignto='".$iidd."' ORDER BY id");
                                        while ($data = mysql_fetch_array($ddaa))
                                            {
                                                echo "<li><a href='$baseurl/productimages/$data[0]' class='cloud-zoom-gallery' rel=\"useZoom: 'zoom1', smallImage: '$baseurl/productimages/$data[0]' \"><img src=\"$baseurl/productimages/$data[0]\" alt = \"Thumbnail\" style=\"width: 76px; height: 90px;\" /></a></li>";

                                            }


                                    ?>





                                </ul>
                            </div>


                        </div>
                         <!-- end: more-images -->
                      </div>
                      <div class="product-shop col-sm-7 col-xs-12">
                        <div class="product-name">
                          <h1><?php echo $pdet['name']; ?></h1>
                        </div>
        

        
                        <div class="price-block">
                            <div class="price-box">

                                <?php
                                /////////////------------------------------>>>>>>>>PRODUCT PRICE
                                $curr = mysql_fetch_array(mysql_query("SELECT currency FROM general_setting WHERE id='1'"));
                                if($pdet['offtyp']==0)
                                    {

                                        echo "<p class=\"special-price\"> <span class=\"price-label\">Special Price</span> <span id=\"product-price-48\" class=\"price\"> $pdet[rate] $curr[0] </span> </p>";

                                    }
                                    elseif($pdet['offtyp']==1)
                                        {

                                            $per = $pdet['offamo']/100;
                                            $dis = $pdet['rate']*$per;
                                            $disamo = $pdet['rate']-$dis;
                                            echo "<p class=\"special-price\"> <span class=\"price-label\">Special Price</span> <span id=\"product-price-48\" class=\"price\"> $disamo $curr[0] </span> </p> &nbsp;";
                                            echo "<p class=\"old-price\"> <span class=\"price-label\">Regular Price:</span> <span class=\"price\"> $pdet[rate] $curr[0] </span> </p>";

                                        }
                                        elseif ($pdet['offtyp']==2)
                                            {
                                                $disamo = $pdet['rate']-$pdet['offamo'];
                                                echo "<p class=\"special-price\"> <span class=\"price-label\">Special Price</span> <span id=\"product-price-48\" class=\"price\"> $disamo $curr[0] </span> </p> &nbsp;";
                                                echo "<p class=\"old-price\"> <span class=\"price-label\">Regular Price:</span> <span class=\"price\"> $pdet[rate] $curr[0] </span> </p>";
                                            }
                                /////////////------------------------------>>>>>>>>PRODUCT PRICE



                                /////////////------------------------------>>>>>>>>PRODUCT STOCK

                                if($pdet['stock']==0)
                                    {
                                      echo "<p class=\"availability in-stock pull-right\"><span>In Stock</span></p>";
                                    }
                                    else
                                        {

                                            $sto = $pdet['stock'];
                                            $ordered = mysql_fetch_array(mysql_query("SELECT SUM(qty) FROM carrrt WHERE pid='".$iidd."' AND ordered='1'"));
                                            $insto = $sto-$ordered[0];

                                            if($insto<=0)
                                                {

                                                    echo "<p class=\"availability out-of-stock pull-right\"><span>OUT OF STOCK </span></p>";

                                                }
                                                else
                                                    {
                                                        if($pdet['sho']==0)
                                                            {
                                                              echo "<p class=\"availability in-stock pull-right\"><span>In Stock</span></p>";
                                                            }
                                                            else
                                                                {
                                                                    echo "<p class=\"availability in-stock pull-right\"><span>$insto In Stock</span></p>";
                                                                }
                                                    }
                                        }

                                /////////////------------------------------>>>>>>>>PRODUCT STOCK
                                ?>

          
                                <!--p class="availability out-of-stock pull-right"><span>In Stock </span></p-->



                            </div>
                        </div>
        
                        <div class="short-description">
                            <h2>Quick Overview</h2>
                            <p><?php echo $pdet['quick']; ?></p>
                        </div>
                
              
                
                        <div class="add-to-box">
                          <div class="add-to-cart">
                              <div class="pull-left">
                                  <div class="custom pull-left">
                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 0 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                    <input type="text" id="qty" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                    <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                  </div>
                              </div>
                                <input type="hidden" id="id" name="id" value="<?php echo $iidd; ?>">
                                <input type="hidden" id="unique" name="unique" value="<?php echo $unique; ?>">


                                <button id="added" class="button btn-cart" title="Add to Cart" type="button"><span><i class="icon-basket"></i> Add to Cart</span></button>

                          </div>
                        </div>
                        <div id="success"></div>
        
                        <!--div class="social">
                                          <ul class="link">
                                  <li class="fb"><a href="#"></a></li>
                                  <li class="tw"><a href="#"></a></li>
                                  <li class="googleplus"><a href="#"></a></li>
                                  <li class="rss"><a href="#"></a></li>
                                  <li class="pintrest"><a href="#"></a></li>
                                  <li class="linkedin"><a href="#"></a></li>
                                  <li class="youtube"><a href="#"></a></li>
                                </ul>
                              </div-->


       
                      </div>
              
                    </form>
                  </div>
                  <div class="product-collateral col-lg-12 col-sm-12 col-xs-12 bounceInUp animated">
                    <div class="add_info">
                      <ul id="product-detail-tab" class="nav nav-tabs product-tabs">

                        <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Product Description </a> </li>
                        <li><a href="#product_tabs_delivery" data-toggle="tab">Delivery Details</a></li>



                          <?php
                            if($pdet['vid']!="0" && $pdet['vid']!="")
                                {
                                    echo "<li> <a href=\"#product_tabs_video\" data-toggle=\"tab\">Video</a> </li>";
                                }

                          ?>


                                <li> <a href="#reviews_tabs" data-toggle="tab">Reviews</a> </li>

                      </ul>
                      <div id="productTabContent" class="tab-content">
                        <div class="tab-pane fade in active" id="product_tabs_description">
                          <div class="std">

                            <?php echo $pdet['description']; ?>

                          </div>
                        </div>


                       <div class="tab-pane fade" id="product_tabs_delivery">
                            <div class="product-tabs-content-inner clearfix">
                                <?php echo $pdet['delivery']; ?>
                            </div>
                       </div>
                      <div class="tab-pane fade" id="product_tabs_video">
                          <div class="product-tabs-content-inner clearfix">
                            <?php echo "<iframe width=\"360\" height=\"220\" src=\"http://www.youtube.com/embed/$pdet[8]\"> </iframe>"; ?>
                          </div>
                      </div>


                              <div class="tab-pane fade" id="reviews_tabs">
                                    <div class="box-collateral box-reviews" id="customer-reviews">





                                        <?php
                                            if (!is_loggedin())
                                                {
                                                    echo "<h1 style='text-align:center;'>You are not loggedin. Please  <a href=\"$baseurl/signin\"><u>login</u></a> to Write Your Own Review </h1>";
                                                }
                                                else
                                                    {



                                                         ?>






                                                        <div class="box-reviews1">
                                                          <div class="form-add">
                                                            <form id="review-form" method="post" action="">
                                                              <h3>Write Your Own Review</h3>
                                                              <fieldset>
                                                                <h4>How do you rate this product? <em class="required">*</em></h4>
                                                                <span id="input-message-box"></span>
                                                                <table id="product-review-table" class="data-table">


                                                                  <thead>
                                                                    <tr class="first last">
                                                                      <th>&nbsp;</th>
                                                                      <th><span class="nobr">1 *</span></th>
                                                                      <th><span class="nobr">2 *</span></th>
                                                                      <th><span class="nobr">3 *</span></th>
                                                                      <th><span class="nobr">4 *</span></th>
                                                                      <th><span class="nobr">5 *</span></th>
                                                                    </tr>
                                                                  </thead>
                                                                  <tbody>
                                                                    <tr class="first odd">
                                                                      <th>Price</th>
                                                                      <td class="value"><input type="radio" class="radio" value="1" id="Price_1" name="ratings3"></td>
                                                                      <td class="value"><input type="radio" class="radio" value="2" id="Price_2" name="ratings3"></td>
                                                                      <td class="value"><input type="radio" class="radio" value="3" id="Price_3" name="ratings3"></td>
                                                                      <td class="value"><input type="radio" class="radio" value="4" id="Price_4" name="ratings3"></td>
                                                                      <td class="value last"><input type="radio" class="radio" value="5" id="Price_5" name="ratings3"></td>
                                                                    </tr>
                                                                    <tr class="even">
                                                                      <th>Value</th>
                                                                      <td class="value"><input type="radio" class="radio" value="1" id="Value_1" name="ratings2"></td>
                                                                      <td class="value"><input type="radio" class="radio" value="2" id="Value_2" name="ratings2"></td>
                                                                      <td class="value"><input type="radio" class="radio" value="3" id="Value_3" name="ratings2"></td>
                                                                      <td class="value"><input type="radio" class="radio" value="4" id="Value_4" name="ratings2"></td>
                                                                      <td class="value last"><input type="radio" class="radio" value="5" id="Value_5" name="ratings2"></td>
                                                                    </tr>
                                                                    <tr class="last odd">
                                                                      <th>Quality</th>
                                                                      <td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="ratings1"></td>
                                                                      <td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="ratings1"></td>
                                                                      <td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="ratings1"></td>
                                                                      <td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="ratings1"></td>
                                                                      <td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="ratings1"></td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                                <input type="hidden" value="" class="validate-rating" name="validate_rating">


                                                                        <textarea rows="3" class="form-control" id="review_field" placeholder="Your Coment" name="detail"></textarea>

                                                                  <div class="buttons-set">
                                                                    <button class="button submit" id="sbmt" title="Submit Review" type="submit"><span>Submit Review</span></button>
                                                                  </div>

                                                              </fieldset>
                                                            </form>
                                                          </div>
                                                        </div>


                                                        <?php

                                                    }
                                                        ?>


                                            <hr>






                                            <div class="box-reviews2">
                                              <h3>Customer Reviews</h3>
                                              <div class="box visible">
                                                <ul>
                                                <div id="done"></div>


                                                <?php
                                                    $count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM rating WHERE pid='".$iidd."' ORDER BY id"));

                                                    if($count[0]==0)
                                                        {
                                                            echo "<h2 id=\"nonono\" style='text-align:center;'>No Review Yet </h2>";

                                                        }

                                                    $ddaa = mysql_query("SELECT id, userid, pid, v, q, p, cmnt, tm FROM rating WHERE pid='".$iidd."' ORDER BY id");
                                                    while ($data = mysql_fetch_array($ddaa))
                                                        {

                                                            $v = $data[3]*20;
                                                            $q = $data[4]*20;
                                                            $p = $data[5]*20;

                                                            $rname = mysql_fetch_array(mysql_query("SELECT name FROM users WHERE id='".$data[1]."'"));

                                                            $rtm = date("Y-m-d", $data[7]);
                                                            ?>


                                                              <li>
                                                                <table class="ratings-table">


                                                                  <tbody>
                                                                    <tr>
                                                                      <th>Value</th>
                                                                      <td><div class="rating-box">
                                                                          <div class="rating" style="width: <?php echo $v; ?>%;"></div>
                                                                        </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Quality</th>
                                                                      <td><div class="rating-box">
                                                                          <div class="rating"  style="width: <?php echo $q; ?>%;"></div>
                                                                        </div></td>
                                                                    </tr>
                                                                    <tr>
                                                                      <th>Price</th>
                                                                      <td><div class="rating-box">
                                                                          <div class="rating" style="width: <?php echo $p; ?>%;"></div>
                                                                        </div></td>
                                                                    </tr>
                                                                  </tbody>
                                                                </table>
                                                                <div class="review">
                                                                  <h6><?php echo $rname[0]; ?></h6>
                                                                  <small>Submitted On <?php echo $rtm; ?></small>
                                                                  <div class="review-txt"> <?php echo $data[6]; ?> </div>
                                                                </div>
                                                              </li>


                                                                <?php

                                                        }
                                                                 ?>





                                                </ul>
                                              </div>

                                            </div>
                                            <hr>
                                            <div class="clear"></div>
                                    </div>
                              </div>
                
               
                      </div>
                    </div>
                  </div>
          
                </div>
            </div>
        </div>
    </div>
  </section>
  <!-- Main Container End --> 
  
  <!-- Related Products Slider -->
  <section class="related-pro wow bounceInUp animated">
    <div class="container">
      <div class="slider-items-products">
        <div class="new_title center">
          <h2>Related Products</h2>
        </div>
        <div id="related-products-slider" class="product-flexslider hidden-buttons">
            <div class="slider-items slider-width-col4 products-grid">

                <?php
                    $ddaa = mysql_query("SELECT id FROM products WHERE parent='".$pdet[2]."' ORDER BY id DESC LIMIT 0,6");
                    while ($data = mysql_fetch_array($ddaa))
                        {

                            echo singleslide($data[0]);
                        }
                ?>



            
            </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Related Products Slider End --> 


 

  
 
  <?php
include('include-foot-service.php');
include('include-footer.php');
?>


				
 <script type = "text/javascript" language = "javascript">
 
 
      $(document).ready(function()
        {

            $("#sbmt").click(function()
                {


                    var cmnt=$("#review_field").val();
                    var r1=$("input[name='ratings1']:checked").val();
                    var r2=$("input[name='ratings2']:checked").val();
                    var r3=$("input[name='ratings3']:checked").val();


         

                    $.post(
                              "<?php echo $baseurl;?>/api-review.php",
                              {
                                   ratings1: r1,
                                   ratings2: r2,
                                   ratings3: r3,
                                   pid: "<?php echo $iidd;?>",
                                   cmnt: cmnt
                              },
        
                              function(data) {

                                    $('#done').html(data);
                                    $("#nonono").fadeOut();
                              }
     
                    );
                    return false;

  
                });





			
			
			
            $("#added").click(function()
                {
			
                     $('#success').show();
                    var qty = $("#qty").val();

                    var id = $("#id").val();
                    var unique = $("#unique").val();





                    $.post(
                      "<?php echo $baseurl;?>/cadd.php",
                      {
                        unique: unique,
                        id: id,
                        qty: qty
                      },
                      function(data) {

                             $('#success').html("<div class='alert alert-success alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>"+data+"</div>");

                             $.when($('#success').fadeOut(2000))
                                       .done(function() {
                                                                        $.post(
                                              "<?php echo $baseurl;?>/api-cart-top.php",
                                              {
                                                unique: "<?php echo $unique;?>"
                                              },
                                              function(data) {

                                                 $('#cartoon').html(data);

                                              }
                                           );
										
										
										});
                      }
                    );
					
                });
				
        });
      </script>





</body>
</html>