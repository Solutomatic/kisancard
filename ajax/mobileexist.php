<?php require_once('../library.php');  
$arr=array();
if(!empty($_REQUEST['uname']))
{
	$data = $COMMON->mobilealready_exists($_REQUEST['uname']);
	if($data == 0)
	{
		$arr['status_message']= "Mobile No Available";  //good to register
	}
	else
	{
		$arr['status_message']= "Mobile No Already Exists"; //already registered
	}
}
else
{
	$arr['status_message']= "Mobile No Already Exists"; //invalid post var
}
//$arr['status_message']= "Mobile No Available"; 
echo json_encode($arr);
?>
