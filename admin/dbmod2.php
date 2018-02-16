<?php
require_once('../function.php');
connectdb();
$i=1;
while ($i <= 24) {


//mysql_query("INSERT INTO childcat SET parent='".$i."', name='Child Cat'");
//mysql_query("INSERT INTO subcat SET parent='".$i."', name='Sub Cat'");

/*
mysql_query("INSERT INTO moreimg SET assignto='".$i."', img='img2.jpg'");
mysql_query("INSERT INTO moreimg SET assignto='".$i."', img='img3.jpg'");
mysql_query("INSERT INTO moreimg SET assignto='".$i."', img='img4.jpg'");
*/
$i++;
}


?>