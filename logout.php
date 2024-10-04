<?php include("library.php");  if(!isset($_COOKIE['bjpmember'])){ $COMMON->redirect('start'); }
$CreationId = $_COOKIE['bjpmember']; 
$Setupdetails = $COMMON->givedata('certifications',$CreationId); 
$Status = $Setupdetails['Status'];
setcookie('bjpmember', '', 1 , '/');
setcookie('bjpmembertmobile', '', 1, '/'); 
$COMMON->redirect($Domain);
 ?> 