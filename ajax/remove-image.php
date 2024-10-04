<?php
require_once('../library.php');
include("../support/thumb.php"); 
@session_start();
$database = new Database();
$db = $database->dbConnection(); 
$Id = base64_decode($_REQUEST['token']); 
$COMMON->update_status_by_id('certifications','Image','',$Id);

	$arr['img'] = '';// base64_encode($appliedid)
	$arr['Status'] = 1;
	$arr['message'] = '';
	$return["json"] = json_encode($arr);
	echo json_encode($arr);	  
?>
