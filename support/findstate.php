<?php require_once("../dbconfig.php");

 $country=intval($_GET['country']);
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
	
	
	
	
	public function countrystates($country)
	{
		try 
		{  
		
			 $sth = $this->conn->prepare('SELECT * FROM `state` Where CountryId=:CountryId order by Name');
			 $sth->bindParam(':CountryId', $country, PDO::PARAM_INT); 
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

    $Allstates = $obj_find->countrystates($country);
    $numrw = count($Allstates);
	if($numrw != '0'){
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     <option value="<?php echo $Allstates[$i]['Id']; ?>"><?php echo $Allstates[$i]['Name']; ?></option>
      <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no State">';
	 }?>

