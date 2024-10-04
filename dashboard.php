<?php include("library.php");  if(!isset($_COOKIE['bjpmember'])){ $COMMON->redirect('start'); } 
$CreationId = $_COOKIE['bjpmember'];
$Setupdetails = $COMMON->givedata('certifications',$CreationId); 
$Status = $Setupdetails['Status']; 
if($Status==0)
{
	$setid = $CreationId + 100000;
	$url = $Domain.'template-edit?creationno='.$setid;
	$COMMON->redirect($url);  
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
<header class="header-area fadeInDown" data-wow-delay="0.2s">
  <div class="classy-nav-container light breakpoint-off">
    <div class="container"> 
      <!-- Classy Menu -->
      <nav class="classy-navbar light justify-content-between" id="dreamNav"> 
        
        <!-- Logo --> 
        <a class="nav-brand light" href="javascript:void(0)"><img src="img/core-img/logo.png" alt="logo"> </a> 
        
        <!-- Navbar Toggler -->
        <div class="classy-navbar-toggler demo"> <span class="navbarToggler"><span></span><span></span><span></span></span> </div>
        
        <!-- Menu -->
        <div class="classy-menu"> 
          
          <!-- close btn -->
          <div class="classycloseIcon">
            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
          </div>
          
          <!-- Nav Start -->
          <div class="classynav">
            <ul id="nav">
              <li><a href="<?php echo $Domain ?>">Home</a></li>
              <li><a href="<?php echo $Domain ?>dashboard">Dashboard</a></li>
              <li><a href="<?php echo $Domain ?>logout">Logout</a></li>
            </ul>
            
            <!-- Button --> 
          </div>
          <!-- Nav End --> 
        </div>
      </nav>
    </div>
  </div>
</header>
<div class="breadcumb-area clearfix dzsparallaxer auto-init" data-options='{direction: "normal"}'>
  <div class="divimage dzsparallaxer--target" style="width: 101%; height: 130%; background-image: url(img/bg-img/bg-2.html)"></div>
  <!-- breadcumb content -->
  <div class="breadcumb-content">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-12">
          <nav aria-label="breadcrumb" class="breadcumb--con text-center">
            <h2 class="w-text title wow fadeInUp" data-wow-delay="0.2s">Template Preview</h2>
            <ol class="breadcrumb justify-content-center wow fadeInUp" data-wow-delay="0.4s">
              <li class="breadcrumb-item"><a href="<?php echo $Domain; ?>">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ##### Contact Area Start ##### -->
<div class="clearfix"></div>
<section class="blog-area section-padding-50-0">
  <div class="container">
    <div class="row">
      <div class="col-12 col-md-8">
        <div > 
          <!-- Post Thumbnail -->
          <div class="blog_thumbnail" style=""> <iframe src="cv/?token=<?php echo base64_encode($CreationId)?>" style="width:100%; height:580px"></iframe> </div>
        </div>
      </div>
      <div class="col-12 col-md-4">
        <div class="sidebar-area">
          <div class="temp-summary">
            <!--<p>Lorem ipsum dolor sit amet, elit, sed do eiusmod
              tempor incidi dunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea.</p>-->
            <a class="btn dream-btn width-100" href="template-edit.html">Download Your Certificate</a> </div>
          
          <!-- Subscribe Widget -->
          <div class="subscribe-widget mt-20">
            <div class="widget-title">
              <h5>Massege from Your Neta</h5>
            </div>
            <div class="subscribe-form">
               <div class="list-wrap align-items-center">
                            <div class="row">
                                
                              <marquee scrollamount="2" direction="up" onMouseOver="this.stop()" onMouseOut="this.start()" >
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img src="img/icons/check.png" class="check-mark-icon" alt="">
                                        <div class="foot-c-info">Proven CV Templates to increase Hiring Chance</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img src="img/icons/check.png" class="check-mark-icon" alt="">
                                        <div class="foot-c-info">Creative and Clean Templates Design</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img src="img/icons/check.png" class="check-mark-icon" alt="">
                                        <div class="foot-c-info">Easy and Intuitive Online CV Builder</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img src="img/icons/check.png" class="check-mark-icon" alt="">
                                        <div class="foot-c-info">Free to use. Developed by hiring professionals.</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img src="img/icons/check.png" class="check-mark-icon" alt="">
                                        <div class="foot-c-info">Fast Easy CV and Resume Formatting</div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="side-feature-list-item">
                                        <img src="img/icons/check.png" class="check-mark-icon" alt="">
                                        <div class="foot-c-info">Recruiter Approved Phrases.</div>
                                    </div>
                                </div>
                              </marquee>
                                
                            </div>
                        </div>
            </div>
          </div>
        </div>
      </div>
    </div>
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