<?php require_once("../dbconfig.php");

 $workshop=intval($_GET['workshop']);
?>

<?php
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
		$Today = date("Y-m-d");
			 $sth = $this->conn->prepare('SELECT * FROM `workshop_venue` Where WorkshopId=:WorkshopId and STR_TO_DATE(workshop_venue.`EndDate`, "%d-%m-%Y") >=:Today order by STR_TO_DATE(`Date`, "%d-%m-%Y") Desc');
			 $sth->bindParam(':WorkshopId', $workshop, PDO::PARAM_INT); 
			 $sth->bindParam(':Today', $Today); 
			 $sth->execute();
			while($row = $sth->fetch(PDO::FETCH_ASSOC)){  $categori[]=$row;  }  
			return $categori;
     }
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	
}
 

$obj_find = new FIND();
 
?>



<?php 

    $Allstates = $obj_find->countrystates($workshop);
    $numrw = count($Allstates);
	if($numrw != '0'){
		echo '<option value="">Select WorkShop Venue</option>';
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     <option value="<?php echo $Allstates[$i]['Id']; ?>"><?php echo $Allstates[$i]['Id']; ?> - <?php echo $Allstates[$i]['City']; ?> - <?php echo $Allstates[$i]['Address']; ?> - <?php echo $Allstates[$i]['Date']; ?> - <?php echo $Allstates[$i]['EndDate']; ?></option>
      <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no Workshop Venue">';
	 }?>

