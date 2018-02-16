
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="home.php">
                        <img src="../images//logo.png" alt="logo" class="logo-default" style="width: 160px;" /> </a>
                    <div class="menu-toggler sidebar-toggler"> </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN TOP NAVIGATION MENU -->
                <div class="top-menu">
                    <ul class="nav navbar-nav pull-right">
                        <li class="dropdown dropdown-user">
                            <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                <span class="username"> <?php echo $user; ?> </span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-default">
		
<li><a href="changepassword.php"><i class="fa fa-cogs"></i> Change Password </a></li>
<li><a href="signout.php"><i class="fa fa-sign-out"></i> Log Out </a></li>


                            </ul>
                        </li>

                    </ul>
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- BEGIN SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200" style="padding-top: 20px">
                        <!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
                        <li class="sidebar-toggler-wrapper hide">
                            <!-- BEGIN SIDEBAR TOGGLER BUTTON -->
                            <div class="sidebar-toggler"> </div>
                            <!-- END SIDEBAR TOGGLER BUTTON -->
                        </li>
                        <!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
                        
<li class="nav-item start">
<a href="home.php" class="nav-link "><i class="icon-home"></i><span class="title">Dashboard</span></a>
</li>
								

                      
                            
<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-bars"></i>
<span class="title">Categorey</span><span class="arrow"></span></a>
                            
<ul class="sub-menu">
<li class="nav-item"><a href="addcat.php" class="nav-link"><i class="fa fa-plus"></i> ADD  </a></li>
<li class="nav-item"><a href="listcat.php" class="nav-link"><i class="fa fa-desktop"></i> View</a></li>
        
</ul>
</li>


                      
                            
<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-list"></i>
<span class="title">Sub Categorey</span><span class="arrow"></span></a>
                            
<ul class="sub-menu">
<li class="nav-item"><a href="addsub.php" class="nav-link"><i class="fa fa-plus"></i> ADD  </a></li>
<li class="nav-item"><a href="listsub.php" class="nav-link"><i class="fa fa-desktop"></i> View</a></li>
        
</ul>
</li>


                      
                            
<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-list-ul"></i>
<span class="title">Child Categorey</span><span class="arrow"></span></a>
                            
<ul class="sub-menu">
<li class="nav-item"><a href="addchild.php" class="nav-link"><i class="fa fa-plus"></i> ADD  </a></li>
<li class="nav-item"><a href="listchild.php" class="nav-link"><i class="fa fa-desktop"></i> View</a></li>
        
</ul>
</li>






<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-shopping-cart"></i>
<span class="title">Product</span><span class="arrow"></span></a>
                            
<ul class="sub-menu">
<li class="nav-item"><a href="addproduct.php" class="nav-link"><i class="fa fa-plus"></i> ADD  </a></li>
<li class="nav-item"><a href="listproduct.php" class="nav-link"><i class="fa fa-desktop"></i> View</a></li>
        
</ul>
</li>    



<!--li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-bars"></i>
<span class="title">Feature</span><span class="arrow"></span></a>
                            
<ul class="sub-menu">
<li class="nav-item"><a href="addfeature.php" class="nav-link"><i class="fa fa-plus"></i> ADD  </a></li>
<li class="nav-item"><a href="listfeature.php" class="nav-link"><i class="fa fa-desktop"></i> View</a></li>
        
</ul>
</li-->    



   
<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-cogs"></i>
<span class="title">Website Setting</span><span class="arrow"></span></a>
                            
<ul class="sub-menu">
<li class="nav-item"><a href="setgeneral.php" class="nav-link"><i class="fa fa-cogs"></i> General Setting </a></li>
<li class="nav-item"><a href="setlogo.php" class="nav-link"><i class="fa fa-cogs"></i> Logo Setting </a></li>
<li class="nav-item"><a href="setlogof.php" class="nav-link"><i class="fa fa-cogs"></i> Footer Logo Setting </a></li>
<li class="nav-item"><a href="set4fea.php" class="nav-link"><i class="fa fa-cogs"></i> 4 Feature Setting </a></li>
<li class="nav-item"><a href="sethomeslider.php" class="nav-link"><i class="fa fa-cogs"></i> Home Slider Setting </a></li>
<li class="nav-item"><a href="set3top.php" class="nav-link"><i class="fa fa-cogs"></i> 3 Top Images </a></li>
<li class="nav-item"><a href="sethtxts.php" class="nav-link"><i class="fa fa-cogs"></i> Home Text Slider </a></li>
<li class="nav-item"><a href="setblogo.php" class="nav-link"><i class="fa fa-cogs"></i> Brand Logo Setting </a></li>
<li class="nav-item"><a href="setcatslider.php" class="nav-link"><i class="fa fa-cogs"></i> Cat Slider Setting </a></li>
<li class="nav-item"><a href="setsocial.php" class="nav-link"><i class="fa fa-cogs"></i> Social Links </a></li>
<li class="nav-item"><a href="setpaymentlogo.php" class="nav-link"><i class="fa fa-cogs"></i> Payment Icon</a></li>
<li class="nav-item"><a href="setfootermenu.php" class="nav-link"><i class="fa fa-cogs"></i> Footer Menu</a></li>
       
</ul>
</li>
          

                        
                            
<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-dollar"></i>
<span class="title">Payment Setting</span><span class="arrow"></span></a>
                            
<ul class="sub-menu">
<li class="nav-item"><a href="addpmethod.php" class="nav-link"><i class="fa fa-plus"></i> ADD  </a></li>
<li class="nav-item"><a href="listpmethod.php" class="nav-link"><i class="fa fa-desktop"></i> View</a></li>
        
</ul>
</li>
  
   
                        
                            
<li class="nav-item">
<a href="javascript:;" class="nav-link nav-toggle"><i class="fa fa-shopping-cart"></i>
<span class="title">ORDERS</span><span class="arrow"></span></a>
                            
<ul class="sub-menu">
<li class="nav-item"><a href="listorder.php" class="nav-link"><i class="fa fa-desktop"></i> View All Order</a></li>
<li class="nav-item"><a href="listorderp.php" class="nav-link"><i class="fa fa-desktop"></i> Awaiting Payment</a></li>
<li class="nav-item"><a href="listorderd.php" class="nav-link"><i class="fa fa-desktop"></i> Awaiting Delivery</a></li>
        
</ul>
</li>
  
                                    
                        
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
			
			
		