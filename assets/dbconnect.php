<?php
ini_set('display_errors',1);

$userdb='root';
$host='localhost';
$passdb='';
$dbselect='db_penjualan';

$baseurl="";


$con=mysqli_connect($host,$userdb,$passdb);
if (!$con) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
mysqli_select_db($con,$dbselect);

?>
