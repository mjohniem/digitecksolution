<?php
error_reporting(E_ERROR|E_PARSE|E_ALL);
include('include-global.php');

$titleofme = "$basetitle";

include('include-styles.php');
echo '</head>
<body class="cms-index-index cms-home-page">';

include('include-header.php');
include('include-navbar.php');

    global $iidd;


?>



  <!-- Main Container -->
  <section class="main-container col1-layout wow bounceInUp animated">
    <div class="main container">
      <div class="col-main">
        <div class="cart">
          <div class="page-title">
            <h2>Shopping Cart</h2>
          </div>
          <div class="table-responsive">
            <form method="post" action="#">
              <input type="hidden" value="Vwww7itR3zQFe86m" name="form_key">
              <fieldset>
                <table class="data-table cart-table" id="shopping-cart-table">
                  <thead>
                    <tr class="first last">
                      <th rowspan="1">&nbsp;</th>
                      <th rowspan="1"><span class="nobr">Product Name</span></th>
                      <th colspan="1" class="a-center"><span class="nobr">Unit Price</span></th>
                      <th class="a-center " rowspan="1">Qty</th>
                      <th colspan="1" class="a-center">Subtotal</th>
                      <th class="a-center" rowspan="1">&nbsp;</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr class="first last">
                      
                      <td class="a-right last" colspan="8">

                        <a href="<?php echo $baseurl; ?>/checkout">
                        <button class="button btn-continue" title="Continue Shopping" type="button"><span>Checkout</span></button></a>



                   
                        <button id="empty_cart_button" class="button" title="Clear Cart" value="empty_cart" name="update_cart_action" type="submit"><span>Clear Cart</span></button>
                      </td>
                    </tr>
                  </tfoot>
                  <tbody>



                    <?php
                            $i=1;
                    $ddaa = mysql_query("SELECT pid, qty, rraate, id FROM carrrt WHERE code='".$unique."' ORDER BY id");
                        echo mysql_error();
                        while ($data = mysql_fetch_array($ddaa))
                        {



                    $ppp = mysql_fetch_array(mysql_query("SELECT name, img FROM products WHERE id='".$data[0]."'"));
                    $ttl = $data[2]*$data[1];

                    $um = urlmod($ppp[0]);
                    $urrl = "$baseurl/product/$data[0]/$um";
                    ?>

                    <tr id="row<?php echo $i;?>">
                      <td class="image">
                          <a class="product-image" title="<?php echo $ppp[0]; ?>" href="<?php echo $urrl; ?>">
                          <img width="75"  alt="<?php echo $ppp[0]; ?>" src="<?php echo "$baseurl/productimages/$ppp[1]";?>"></a>
                      </td>
                      
                      <td>
                          <h2 class="product-name"> <a href="<?php echo $urrl; ?>"><?php echo $ppp[0];?></a> </h2>
                      </td>

                      <td class="a-center hidden-table">
                          <span class="cart-price"> <span class="price"><?php echo $data[2]; ?></span> </span>
                      </td>
                      
                      <td class="a-center movewishlist">

                        <div class="add-to-cart">
                            <div class="pull-left">
                                <div class="custom pull-left">
                                    <button id="btnminus<?php echo $i;?>" onClick="var result = document.getElementById('qty<?php echo $i;?>'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="reduced items-count" type="button"><i class="icon-minus">&nbsp;</i></button>
                                    <input type="text" id="qty<?php echo $i;?>" class="input-text qty" title="Qty" disabled="" value="<?php echo $data[1]; ?>" maxlength="12" id="qty<?php echo $i;?>" name="qty">
                                    <button id="btnplus<?php echo $i;?>" onClick="var result = document.getElementById('qty<?php echo $i;?>'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="increase items-count" type="button"><i class="icon-plus">&nbsp;</i></button>
                                </div>
                            </div>
                            <input type="hidden" id="id" name="id" value="<?php echo $iidd; ?>">
                            <input type="hidden" id="unique" name="unique" value="<?php echo $unique; ?>">

                        </div>


                       </td>

                      <td class="a-center movewishlist"><span class="cart-price"> <span id="chk<?php echo $i;?>" class="price"><?php echo $ttl; ?></span> </span></td>

                      <td class="a-center last"><a id="btnrmv<?php echo $i;?>" class="button remove-item" title="Remove item" href="#"><span><span>Remove item</span></span></a></td>

                    </tr>

					
					
                    <script>

                     $(document).ready(function() {


                        $("#btnplus<?php echo $i;?>").click(function() {

                                        $.post(
                                          "<?php echo $baseurl;?>/api-cart-update.php",
                                          {
                                               unique: "<?php echo $unique;?>",
                                                cccid: "<?php echo $data[3];?>",
                                                act: "plus"
                                          },
                                          function(data)
                                          {

                                             $('#chk<?php echo $i;?>').html(data);

                                          }

                                       );

                        });




                        $("#btnminus<?php echo $i;?>").click(function() {

                                        $.post(
                                          "<?php echo $baseurl;?>/api-cart-update.php",
                                          {
                                           unique: "<?php echo $unique;?>",
                                            cccid: "<?php echo $data[3];?>",
                                            act: "minus"
                                          },
                                          function(data) {

                                             $('#chk<?php echo $i;?>').html(data);

                                          }

                                       );

                        });




                        $("#btnrmv<?php echo $i;?>").click(function() {

                                        $.post(
                                          "<?php echo $baseurl;?>/api-cart-remove.php",
                                          {
                                           unique: "<?php echo $unique;?>",
                                            cccid: "<?php echo $data[3];?>"
                                          },
                                          function(data) {

                                             $('#row<?php echo $i;?>').fadeOut('slow');

                                          }

                                       );

                        });


                    });


                    </script>




                    <?php
                    $i++;

                    }
                     ?>
                    
                  </tbody>
                </table>
              </fieldset>
            </form>
          </div>

          
          <!--cart-collaterals--> 
          
        </div>
        
        
      </div>
    </div>
  </section>
  
<?php
include('include-footer.php');
?>



</body>
</html>
