<?php 
require_once('function.php');
connectdb();


$i = 0;
if(isset($_POST['unique']))
    {
        $un = mysql_real_escape_string($_POST["unique"]);

        $pro = 0;

        $cost = 0;
        $ddaa = mysql_query("SELECT pid, qty, rraate FROM carrrt WHERE code='".$un."' ORDER BY id");
        echo mysql_error();
        while ($data = mysql_fetch_array($ddaa))
            {
                $ttl = $data[2]*$data[1];
                $cost = $cost+$ttl;


                $pro = $pro+$data[1];
                $i++;
            }
        //echo "$i ($pro) - $cost";
             $curr = mysql_fetch_array(mysql_query("SELECT currency FROM general_setting WHERE id='1'"));
    }
 ?>


<div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"><a href="#">My Cart <span><?php echo $i; ?></span></a></div>
                  <div>
                    <div class="top-cart-content">
                      <div class="block-subtitle">
                        <div class="top-subtotal"><?php echo $i; ?> items, <span class="price"><?php echo "$cost $curr[0]"; ?></span> </div>
                        <!--top-subtotal-->
                        <div class="pull-right">
                          <div data-toggle="dropdown" data-hover="dropdown" class="basket dropdown-toggle"><a href="#">My Cart <span><?php echo $i; ?></span></a></div>
                        </div>
                        <!--pull-right--> 
                      </div>
                      <!--block-subtitle-->
                      <ul class="mini-products-list" id="cart-sidebar">


                          <li class="item"> </li>
                            <?php

                            $ddaa = mysql_query("SELECT pid, qty, rraate FROM carrrt WHERE code='".$un."' ORDER BY id");
                                echo mysql_error();
                                while ($data = mysql_fetch_array($ddaa))
                                {
                            $ppp = mysql_fetch_array(mysql_query("SELECT name, img FROM products WHERE id='".$data[0]."'"));
                            $ttl = $data[2]*$data[1];

                            $um = urlmod($ppp[0]);
                            $urrl = "$baseurl/product/$data[0]/$um";

                            ?>
                                <li class="item">
                                  <div class="item-inner">

                                      <a class="product-image" title="<?php echo $ppp[0]; ?>" href="<?php echo $urrl; ?>">
                                      <img alt="<?php echo $ppp[0]; ?>" src="<?php echo "$baseurl/productimages/$ppp[1]";?>"></a>


                                    <div class="product-details">

                                        <p class="product-name"><a href="<?php echo $urrl; ?>"><?php echo $ppp[0]; ?></a></p>
                                        <strong><?php echo "$data[1] x $data[2]"; ?> = </strong><span class="price"><?php echo "$ttl  $curr[0]"; ?></span>

                                    </div>
                                  </div>
                                </li>
                            <?php
                            }
                            ?>
                        
                      </ul>
                      <div class="actions">
                        <a href="<?php echo $baseurl; ?>/checkout"> <button class="btn-checkout" title="Checkout" type="button"><span>Checkout</span></button></a>
                        <a href="<?php echo $baseurl; ?>/cart" class="view-cart" ><span>View Cart</span></a>
                      </div>
                                              <!--actions-->
                    </div>
                  </div>