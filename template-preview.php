<?php include("../library.php");  if(!isset($_COOKIE['resumestudent'])){ $auth_user->redirect('start'); }
if(!isset($_REQUEST['template']))
{
	$auth_user->redirect('creation');
}
else
{
	$templateid = base64_decode($_REQUEST['template']);
	$Templatedetails = $GenSet->givedata('resume_template',$templateid); 
}
$CreationId = $GenSet->Getcoumnbyid('resume_set_template','Id','UserId',$_COOKIE['resumestudent']); 
if(isset($CreationId))
{
	$auth_user->redirect('template-edit?creationno='.$CreationId+100000);  
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
<title>Capabl : Elite Techno Groups :: Resume Making Tools</title>
<?php include("includes/head.php"); ?>
</head>

<body class="light-version">
<!-- Preloader -->
<?php include("includes/header.php"); ?>
<!-- ##### Welcome Area Start ##### -->
<div class="breadcumb-area clearfix"> 
  
  <!-- breadcumb content -->
  <div class="breadcumb-content">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12"> &nbsp; </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Welcome Area End ##### --> 
<?php if(isset($Templatedetails)) { ?>
<!-- ##### Contact Area Start ##### -->
<section class="blog-area section-padding-100-0">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8">
        <div > 
          <!-- Post Thumbnail -->
          <div class="blog_thumbnail"> <img src="img/demos/<?php echo $Templatedetails['Image']; ?>" class="temp-img" alt=""> </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="sidebar-area">
          <div class="temp-summary">
            <?php echo $Templatedetails['Description']; ?>
            <a class="btn dream-btn width-100" href="javascript:void(0)" onClick="trytemplate('<?php echo base64_encode($Templatedetails['Id']); ?>')">Try This Template</a> </div>
           <div class="row text-center" id="faildemessage" style="display:none;"></div>
    <div class="row text-center" id="loadinggif" style="display:none;"><img src="<?php echo $Domain ?>loading_icon.gif" height="100px" /></div>
          <!-- Subscribe Widget -->
           
        </div>
      </div>
    </div>
  </div>
</section>
<?php } else { ?>
<section class="blog-area section-padding-100-0">
  <div class="container">
    <div class="row">
       
      <h2> NOT FOUND</h2>
    </div>
  </div>
</section>

<?php }?>
<!-- ##### Contact Area End ##### -->
<?php include("includes/footer.php"); ?>
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
	url : "<?php echo $Domain ?>resume/ajax/choose-template",success : function(data)
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