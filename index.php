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
<title>Home - PM Kisan Samman Nidhi</title>
<?php include("includes/head.php"); ?>
</head>

<body class="light-version">
<!-- Preloader -->
<div id="preloader">
  <div class="preload-content">
    <div id="dream-load"> </div>
  </div>
  <div class="m-5 text-center"><img src="img/core-img/janadhar-logo.png" class="img-fluid; d-inline"></div>
</div>
<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area demo2 flex align-items-center">
  <div class="container-fluid homepagecont">
    <div class="row align-items-center" > 
      <!-- Welcome Content -->
      
      <div class="col-12 col-lg-7 col-md-12">
        <div class="banner-box"> <?php if($Device=='Desktop') { ?> <img src="<?php echo $Domain; ?>img/core-img/pmkisanLogo.png" class="img-fluid img-responsive" alt=""> <?php } else {?> <img src="<?php echo $Domain; ?>img/core-img/pmkisanLogo.png" class="img-fluid img-responsive" alt=""> <?php }?> </div>
      </div>
      <div class="col-12 col-lg-5 col-md-12">
        <div class="welcome-content v2"> <img src="img/core-img/foursher.png" width="370" height="68">
          <h1 class="wow fadeInUp mt-5" data-wow-delay="0.2s" style="color:#fff;">हर घर कार्यकर्ता अभियान </h1>
          <div class="promo-section">
            <div class="integration-link light">
              <p class="integration-text mb-0 pl-3 pr-3">
              प्रधानमंत्री किसान सम्मान सदस्यता अभियान 
              <!-- भाजपा अधिकृत सदस्यता अभियान  -->
            </p>
            </div>
          </div>
          <!-- <p class="wow fadeInUp text-white" data-wow-delay="0.3s">Our Perfect resume builder takes the hassle out of resume writing.  </p>-->
          <div class="dream-btn-group wow fadeInUp" data-wow-delay="0.4s">
         <a class="btn dream-btn more-btn pink mr-2" href="get-started">Get started</a>
          
           </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- ##### Welcome Area End ##### -->

<div class="clearfix"></div>

<!-- ##### Our features Area End ##### -->
<?php include("includes/js.php"); ?>
</body>
</html>