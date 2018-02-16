<?php
include('include-global.php');

if (!is_loggedin())
    {
        redirect("$baseurl/signin");
    }

if ($userr[4]!=$sid)
    {
        redirect("$baseurl/signout");
    }


$titleofme = "$basetitle | Account Dashboard";

include('include-styles.php');
echo '</head>
<body class="cms-index-index cms-home-page">';

include('include-header.php');
include('include-navbar.php');


?>

<!-- Main Container -->
<section class="main-container col2-right-layout wow bounceInUp animated">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-9">
        <div class="my-account">
          <div class="page-title">
            <h2>Update Profile</h2>
          </div>





            <div class="content">

                <?php




                if($_POST)
                    {

                        $name = mysql_real_escape_string($_POST["name"]);
                        $mobile = mysql_real_escape_string($_POST["mobile"]);
                        $address = mysql_real_escape_string($_POST["address"]);



                        $err1=0;
                        $err2=0;
                        $err3=0;

                        if(trim($name)=="")
                              {
                                $err1=1;
                              }

                        if(trim($mobile)=="")
                              {
                                $err2=1;
                              }

                        if(trim($address)=="")
                            {
                                $err3=1;
                            }

                                 //------------------------------->> CONDITIONS

                            $error = $err1+$err2+$err3;


                        if ($error == 0)
                            {

                                $res = mysql_query("UPDATE users SET name='".$name."', mobile='".$mobile."', address='".$address."' WHERE id='".$uid."'");
                                if($res)
                                    {


                                        echo "<div class=\"alert alert-success alert-dismissable\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                        Updated Successfully! 
                                        </div>";
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
                                            
                                            Name Can Not be Empty!!!
                                            
                                            </div>";
                                        }

                                    if ($err2 == 1)
                                        {
                                            echo "<div class=\"alert alert-danger alert-dismissable\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                            
                                            Mobile Can Not be Empty !!!
                                            
                                            </div>";
                                        }
                                    if ($err3 == 1)
                                        {
                                            echo "<div class=\"alert alert-danger alert-dismissable\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                            
                                            Address Can Not be Empty !!!
                                            
                                            </div>";
                                        }

                                }


                    }

                $old = mysql_fetch_array(mysql_query("SELECT name, mobile, address FROM users WHERE id='".$uid."'"));

                ?>


                <form action="" method="post">


                    <ul class="form-list">


                      <li>
                        <label for="name">Name <span class="required">*</span></label>
                        <br>
                        <input type="text" title="name" class="input-text" required="" name="name" value="<?php echo $old[0]; ?>">
                      </li>

                      <li>
                        <label for="name">Mobile <span class="required">*</span></label>
                        <br>
                        <input type="text" title="mobile" class="input-text" required="" name="mobile" value="<?php echo $old[1]; ?>">
                      </li>

                      <li>
                        <label for="name">Address <span class="required">*</span></label>
                        <br>
                        <input type="text" title="address" class="input-text" required="" name="address" value="<?php echo $old[2]; ?>">
                      </li>


                    </ul>

                    <div class="buttons-set">


                       <button type="submit" class="btn btn-primary btn-lg">UPDATE</a>
                    </div>

                </form>



            </div>
        </div>
      </div>
      <aside class="col-right sidebar col-sm-3">
        <div class="block block-account">
          <div class="block-title"><?php echo $userr[1]; ?></div>
          <div class="block-content">
            <ul>
              <li><a href="<?php echo "$baseurl/dashboard"; ?>">Account Dashboard</a></li>
              <li><a href="<?php echo "$baseurl/myorder"; ?>">My Orders</a></li>
               <li class="current"><a href="<?php echo "$baseurl/updateprofile"; ?>">Update Profile</a></li>
              <li><a href="<?php echo "$baseurl/changepassword"; ?>">Change Password</a></li>
              <li class="last"><a href="<?php echo "$baseurl/signout"; ?>">Log Out</a></li>
            </ul>
          </div>
        </div>
        
      </aside>
    </div>
  </div>
</section>





<?php
include('include-footer.php');
?>
</body>
</html>
