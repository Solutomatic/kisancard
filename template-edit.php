<?php include("library.php");  if(!isset($_COOKIE['bjpmember'])){ $COMMON->redirect('start'); }
$creationno = $_REQUEST['creationno']-100000;
$Setupdetails = $COMMON->givedata('certifications',$creationno);  
$membertype = $Setupdetails['Type']; 
if($_COOKIE['bjpmember']!=$Setupdetails['Id'])
{
   $COMMON->redirect('start');
} 
if($Setupdetails['Status']==1)
{
	$COMMON->redirect('dashboard');
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
<!-- ##### Blog Area Start ##### -->
<?php include("includes/header.php"); ?>
<!-- Modal HTML -->
<div id="myModal" style="position: fixed; top: 0; right: 0; bottom: 0; left: 0; z-index: 1050; display:none;">
  <div class="modal-dialog">
    <div class="modal-content" style="background:none; border:none; height:100vh">
      <div class="modal-body" style="background:transparent"> <img src="loading-loader.gif"  /> </div>
    </div>
  </div>
</div>
<section class="blog-area">
  <div class="container-fluid">
    <div class="row justify-content-center">
       
      <div class="col-12 col-md-8">
        <div class="container">
          
          <form method="post" action="#" id="resumegenartion" enctype="multipart/form-data">
            <input type="hidden" name="token" value="<?php echo base64_encode($creationno); ?>" />
            <div class="mt-100">
              <h2>Personal Info</h2>
              <div class="block-container">
              <div id="userimgmsg"></div>
                <div >
                <div class="row align-items-center">
                  <div class="col-lg-10 col-12 col-md-8 mt-s p-0">
                    <h6 class="">
                      <input type="file"  accept="image/png, image/jpeg" id="ImageBrowse" name="image" <?php if($Setupdetails['Image']=='') { echo 'required';} ?>  size="30"/>
                      <input type="hidden" name="oldimage" value="<?php echo $Setupdetails['Image']; ?>" />
                    </h6>
                    <p class="text-muted mb-0"><small>For best results, use image 300px by 330px in either .jpg or .png</small></p>
                  </div>
                  <div class="col-lg-2 col-3 col-md-4 pl-0"> <img src="<?php echo ($Setupdetails['Image']!='')?'uploads/thumb/'.$Setupdetails['Image']:'img/test-img/user.jpg'; ?>" class="d-block" alt="" id="userimg"> </div>
                  
                </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <label>Member Type:</label>
                      <select name="MemberType" class="form-control" required  >
                        <option value="">Select Memeber Type</option>
                        <?php 
						 
						 //echo $membertype ;
						 $Allmembertype =  $COMMON->select_all_data_by_given_order_by_status2_limit('membertype','Active',1,'Type',$membertype,'Heading','Asc',20); for($i=0;$i<count($Allmembertype);$i++){  ?>
                        <option <?php if(isset($Setupdetails)) { if($Setupdetails['MemberType']!='') { if($Allmembertype[$i]['MemberType']==$Setupdetails['MemberType']) echo 'selected'; }  }  ?>  ><?php echo $Allmembertype[$i]['Heading']; ?></option>
                        <?php }?>
                        <option <?php if(isset($Setupdetails)) { if($Setupdetails['MemberType']!='') { if($Setupdetails['MemberType']=='Permanent Member') echo 'selected'; }  }  ?>  >Permanent Member</option>
                        <option <?php if(isset($Setupdetails)) { if($Setupdetails['MemberType']!='') { if($Setupdetails['MemberType']=='Volunteer') echo 'selected'; }  }  ?>  >Volunteer</option>
                      </select>
                    </div>
                    <div class="col-lg-6">
                      <label>Full Name:</label>
                      <input type="text" name="fullname" value="<?php if(isset($Setupdetails)) { if($Setupdetails['Name']!='') { echo $Setupdetails['Name']; }  }  ?>"  class="form-control" placeholder="enter your name" required>
                    </div>
                    <div class="col-lg-6">
                      <label>Fathers Name:</label>
                      <input type="text" name="Father" value="<?php if(isset($Setupdetails)) { if($Setupdetails['Father']!='') { echo $Setupdetails['Father']; }  }  ?>"  class="form-control" placeholder="enter your Fathers Name" required>
                    </div>
                    <div class="col-lg-6">
                      <label>DOB:</label>
                      <input type="date" name="DOB" value="<?php if(isset($Setupdetails)) { if($Setupdetails['DOB']!='') { echo $Setupdetails['DOB']; }  }  ?>" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label>Block:</label>
                      <input type="text" name="Block" readonly value="<?php if(isset($Setupdetails)){if($Setupdetails['Block']!=''){echo $Setupdetails['Block'];} else { echo 'Chomu';}} ?>" class="form-control">
                    </div>
                    <div class="col-lg-6">
                      <label>Panchayat:</label>
                      <input type="text" name="Panchayat" readonly value="<?php if(isset($Setupdetails)){if($Setupdetails['Panchayat']!=''){echo $Setupdetails['Panchayat'];} else { echo 'Chomu';}} ?>" class="form-control">
                    </div>
                    <div class="col-lg-12">
                      <label>Your Address:</label>
                      <input type="text" name="address" value="<?php if(isset($Setupdetails)) { if($Setupdetails['Address']!='') { echo $Setupdetails['Address']; }  }  ?>"  class="form-control" placeholder="enter your address" required>
                    </div>
                    <div class="col-lg-6">
                      <label>Phone No:</label>
                      <input type="number" readonly value="<?php if(isset($Setupdetails)) { if($Setupdetails['Mobile']!='') { echo $Setupdetails['Mobile']; }  }  ?>"  name="phone" class="form-control" placeholder="enter your Phone No">
                    </div>
                    <div class="col-lg-6">
                      <label>WhatsApp Number:</label>
                      <input type="number" value="<?php if(isset($Setupdetails)) { if($Setupdetails['WhatsApp']!='') { echo $Setupdetails['WhatsApp']; } else { if($Setupdetails['Mobile']!='') { echo $Setupdetails['Mobile']; }}  }  ?>"  name="WhatsApp" class="form-control" placeholder="enter your Phone No">
                    </div>
                    <div class="col-lg-6">
                      <label>Your Email:</label>
                      <input type="email" name="email" value="<?php if(isset($Setupdetails)) { if($Setupdetails['Name']!='') { echo $Setupdetails['Email']; }  }  ?>"  class="form-control" placeholder="enter your email address" required>
                    </div>
                    <div class="col-lg-6">
                      <label>ID Card:</label>
                      <select name="IDCard" class="form-control" required  >
                        <option value="0">Select ID Card</option>
                        <option <?php if(isset($Setupdetails)) { if($Setupdetails['IDCard']!='') { if($Setupdetails['IDCard']=='Aadhar') echo 'selected'; }  }  ?>  >Aadhar</option>
                        <option <?php if(isset($Setupdetails)) { if($Setupdetails['IDCard']!='') { if($Setupdetails['IDCard']=='Voter ID') echo 'selected'; }  }  ?>  >Voter ID</option>
                      </select>
                    </div>
                    <div class="col-lg-6">
                      <label>ID Card Number:</label>
                      <input type="text" name="IDCardNumber" value="<?php if(isset($Setupdetails)) { if($Setupdetails['IDCardNumber']!='') { echo $Setupdetails['IDCardNumber']; }  }  ?>"  class="form-control" placeholder="enter your ID Card Number" required>
                    </div>
                    <div class="col-lg-6">
                      <label>Facebook Page Link:</label>
                      <input type="text" name="FacebookPage" value="<?php if(isset($Setupdetails)) { if($Setupdetails['FacebookPage']!='') { echo $Setupdetails['FacebookPage']; }  }  ?>"  class="form-control" placeholder="enter your Facebook Page Link">
                    </div>
                    <div class="col-lg-6">
                      <label>Instagram Page Link:</label>
                      <input type="text" name="InstagramPage" value="<?php if(isset($Setupdetails)) { if($Setupdetails['InstagramPage']!='') { echo $Setupdetails['InstagramPage']; }  }  ?>"  class="form-control" placeholder="enter your Instagram Page Link">
                    </div>
                    <div class="col-lg-6">
                      <label>Twitter Page Link:</label>
                      <input type="text" name="TwitterPage" value="<?php if(isset($Setupdetails)) { if($Setupdetails['TwitterPage']!='') { echo $Setupdetails['TwitterPage']; }  }  ?>"  class="form-control" placeholder="enter your Twitter Page Link">
                    </div>
                    <div class="col-lg-12">
                      <label>Other Details</label>
                      <textarea name="Details" id="Details" rows="4" class="form-control" placeholder="Other Details :"><?php if(isset($Setupdetails)) { if($Setupdetails['Details']!='') { echo $Setupdetails['Details']; }  }  ?>
</textarea>
                    </div>
                    <div class="col-lg-12">
                      <label>Referral ID Number:</label>
                      <input type="text" name="ReferralID" value="<?php if(isset($Setupdetails)) { if($Setupdetails['ReferralID']!='') { echo $Setupdetails['ReferralID']; }  }  ?>"  class="form-control" placeholder="enter your Referral ID Number">
                    </div>
                  </div>
                </div>
              </div>
            </div> 
            <input type="submit" name="submit" value="Submit" class="btn-sub">
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ##### Blog Area End ##### --> 
<!-- jQuery js --> 
<script src="js/jquery.min.js"></script> 
<!-- Popper js --> 
<script src="js/popper.min.js"></script> 
<!-- Bootstrap js --> 
<script src="js/bootstrap.min.js"></script> 
<!-- All Plugins js --> 
<script src="js/plugins.js"></script> 
<!-- Parallax js --> 
<script src="js/dzsparallaxer.js"></script> 
<!-- Active js --> 
<script src="js/form-script.js"></script> 
<script src="js/script.js"></script> 
<script src="<?php echo $Domain; ?>js/validate.js"></script> 
<script src="<?php echo $Domain; ?>js/additional-methods.min.js"></script> 
<script>

$('#resumegenartion').validate({
		rules:{
		Name:{required: true, minlength: 3},
		Email:{required: true, minlength: 3},
		Mobile:{required: true, minlength: 5, maxlength:20}},
		messages:
		{
			Name:{"required": "Enter Name"}
		},
		submitHandler: function(form)
		{ 
		   $("#myModal").modal({backdrop: 'static', keyboard: false},'show');			 
			var form = document.getElementById('resumegenartion');
			var formdata = new FormData(form);
			jQuery.ajax({ url:'ajax/genrate-resume', type: "post", dataType: "json",data: formdata,  
            cache:false,
            contentType: false,
            processData: false,
			success: function(result)
			{  
				if(result['Status']==1)
				{
					$("#myModal").modal('hide');
					$("#myModal").hide(); 
					    window.location.href = "thanks";  // works fine


				} 
				else if(result['Status']==2)
				{
					$("#myModal").modal('hide');
					$("#myModal").hide();
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					$('#userimgmsg').html(result['message'])
				}
				else
				{ 
					$("#myModal").modal('hide');
					$("#myModal").hide();
					$('html, body').animate({ scrollTop: 0 }, 'slow');
					$('#userimgmsg').html(result['message'])

				} 
			 },
				error:function(){$("#popupregresult").html('There is error while submit');}});
			}    
	});
</script>
</body>
</html>