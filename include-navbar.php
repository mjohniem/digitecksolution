  <!-- Navbar -->
	<nav>
		<div class="container">
			<div class="row">
				<div class="mm-toggle-wrap">
				  <div class="mm-toggle"><i class="icon-reorder"></i><span class="mm-label">Menu</span> </div>
				</div>
				<div class="nav-inner col-lg-12">
					<ul id="nav" class="hidden-xs">
						<li id="nav-home" class="level0 parent drop-menu"><a href="<?php echo $baseurl; ?>"><span>Home</span></a></li>

						
							<?php 
							$ddaa = mysql_query("SELECT id, name FROM cat ORDER BY id");
								while ($data = mysql_fetch_array($ddaa))
								{
                                    $caturl = urlmod($data[1]);
                                     ?>



                                    <li class="mega-menu"><a href="<?php echo "$baseurl/category/$data[0]/$caturl"; ?>" class="level-top">
                                        <span><?php echo $data[1] ?></span></a>
                                        <div class="level0-wrapper dropdown-6col">
                                            <div class="container">
                                                <div class="level0-wrapper2">
                                                    <div class="nav-block nav-block-center">
                                                        <ul class="level0">

                                                            <?php
                                                            $ddaa2 = mysql_query("SELECT id, name FROM subcat WHERE parent='".$data[0]."' ORDER BY id");
                                                                while ($data2 = mysql_fetch_array($ddaa2))
                                                                {
                                                                    $subcaturl = urlmod($data2[1]);
                                                                     ?>


                                                                    <li class="level1 nav-6-1 parent item"><a href="<?php echo "$baseurl/subcategory/$data2[0]/$subcaturl"; ?>" class="">
                                                                          <span><?php echo $data2[1] ?></span></a>
                                                                         <ul class="level1">


                                                                            <?php
                                                                            $ddaa3 = mysql_query("SELECT id, name FROM childcat WHERE parent='".$data2[0]."' ORDER BY id");
                                                                                while ($data3 = mysql_fetch_array($ddaa3))
                                                                                {
                                                                            $childcaturl = urlmod($data3[1]);
                                                                             ?>


                                                                             <li class="level2 nav-6-1-1"><a href="<?php echo "$baseurl/childcategory/$data3[0]/$childcaturl"; ?>">
                                                                            <span><?php echo $data3[1] ?></span></a></li>

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


                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <?php
						        }
						 ?>

					</ul>
				</div>
			</div>
		</div>
	</nav>
  <!-- end nav -->
