<?php
require_once('function.php');
connectdb();
session_start();

$tit = mysql_fetch_array(mysql_query("SELECT sitename FROM general_setting WHERE id='1'"));
$basetitle = $tit[0];

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//-------------------------------------------->>
if(isset($_SESSION['unique'])) 
	{
		$unique = $_SESSION['unique'];
		if($unique=="")
		{
			$a = time();
			$r = rand(10000,99999);
			$b = $_SERVER['HTTP_USER_AGENT'];
			$c = $_SERVER['REMOTE_ADDR'];
			$fnl = "$a$b$c$r";
			$un = md5($fnl);	
			$_SESSION['unique'] = "$un";
			redirect($actual_link);
		}
	}
else
	{
		$a = time();
		$r = rand(10000,99999);
		$b = $_SERVER['HTTP_USER_AGENT'];
		$c = $_SERVER['REMOTE_ADDR'];
		$fnl = "$a$b$c$r";
		$un = md5($fnl);	
		$_SESSION['unique'] = "$un";
		redirect($actual_link);
	}
//-------------------------------------------->>



if(isset($_SESSION['email']))
	{
		$email = $_SESSION['email'];
		$userr = mysql_fetch_array(mysql_query("SELECT id, name, mobile, address, sid FROM users WHERE email='".$email."'"));
		$uid = $userr[0];

	}

if(isset($_SESSION['sid']))
	{
		$sid = $_SESSION['sid'];
	}
?>

