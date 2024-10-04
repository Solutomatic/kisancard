<?php require_once("../dbconfig.php");

 $category=intval($_GET['section']);
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
	
	
	
	
	public function subcategory($category)
	{
		try 
		{  
		
			 $sth = $this->conn->prepare('SELECT * FROM `mindit_master_categorys` Where SectionId=:CatId order by Name');
			 $sth->bindParam(':CatId', $category, PDO::PARAM_INT); 
			 $sth->execute();
			while($row = $sth->fetch(PDO::FETCH_ASSOC)){  $categori[]=$row;  }  
			if(!empty($categori))
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
    $Allstates = $obj_find->subcategory($category);
    $numrw = count($Allstates);
   
	if($numrw != '0'){
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     <option value="<?php echo $Allstates[$i]['Id']; ?>"><?php echo $Allstates[$i]['Name']; ?></option>
     <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no Subcategory">';
	 }?>

