<?php

include('include-global.php');
connectdb();

if(isset($_POST['unique']))
    {

        $un = mysql_real_escape_string($_POST["unique"]);
        $pid = mysql_real_escape_string($_POST["id"]);
        $qty = mysql_real_escape_string($_POST["qty"]);

        $pdet = mysql_fetch_array(mysql_query("SELECT rate, stock, sho, offtyp, offamo, offtill, featured FROM products WHERE id='".$pid."'"));

        /////////////------------------------------>>>>>>>>PRODUCT PRICE
        if($pdet['offtyp']==0)
            {

                $rraate = $pdet[0];

            }
            elseif($pdet['offtyp']==1)
                {

                    $per = $pdet['offamo']/100;
                    $dis = $pdet['rate']*$per;
                    $disamo = $pdet['rate']-$dis;
                    $rraate = $disamo;

                }
                elseif ($pdet['offtyp']==2)
                    {
                        $disamo = $pdet['rate']-$pdet['offamo'];
                        $rraate = $disamo;
                    }
                /////////////------------------------------>>>>>>>>PRODUCT PRICE



        mysql_query("INSERT INTO carrrt SET code='".$un."', pid='".$pid."', qty='".$qty."', rraate='".$rraate."'");

        echo "Added To Cart...";
    }
?>