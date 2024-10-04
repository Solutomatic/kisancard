<?php
require_once('../library.php');
$Mobile = $_POST['p'];
$OTP = $_POST['o'];
$arr = array();
$Checkotp =	$COMMON->otpvarificationnewresume($Mobile,$OTP);
	if($Checkotp==0)
	{
		$arr['status_message'] = 'Failed';		
	}
	else if ($Checkotp==1)
	{		
		$arr['status_message'] = 'Success';
	} 
echo json_encode($arr);
?>
