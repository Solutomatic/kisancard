<?php  session_start();
date_default_timezone_set("Asia/Kolkata");
require_once("dbconfig.php");
require_once("classes/class.common.php"); 
$COMMON=new COMMON(); 
$GenralSite = $COMMON->setting(); 
$Domain = $GenralSite['Domainname'];if (function_exists('header_remove')) { @header_remove('X-Powered-By');  } else { @ini_set('expose_php', 'off');}
if(stristr(@$_SERVER['HTTP_USER_AGENT'], "Mobile"))
{
	$Device = 'Mobile';
}
else
{
	$Device = 'Desktop';
} 
?> 