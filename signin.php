<?php
include('include-global.php');

$titleofme = "$basetitle - Sign In";

include('include-styles.php');
echo '</head>
<body class="cms-index-index cms-home-page">';

include('include-header.php');
include('include-navbar.php');




?>


<!-- Main Container -->
<section class="main-container col1-layout bounceInUp animated">
  <div class="main container">
    <div class="account-login">

      <fieldset class="col2-set">

        
        <div class="col-md-6 col-md-offset-3">
            <h1>Sign in to Your Account</h1>
              <div class="content">

                <?php




                    if($_POST)
                        {

                            $email = mysql_real_escape_string($_POST["email"]);
                            $password = mysql_real_escape_string($_POST["password"]);
                            $passmd = md5($password);

                            $grant = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."' AND pass='".$passmd."'"));


                            if($grant[0]==1)
                                {
                                    //---------------------------->>>>>>>>>>>LOGIN
                                    $_SESSION['email'] = $email;

                                    $uu = $email;
                                    $tm = time();
                                    $un = uniqid();
                                    $si = "$uu$tm$un";
                                    $sid = md5($si);
                                    $_SESSION['sid'] = $sid;

                                    mysql_query("UPDATE users SET sid='".$sid."' WHERE email='".$uu."'");

                                    echo "<meta http-equiv=\"refresh\" content=\"0; url=$baseurl/dashboard\" />";

                                    redirect("$baseurl/dashboard");



                                    //---------------------------->>>>>>>>>>>LOGIN
                                }
                                else
                                    {
                                          echo "<div class=\"alert alert-danger alert-dismissable\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                        WRONG Email and Password Combination !
                                        
                                        </div>";

                                    }

                        }

                ?>


                <form action="" method="post">


                    <ul class="form-list">


                      <li>
                        <label for="email">Email Address <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Email Address" class="input-text" id="email" required="" name="email">
                      </li>

                      <li>
                        <label for="pass">Password <span class="required">*</span></label>
                        <br>
                        <input type="password" title="Password" class="input-text" required="" name="password">
                      </li>


                    </ul>

                    <div class="buttons-set">
                        <button type="submit" class="button login"><span>Login</span></button>

                       <a href="<?php echo "$baseurl/signup"; ?>" class="btn btn-primary btn-xs pull-right">Create an Account</a>
                    </div>
                </form>

            </div>
        </div>
      </fieldset>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
</section>
    <!-- Main Container End -->

    <?php

    include('include-footer.php');
    ?>
</body>
</html>
