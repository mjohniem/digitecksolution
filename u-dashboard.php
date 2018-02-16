<?php
    include('include-global.php');

    if (!is_loggedin())
        {
            echo "<meta http-equiv=\"refresh\" content=\"0; url=$baseurl/signin\" />";
            exit;
        }

    if ($userr[4]!=$sid)
        {

            echo "<meta http-equiv=\"refresh\" content=\"0; url=$baseurl/signout\" />";
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
            <h2>My Dashboard</h2>
          </div>
          <div class="dashboard">


            <div class="recent-orders">
              <div class="title-buttons"><strong>Active Orders</strong> <a href="<?php echo "$baseurl/myorder"; ?>">View All </a> </div>



              
              <div class="table-responsive">
                <table class="data-table" id="my-orders-table">
                    <?php

                    $count = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM orrdr WHERE mst='0' AND usid='".$uid."'"));

                    if($count[0]==0)
                    {

                      echo "<h1> NO ACTIVE ORDER FOUND</h1>";
                    }
                    else
                        {

                             ?>
                                  <thead>
                                    <tr class="first last">
                                      <th>Order #</th>
                                      <th>Ship to</th>
                                      <th>Payment Status</th>
                                      <th>Delivery Status</th>
                                       </tr>
                                  </thead>
                                  <tbody>

                            <?php

                            $ddaa = mysql_query("SELECT id, invid, usid, paydet, daddr, contactnum, code, tm, pst, dst, mst FROM orrdr WHERE mst='0' AND usid='".$uid."' ORDER BY id");
                                while ($data = mysql_fetch_array($ddaa))
                                {


                                    if($data[8]==0)
                                        {
                                            $pst = "<i> Pending </i>";
                                        }
                                        else
                                            {
                                                $pst = "<b> Paid </b>";
                                            }


                                    if($data[9]==0)
                                        {
                                            $dst = "<i> Pending </i>";
                                        }
                                        else
                                            {
                                                $dst = "<b> Delivered </b>";
                                            }


                                     ?>
                                                        <tr>
                                                          <td><?php echo $data[1]; ?></td>
                                                          <td><?php echo $data[4]; ?></td>
                                                          <td><?php echo $pst; ?></td>
                                                          <td><?php echo $dst; ?></td>

                                                        </tr>

                                    <?php
                                }
                        }
                     ?>
                                  </tbody>
                </table>
              </div>
            </div>

          </div>
        </div>
      </div>
      <aside class="col-right sidebar col-sm-3">
        <div class="block block-account">
          <div class="block-title"><?php echo $userr[1]; ?></div>
          <div class="block-content">
            <ul>
              <li class="current"><a href="<?php echo "$baseurl/dashboard"; ?>">Account Dashboard</a></li>
              <li><a href="<?php echo "$baseurl/myorder"; ?>">My Orders</a></li>
               <li><a href="<?php echo "$baseurl/updateprofile"; ?>">Update Profile</a></li>
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
