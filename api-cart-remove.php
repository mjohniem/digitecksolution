<?php

include('include-global.php');
connectdb();

if(isset($_POST['unique']))
    {

        $un = mysql_real_escape_string($_POST["unique"]);
        $cccid = mysql_real_escape_string($_POST["cccid"]);


        $security = mysql_fetch_array(mysql_query("SELECT code FROM carrrt WHERE id='".$cccid."'"));

        if($security[0]==$un)
        {

            $qry = mysql_query("DELETE FROM carrrt WHERE id='".$cccid."'");


            if($qry)
                {
                    echo "Done";

                }
                else
                    {
                        echo "Not DOne";

                    }
        }
    }
?>