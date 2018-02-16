<?php
require_once('function.php');
connectdb();
$payid = mysql_real_escape_string($_POST["payid"]);


$pdet = mysql_fetch_array(mysql_query("SELECT ins, need FROM payment WHERE id='".$payid."'"));
if($payid=="")
    {

    }
    else
        {

            if($pdet[1]=="0")
                {
                    echo "
                    <p style='color:green; font-weight: bold;'>$pdet[0]</p>
                    <input name=\"detai\" type=\"hidden\" value=\"\">
                    ";
                }
                else
                    {

                        echo "
                        <p style='color:green; font-weight: bold;'>$pdet[0]</p>
                        <textarea name=\"detai\" class=\"form-control\" rows=\"2\">$pdet[1]</textarea>
                        ";

                    }


        }


?>
