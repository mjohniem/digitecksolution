
  <!-- Slider -->
	<div id="magik-slideshow" class="magik-slideshow">
		<div class="container">
			<div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
				<div id='rev_slider_4' class='rev_slider fullwidthabanner'>
					<ul>

						<?php
                            $ddaa = mysql_query("SELECT id, img, btxt, stxt FROM slider_home ORDER BY id");
                            echo mysql_error();
                            while ($data = mysql_fetch_array($ddaa))
                            {
                                ?>

                                <li data-transition='random' data-slotamount='7' data-masterspeed='1000' data-thumb='<?php echo "$baseurl/images/slider/$data[1]"; ?>'><img src='<?php echo "$baseurl/images/slider/$data[1]"; ?>'  data-bgposition='left top'  data-bgfit='cover' data-bgrepeat='no-repeat' alt="" />
                                  <div class="info">

                                    <div class='tp-caption LargeTitle sfl  tp-resizeme ' data-x='0'  data-y='220'  data-endspeed='500'  data-speed='500' data-start='1300' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:3;max-width:auto;max-height:auto;white-space:nowrap;'>
                                    <span><?php echo $data[2]; ?></span></div>

                                    <div    class='tp-caption Title sft  tp-resizeme ' data-x='0'  data-y='320'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Power2.easeInOut' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4;max-width:auto;max-height:auto;white-space:nowrap;'><h4 class="banner-text"><?php echo $data[3]; ?></h4></div>
                                  </div>
                                </li>
                                <?php

                            }
                        ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
    <!-- end Slider --> 