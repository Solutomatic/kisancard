<?php
class COMMON
{
	public $conn;
	public function __construct()
	{
		$database = new Database();
		$db = $database->dbConnection();
		$this->conn = $db;
    }
	public function runQuery($sql)
	{
		$stmt = $this->conn->prepare($sql);
		return $stmt;
	} 
	public function setting()
	{
		try
		{
			$sql="SELECT * FROM settings";
			 $q = $this->conn->query($sql) or die("failed!");
			 while($r = $q->fetch(PDO::FETCH_ASSOC)){  $data=$r;  } 
			 return $data;
		}
		catch(PDOException $e)
		{
			echo 'Query failed'.$e->getMessage();
		}
	} 
	public	function CURLsendsmswithtempid($Mobile, $message_body, $PEID, $TempId)
	{ 
	 
		$api_key = '460E7E43687FFB';
		$contacts = $Mobile;
		$from = 'ELITEG';
		$sms_text = urlencode($message_body);
		$api_url = 'http://bulksms.tekhook.in/app/smsapi/index.php?key=460E7E43687FFB&routeid=21215672&type=text&contacts='.$contacts.'&senderid=ELITEG&msg='.$sms_text.'&tlv={"PE_ID":"'.$PEID.'","Template_ID":"'.$TempId.'"}';
		//echo $api_url; 
		//Submit to server
		$response = file_get_contents( $api_url);
		//echo $response;  
}
	
	 public function select_data_by_id_Count($table,$id)
	 {
		 try
		 {
			 $sql=$this->conn->prepare("SELECT * FROM $table where post_id = $id");
			 $sql->execute();
			 while( $r = $sql->fetch(PDO::FETCH_ASSOC)){$data[]=$r;  }
			 if(!empty($data))
			 return $data;
		 }
		 catch(PDOException $e)
		 {
			 echo 'Query failed'.$e->getMessage();
		 }
	}
	public function get_group_data($table,$require, $column,$value)
	{

		try 

		{

			$sql=$this->conn->prepare("SELECT Group_Concat($require) as Grp FROM $table Where `$column`='$value'");

			$sql->execute();

			$data = $sql->fetch(PDO::FETCH_ASSOC);

			if(!empty($data))

			return $data['Grp'];

		}

		catch(PDOException $e)

		{

			echo 'Query failed'.$e->getMessage();

		}

	}
	
	public function getcourselist()
	{

		try 

		{

			$sql=$this->conn->prepare("SELECT * FROM course_list Where `Active`='1' Group By Course Order By Course Asc");

			$sql->execute();

			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }

			 if(!empty($data))

			 return $data;

		}

		catch(PDOException $e)

		{

			echo 'Query failed'.$e->getMessage();

		}

	}
	

	 public function select_all_data_by_given_order($table,$column,$order)
	 {
		 try
		 {
			 $sql=$this->conn->prepare("SELECT * FROM $table order by $column $order ");
			 $sql->execute();
			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }
			 if(!empty($data))
			 return $data;
			 }
			 catch(PDOException $e)
			 {
				 echo 'Query failed'.$e->getMessage();
			 }
	 }
	 
	 
	  public function getsmslist()
	 {
		 try
		 {
			 $sql=$this->conn->prepare("SELECT * FROM `sendwebinarsms` Where Active=1 and Sent ='0'  order by Id Asc limit 1   ");
			 $sql->execute();
			 $r = $sql->fetch(PDO::FETCH_ASSOC);
			 if(!empty($r))
			 return $r;
			 }
			 catch(PDOException $e)
			 {
				 echo 'Query failed'.$e->getMessage();
			 }
	 }
	 
	 public function changestatusofsms($Id, $Status)
	 {
		 try
		 { 
		//echo "UPDATE `sendwebinarsms` SET `Sent`='$Status'   WHERE Id ='$Id'";
			 $stmt = $this->conn->prepare("UPDATE `sendwebinarsms` SET `Sent`='$Status'   WHERE Id ='$Id'");
			 $stmt->execute(); 
		 }
		 catch(PDOException $e)
		 {
			echo 'Query failed'.$e->getMessage();
		}
	}
	 
	 public function getwebinarist()
	 {
		 try
		 {
			 $sql=$this->conn->prepare("SELECT * FROM `webinar` Where Active=1 and Sent ='0'  order by Id Asc   ");
			 $sql->execute();
			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }
			 if(!empty($data))
			 return $data;
			 }
			 catch(PDOException $e)
			 {
				 echo 'Query failed'.$e->getMessage();
			 }
	 }
	 
	 
	  public function getwebinarstudentlist($Id)
	 {
		 try
		 {
			 $sql=$this->conn->prepare("SELECT * FROM `webinar_student` Where Active=1 and Sent ='0' and Webinar_Id ='$Id'   order by Id Asc   ");
			 $sql->execute();
			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }
			 if(!empty($data))
			 return $data;
			 }
			 catch(PDOException $e)
			 {
				 echo 'Query failed'.$e->getMessage();
			 }
	 }
	 
	public function changestatusofstudent($Id, $Status)
	 {
		 try
		 { 
		
			 $stmt = $this->conn->prepare("UPDATE `webinar_student` SET `Sent`='$Status'   WHERE Webinar_Id ='$Id'");
			 $stmt->execute(); 
		 }
		 catch(PDOException $e)
		 {
			echo 'Query failed'.$e->getMessage();
		}
	}
	
	
    
	 public function updatestatusofmailer($Id)
	 {
		 try
		 { 
		
			 $stmt = $this->conn->prepare("UPDATE `webinar_student` SET `Sent`='1'   WHERE Id ='$Id'");
			 $stmt->execute(); 
		 }
		 catch(PDOException $e)
		 {
			echo 'Query failed'.$e->getMessage();
		}
	}
	  public function updatestatusofrecevercall($Id)
	 {
		 try
		 { 
			 $stmt = $this->conn->prepare("UPDATE `tbl_userdata` SET `EmailCall`=1  WHERE Id = :Id");	
			 $stmt->bindparam(":Id", $Id);
			 $stmt->execute(); 
		 }
		 catch(PDOException $e)
		 {
			echo 'Query failed'.$e->getMessage();
		}
	}
	 
	 
	 public function GetListofSubject($subjectid)
	 {
		 try {
			 if(isset($_SESSION['subjects']))
			 {
			 $Subjectsarray = $_SESSION['subjects'];
			 if(!empty($Subjectsarray))
			 {
				 $codearray = array();
				 foreach($Subjectsarray as $Subject)
				 {
					$codearray[] = 	$Subject['Id'];
				 }
				 $Codes = implode(',',$codearray);
			 }
			 else { $Codes ='';}
			 }else { $Codes ='';}
			 //echo "SELECT * FROM course_list Where `Code` Like '$subjectid%' and `Id` NOT IN($Codes) order by Code ASC  Limit 10";
			 $Query = "SELECT * FROM course_list Where `Code` Like '$subjectid%'  ";
			 if($Codes!=''){
			 $Query .= " and `Id` NOT IN($Codes)  ";
			 }
			 $Query .= " order by Code ASC  Limit 10";
			 $sql=$this->conn->prepare($Query);
			 $sql->execute();
			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }
			 if(!empty($data))
			 return $data;
			 }
		 catch(PDOException $e)
			 {
				 echo 'Query failed'.$e->getMessage();
			 }
	}
	
	public function addsubjecttodata($Id,$Code)
	{		 
		
		if($Code=='') return; 
		
		if(is_array($_SESSION['subjects']))
		{	
			if($this->seat_exists($Code));		 
			$max=count($_SESSION['subjects']);
			$_SESSION['subjects'][$max]['Id']=$Id;
			$_SESSION['subjects'][$max]['Code']=$Code;			
		}
		else{
			$_SESSION['subjects']=array();
			$_SESSION['subjects'][0]['Id']=$Id;	
			$_SESSION['subjects'][0]['Code']=$Code;			
			}
		}
		public function seat_exists($Code){				
				$max=count($_SESSION['subjects']);
				 $flag=0;
				for($i=0;$i<$max;$i++)
				{
					if($Code==$_SESSION['subjects'][$i]['Code'])
					{
						unset($_SESSION['subjects'][$i]);
						break;
					}
			 	}
		return $flag;
	}
		
	 

	 public function select_all_data_by_given_order_by_status($table,$stcolumn,$status,$column,$order)

	 { 

		 try {

			 

			  $sql=$this->conn->prepare("SELECT * FROM $table Where `$stcolumn`='$status' order by $column $order ");

			 $sql->execute();

			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }

			 if(!empty($data))

			 return $data;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

	 }

	 

	 public function select_all_data_by_given_order_by_status_limit($table,$stcolumn,$status,$column,$order,$limits)

	 { 

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table Where `$stcolumn`='$status' order by $column $order limit $limits");

			 $sql->execute();

			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }

			 if(!empty($data))

			 return $data;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

	 }

	 public function GetDepartmentofcountry($coutry)

	 { 

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM courses Where `Active`='1' and FIND_IN_SET('$coutry',CourseFor) order by Heading");

			 $sql->execute();

			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }

			 if(!empty($data))

			 return $data;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

	 }

	 

	 public function select_all_data_by_given_order_by_status2_limit($table,$stcolumn,$status,$stcolumn2,$status2,$column,$order,$limits)

	 { 

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table Where `$stcolumn`='$status' and `$stcolumn2`='$status2' order by $column $order limit $limits");

			 $sql->execute();

			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }

			 if(!empty($data))

			 return $data;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

	 }

	 

	 	 public function select_all_data_by2_given_order_by_status($table,$stcolumn1,$status1,$stcolumn2,$status2,$column,$order)

	 {

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table Where `$stcolumn1`='$status1' and  `$stcolumn2`='$status2' order by $column $order ");

			 $sql->execute();

			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }

			 if(!empty($data))

			 return $data;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

	 }

	 public function select_all_data_by3_given_order_by_status($table,$stcolumn1,$status1,$stcolumn2,$status2,$stcolumn3,$status3,$column,$order)

	 {

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table Where `$stcolumn1`='$status1' and  `$stcolumn2`='$status2'  and  `$stcolumn3`='$status3' order by $column $order ");

			 $sql->execute();

			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }

			 if(!empty($data))

			 return $data;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

	 }

	 

	 public function get_course_by_citizen($table,$column,$value)

	 {

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table Where `Active`='1' and   FIND_IN_SET($value,`$column`)  order by Id Asc");

			 $sql->execute();

			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }

			 if(!empty($data))

			 return $data;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

	 }

	 

	 public function select_all_data_by3_given_order_by_status_limit($table,$stcolumn1,$status1,$stcolumn2,$status2,$stcolumn3,$status3,$column,$order,$limits)

	 {

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table Where `$stcolumn1`='$status1' and  `$stcolumn2`='$status2'  and  `$stcolumn3`='$status3' order by $column $order limit $limits");

			 $sql->execute();

			 while($r = $sql->fetch(PDO::FETCH_ASSOC)){  $data[]=$r;  }

			 if(!empty($data))

			 return $data;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

	 }

	 public function select_data_by_id($table,$id)

	 {

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table where Id = $id and Active='1' ");

			 $sql->execute();

			 $r = $sql->fetch(PDO::FETCH_ASSOC);

			 if(!empty($r))

			 return $r;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

		}

		public function select_data_corporate_plan($table,$id)

	 {

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table where Id = $id and Active='1'");

			 $sql->execute();

			while( $r = $sql->fetch(PDO::FETCH_ASSOC)){$data[]=$r;  }

			 if(!empty($data)){

			 

		 return $data;

		 

			 }

		 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

			 

		}

		

		

		public function select_data($table,$id)

	 {

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table where vendor_id = $id");

			 $sql->execute();

			while( $r = $sql->fetch(PDO::FETCH_ASSOC)){$data[]=$r;  }

			 if(!empty($data)){

			 

		 return $data;

		 

			 }

		 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

			 

		}

	public function get_require_data($table,$require, $column,$value)

	{

		try 

		{

		

			$sql=$this->conn->prepare("SELECT $require FROM $table Where `$column`='$value'");

			$sql->execute();

			$data = $sql->fetch(PDO::FETCH_ASSOC);

			if(!empty($data))

			return $data[$require];

		}

		catch(PDOException $e)

		{

			echo 'Query failed'.$e->getMessage();

		}

	}

	public function update_status_by_id($table,$column,$value,$Id)

	{  

	 try {  

		

			$stmt = $this->conn->prepare("UPDATE $table SET `$column`=:value   WHERE Id = :Id");									  

			$stmt->bindparam(":value", $value);

			$stmt->bindparam(":Id", $Id);

			$stmt->execute(); 

		 }

    catch(PDOException $e)

		{

			echo 'Query failed'.$e->getMessage();

		}

	}

	public function redirect($url)

	{

		echo ("<SCRIPT LANGUAGE='JavaScript'>  window.location.href='$url'; </SCRIPT>");	

	}

 	public function delete($table,$Id)

	{

		try {

			$sql=$this->conn->prepare("delete from $table Where Id = :Id");

			$sql->execute(array(':Id'=>$Id));

			return true;

			}

			catch(PDOException $e)

			{

				echo 'Query failed'.$e->getMessage();

			}

	}

  public function sendmail($from,$to,$subject,$msg)

  {

		$mail = new PHPMailer;

		$Setings = $this->setting();

		$Domain = $Setings['LiveUrl'];

		$mail->isSMTP();

		$mail->SMTPDebug = 0;

		$mail->Debugoutput = 'html';

		$mail->Host = $Setings['SmtpHost'];

		$mail->Port = $Setings['SmtpPort'];

		$mail->SMTPSecure = 'ssl';

		$mail->SMTPAuth = true;

		$mail->Username = $Setings['SmtpUsername'];

		$mail->Password = $Setings['SmtpPassword'];

		$mail->setFrom($from, $Setings['SiteName']);

		$mail->addReplyTo($Setings['ReplyTo'], $Setings['SiteName']);

		$mail->addAddress($to);

		$mail->Subject = $subject;

		$mail->msgHTML($msg);

		$mail->send();

	} 
	
	
	

   public function updatesetting($title,$smtp_username,$smtp_host,$smtp_password,$smtp_port,$Mode,$ReplyTo,$admin_email)

	{

		try

		{

			$COMMON = new COMMON; 

			$stmt = $COMMON->conn->prepare("Update settings Set  Title=:title,Mode=:Mode,SmtpUsername=:smtp_username,SmtpPassword=:smtp_password,SmtpHost=:smtp_host,SmtpPort=:smtp_port,ReplyTo=:ReplyTo,admin_email=:admin_email ");							  

			$stmt->bindparam(":title", $title);

			$stmt->bindparam(":Mode", $Mode);

			$stmt->bindparam(":smtp_username", $smtp_username);	

			$stmt->bindparam(":smtp_host", $smtp_host);

			$stmt->bindparam(":smtp_password", $smtp_password);

			$stmt->bindparam(":smtp_port", $smtp_port);

			$stmt->bindparam(":ReplyTo", $ReplyTo);

			$stmt->bindparam(":admin_email", $admin_email);

			$stmt->execute();			

			return $stmt;	

		}

		catch(PDOException $e)

		{

			echo $e->getMessage();

		}				

	}

 
 

   public function selectwithid($table,$id){  

	 try {

		$blank = '';

		$sql=$this->conn->prepare("SELECT * FROM $table WHERE Id=:Id order by Id desc");  

		$sql->execute(array(':Id'=>$id)); 

		$r = $sql->fetch(PDO::FETCH_ASSOC);

		if(!empty($r)){

			return $r;

			}

			else {

			return $blank;

			}

		 }

		catch(PDOException $e)

		{

			echo 'Query failed'.$e->getMessage();

		}

	

	 } 

	 

	 

	 public function selectwithuserid($table,$id){  

	 try {

		$blank = '';

		$sql=$this->conn->prepare("SELECT * FROM $table WHERE UserId=:Id order by Id desc");  

		$sql->execute(array(':Id'=>$id)); 

		$r = $sql->fetch(PDO::FETCH_ASSOC);

		if(!empty($r)){

			return $r;

			}

			else {

			return $blank;

			}

		 }

		catch(PDOException $e)

		{

			echo 'Query failed'.$e->getMessage();

		}

	

	 } 

	 

	 public function get_colum_data($table,$column,$value)

	{

		try 

		{

			$sql=$this->conn->prepare("SELECT * FROM $table Where `$column`='$value'");

			$sql->execute();

			 $r = $sql->fetch(PDO::FETCH_ASSOC);

			 if(!empty($r))

			 return $r;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

		}

	 

 

 public function Getcoumnbyid($table,$require, $column,$value){  

 try {  

    $sql=$this->conn->prepare("SELECT $require FROM $table Where `$column`='$value'");  

	$sql->execute();

    $data = $sql->fetch(PDO::FETCH_ASSOC);

     if(!empty($data))

		return $data[$require];



     }

    catch(PDOException $e)

    {

        echo 'Query failed'.$e->getMessage();

    }



 }

 

 public function selectwithactiveDesc($table, $active)

    {

        try {

            $sql = $this->conn->prepare("SELECT * FROM $table WHERE Active=:active order by Id Desc");

            $sql->execute(array(

                ':active' => $active

            ));

            

            while ($r = $sql->fetch(PDO::FETCH_ASSOC)) {

                $data[] = $r;

            }

            if (!empty($data))

                return $data;

            

        }

        catch (PDOException $e) {

            echo 'Query failed' . $e->getMessage();

        }

        

    }

 

 

	 

	

	public function replace($data)

{

// Fix &entity\n;

$data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);

$data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);

$data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);

$data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');



// Remove any attribute starting with "on" or xmlns

$data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);



// Remove javascript: and vbscript: protocols

$data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);

$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);

$data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);



// Only works in IE: <span style="width: expression(alert('Ping!'));"></span>

$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);

$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);

$data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

$data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

do

{

    // Remove really unwanted tags

    $old_data = $data;

    $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);

}

while ($old_data !== $data);

$data = $data;



return $data;

}

public function submitmobile($Mobile)
{
	try
	{
		$stmt = $this->conn->prepare("INSERT INTO studentlist (Mobile) VALUES(:Mobile)");
		$stmt->bindparam(":Mobile", $Mobile);
		$stmt->execute();
		return $stmt;
	}
	catch(PDOException $e)
	{
		echo $e->getMessage();
	}
} 

public function seo_friendly_url($str){

	

	if($str !== mb_convert_encoding( mb_convert_encoding($str, 'UTF-32', 'UTF-8'), 'UTF-8', 'UTF-32') )

		$str = mb_convert_encoding($str, 'UTF-8', mb_detect_encoding($str));

	$str = htmlentities($str, ENT_NOQUOTES, 'UTF-8');

	$str = preg_replace('`&([a-z]{1,2})(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig);`i', '\1', $str);

	$str = html_entity_decode($str, ENT_NOQUOTES, 'UTF-8');

	$str = preg_replace(array('`[^a-z0-9]`i','`[-]+`'), '-', $str);

	$str = strtolower( trim($str, '-') );	

    return $str;

}



public function selectdatawithid($table,$column,$id,$status){  

 try {  



    $sql=$this->conn->prepare("SELECT * FROM $table where $column = $id and Active = '$status'");  

	$sql->execute();

    $r = $sql->fetch(PDO::FETCH_ASSOC);

	$data = $r;

     if(!empty($data))

		return $data;



     }

    catch(PDOException $e)

    {

        echo 'Query failed'.$e->getMessage();

    }



 }

 

 

 public function selectdatawithidstatus($table,$column,$id,$status){  

 try {  



    $sql=$this->conn->prepare("SELECT * FROM $table where $column = $id and status = '$status'");  

	$sql->execute();

    $r = $sql->fetch(PDO::FETCH_ASSOC);

	$data = $r;

     if(!empty($data))

		return $data;



     }

    catch(PDOException $e)

    {

        echo 'Query failed'.$e->getMessage();

    }



 }

  

 public function redirectwithtime($url,$time)

{

//header("Location: $url");

echo ("<script language='javaScript'> setTimeout(function(){

 window.location = '$url';

}, $time); </script>");



}

	

  

 public	function generatePassword($length, $strength) 

{

    $vowels = 'aeuy';

    $consonants = '';

    if ($strength & 1) 

    {

        $consonants .= 'BDGHJLMNPQRSTVWXZ';

    }

    if ($strength & 2) 

    {

        $vowels .= "AEUY";

    }

    if ($strength & 4) 

    {

        $consonants .= '23456789';

    }

	if ($strength & 6) 

    {

        $consonants .= '23456789';

    }

    if ($strength & 8) 

    {

        $consonants .= '@#$%';

    }

    $password = '';

    $alt = time() % 2;

	/*echo $consonants;

	echo '<br/>';

	echo time();*/

    for ($i = 0; $i < $length; $i++) 

    {

        if ($alt == 1) 

        {

            $password .= $consonants[(rand() % strlen($consonants))];

            $alt = 0;

        } 

        else 

        {

            $password .= $consonants[(rand() % strlen($consonants))];

            $alt = 1;

        }

    }

    return $password;

}



public function givedata($table,$id)

    {

        try {

            $sql = $this->conn->prepare("SELECT * FROM $table WHERE Id=:id ");

            $sql->execute(array(

                ':id' => $id

            ));

            $r = $sql->fetch(PDO::FETCH_ASSOC);

                $data = $r;

            

            if (!empty($data))

                return $data;

            

        }

        catch (PDOException $e) {

            echo 'Query failed' . $e->getMessage();

        }

        

    }

	 

	public function select_data_by_given_id_status($table,$stcolumn,$status)

	 {

		 try {

			 $sql=$this->conn->prepare("SELECT * FROM $table Where `$stcolumn`='$status'  ");

			 $sql->execute();

			 $r = $sql->fetch(PDO::FETCH_ASSOC);

			 if(!empty($r))

			 return $r;

			 }

			 catch(PDOException $e)

			 {

				 echo 'Query failed'.$e->getMessage();

			 }

	 }

	

	public function GetIdbyname($table,$name)

	{

		try 

		{  

	 

			 $sth = $this->conn->prepare("SELECT Id  FROM $table   WHERE  Name Like '%$name%'");			

			 $sth->execute();

			 $data=$sth->fetch(PDO::FETCH_ASSOC);

			  return $data['Id'];

 

     }

		catch(PDOException $e)

		{

			echo $e->getMessage();

		}				

	}
	
	
	public function otpforattemptresume($Mobile)
	{
		try
		{ 
		    //$OTP = $this->OTP(4);  
			$OTP = 1234;
			$ExpireTime = date('Y-m-d H:i:s', strtotime("+5 min")); 
			$stmt = $this->conn->prepare("INSERT INTO 	userotp (Mobile, OTP, ExpireTime) VALUES( :Mobile,:OTP, :ExpireTime)");
			$stmt->bindparam(":Mobile",$Mobile);
			$stmt->bindparam(":OTP",$OTP);
			$stmt->bindparam(":ExpireTime",$ExpireTime); 	
			$stmt->execute();			 
		    return $OTP;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}			
	}
	public function OTP($digits = 4){
    $i = 0; //counter
    $pin = ""; //our default pin is blank.
    while($i < $digits){
        $pin .= mt_rand(0, 9);
        $i++;
    }
    return $pin;
}
	public function otpvarificationnewresume($Mobile,$OTP)
	{
		try
		{			 
			$sql="SELECT OTP,ExpireTime FROM 	userotp where Mobile = '$Mobile' Order By Id Desc Limit 1"; 
			$q = $this->conn->prepare($sql) or die("failed!");
			$q->execute();
			$row = $q->fetch(PDO::FETCH_ASSOC);
			$count = $q->rowCount();
			if($count==1)
			{
				if($OTP == $row['OTP'] && strtotime(date("Y-m-d H:i:s"))<=strtotime($row['ExpireTime']))
				{
					$UserId = $this->Getcoumnbyid('certifications','Id','Mobile',$Mobile); 
					if($UserId=='')
					{
						$stmt2 = $this->conn->prepare("INSERT INTO `certifications`(`Mobile`)VALUES(:Mobile)");	 
						$stmt2->bindparam(":Mobile", $Mobile);
						$stmt2->execute();
						$lastinsertid = $this->conn->lastInsertId();
						$_SESSION['bjpmember'] = $lastinsertid; 
					}
					else
					{ 
						$_SESSION['bjpmember'] = $UserId;
					}
					
					return 1;
				}
				else
				{
					return 0;
				}
			}
			else
			{
				return 0;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
	}
	
	public function mobilealready_exists($Mobile)
	{
		try
		{
			$COMMON = new COMMON;
			$stmt = $COMMON->conn->prepare("SELECT count(*) as total FROM certifications WHERE Mobile = :Mobile and Status=1 ");
			$stmt->execute(array(':Mobile'=>$Mobile));
			$standardrow = $stmt->fetch(PDO::FETCH_ASSOC);
			return $standardrow['total'];
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
	public function setresumetempid($tempid)
	{
		try
		{
			$tempid = base64_decode($tempid);
			$userid = $_SESSION['bjpmember']; 		 
			$sql="SELECT Id FROM certifications where Id = '$userid' and Type='$tempid' Order By Id Desc Limit 1"; 
			//echo $sql;
			$q = $this->conn->prepare($sql) or die("failed!");
			$q->execute();
			$row = $q->fetch(PDO::FETCH_ASSOC);  
			$count = $q->rowCount();
			if($count==0)
			{
				$stmt2 = $this->conn->prepare("UPDATE `certifications` SET  Type=:tempid  Where Id=:userid"); 
				$stmt2->bindparam(":tempid", $tempid);
				$stmt2->bindparam(":userid", $userid);
				$stmt2->execute();
				$lastinsertid = $userid;
				$AlreadyId = $userid;
			}
			else
			{
				 $AlreadyId = $row['Id'];;
			}
			return $AlreadyId;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
	}
	
	public function updateresume($Id, $Image, $MemberType, $Name, $Father, $DOB, $Block, $VidhanSabha, $Address, $Mobile, $WhatsApp, $Email, $IDCard, $IDCardNumber, $FacebookPage, $InstagramPage, $TwitterPage, $Location, $ReferralID)
	{
		try
		{
			
			$tempid = base64_decode($Id); 
			$stmt3 = $this->conn->prepare("Update  `certifications` SET MemberType=:MemberType, Image=:Image, Name=:Name, Father=:Father, DOB=:DOB, Block=:Block, Assembly=:VidhanSabha, Address=:Address, Mobile=:Mobile, WhatsApp=:WhatsApp, Email=:Email, IDCard=:IDCard, IDCardNumber=:IDCardNumber, FacebookPage=:FacebookPage, InstagramPage=:InstagramPage, TwitterPage=:TwitterPage, Location=:Location, ReferralID=:ReferralID  where Id=:Id");
			$stmt3->bindparam(":MemberType", $MemberType); 
			$stmt3->bindparam(":Image", $Image); 
			$stmt3->bindparam(":Name", $Name); 
			$stmt3->bindparam(":Father", $Father); 
			$stmt3->bindparam(":DOB", $DOB); 
			$stmt3->bindparam(":Block", $Block); 
			$stmt3->bindparam(":VidhanSabha", $VidhanSabha); 
			$stmt3->bindparam(":Address", $Address); 
			$stmt3->bindparam(":Mobile", $Mobile);
			$stmt3->bindparam(":WhatsApp", $WhatsApp);
			$stmt3->bindparam(":Email", $Email);
			$stmt3->bindparam(":IDCard", $IDCard);
			$stmt3->bindparam(":IDCardNumber", $IDCardNumber);
			$stmt3->bindparam(":FacebookPage", $FacebookPage);
			$stmt3->bindparam(":InstagramPage", $InstagramPage);
			$stmt3->bindparam(":TwitterPage", $TwitterPage);
			$stmt3->bindparam(":Location", $Location);
			$stmt3->bindparam(":ReferralID", $ReferralID); 
	 		 $stmt3->bindparam(":Id", $tempid); 
	  	     $stmt3->execute();
			return $tempid;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}	
	}

}

?>