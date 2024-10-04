<?php include("library.php");  if(!isset($_COOKIE['bjpmember'])){ $COMMON->redirect('start'); }
$CreationId = $_COOKIE['bjpmember']; 
$Setupdetails = $COMMON->givedata('certifications',$CreationId);  
if(!empty($Setupdetails))
{
	if($Setupdetails['Type']!='')
	{
		$setid = $CreationId + 100000;
		$url = $Domain.'template-edit?creationno='.$setid;
		$COMMON->redirect($url); 
	}	 
}
else
{
	$COMMON->redirect('start');
}

 ?>
<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="UTF-8">
<meta name="description" content="">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Title -->
<title>Membership</title>
<?php include("includes/head.php"); ?>
</head>

<body class="light-version">
<!-- Preloader -->
<?php include("includes/header.php"); ?>
 
<!-- ##### Contact Area Start ##### -->
 <div class="clearfix"></div>
<section class="demo section-padding-100 ring-bg pb-0">
  <div class="container">
    <div class="section-heading text-center mb-2">
      <div class="dream-dots justify-content-center"> <span></span><span></span><span></span><span></span><span></span><span></span><span></span> </div>
      <h2 class="bold">Our Creative Templates</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
    </div>
    <div class="row justify-content-center">
    
      <div class="col-lg-4 col-md-6 col-sm-12">
        <a href="javascript:void(0)" onClick="trytemplate('<?php echo base64_encode('Member'); ?>')" class="preview-demo w-100 v2">Register as a Member
<i class="fa fa-long-arrow-right"></i></a>
      </div> 
      <div class="col-lg-4 col-md-6 col-sm-12">
        <a href="javascript:void(0)" onClick="trytemplate('<?php echo base64_encode('Player'); ?>')" class="preview-demo w-100 v1">Register as a Player<i class="fa fa-long-arrow-right"></i></a>
      </div>
    </div>
    <div class="row text-center" id="faildemessage" style="display:none;"></div>
    <div class="row text-center" id="loadinggif" style="display:none;"><img src="<?php echo $Domain ?>loading-loader.gif" height="100px" /></div>
  </div>
</section>
 
<?php include("includes/js.php"); ?>
<script>
// Ajax Contact Form js
 
function trytemplate(tempid)
{
	$("#loadinggif").show();
$.ajax({
	type : "POST",
	dataType: "json",
	type : "POST",data : {"tempid" : tempid},dataType : "json",
	url : "<?php echo $Domain ?>ajax/choose-template",success : function(data)
	{
		
		var status_message = data['status_message'];
		if (status_message == "Success")
		{
			$("#loadinggif").hide();
			window.location.href = 'template-edit?creationno='+data['creatid'];; 
		}
		else
		{				
			$("#loadinggif").hide();
			if (status_message == "Failed")
			{
				$("#faildemessage").show();
				$("#faildemessage").html('Not able to generate kindly Contact to support');
			}
		}
}
});
}
 
</script>
</body>
</html>