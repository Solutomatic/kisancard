<?php namespace Dompdf;
require_once 'dompdf/autoload.inc.php'; include("../library.php");
use Dompdf\Dompdf;
use Dompdf\Options; 
$Setupdetails = $COMMON->givedata('certifications',base64_decode($_REQUEST['token']));
$path = '../uploads/thumb/'.$Setupdetails['Image'];
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$userimg = 'data:image/' . $type . ';base64,' . base64_encode($data);


$path = '../uploads/thumb/'.$Setupdetails['Image']; 
$data = file_get_contents($path);
$posterlogo = 'data:image/' . pathinfo('bjp-symbol.png', PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents('bjp-symbol.png'));
$posterimg = 'data:image/' . pathinfo('bjp-poster.jpg', PATHINFO_EXTENSION) . ';base64,' . base64_encode(file_get_contents('bjp-poster.jpg'));
 
$name = strtoupper($Setupdetails['Name']);
$mobile = $Setupdetails['Mobile'];
$office = $Setupdetails['Block'].','.$Setupdetails['Assembly'];
$post = $Setupdetails['MemberType'];
$idno = 'RCRAM'.sprintf("%'.07d", $Setupdetails['Id']);
$blgro = "N/A";
$options=new Options();
$options->set('defaultFont', 'Helvetica');
$options->set('dpi','78');
$options->set('enable_html5_parser',true);
$options->set('tempDir', 'C:\xxx\htdocs\\' ); 
require_once 'dompdf/autoload.inc.php';
//$dompdf = new Dompdf();
$template =  file_get_contents("certificate.html");
$template =  str_replace("<<userimg>>",$userimg,$template);
$template =  str_replace("<<posterimg>>",$posterimg,$template);
//$template =  str_replace("<<posterlogo>>",$posterlogo,$template);
$template =  str_replace("<<username>>",$name,$template);
$template =  str_replace("<<userpost>>",$post,$template);
$template =  str_replace("<<userbld>>",$blgro,$template);
$template =  str_replace("<<usermobile>>",$mobile,$template);
$template =  str_replace("<<useroffice>>",$office,$template);
$template =  str_replace("<<idno>>",$idno,$template);
//die();
$dompdf=new Dompdf($options);
$dompdf->loadHTML($template); 
//$dompdf->setPaper('A4', 'landscape'); // portrait, landscape
$customPaper = array(0,0,1016,638);
$dompdf->set_paper($customPaper);


$dompdf->render();
//$dompdf->stream("Name.pdf",array("Attachment" => false));
$dompdf->stream($name."_".rand(10,1000).".pdf", array("Attachment" => true));
exit(0);
?>