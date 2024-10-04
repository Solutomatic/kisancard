<?php
// Same session check and necessary files
include("library.php"); 

// Redirect if the session is not set
if (!isset($_SESSION['bjpmember'])) {
    header("Location: start.php");
    exit();
}

// Get the member ID from the session
$CreationId = $_SESSION['bjpmember'];

// Ensure $COMMON is initialized before calling its methods
if (isset($COMMON)) {
    // Fetch member details
    $Setupdetails = $COMMON->givedata('certifications', $CreationId);
} else {
    die("Common functions are not available.");
}

// Handle missing or unavailable data with fallbacks
$name = isset($Setupdetails['Name']) ? $Setupdetails['Name'] : 'Name Not Available';
$email = isset($Setupdetails['Email']) ? $Setupdetails['Email'] : 'Email Not Available';

// Handle the photo field with a fallback
$photo = isset($Setupdetails['Image']) && !empty($Setupdetails['Image']) ? $Setupdetails['Image'] : 'default-photo.png';
$photoPath = 'uploads/' . $photo;

// Assuming logo for watermark is stored as 'logo.png' in uploads directory
$watermarkLogo = 'img/core-img/pmkisanLogo.png';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kisan Member Card</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5fff4; /* Light farming background */
            padding: 20px;
        }
        .member-card {
            background: rgb(38, 113, 206); /* Darker green for farming theme */
            color: #fff;
            border-radius: 15px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.1);
            padding: 30px;
            max-width: 400px;
            margin: auto;
            text-align: center;
            position: relative;
            overflow: hidden; /* Ensures no overflow */
        }
        .member-card::before {
            content: '';
            background-image: url('<?php echo $watermarkLogo; ?>');
            background-size: 100%;
            background-position: center;
            background-repeat: no-repeat;
            opacity: 0.1;
            position: absolute;
            top: 10px;
            right: 10px;
            width: 100%;
            height: 100%;
            z-index: 0;
        }
        .member-card h3 {
            font-size: 26px;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        .member-card img {
            border-radius: 50%;
            margin-bottom: 20px;
            border: 4px solid #fff;
            width: 150px;
            height: 150px;
            position: relative;
            z-index: 1;
        }
        .member-card p {
            font-size: 18px;
            margin: 10px 0;
            position: relative;
            z-index: 1;
        }
        .download-btn, .share-btn {
            background-color: #fff;
            color: #333;
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            margin: 15px 5px;
            display: inline-block;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }
        .download-btn:hover, .share-btn:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>

     <div class="container member-card" id="memberCard" style="background-image: url('img/core-img/page-bg0.jpg'); background-size: cover;">
     <div class="row">
     <div class="text-center" >
        <h3>
              प्रधानमंत्री किसान सम्मान  
              </h3>
    </div>
    </div>
<div class="row">
        <div class="col-12 col-lg-12 col-md-12">
        <img src="<?php echo $photoPath; ?>" alt="Member Photo">
        </div>
        <div class="col-12 col-lg-12 col-md-12">
        <p><strong>Member ID:</strong> <?php echo $CreationId; ?></p>
<p><strong>Name:</strong> <?php echo $name; ?></p>
<p><strong>Email:</strong> <?php echo $email; ?></p>   
        </div>  
</div>
<div class="row">
    <div class="col-6 col-lg-6 col-md-6">
    <a href="#" class="download-btn" id="downloadBtn">Download Card</a>
    </div>
    <div class="col-6 col-lg-6 col-md-6">
        <a href="#" class="share-btn" id="shareBtn">Share Card</a>
        </div>
</div>
    </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        const { jsPDF } = window.jspdf; // Access jsPDF

        // Function to download the card as a PDF
        document.getElementById('downloadBtn').addEventListener('click', function() {
            const card = document.getElementById('memberCard');
            html2canvas(card).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF();
                pdf.addImage(imgData, 'PNG', 10, 10, 180, 160);
                pdf.save('kisan-member-card.pdf');
            });
        });

        // Function to share the card PDF and link
        document.getElementById('shareBtn').addEventListener('click', function() {
            const card = document.getElementById('memberCard');
            html2canvas(card).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                const pdf = new jsPDF();
                pdf.addImage(imgData, 'PNG', 10, 10, 180, 160);
                
                // Create a Blob for the PDF
                const pdfBlob = pdf.output('blob');
                const pdfUrl = URL.createObjectURL(pdfBlob);

                // Share functionality
                const message = "Check out my Kisan Member Card: " + pdfUrl; // Include link to the PDF

                // Create a WhatsApp share link
                const whatsappShareLink = `https://api.whatsapp.com/send?text=${encodeURIComponent(message)}`;
                
                // Open the WhatsApp share in a new window
                window.open(whatsappShareLink, '_blank');

                // You can also implement sharing to other platforms here
            });
        });
    </script>
</body>
</html>
