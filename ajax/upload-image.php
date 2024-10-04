<?php
require_once('../library.php');
include("../support/thumb.php"); 
@session_start();
$database = new Database();
$db = $database->dbConnection(); 
if($_FILES["image"]["name"]!='')
{
	$path_parts = $_FILES["image"]["name"]; //Name can be changed by the client. Use something safer.
	$ext = pathinfo($path_parts, PATHINFO_EXTENSION);
	$allowedExtensions = array("jpg","jpeg","gif","png","JPG","JPEG","GIF","PNG");
	if (in_array($ext, $allowedExtensions))
	{
		$Bannerfile = cwUpload('image','../uploads/','',TRUE,'../uploads/thumb/','300','330');
		$Id = base64_decode($_POST['token']); 
		$COMMON->update_status_by_id('certifications','Image',$Bannerfile,$Id);
		$Status  = 1;
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
	$Bannerfile= "";
	$status = '2';
	$message =  '<div class="alert alert-danger alert-dismissible show" role="alert"> <strong>Failed!</strong> No File Uploaded</div>';
}  
	 
	$arr['img'] = $Bannerfile;// base64_encode($appliedid)
	$arr['Status'] = $Status;
	$arr['message'] = $message;
	$return["json"] = json_encode($arr);
	echo json_encode($arr);	  
?>
