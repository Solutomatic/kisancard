<?php include("library.php"); ?>
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

<body class="light-version"  > 
<!-- ##### Contact Area Start ##### -->
<section class="contact_us_area" id="contact" data-jarallax="{&quot;speed&quot;: 0.5}" 
style="background-image: url('img/core-img/page-bg0.jpg'); background-size: cover; height:100vh"
 >
  <div class="container" style="padding:5% 5% 0%;;" >
  <div class="row">
  <div class="col-md-12"> 
  <div  style="background:#dcdbffd4; height:80vh; padding:5%; border-radius:10px;" >
    <div class="row" >
      <div class="col-12">
        <div class="section-heading text-center mb-4"> 
          <!-- Dream Dots --> 
          <h2 class="wow fadeInUp" data-wow-delay="0.3s">Get Started</h2>
          <div class="dream-dots justify-content-center wow fadeInUp" data-wow-delay="0.2s"> <span></span><span></span><span></span><span></span><span></span><span></span><span></span> </div>
        </div>
      </div>
    </div>     
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <div class="contact_form">
          <form action="#" method="post" id="main_contact_form" novalidate>
            <div class="row">
              <div class="col-12">
                <div id="success_fail_info"></div>
                <p class="Mobilestatus" id="Mobilemn" style="display: none; font-size: 12px"></p>
              </div>
              <div class="col-12 col-md-12">
                <div class="group wow fadeInUp" data-wow-delay="0.2s">
                  <input type="number" class="form-control onlynumeric  float-left"  id="Mobilemobileno" onkeyup="Mobilecheckmobileno();" name="Mobile" min="1111111111" max="9999999999" onkeypress="return this.value.length < 11;" oninput="if(this.value.length>=10) { this.value = this.value.slice(0,10); }" maxlength="10" required>
                  <span class="highlight"></span> <span class="bar"></span>
                  <label>Enter 10 Digit Mobile No.</label>
                </div>
                <span id="MobileuserNameMsg" style="display: none; font-size: 12px; color:red; margin-top:2px;">Mobile Number Must Be Entered.</span>
              </div>
              
                    <div class="col-12 col-md-12" id="MobileOTPBox" style="display:none;">
                <div class="group wow fadeInUp" data-wow-delay="0.2s">
                  <input type="number" min="0000" max="9999" onkeypress="return this.value.length < 5;" oninput="if(this.value.length>=4) { this.value = this.value.slice(0,4); }"  class="form-control onlynumeric mb-0" name="OTP" onKeyUp="Mobileverifyotp();" onKeyDown="Mobileverifyotp();" id="MobileOTP"  maxlength="4" required>
                  <span class="highlight"></span> <span class="bar"></span>
                  <label>Enter OTP*</label>
                </div>
              </div>  
              <div class="col-12 mt-2 text-center wow fadeInUp" data-wow-delay="0.6s">
              <label><input type="checkbox" name="accept" id="accept" required  /> I accept all <a href="" >Term & Conditions</a></label>
              </div>  
              <div class="col-12 mt-3 text-center wow fadeInUp" data-wow-delay="0.6s">
              <input class="btn " style="color:#222222" type="button"  value="Send OTP" onclick="MobilesendOtp();" id="MobilesubmitOTPButton"> 
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="row justify-content-center" style="position:absolute; bottom:50px; width:91%;">
      <div class="col-12 col-md-12 col-lg-12 text-center">
      <a href="">Terms & Conditions</a> &nbsp; &nbsp; <a href="">Privacy Policy</a>
      </div>
      </div>
  </div>
  </div>
   </div>
    </div>
</section>
<!-- ##### Contact Area End ##### --> 
<?php include("includes/js.php"); ?>
<script>
// Ajax Contact Form js
function MobilesendOtp()
{
	var userId = $('#Mobilemobileno').val();  
	if (userId == '')
	{
		$("#MobileuserNameMsg").css('display', 'block');
	}
	else if(userId.length < 10)
	{
		$("#Mobilemn").show();
		$(".Mobilestatus").html("<font color=red>Mobile No should be <b>10</b> character long.</font>");
	} 
	else
	{
		if ($("#accept").is(":checked")) {
    // do something if the checkbox is NOT checked

				
		$("#Mobilemn").hide();
		$("#MobilesubmitOTPButton").val('');
		$("#MobilesubmitOTPButton").val('Sending...');
		$.ajax({url : "<?php echo $Domain ?>ajax/sendotpForSignUp",async : true,type : "POST",data : {"p" : userId},dataType : "json",
		success : function(data)
		{
			var status_message = data['status_message'];
			if (status_message == "Success")
			{
				$("#MobileOTPBox").show();
				$("#MobilesubmitOTPButton").val('');
				$("#MobilesubmitOTPButton").val('Sent');
				var counter = 90;
				var refreshId = setInterval(function()
				{
					counter--;
					if (counter >= 0)
					{
						$("#MobilesubmitOTPButton").val('');
						$("#MobilesubmitOTPButton").prop('disabled',true);
						$("#MobilesubmitOTPButton").prop('opacity','0.5 !important');
						$("#MobilesubmitOTPButton").prop('cursor','not-allowed');
						$("#MobilesubmitOTPButton").val(counter);
					}
					else
					{
						$("#MobilesubmitOTPButton").val('Re-send OTP');
						$("#MobilesubmitOTPButton").prop('disabled',false);
						$("#MobilesubmitOTPButton").prop('opacity','1.0 !important');
						$("#MobilesubmitOTPButton").prop('cursor','pointer');
						clearInterval(refreshId);
					}
					if (counter === 0)
					{
						clearInterval(counter);
					}
				}, 1000);
			}
			else
			{
				setTimeout(function()
				{
					$("#MobilesubmitOTPButton").val('');
					$("#MobilesubmitOTPButton").val('Send Again');
				}, 3000);
				$("#MobilesubmitOTPButton").val(status_message);
			}},
			error : function(data) {
								setTimeout(function() {
									$("#MobilesubmitOTPButton").val('');
									$("#MobilesubmitOTPButton").val('Send Again');
								}, 3000);
								$("#MobilesubmitOTPButton").val(data.status_message);
							}
						});
				return false;
			
			}
			else
			{
				$("#Mobilemn").show();
				$(".Mobilestatus").html("<font color=red>accept all terms and conditions</font>");
			}
			}
		}
function Mobilecheckmobileno()
{
		$('#MobileuserNameMsg').hide();
		$('#MobilesubmitOTPButton').prop('disabled', 'disabled');
		var uname = $('#Mobilemobileno').val();
		//console.log(uname);
		if (uname.length >= 10)
		{
			$.ajax({
				type : "POST",
				dataType: "json",
				url : "<?php echo $Domain ?>ajax/mobileexist?uname="+ uname,success : function(data)
				{
					$("#Mobilemn").show();
					var status_message = data['status_message'];
					if (status_message == "Mobile No Available")
					{
						$("#Mobilemn").css("color", "#222222");
						$(".Mobilestatus").html('');
						$('.Mobilelogin-submit-btn').removeAttr('disabled','disabled');
						$('#MobilesubmitOTPButton').removeAttr('disabled', 'disabled');
					}
					else
					{
						$("#Mobilemn").css("color", "red");
						if (status_message == "Mobile No Already Exists")
						$(".Mobilestatus").html("Mobile No Already Exists");
						$('.Mobilelogin-submit-btn').prop('disabled', 'disabled');
						$('#MobilesubmitOTPButton').prop('disabled', 'disabled');
					}
			}
			});
			} else
			{
				$("#Mobilemn").show();
				$(".Mobilestatus").html("<font color=red>Mobile No should be <b>10</b> digit long.</font>");
			}

		}
function Mobileverifyotp()
{
		$("#Mobilemn").hide();
		$("#Mobilemn").html('');
		$('#MobileuserNameMsg').hide();
		var uname = $('#Mobilemobileno').val();
		var OTP = $('#MobileOTP').val();
		console.log(uname);
		if (uname.length >= 10 && OTP.length >=4)
		{
			$.ajax({
				type : "POST",
				dataType: "json",
				type : "POST",data : {"p" : uname, "o" : OTP},dataType : "json",
				url : "<?php echo $Domain ?>ajax/verifyotp",success : function(data)
				{
					$("#Mobilemn").show();
					var status_message = data['status_message'];
					if (status_message == "Success")
					{
						setTimeout(function()
						{
							 $('#Mobilemobileno').css('width', '100%');
							 $("#MobilesubmitOTPButton").hide();
							 $("#MobileOTP").hide(); }, 2000);
							 $("#Mobileotpverification").val('1');
							 $("#Mobilemn").css("color", "#2ad62a");
							 $(".Mobilestatus").html("OTP Verified");							 
							  $('#Mobilemobileno').attr('readonly','readonly');
						     $('.Mobilelogin-submit-btn').removeAttr('disabled','disabled');
							 window.location.href = 'registration'; 
					}
					else
					{
						$("#Mobileotpverification").val('');
						$("#Mobilemn").css("color", "red");
						if (status_message == "Failed")
						$(".Mobilestatus").html("Incorrect OTP");
						$('.Mobilelogin-submit-btn').prop('disabled', 'disabled');
					}
			}
			});
			} else
			{
				$("#Mobilemn").show();
				//$(".status").html("<font color=red>Mobile No should be <b>10</b> character long.</font>");
			}

		}
 
</script>
</body>
</html>