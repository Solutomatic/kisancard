<?php require_once("../dbconfig.php");

 $city=intval($_GET['venue']);
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
		
			 $sth = $this->conn->prepare('SELECT * FROM `workshop_venue` Where Id=:City order by Id desc');
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
		echo '<option value="">Select WorkShop Date</option>';
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     <option value="<?php echo $Allstates[$i]['Id']; ?>"><?php echo $Allstates[$i]['Date']; ?>-<?php echo $Allstates[$i]['EndDate']; ?></option>
      <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no Workshop Date">';
	 }?>

