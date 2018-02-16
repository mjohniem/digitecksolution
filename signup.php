<?php
include('include-global.php');

$titleofme = "$basetitle - Sign Up";

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
            <h1>Create an Account</h1>
          <div class="content">

                <?php




                if($_POST)
                    {

                        $name = mysql_real_escape_string($_POST["name"]);


                        $address = mysql_real_escape_string($_POST["address"]);
                        $mobile = mysql_real_escape_string($_POST["mobile"]);
                        $email = mysql_real_escape_string($_POST["email"]);

                        $password = mysql_real_escape_string($_POST["password"]);
                        $password2 = mysql_real_escape_string($_POST["password2"]);


                        $err1=0;
                        $err2=0;
                        $err3=0;
                        $err4=0;
                        $err5=0;
                        $err6=0;
                        $err7=0;
                        $err8=0;



                        if(trim($name)=="")
                              {
                                $err1=1;
                              }

                        if(trim($address)=="")
                              {
                                $err2=1;
                              }

                        if(trim($mobile)=="")
                              {
                                $err3=1;
                              }

                        if(trim($email)=="")
                              {
                                $err4=1;
                              }

                        if($password!=$password2)
                              {
                                 $err5=1;
                              }

                        if(strlen($password)<="4")
                              {
                                $err6=1;
                              }


                        $eee = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$email."'"));

                        if($eee[0]>="1")
                              {
                                $err7=1;
                              }


                        $error = $err1+$err2+$err3+$err4+$err5+$err6+$err7+$err8;


                        if ($error == 0)
                        {

                            $passmd = md5($password);

                            $res = mysql_query("INSERT INTO users SET name='".$name."', mobile='".$mobile."', address='".$address."', email='".$email."', pass='".$passmd."'");

                            if($res)
                            {
                                  echo "<div class=\"alert alert-success alert-dismissable\">
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                
                                Registretion Completed Successfully!
                                
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
                                        Address Can Not be Empty!!!
                                        </div>";
                                    }




                                if ($err3 == 1)
                                    {
                                        echo "<div class=\"alert alert-danger alert-dismissable\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                        Mobile Can Not be Empty!!!
                                        </div>";
                                    }



                                if ($err4 == 1)
                                    {
                                        echo "<div class=\"alert alert-danger alert-dismissable\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                        Email Can Not be Empty!!!
                                        </div>";
                                    }



                                if ($err5 == 1)
                                    {
                                        echo "<div class=\"alert alert-danger alert-dismissable\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                        Password and Confirm Password not match!!!
                                        </div>";
                                    }



                                if ($err6 == 1)
                                    {
                                        echo "<div class=\"alert alert-danger alert-dismissable\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                        Password must be minimum 5 Char!!!
                                        </div>";
                                    }




                                if ($err7 == 1)
                                    {
                                        echo "<div class=\"alert alert-danger alert-dismissable\">
                                        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>  
                                        Email Already Exist in our database... Please Use another Email!!
                                        </div>";
                                    }


                            }







                    }

                ?>


                <form action="" method="post">


                    <ul class="form-list">

                      <li>
                        <label for="email">Name <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Full Name" class="input-text" required="" name="name">
                      </li>


                      <li>
                        <label for="email">Address <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Address" class="input-text" required="" name="address">
                      </li>


                      <li>
                        <label for="email">Mobile Number <span class="required">*</span></label>
                        <br>
                        <input type="text" title="Mobile Number" class="input-text"  required="" name="mobile">
                      </li>



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

                      <li>
                        <label for="pass">Retype Password <span class="required">*</span></label>
                        <br>
                        <input type="password" title="Retype Password " class="input-text" required="" name="password2">
                      </li>

                    </ul>

                    <div class="buttons-set">

                       <button type="submit" class="button create-account"><span>Create an Account</span></button>

                       <a href="<?php echo "$baseurl/signin"; ?>" class="btn btn-primary btn-xs pull-right">Login</a>

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
