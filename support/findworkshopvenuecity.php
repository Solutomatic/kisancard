<?php require_once("../dbconfig.php");

 $city=intval($_GET['workshop']);
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
	
	
	
	
	public function countrystates($city)
	{
		try 
		{  
		
			 $sth = $this->conn->prepare('SELECT * FROM `workshop_venue` Where WorkshopId=:City order by Id desc');
			 $sth->bindParam(':City', $city, PDO::PARAM_INT); 
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

    $Allstates = $obj_find->countrystates($city);
    $numrw = count($Allstates);
	if($numrw != '0'){
		echo '<option value="">Select WorkShop Venue City</option>';
    for($i=0;$i<$numrw;$i++)
     {
     ?>
<option value="<?php echo $Allstates[$i]['Id']; ?>"><?php echo $Allstates[$i]['Id']; ?> - <?php echo $Allstates[$i]['City']; ?> - <?php echo $Allstates[$i]['Address']; ?> - <?php echo $Allstates[$i]['Date']; ?> - <?php echo $Allstates[$i]['EndDate']; ?></option>
      <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no Workshop Venue City">';
	 }?>

