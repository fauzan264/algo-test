<?php

session_start();

include_once 'assets/dbconnect.php';

include('template/header.php');


?>


<?PHP
if(empty($_GET['mod'])) {
	include_once "template/dashboard.php";
}
else
{
	$file = $_GET["cmd"];
	$includeFile = "mod/".$_GET['mod']. "/" . $file.'.php';
	if (file_exists($includeFile))
	{
		include_once($includeFile);
	}
	else
		{ echo("Script Not Found");	}
}
?>

<?php
	include('template/footer.php');
?>
