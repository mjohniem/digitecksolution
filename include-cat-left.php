<div class="side-nav-categories">
      <div class="block-title"> Categories </div>
      <!--block-title-->

      <!-- BEGIN BOX-CATEGORY -->
      <div class="box-content box-category">
        <ul>




            <?php
                $ddaa = mysql_query("SELECT id, name FROM cat ORDER BY id");
                    while ($data = mysql_fetch_array($ddaa))
                    {
                        $caturl = urlmod($data[1]);

                        ?>


                      <li> <a class="active" href="<?php echo "$baseurl/category/$data[0]/$caturl"; ?>"><?php echo $data[1]; ?></a>
                        <span class="subDropdown plus"></span>
                        <ul class="level0_416">

                            <?php
                                $ddaa2 = mysql_query("SELECT id, name FROM subcat WHERE parent='".$data[0]."' ORDER BY id");
                                    while ($data2 = mysql_fetch_array($ddaa2))
                                    {
                                        $subcaturl = urlmod($data2[1]);
                                         ?>

                                      <li> <a href="<?php echo "$baseurl/subcategory/$data2[0]/$subcaturl"; ?>"> <?php echo $data2[1] ?> </a>
                                        <span class="subDropdown minus"></span>
                                        <ul class="level1">

                                            <?php
                                                $ddaa3 = mysql_query("SELECT id, name FROM childcat WHERE parent='".$data2[0]."' ORDER BY id");
                                                    while ($data3 = mysql_fetch_array($ddaa3))
                                                    {
                                                $childcaturl = urlmod($data3[1]);
                                            ?>

                                            <li> <a href="<?php echo "$baseurl/childcategory/$data3[0]/$childcaturl"; ?>"> <?php echo $data3[1] ?> </a> </li>

                                            <?php
                                            }
                                             ?>


                                                  <!--end for-each -->
                                        </ul>
                                                <!--level1-->
                                      </li>
                                              <!--level1-->



                                      <?php
                                    }
                                    ?>

                        </ul>
                                <!--level0-->
                      </li>
                              <!--level 0-->


                        <?php
                    }
                    ?>












        </ul>
      </div>
              <!--box-content box-category--> 
</div>