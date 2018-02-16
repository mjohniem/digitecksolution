<?php
include('include-global.php');

$titleofme = "$basetitle";

include('include-styles.php');
echo '</head>
<body class="cms-index-index cms-home-page">';

include('include-header.php');
include('include-navbar.php');




?>



  <!-- Main Container -->
  <section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-title">
            <h2>Checkout</h2>
          </div>
           <?php


            if (!is_loggedin())
                {
                    echo "<h1 style='text-align:center; margin-top:40px;'>You Have to  <a href=\"$baseurl/signin\"><u>login</u></a> before checkout</h1>";
                }
                else
                    {
                       ?>


                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">

                                <?php

                                if($_POST)
                                {



                                    //------------------------------->> Post The Form Value
                                    $daddr = mysql_real_escape_string($_POST["daddr"]);
                                    $paymode = mysql_real_escape_string($_POST["paymode"]);
                                    $contactnum = mysql_real_escape_string($_POST["contactnum"]);
                                    $detai = mysql_real_escape_string($_POST["detai"]);



                                    $pdet = mysql_fetch_array(mysql_query("SELECT name FROM payment WHERE id='".$paymode."'"));

                                    $paymentdetails = "PAYMENT MODE: $pdet[0]  <br>    $detai";
                                    //------------------------------->> Post The Form Value
                                    //------------------------------->> CONDITIONS

                                    $err1=0;
                                    $err2=0;
                                    $err3=0;
                                    $err4=0;


                                    if(trim($daddr)=="")
                                    {
                                        $err1=1;
                                    }

                                    if($paymode =="")
                                    {
                                        $err2=1;
                                    }

                                    if($contactnum =="")
                                    {
                                        $err3=1;
                                    }

                                    $cou = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM carrrt WHERE code='".$unique."'"));

                                    if($cou[0]==0)
                                    {
                                        $err4=1;
                                    }
                                    //------------------------------->> CONDITIONS

                                    $error = $err1+$err2+$err3+$err4;


                                    if ($error == 0)
                                    {

                                        $dd = date("Ymd", $tm);
                                        $co = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM orrdr"));
                                        $onm = $co[0]+1;

                                        $invid="$dd$onm";


                                        $res = mysql_query("INSERT INTO orrdr SET invid='".$invid."', usid='".$uid."', paydet='".$paymentdetails."', daddr='".$daddr."', contactnum='".$contactnum."', code='".$unique."', tm='".$tm."', pst='0', dst='0'");
                                        if($res)
                                        {

                                            echo "<div class=\"alert alert-success alert-dismissable\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                            ORDER PLACED Successfully! 
                                            </div>";

                                            mysql_query("UPDATE carrrt SET ordered='1' WHERE code='".$unique."'");
                                            unset($_SESSION["unique"]);
                                            echo "<meta http-equiv=\"refresh\" content=\"3; url=$baseurl/dashboard\" />";



                                        }
                                        else
                                            {
                                                  echo "<div class=\"alert alert-danger alert-dismissable\">
                                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                                Some Problem Occurs, Please Try Again. 
                                                </div>";
                                            }
                                    }
                                    else
                                        {

                                            if ($err1 == 1)
                                                {
                                                    echo "<div class=\"alert alert-danger alert-dismissable\">
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
                                                    
                                                    Delivery Address Can Not be Empty!!!
                                                    
                                                    </div>";
                                                }

                                            if ($err2 == 1)
                                                {
                                                    echo "<div class=\"alert alert-danger alert-dismissable\">
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                                    
                                                    Payment Mode Can Not be Empty !!!
                                                    
                                                    </div>";
                                                }

                                            if ($err3 == 1)
                                                {
                                                    echo "<div class=\"alert alert-danger alert-dismissable\">
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                                    
                                                    Contact Number Can Not be Empty !!!
                                                    
                                                    </div>";
                                                }
  
                                            if ($err4 == 1)
                                                {
                                                    echo "<div class=\"alert alert-danger alert-dismissable\">
                                                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                                    
                                                    Cart Can Not be Empty !!!
                                                    
                                                    </div>";
                                                }
  
                                        }




                                }



                                $cost = 0;
                                $ddaa = mysql_query("SELECT pid, qty, rraate FROM carrrt WHERE code='".$unique."' ORDER BY id");
                                    echo mysql_error();
                                    while ($data = mysql_fetch_array($ddaa))
                                        {
                                            $ttl = $data[2]*$data[1];
                                            $cost = $cost+$ttl;


                                        }
                                    $curr = mysql_fetch_array(mysql_query("SELECT currency FROM general_setting WHERE id='1'"));




                                     ?>

                                    <form action="" method="post">


                                        <h2>Delivery Address:</h2>

                                        <input type="text" class="form-control input-lg" name="daddr" value="<?php echo "$userr[3]"; ?>">


                                        <h2>Contact Number:</h2>

                                        <input type="text" class="form-control input-lg" name="contactnum" value="<?php echo "$userr[2]"; ?>">


                                        <option value="0"></option>



                                        <h2>Payment <span class="pull-right">Amount Due : <?php echo "$cost $curr[0]"; ?></span></h2>

                                        <select name="paymode" id="paymnt" class="form-control input-lg">
                                            <option value="">SELECT PAYMENT MODE</option>
                                             <?php

                                            $ddaa = mysql_query("SELECT id, name, ins, need FROM payment ORDER BY id");
                                                while ($data = mysql_fetch_array($ddaa))
                                                {
                                            echo "<option value=\"$data[0]\">$data[1]</option>";
                                            }
                                            ?>

                                        </select><br>



                                        <div id="inst"></div>

                                        <br><br><br>

                                        <button type="submit" class="btn btn-success btn-lg btn-block"> PLACE ORDER</button>
                                        </form>
                                        <br><br><br><br>
                            </div>

                        </div>


                        <?php
                    }
           ?>
        </div>
       
        
      </div>
    </div>
  </section>
  
<?php
include('include-footer.php');
?>

<script>

    $(document).ready(function() {


        $("#paymnt").on('change',function() {


         var x = $("#paymnt").val();

            $.post(
                      "<?php echo $baseurl;?>/api-select-payment.php",
                      {
                   payid: x

                  },
                      function(data) {

                         $('#inst').html(data);

                      }

            );

        });
    
    });

</script>



</body>
</html>
