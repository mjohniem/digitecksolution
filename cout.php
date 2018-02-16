<?php

include('include-global.php');
connectdb();

if(isset($_POST['unique']))
    {
        $un = mysql_real_escape_string($_POST["unique"]);

        $pro = 0;
        $i = 0;
        $cost = 0;
        $ddaa = mysql_query("SELECT pid, qty FROM carrrt WHERE code='".$un."' ORDER BY id");

        echo mysql_error();
        while ($data = mysql_fetch_array($ddaa))
            {
                $rate = mysql_fetch_array(mysql_query("SELECT rate FROM products WHERE id='".$data[0]."'"));
                $ttl = $rate[0]*$data[1];
                $cost = $cost+$ttl;


                $pro = $pro+$data[1];
                $i++;
            }
            //echo "$i ($pro) - $cost";


            ?>





        <div class="header-cart">
            <div class="header-cart__preview"> <span class="icon icon-bag color_primary" aria-hidden="true"></span> <span class="header-cart__inner"> <span class="header-cart__qty">CART ITEMS: <span class="color_primary" id="items"><?php echo $i; ?></span></span> <span class="header-cart__amount">TOTAL: <span class="color_primary">$<?php echo $cost; ?></span></span> </span> <i class="caret"></i> </div>


				
                <div class="header-cart__product">
                  <h3 class="header-cart__title">cart details</h3>
                  <ul class="product-list list-unstyled">


                    <?php
                        $pro = 0;


                        $ddaa = mysql_query("SELECT pid, qty FROM carrrt WHERE code='".$un."' ORDER BY id");
                            echo mysql_error();
                            while ($data = mysql_fetch_array($ddaa))
                            {
                                $rate = mysql_fetch_array(mysql_query("SELECT rate, name, img FROM products WHERE id='".$data[0]."'"));
                                $ttl = $rate[0]*$data[1];

                                echo "<li class=\"product-list__item clearfix li-last\">
                                    <div class=\"row\">
                                        <div class=\"col-xs-4\"><img class=\"img-responsive\" src=\"$baseurl/productimages/$rate[2]\" alt=\"Product\"></div>
                                        <div class=\"col-xs-8\">
                                            <div class=\"product-list__inner\">
                                            <b class=\"product-list__name\">$rate[1]<br/><br/></b>
                                            <span class=\"product-list__price\">$$rate[0] X $data[1] = $$ttl</span> </div>
                                        </div>
                                    </div>
                                </li>";

	                        }


    }
?>

                    </ul>
                    <div class="header-cart__buttons clearfix"> <a class="ui-btn ui-btn_default btn btn-primary btn-block" href="<?php echo $baseurl;?>/cart">GO TO CART</a></div>
                </div>
        </div>