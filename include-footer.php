
  <!-- Footer -->
  <footer>
		<div class="footer-inner">
		  <div class="container">
				<div class="row">
				  <div class="col-sm-12 col-xs-12 col-lg-8">

						<?php 
						    $fhead = mysql_fetch_array(mysql_query("SELECT n1, n2, n3 FROM foot_head WHERE id='1'"));
						?>



						<div class="footer-column pull-left">
						  <h4> <?php echo $fhead[0]; ?> </h4>
						  <ul class="links">

								<?php 

									$ddaa = mysql_query("SELECT id, name FROM foot_menu WHERE parent='1' ORDER BY id");
										while ($data = mysql_fetch_array($ddaa))
										{
                                            $uri = urlmod($data[1]);

                                            echo "<li><a href=\"$baseurl/menu/$data[0]/$uri\" title=\"$data[1]\">$data[1]</a></li>";
                                        }
								?>

						  </ul>
						</div>
						<div class="footer-column pull-left">
						  <h4> <?php echo $fhead[1]; ?> </h4>
						  <ul class="links">

							<?php 

								$ddaa = mysql_query("SELECT id, name FROM foot_menu WHERE parent='2' ORDER BY id");
									while ($data = mysql_fetch_array($ddaa))
									{
                                        $uri = urlmod($data[1]);

                                        echo "<li><a href=\"$baseurl/menu/$data[0]/$uri\" title=\"$data[1]\">$data[1]</a></li>";
                                    }
							?>

						  </ul>
						</div>
						<div class="footer-column pull-left">
						  <h4> <?php echo $fhead[2]; ?> </h4>
						  <ul class="links">

                            <?php

                                $ddaa = mysql_query("SELECT id, name FROM foot_menu WHERE parent='3' ORDER BY id");
                                while ($data = mysql_fetch_array($ddaa))
                                {
                                    $uri = urlmod($data[1]);

                                    echo "<li><a href=\"$baseurl/menu/$data[0]/$uri\" title=\"$data[1]\">$data[1]</a></li>";
                                }
                            ?>
						  </ul>
						</div>
				  </div>
				  <div class="col-xs-12 col-lg-4">
						<div class="footer-column-last">
						  
						  <div class="social">
                            <h4>Follow Us</h4>
                            <ul class="link">
                                <?php
                                    $social = mysql_fetch_array(mysql_query("SELECT fb, tw, gp, li, yt FROM social WHERE id='1'"));

                                ?>
                              <li class="fb pull-left"><a href="<?php echo $social[0]; ?>"></a></li>
                              <li class="tw pull-left"><a href="<?php echo $social[1]; ?>"></a></li>
                              <li class="googleplus pull-left"><a href="<?php echo $social[2]; ?>"></a></li>
                              <li class="linkedin pull-left"><a href="<?php echo $social[3]; ?>"></a></li>
                              <li class="youtube pull-left"><a href="<?php echo $social[4]; ?>"></a></li>

                            </ul>
						  </div>
						  <div class="payment-accept">
								<h4>Payment Methods</h4>
								<div>
                                    <?php

                                        $ddaa = mysql_query("SELECT id, img FROM payment_icon ORDER BY id");
                                            while ($data = mysql_fetch_array($ddaa))
                                            {


                                                echo "<img src=\"$baseurl/images/payment/$data[1]\" alt=\"payment\" style=\"width: 60px; height: 60px;\">";
                                            }
                                     ?>


								</div>
						  </div>
						</div>
				  </div>
				</div>
		  </div>
		</div>
		<div class="footer-middle">
		  <div class="container">
				<div class="row">
				  <div><img src="images/footer-logo.png" alt=""></div>
				  <address>

						<?php 
						    $adrs = mysql_fetch_array(mysql_query("SELECT address, mobile, email, sitename FROM general_setting WHERE id='1'"));
						 ?>

					  <i class="icon-location-arrow"></i> <?php echo $adrs[0]; ?>
					  <i class="icon-mobile-phone"></i><span> <?php echo $adrs[1]; ?></span>
					   <i class="icon-envelope"></i><span> <?php echo $adrs[2]; ?></span>
				  </address>
				</div>
		  </div>
		</div>
		<div class="footer-bottom">
		  <div class="container">
			<div class="row">
			  <div class="col-sm-5 col-xs-12 coppyright">&copy; <?php echo date("Y"); ?> <?php echo $adrs[3]; ?>&nbsp &nbsp &nbsp &nbsp &nbsp  WWW.DIGITECKSOLUTION.C O M </div>

			</div>
		  </div>
		</div>
  </footer>






<div id="mobile-menu">
  <ul>
     
		<li>
		  <div class="mm-search">
              
				<!--form name="search">

				  <div class="input-group">
					<div class="input-group-btn">
					  <button class="btn btn-default" type="submit"><i class="icon-search"></i></button>
					</div>
					<input type="text" class="form-control simple" placeholder="Search ..." name="srch-term" id="srch-term">
				  </div>
				</form-->
		  </div>
		</li>
		<li>
		  <div class="home"><a href="<?php echo $baseurl; ?>"><i class="icon-home"></i>Home</a> </div>
		</li>

		<?php 
		    $ddaa = mysql_query("SELECT id, name FROM cat ORDER BY id");
			while ($data = mysql_fetch_array($ddaa))
			{
                $caturl = urlmod($data[1]);
                 ?>

    
                <li><a href="<?php echo "$baseurl/category/$data[0]/$caturl"; ?>"><?php echo $data[1] ?></a>
                  <ul>

                        <?php
                            $ddaa2 = mysql_query("SELECT id, name FROM subcat WHERE parent='".$data[0]."' ORDER BY id");
                            while ($data2 = mysql_fetch_array($ddaa2))
                            {
                                $subcaturl = urlmod($data2[1]);
                                 ?>

                                <li> <a href="<?php echo "$baseurl/subcategory/$data2[0]/$subcaturl"; ?>" class=""><?php echo $data2[1] ?></a>
                                  <ul>

                                        <?php
                                            $ddaa3 = mysql_query("SELECT id, name FROM childcat WHERE parent='".$data2[0]."' ORDER BY id");
                                                while ($data3 = mysql_fetch_array($ddaa3))
                                                {
                                            $childcaturl = urlmod($data3[1]);
                                        ?>

                                            <li> <a href="<?php echo "$baseurl/childcategory/$data3[0]/$childcaturl"; ?>" class=""><?php echo $data3[1] ?></a></li>


                                        <?php
                                            }
                                         ?>



                                  </ul>
                                </li>

                        <?php
                        }
                         ?>

                  </ul>
                </li>

                <?php
            }
             ?>

    
  </ul>
</div>

<!-- End Footer --> 

<!-- JavaScript --> 
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/bootstrap.min.js"></script> 
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/parallax.js"></script> 
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/revslider.js"></script> 
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/common.js"></script> 
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/jquery.bxslider.min.js"></script> 
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/owl.carousel.min.js"></script> 
<script type="text/javascript" src="<?php echo $baseurl; ?>/js/jquery.mobile-menu.min.js"></script> 

<script type="text/javascript" src="<?php echo $baseurl; ?>/js/cloud-zoom.js"></script> 

<script type="text/javascript" src="<?php echo $baseurl; ?>/js/jquery.flexslider.js"></script> 


<script type='text/javascript'>
        jQuery(document).ready(function(){


			$.post( 
                  "<?php echo $baseurl;?>/api-cart-top.php",
                  {
                    unique: "<?php echo $unique;?>"
                  },
                  function(data) {

                     $('#cartoon').html(data);

                  }
			);




          
            jQuery('#rev_slider_4').show().revolution({
                dottedOverlay: 'none',
                delay: 5000,
                startwidth: 1170,
                startheight: 600,

                hideThumbs: 200,
                thumbWidth: 200,
                thumbHeight: 50,
                thumbAmount: 2,

                navigationType: 'thumb',
                navigationArrows: 'solo',
                navigationStyle: 'round',

                touchenabled: 'on',
                onHoverStop: 'on',
                
                swipe_velocity: 0.7,
                swipe_min_touches: 1,
                swipe_max_touches: 1,
                drag_block_vertical: false,
            
                spinner: 'spinner0',
                keyboardNavigation: 'off',

                navigationHAlign: 'center',
                navigationVAlign: 'bottom',
                navigationHOffset: 0,
                navigationVOffset: 20,

                soloArrowLeftHalign: 'left',
                soloArrowLeftValign: 'center',
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,

                soloArrowRightHalign: 'right',
                soloArrowRightValign: 'center',
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,

                shadow: 0,
                fullWidth: 'on',
                fullScreen: 'off',

                stopLoop: 'off',
                stopAfterLoops: -1,
                stopAtSlide: -1,

                shuffle: 'off',

                autoHeight: 'off',
                forceFullWidth: 'on',
                fullScreenAlignForce: 'off',
                minFullScreenHeight: 0,
                hideNavDelayOnMobile: 1500,
            
                hideThumbsOnMobile: 'off',
                hideBulletsOnMobile: 'off',
                hideArrowsOnMobile: 'off',
                hideThumbsUnderResolution: 0,

                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                startWithSlide: 0,
                fullScreenOffsetContainer: ''
            });
        });
</script>
        
        