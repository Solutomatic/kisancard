<?php require_once("../dbconfig.php");

 $CategoryId=intval($_GET['CategoryId']);
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
	
	
	
	
	public function countrystates($CategoryId)
	{
		try 
		{  
		
			 $sth = $this->conn->prepare('SELECT * FROM `project_subcategory` Where Project_CatId=:CategoryId order by Heading');
			 $sth->bindParam(':CategoryId', $CategoryId, PDO::PARAM_INT); 
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

    $Allstates = $obj_find->countrystates($CategoryId);
    $numrw = count($Allstates);
	if($numrw != '0'){
	echo '<option value="" disabled="disabled">Select Sub Category</option>';
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     <option value="<?php echo $Allstates[$i]['Id']; ?>"><?php echo $Allstates[$i]['Heading']; ?></option>
      <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no Sub Category">';
	 }?>

