<?php
header('Content-Type: application/xml');
 require_once 'function.inc.php';
 include 'includes/dbh.inc.php';

 $name=$_POST['name'];

echo "<?xml version='1.0' encoding='UTF-8'?>";
 echo "<message><name>$name</name></message>";

 
?>