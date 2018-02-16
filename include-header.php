<?php 


$general = mysql_fetch_array(mysql_query("SELECT `sitename`, `wcmsg`, `address`, `mobile`, `email`, `currency` FROM general_setting WHERE id='1'"));

 ?>


<div id="page">
  <!--div class="sale-offer-box">
    <div class="sale-offer-left"><img src="images/sale-offer.png" alt="sale-offer"></div>
    <div class="sale-offer-right"><img src="images/sale-offer1.png" alt="sale-offer1"></div>
  </div-->
  <!-- Header -->
	<header>
		<div class="header-container">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-sm-2 col-xs-12"> 
						<!-- Header Logo -->
						<div class="logo">
						<a title="<?php echo $general[0]; ?>" href="<?php echo $baseurl; ?>">
						<img alt="<?php echo $general[0]; ?>" src="<?php echo $baseurl; ?>/images/logo.png">
						</a>
						</div>
						<!-- End Header Logo --> 
					</div>
					<div class="col-lg-6 col-sm-5 col-xs-8 toplinks"> 
					
						<!-- Default Welcome Message -->
						<div class="welcome-msg hidden-xs"> <?php echo $general[1]; ?> </div>
						<!-- End Default Welcome Message -->

					</div>
					<div class="col-lg-4 col-sm-5 col-xs-12 right_menu">
						<div class="menu_top">
							<div class="top-cart-contain pull-right"> 
								<!-- Top Cart -->
								<div id="cartoon" class="mini-cart">
									  
									<?php 
									include("api-cart-top.php");

									 ?>


								</div>
								<!-- Top Cart -->
								<div id="ajaxconfig_info"><a href="#/"></a>
								  <input value="" type="hidden">
								  <input id="enable_module" value="1" type="hidden">
								  <input class="effect_to_cart" value="1" type="hidden">
								  <input class="title_shopping_cart" value="Go to shopping cart" type="hidden">
								</div>
							</div>
						</div>

						<!-- Header Language -->
						<div class="lang-curr">
						  <div class="form-currency">
								<ul class="currencies_list">
								 
									<li class=""><a title="My Account" href="<?php echo "$baseurl/dashboard"; ?>"> My Account</a> </li>

								</ul>
						  </div>
						</div>
					
						<!-- End Header Currency --> 
					</div>
				</div>
			</div>
		</div>
	</header>
  <!-- end header --> 