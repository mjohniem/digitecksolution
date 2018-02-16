<?php
ini_set("gd.jpeg_ignore_warning", 1);

/*$baseurl = "http://ecommerce.thesoftking.com";
$adminurl = "http://ecommerce.thesoftking.com/admin";
*/
$baseurl = "http://localhost/DigiteckSolution";
$adminurl = "http://localhost/DigiteckSolution/admin";


date_default_timezone_set("Asia/Dhaka");
$tm = time();



// ini_set('display_errors', 'Off');
error_reporting(E_ALL);
	
$dbname = "rexbdnet_ecommerce";
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";



function connectdb()
    {
        global $dbname, $dbuser, $dbhost, $dbpass;
        $conms = @mysql_connect($dbhost,$dbuser,$dbpass); //connect mysql
        if(!$conms) return false;
        $condb = @mysql_select_db($dbname);
        if(!$condb) return false;
        return true;
    }

function attempt($username, $password)
    {
        $mdpass = md5($password);
        $data = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM users WHERE email='".$username."' and password='".$mdpass."'"));

        if ($data[0] == 1)
            {
                # set session
                $_SESSION['username'] = $username;
                return true;
            }
            else
                {
                    return false;
                }
    }



function attemptadmin($username, $password)
    {
        $mdpass = md5($password);
        $data = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM admin WHERE username='".$username."' and password='".$mdpass."'"));

        if ($data[0] == 1)
            {
                # set session
                $_SESSION['username'] = $username;
                return true;
            }
            else
                {
                    return false;
                }
    }



function you_valid($usssr)
    {

    $aa = mysql_fetch_array(mysql_query("SELECT verify FROM users WHERE id='".$usssr."'"));

        if ($aa[0]==0)
            {
                return true;
            }
    }



///////////-------------------------ADMIN
function is_user()
    {
      if (isset($_SESSION['username']))
        return true;
    }
///////////-------------------------ADMIN


///////////-------------------------USER
function is_loggedin()
    {
      if (isset($_SESSION['email']))
        return true;
    }
///////////-------------------------USER


function redirect($url)
    {
        header('Location: ' .$url);
        exit;
    }

function valid_username($str)
    {
        return preg_match('/^[a-z0-9_-]{3,16}$/', $str);
    }

function valid_password($str)
    {
        return preg_match('/^[a-z0-9_-]{6,18}$/', $str);
    }

function totalpost($uid)
    {
    $ttl = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM news WHERE who='".$uid."'"));

        echo $ttl[0];
    }



function urlmod($txt)
    {

        $string = strtolower($txt);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);
        $url = $string;


        return $url;
    }



///---------------------------------------------------------------------->>>>>> FOR GRID
function singlegrid($id)
    {
            $curr = mysql_fetch_array(mysql_query("SELECT currency FROM general_setting WHERE id='1'"));
            $baseurl = "http://localhost/DigiteckSolution"; //////////////////EDIT IT

            $pdet = mysql_fetch_array(mysql_query("SELECT name, rate, parent, img, stock, sho, offtyp, offamo, offtill, featured FROM products WHERE id='".$id."'"));

            $urii = urlmod($pdet[0]);

        if($pdet[9]==1)
            {
                $fea = "<div class=\"new-label new-top-left\">HOT</div>";
            }
            else
                {
                    $fea = "";
                }

        if($pdet[6]==0)
            {
                $sss = "";
            }
            else
                {
                    $sss = "<div class=\"sale-label\">Sale</div>";
                }


            echo "
                    <li class=\"item col-lg-4 col-md-3 col-sm-4 col-xs-6\">
                        <div class=\"item-inner\">
                           <div class=\"item-img\">
                                <div class=\"item-img-info\"> <a class=\"product-image\" title=\"$pdet[0]\" href=\"$baseurl/product/$id/$urii\"> 
                                    <img alt=\"$pdet[0]\" src=\"$baseurl/productimages/$pdet[3]\"> </a>
                                         $fea  $sss
                                     <a class=\"quickview-btn\" ><span>Quick View</span></a>
                                </div>
                           </div>
            
                            <div class=\"item-info\">
                                <div class=\"info-inner\">
                                    <div class=\"item-title\"> 
                                        <a title=\"$pdet[0]\" href=\"$baseurl/product/$id/$urii\"> $pdet[0] </a>  
                                    </div>
                                    <div class=\"item-content\">
            
                                        <div class=\"item-price\">
                                            <div class=\"price-box\"> <span class=\"regular-price\"> <span class=\"price\">$pdet[1] $curr[0]</span> </span> </div>
                                        </div>
            
            
                                        <div class=\"actions\">
                                            <div class=\"add_cart\">
                                                <a href=\"$baseurl/product/$id/$urii\">
                                                 <button class=\"button btn-cart\" type=\"button\"><span> View Details </span></button>
                                                 </a>
                                           </div>
                                        </div>
             
            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
            
            ";


    }








///---------------------------------------------------------------------->>>>>> FOR SLIDER
function singleslide($id)
    {
        $curr = mysql_fetch_array(mysql_query("SELECT currency FROM general_setting WHERE id='1'"));
        $baseurl = "http://localhost/DigiteckSolution"; //////////////////EDIT IT

        $pdet = mysql_fetch_array(mysql_query("SELECT name, rate, parent, img, stock, sho, offtyp, offamo, offtill, featured FROM products WHERE id='".$id."'"));

        $urii = urlmod($pdet[0]);

        if($pdet[9]==1)
        {
          $fea = "<div class=\"new-label new-top-left\">HOT</div>";
        }
        else
            {
                $fea = "";
            }

        if($pdet[6]==0)
            {
              $sss = "";
            }
            else
                {
                    $sss = "<div class=\"sale-label\">Sale</div>";
                }

        echo "
            <div class=\"item\">
                <div class=\"item-inner\">
                    <div class=\"item-img\">
                        <div class=\"item-img-info\"> <a class=\"product-image\" title=\"$pdet[0]\" href=\"$baseurl/product/$id/$urii\"> 
                            <img alt=\"$pdet[0]\" src=\"$baseurl/productimages/$pdet[3]\" style=\"height: 336px;\"> </a>
                            $fea  $sss
                                
                            <a class=\"quickview-btn\" ><span>Quick View</span></a>
                                
                        </div>
                   
                    </div>
                    <div class=\"item-info\">
                        <div class=\"info-inner\">
                            <div class=\"item-title\"> 
                                <a title=\"$pdet[0]\" href=\"$baseurl/product/$id/$urii\"> $pdet[0] </a> 
                            </div>
                            <div class=\"item-content\">
                            
                                <div class=\"item-price\">
                                    <div class=\"price-box\"> <span class=\"regular-price\"> 
                                        <span class=\"price\"> $pdet[1] $curr[0] </span> </span> 
                                    </div>
                                </div>
                                <div class=\"actions\">
                                <div class=\"add_cart\">
                                    <a href=\"$baseurl/product/$id/$urii\">
                                                              <button class=\"button btn-cart\" type=\"button\"><span> View Details  </span></button>
                                    </a>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";


    }


?>