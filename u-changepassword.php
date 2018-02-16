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

                        $password = mysql_real_escape_string($_POST["password"]);
                        $password2 = mysql_real_escape_string($_POST["password2"]);
                        $password3 = mysql_real_escape_string($_POST["password3"]);

                        $oldmd = md5($password);
                        $newmd = md5($password2);

                        $err1=0;
                        $err2=0;
                        $err3=0;


                        if($password2!=$password3)
                            {
                                $err1=1;
                            }

                        if(strlen($password2)<="4")
                            {
                                $err2=1;
                            }


                        $eee = mysql_fetch_array(mysql_query("SELECT pass FROM users WHERE id='".$uid."'"));

                        if($eee[0]!=$oldmd)
                            {
                                $err3=1;
                            }


                        //------------------------------->> CONDITIONS

                        $error = $err1+$err2+$err3;


                        if ($error == 0)
                            {

                                $res = mysql_query("UPDATE users SET pass='".$newmd."' WHERE id='".$uid."'");
                                if($res)
                                    {


                                        echo "<div class=\"alert alert-success alert-dismissable\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                        Password Updated Successfully! 
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
                                            
                                            Password and Password Again not match!!!
                                            
                                            </div>";
                                        }

                                    if ($err2 == 1)
                                        {
                                            echo "<div class=\"alert alert-danger alert-dismissable\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                            Password must be minimum 5 Char!!!
                                            
                                            </div>";
                                        }
                                    if ($err3 == 1)
                                        {
                                            echo "<div class=\"alert alert-danger alert-dismissable\">
                                            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                            
                                            Current Password is WRONG !!!
                                            
                                            </div>";
                                        }

                                }


                    }

                ?>


                    <form action="" method="post">


                        <ul class="form-list">


                          <li>
                            <label for="name">CURRENT PASSWORD <span class="required">*</span></label>
                            <br>
                            <input type="password" title="password" class="input-text" required="" name="password">
                          </li>


                          <li>
                            <label for="name">NEW PASSWORD <span class="required">*</span></label>
                            <br>
                            <input type="password" title="password" class="input-text" required="" name="password2">
                          </li>


                          <li>
                            <label for="name">NEW PASSWORD AGAIN <span class="required">*</span></label>
                            <br>
                            <input type="password" title="password" class="input-text" required="" name="password3">
                          </li>



                        </ul>

                        <div class="buttons-set">


                           <button type="submit" class="btn btn-primary btn-lg">UPDATE</a>


                              </form>
                        </div>

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
               <li><a href="<?php echo "$baseurl/updateprofile"; ?>">Update Profile</a></li>
              <li class="current"><a href="<?php echo "$baseurl/changepassword"; ?>">Change Password</a></li>
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
