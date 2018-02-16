<?php

include('include-global.php');
connectdb();
//error_reporting(0);
if($_POST)
    {


        $q = mysql_real_escape_string($_POST['ratings1']); //Quality
        $v = mysql_real_escape_string($_POST['ratings2']); //Value
        $p = mysql_real_escape_string($_POST['ratings3']); //Price
        $pid = mysql_real_escape_string($_POST["pid"]);
        $cmnt = mysql_real_escape_string($_POST["cmnt"]);


        if($q=="" || $v=="" || $p=="" || $pid=="" || $cmnt=="")
            {
                echo "<div class=\"alert alert-danger alert-dismissable\">
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
                
                Please Input All value along with Comment!
                
                </div>";
            }
             else
                 {


                     $count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM rating WHERE userid='".$uid."' AND pid='".$pid."'"));

                    if($count[0]>=1)
                        {
                            echo "<div class=\"alert alert-danger alert-dismissable\">
                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
                            
                            You Already Rate This Product!
                            
                            </div>";
                        }
                        else
                            {

                                $res = mysql_query("INSERT INTO rating SET userid='".$uid."', pid='".$pid."', v='".$v."', q='".$q."', p='".$p."', cmnt='".$cmnt."', tm='".$tm."'");

                                if($res)
                                    {

                                        $vp = $v*20;
                                        $qp = $q*20;
                                        $pp = $p*20;

                                        $rname = mysql_fetch_array(mysql_query("SELECT name FROM users WHERE id='".$uid."'"));

                                        $rtm = date("Y-m-d", $tm);


                                        echo "   <li>
                                                        <table class=\"ratings-table\">
                                                          
                            
                                                          <tbody>
                                                            <tr>
                                                              <th>Value</th>
                                                              <td><div class=\"rating-box\">
                                                                  <div class=\"rating\" style=\"width: $vp%;\"></div>
                                                                </div></td>
                                                            </tr>
                                                            <tr>
                                                              <th>Quality</th>
                                                              <td><div class=\"rating-box\">
                                                                  <div class=\"rating\"  style=\"width: $qp%;\"></div>
                                                                </div></td>
                                                            </tr>
                                                            <tr>
                                                              <th>Price</th>
                                                              <td><div class=\"rating-box\">
                                                                  <div class=\"rating\" style=\"width: $pp%;\"></div>
                                                                </div></td>
                                                            </tr>
                                                          </tbody>
                                                        </table>
                                                        <div class=\"review\">
                                                          <h6> $rname[0]</h6>
                                                          <small>Submitted On  $rtm; </small>
                                                          <div class=\"review-txt\">  $cmnt </div>
                                                        </div>
                                                   </li>";




                                    }
                                    else
                                        {
                                            echo "<div class=\"alert alert-danger alert-dismissable\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>	
                                            Some Problem Occurs, Please Try Again. 
                                            </div>";
                                        }



                            }

                 }
    }

?>