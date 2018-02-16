<?php
require_once('../function.php');
connectdb();
$i=1;
while ($i <= 864) {



mysql_query("INSERT INTO moreimg SET assignto='".$i."', img='img1.jpg'");
mysql_query("INSERT INTO moreimg SET assignto='".$i."', img='img2.jpg'");
mysql_query("INSERT INTO moreimg SET assignto='".$i."', img='img3.jpg'");
mysql_query("INSERT INTO moreimg SET assignto='".$i."', img='img4.jpg'");
mysql_query("INSERT INTO moreimg SET assignto='".$i."', img='img5.jpg'");



$i++;
}


?>