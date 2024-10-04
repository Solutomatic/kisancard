<?php
require_once('../library.php');
$tempid = $_POST['tempid'];  
$arr = array();
$Checkotp =	$COMMON->setresumetempid($tempid);
	if($Checkotp=='')
	{
		$arr['status_message'] = 'Failed';	
		$arr['creatid'] = '';	
	}
	else if ($Checkotp!='')
	{		
		$arr['status_message'] = 'Success';
		$arr['creatid'] = 100000+$Checkotp;
	} 
echo json_encode($arr);
?>
