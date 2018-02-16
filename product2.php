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

                    <!--div class="ratings">
                              <div class="rating-box">
                                <div class="rating"></div>
                              </div>
                              <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#">Add Your Review</a> </p>
                            </div-->

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

                                          if($pdet['sho']==0)
                                            {
                                                echo "<p class=\"availability in-stock pull-right\"><span>In Stock</span></p>";
                                            }
                                            else
                                                {
                                                     echo "<p class=\"availability in-stock pull-right\"><span> $sto In Stock</span></p>";
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
                                <input type="text" class="input-text qty" title="Qty" value="1" maxlength="12" id="qty" name="qty">
                                <button onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                              </div>
                          </div>

                          <button onClick="productAddToCartForm.submit(this)" class="button btn-cart" title="Add to Cart" type="button"><span><i class="icon-basket"></i> Add to Cart</span></button>

                      </div>
                      <!--div class="email-addto-box">
                        <p class="email-friend"><a href="#" class=""><span>Email to a Friend</span></a></p>
                        <ul class="add-to-links">
                          <li> <a class="link-wishlist" href="#"><span>Add to Wishlist</span></a></li>
                          <li><span class="separator">|</span> <a class="link-compare" href="#"><span>Add to Compare</span></a></li>
                        </ul>
                      </div-->
                    </div>

                    <div class="social">
                                  <ul class="link">
                          <li class="fb"><a href="#"></a></li>
                          <li class="tw"><a href="#"></a></li>
                          <li class="googleplus"><a href="#"></a></li>
                          <li class="rss"><a href="#"></a></li>
                          <li class="pintrest"><a href="#"></a></li>
                          <li class="linkedin"><a href="#"></a></li>
                          <li class="youtube"><a href="#"></a></li>
                        </ul>
                    </div>



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
                        <div class="box-reviews1">
                          <div class="form-add">
                            <form id="review-form" method="post" action="http://www..com/review/product/post/id/176/">
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
                                      <td class="value"><input type="radio" class="radio" value="11" id="Price_1" name="ratings[3]"></td>
                                      <td class="value"><input type="radio" class="radio" value="12" id="Price_2" name="ratings[3]"></td>
                                      <td class="value"><input type="radio" class="radio" value="13" id="Price_3" name="ratings[3]"></td>
                                      <td class="value"><input type="radio" class="radio" value="14" id="Price_4" name="ratings[3]"></td>
                                      <td class="value last"><input type="radio" class="radio" value="15" id="Price_5" name="ratings[3]"></td>
                                    </tr>
                                    <tr class="even">
                                      <th>Value</th>
                                      <td class="value"><input type="radio" class="radio" value="6" id="Value_1" name="ratings[2]"></td>
                                      <td class="value"><input type="radio" class="radio" value="7" id="Value_2" name="ratings[2]"></td>
                                      <td class="value"><input type="radio" class="radio" value="8" id="Value_3" name="ratings[2]"></td>
                                      <td class="value"><input type="radio" class="radio" value="9" id="Value_4" name="ratings[2]"></td>
                                      <td class="value last"><input type="radio" class="radio" value="10" id="Value_5" name="ratings[2]"></td>
                                    </tr>
                                    <tr class="last odd">
                                      <th>Quality</th>
                                      <td class="value"><input type="radio" class="radio" value="1" id="Quality_1" name="ratings[1]"></td>
                                      <td class="value"><input type="radio" class="radio" value="2" id="Quality_2" name="ratings[1]"></td>
                                      <td class="value"><input type="radio" class="radio" value="3" id="Quality_3" name="ratings[1]"></td>
                                      <td class="value"><input type="radio" class="radio" value="4" id="Quality_4" name="ratings[1]"></td>
                                      <td class="value last"><input type="radio" class="radio" value="5" id="Quality_5" name="ratings[1]"></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <input type="hidden" value="" class="validate-rating" name="validate_rating">
                                <div class="review1">
                                  <ul class="form-list">
                                    <li>
                                      <label class="required" for="nickname_field">Nickname<em>*</em></label>
                                      <div class="input-box">
                                        <input type="text" class="input-text" id="nickname_field" name="nickname">
                                      </div>
                                    </li>
                                    <li>
                                      <label class="required" for="summary_field">Summary<em>*</em></label>
                                      <div class="input-box">
                                        <input type="text" class="input-text" id="summary_field" name="title">
                                      </div>
                                    </li>
                                  </ul>
                                </div>
                                <div class="review2">
                                  <ul>
                                    <li>
                                      <label class="required " for="review_field">Review<em>*</em></label>
                                      <div class="input-box">
                                        <textarea rows="3" cols="5" id="review_field" name="detail"></textarea>
                                      </div>
                                    </li>
                                  </ul>
                                  <div class="buttons-set">
                                    <button class="button submit" title="Submit Review" type="submit"><span>Submit Review</span></button>
                                  </div>
                                </div>
                              </fieldset>
                            </form>
                          </div>
                        </div>
                        <div class="box-reviews2">
                          <h3>Customer Reviews</h3>
                          <div class="box visible">
                            <ul>
                              <li>
                                <table class="ratings-table">


                                  <tbody>
                                    <tr>
                                      <th>Value</th>
                                      <td><div class="rating-box">
                                          <div class="rating"></div>
                                        </div></td>
                                    </tr>
                                    <tr>
                                      <th>Quality</th>
                                      <td><div class="rating-box">
                                          <div class="rating"></div>
                                        </div></td>
                                    </tr>
                                    <tr>
                                      <th>Price</th>
                                      <td><div class="rating-box">
                                          <div class="rating"></div>
                                        </div></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="review">
                                  <h6><a href="#">Excellent</a></h6>
                                  <small>Review by <span>Leslie Prichard </span>on 1/3/2014 </small>
                                  <div class="review-txt"> I have purchased shirts from Minimalism a few times and am never disappointed. The quality is excellent and the shipping is amazing. It seems like it's at your front door the minute you get off your pc. I have received my purchases within two days - amazing.</div>
                                </div>
                              </li>
                              <li class="even">
                                <table class="ratings-table">


                                  <tbody>
                                    <tr>
                                      <th>Value</th>
                                      <td><div class="rating-box">
                                          <div class="rating"></div>
                                        </div></td>
                                    </tr>
                                    <tr>
                                      <th>Quality</th>
                                      <td><div class="rating-box">
                                          <div class="rating"></div>
                                        </div></td>
                                    </tr>
                                    <tr>
                                      <th>Price</th>
                                      <td><div class="rating-box">
                                          <div class="rating"></div>
                                        </div></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="review">
                                  <h6><a href="#/catalog/product/view/id/60/">Amazing</a></h6>
                                  <small>Review by <span>Sandra Parker</span>on 1/3/2014 </small>
                                  <div class="review-txt"> Minimalism is the online ! </div>
                                </div>
                              </li>
                              <li>
                                <table class="ratings-table">


                                  <tbody>
                                    <tr>
                                      <th>Value</th>
                                      <td><div class="rating-box">
                                          <div class="rating"></div>
                                        </div></td>
                                    </tr>
                                    <tr>
                                      <th>Quality</th>
                                      <td><div class="rating-box">
                                          <div class="rating"></div>
                                        </div></td>
                                    </tr>
                                    <tr>
                                      <th>Price</th>
                                      <td><div class="rating-box">
                                          <div class="rating"></div>
                                        </div></td>
                                    </tr>
                                  </tbody>
                                </table>
                                <div class="review">
                                  <h6><a href="#/catalog/product/view/id/59/">Nicely</a></h6>
                                  <small>Review by <span>Anthony  Lewis</span>on 1/3/2014 </small>
                                  <div class="review-txt"> Unbeatable service and selection. This store has the best business model I have seen on the net. They are true to their word, and go the extra mile for their customers. I felt like a purchasing partner more than a customer. You have a lifetime client in me. </div>
                                </div>
                              </li>
                            </ul>
                          </div>
                          <div class="actions"> <a class="button view-all" id="revies-button" href="#"><span><span>View all</span></span></a> </div>
                        </div>
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
</body>
</html>