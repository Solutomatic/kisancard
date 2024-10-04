<?php require_once("../dbconfig.php");  $workshoparray = $_REQUEST['workshop'];
class FIND
{ 
private $conn;	
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
	public function countrystates($workshop)
	{
		try 
		{  	
			 $sth = $this->conn->prepare('SELECT * FROM `workshop_venue` Where WorkshopId=:WorkshopId and Active=1 order by STR_TO_DATE(`Date`, "%d-%m-%Y") Desc');
			 $sth->bindParam(':WorkshopId', $workshop, PDO::PARAM_INT); 
			 $sth->execute();
			while($row = $sth->fetch(PDO::FETCH_ASSOC)){  $categori[]=$row;  }  
			return $categori;
     }
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	public function Requrdata($table,$require, $column,$value){  
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
	
}
$obj_find = new FIND();
 foreach($workshoparray as $workshop)
 {
	 
	$workshopname = $obj_find->Requrdata('workshop','Heading','Id',$workshop);
	echo '<optgroup label="'.$workshopname.'">';
  $Allstates = $obj_find->countrystates($workshop);
  $numrw = count($Allstates);	 
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     
<option value="<?php echo $Allstates[$i]['Id']; ?>"><?php echo $Allstates[$i]['Id']; ?> - <?php echo $Allstates[$i]['City']; ?> - <?php echo $Allstates[$i]['Address']; ?> - <?php echo $Allstates[$i]['Date']; ?> - <?php echo $Allstates[$i]['EndDate']; ?></option>
<?php } echo '</optgroup>';  }?>
