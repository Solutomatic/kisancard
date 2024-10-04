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
		
			 $sth = $this->conn->prepare('SELECT * FROM `workshop` Where WorkshopCatId=:WorkshopCatId order by Heading');
			 $sth->bindParam(':WorkshopCatId', $workshop, PDO::PARAM_INT); 
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
 

    $Allstates = $obj_find->countrystates($workshop);
    $numrw = count($Allstates);
	if($numrw != '0'){
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     <option value="<?php echo $Allstates[$i]['Id']; ?>">Id = <?php echo $Allstates[$i]['Id']; ?> (<?php echo $Allstates[$i]['Heading']; ?>)</option>
      <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no Workshop">';
	 }?>

