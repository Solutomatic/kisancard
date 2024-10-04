<?php
require_once('../library.php');
$CreationId = $_POST['CreationId'];  
$arr = array(); 
$COMMON->update_status_by_id('certifications','PrintRequest',1,base64_decode($CreationId));
$arr['Status'] = '1';	
echo json_encode($arr);
?>
