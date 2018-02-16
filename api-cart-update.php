<?php

require_once('function.php');
connectdb();

if(isset($_POST['unique']))
    {

        $un = mysql_real_escape_string($_POST["unique"]);
        $cccid = mysql_real_escape_string($_POST["cccid"]);
        $act = mysql_real_escape_string($_POST["act"]);



        $security = mysql_fetch_array(mysql_query("SELECT code FROM carrrt WHERE id='".$cccid."'"));

        if($security[0]==$un)
            {
                $qnow = mysql_fetch_array(mysql_query("SELECT qty, rraate FROM carrrt WHERE id='".$cccid."'"));

                if($act=="plus")
                    {
                        $will = $qnow[0]+1;
                    }
                    else
                        {
                            $will = $qnow[0]-1;
                        }

                if($will<=1)
                    {
                         $will=1;
                    }

                $qry = mysql_query("UPDATE carrrt SET qty='".$will."' WHERE id='".$cccid."'");

                $subttl = $qnow[1]*$will;
                if($qry)
                    {
                        echo "$subttl";

                    }

            }
    }

?>