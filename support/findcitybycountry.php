<?php require_once("../dbconfig.php");

 $Country=intval($_GET['Country']);
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
	
	
	
	
	public function countrystates($CountryId)
	{
		try 
		{  
		$active ='1';
			 $sth = $this->conn->prepare('SELECT * FROM `city` Where CountryId=:CountryId and  Active=:active order by Name');
			 $sth->bindParam(':CountryId', $CountryId, PDO::PARAM_INT); 
			  $sth->bindParam(':active', $active, PDO::PARAM_INT); 
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

    $Allstates = $obj_find->countrystates($Country);
    $numrw = count($Allstates);
	if($numrw != '0'){
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     <option value="<?php echo $Allstates[$i]['Id']; ?>" ><?php echo $Allstates[$i]['Name']; ?></option>
       <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no City">';
	 }?>

