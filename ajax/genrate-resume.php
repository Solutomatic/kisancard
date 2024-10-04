<?php
require_once('../library.php'); include("../support/thumb.php"); 
@session_start();
$database = new Database();
$db = $database->dbConnection(); 
if(isset($_POST['submit']))
{
	$Id = $COMMON->replace($_POST['token']); 
	if($_FILES["image"]["name"]!='')
	{
		$path_parts = $_FILES["image"]["name"]; //Name can be changed by the client. Use something safer.
	 
		$ext = pathinfo($path_parts, PATHINFO_EXTENSION);
		$allowedExtensions = array("jpg","jpeg","gif","png","JPG","JPEG","GIF","PNG");
		if (in_array($ext, $allowedExtensions))
		{
			$Bannerfile = cwUpload('image','../uploads/','',TRUE,'../uploads/thumb/','300','330'); 
			$message =  '<div class="alert alert-success alert-dismissible show" role="alert"> <strong>Success!</strong> Sucess</div>';
		}
		else
		{
			$Bannerfile= "";
			$Status = '2';
			$message =  '<div class="alert alert-warning alert-dismissible show" role="alert"> <strong>Failed!</strong> Only JPG,PNG Image Allowed</div>';
		}
	}
	else
	{
		$Bannerfile= $_POST['oldimage']; 
		$Status = '3';
		$message =  '<div class="alert alert-danger alert-dismissible show" role="alert"> <strong>Failed!</strong> No File Uploaded</div>';
	} 
	$MemberType =  $COMMON->replace($_POST['MemberType']);	 
	$Name = $COMMON->replace($_POST['fullname']);
	$Father =  $COMMON->replace($_POST['Father']);
	$DOB =  $COMMON->replace($_POST['DOB']);
	$VidhanSabha =  $COMMON->replace($_POST['VidhanSabha']);
	$Block =  $COMMON->replace($_POST['Block']);
	$Location  = $COMMON->replace($_POST['location']);	
	$Address = $COMMON->replace($_POST['address']); 
	$Mobile = $COMMON->replace($_POST['phone']);
	$WhatsApp = $COMMON->replace($_POST['WhatsApp']); 
	$Email = $COMMON->replace($_POST['email']); 	 
	$IDCard =  $COMMON->replace($_POST['IDCard']);
	$IDCardNumber =  $COMMON->replace($_POST['IDCardNumber']);
	$FacebookPage =  $COMMON->replace($_POST['FacebookPage']); 
	$InstagramPage  = $COMMON->replace($_POST['InstagramPage']);
	$TwitterPage  = $COMMON->replace($_POST['TwitterPage']);	
	$ReferralID  = $COMMON->replace($_POST['ReferralID']); 
	//echo $Bannerfile;
	
	if($Bannerfile!="")
	{
		$Status  = 1;
		$updateresume  = $COMMON->updateresume($Id, $Bannerfile, $MemberType, $Name, $Father, $DOB, $Block, $VidhanSabha, $Address, $Mobile, $WhatsApp, $Email, $IDCard, $IDCardNumber, $FacebookPage, $InstagramPage, $TwitterPage, $Location, $ReferralID);
		$COMMON->update_status_by_id('certifications','Status',1,base64_decode($Id));
		$message =  '<div class="alert alert-warning alert-dismissible show" role="alert"> <strong>Success!</strong> Sucess</div>';
	}  
	else
	{
		$updateresume  = base64_decode($Id);
	}
	
	 
	$arr['ApplicationId'] = base64_encode($updateresume);// base64_encode($appliedid)
	$arr['Status'] = $Status;
	$arr['message'] = $message;
	$return["json"] = json_encode($arr);
	echo json_encode($arr);	 				
 
}
?>
