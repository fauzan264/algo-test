<?php
//fuction rank

$userdb='root';
$host='localhost';
$passdb='';
$dbselect='db_genesis';

$baseurl="";


$con=mysqli_connect($host,$userdb,$passdb);
mysqli_select_db($con,$dbselect);



function saldo($uid){
	
	
global $con;

    $quurank="select * from users where user_id='$uid'";
	$rsurank=mysqli_query($con,$quurank);
	$rwurank=mysqli_fetch_assoc($rsurank);


	return $rwurank['saldo_aktif'];
 
}

function balance($uid){
	
	
global $con;

    $quurank="select * from users where user_id='$uid'";
	$rsurank=mysqli_query($con,$quurank);
	$rwurank=mysqli_fetch_assoc($rsurank);

	$balance =$rwurank['saldo_aktif'];
	return $balance;
 
}

function dolar($dolar){
	

	$hasil_dolar = "$ " . number_format($dolar,2,',','.');
	return $hasil_dolar;
 
}

function angka($dolar){
	

	$hasil_dolar = number_format($dolar,2,',','.');
	return $hasil_dolar;
 
}

function tanggal($tanggal){
	

	$date=date_create($tanggal); 
  
return date_format($date, "F/d/Y"); 
 
}

 
 function totalinvestment($userid){
	 
global $con;
	
$totinvesment="select count(autono) as totinvest FROM history_trading where user_id='$userid'";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['totinvest'];
 
}

function activeinvestment($userid){
	 
global $con;
	
$totinvesment="select count(autono) as active FROM trading where user_id='$userid' and invest_status='Active'";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['active'];
 
}

 function totprofit($userid){
	 
global $con;
	
$totinvesment="select sum(profit) as totprofit FROM history_profit where user_id='$userid'";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['totprofit'];
 
}


 function totreff($userid){
	 
global $con;
	
$qureff="select count(user_id) as totreff FROM users where reff_id='$userid'";
$rsreff=mysqli_query($con,$qureff);
$rwreff=mysqli_fetch_array($rsreff);


return $rwreff['totreff'];
 
}

function totbonus($userid){
	 
global $con;
	
$totinvesment="select sum(bonus_reff) as bonusreff FROM history_profit_reff where user_id='$userid'";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['bonusreff'];
 
}

function monthref($userid){
	 
global $con;
$date=date("Y-m-d");
$tglstart=date("Y-m-1");
$tglend=date("Y-m-31");	

$totinvesment="select count(user_id) as newuser FROM users WHERE reff_id='$userid' and (date_join BETWEEN '$tglstart' AND '$tglend')";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['newuser'];
 
}

function montprofitreff($userid){
	 
global $con;
$date=date("Y-m-d");
$tglstart=date("Y-m-1");
$tglend=date("Y-m-31");	

$totinvesment="select count(user_id) as newuser FROM users WHERE reff_id='$userid' and (date_join BETWEEN '$tglstart' AND '$tglend')";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['newuser'];
 
}

function totprofitmonth($userid){
	 
global $con;
$tglstart=date("Y-m-1");
$tglend=date("Y-m-31");
	
$totinvesment="select sum(profit) as totprofit FROM history_profit where user_id='$userid' and (tanggal BETWEEN '$tglstart' AND '$tglend')";
$rstotinves=mysqli_query($con,$totinvesment);
$rwtotinves=mysqli_fetch_array($rstotinves);


return $rwtotinves['totprofit'];
 
}

?>