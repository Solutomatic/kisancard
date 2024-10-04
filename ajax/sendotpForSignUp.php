<?php
require_once('../library.php');
$Mobile = $_POST['p'];
$OTP = $COMMON->otpforattemptresume($Mobile); 
$arr = array();
if($OTP!='')
{ 
	$message_body = 'Your One Time Password For Elite Techno Groups login is  '.$OTP;
	//echo $row['Mobile']; 
}
$arr['status_message'] = 'Success';
echo json_encode($arr);
?>
