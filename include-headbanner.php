
	<div class="header-banner">
		<!--div class="assetBlock">
		  <p><a href="#">MENLOOK DAYS: UP TO <span>50%</span> OFF NEW SEASON ARRIVALS &gt; </a></p>
		</div-->
		<?php 
		$fea4 = mysql_fetch_array(mysql_query("SELECT text1, text2, text3, text4 FROM gen_fea4 WHERE id='1'"));
		 ?>

		<div class="our-features-box">
			<div class="container">
				<ul>
				  <li>
					<div class="feature-box">
					  <div class="icon-truck"></div>
					  <div class="content"><?php echo $fea4[0];?></div>
					</div>
				  </li>
				  <li>
					<div class="feature-box">
					  <div class="icon-support"></div>
					  <div class="content"><?php echo $fea4[1];?></div>
					</div>
				  </li>
				  <li>
					<div class="feature-box">
					  <div class="icon-money"></div>
					  <div class="content"><?php echo $fea4[2];?></div>
					</div>
				  </li>
				  <li class="last">
					<div class="feature-box">
					  <div class="icon-return"></div>
					  <div class="content"><?php echo $fea4[3];?></div>
					</div>
				  </li>
				</ul>
			</div>
		</div>
	</div>
  