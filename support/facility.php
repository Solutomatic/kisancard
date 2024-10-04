<?php require_once("../dbconfig.php");

 $category=$_REQUEST['category'];
  $subcategory=$_REQUEST['subcategory'];
  
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
	
	
	
	
	public function countrystates($category,$subcategory)
	{
		try 
		{  
		
			 $sth = $this->conn->prepare('SELECT * FROM `mindit_facilities` Where CategoryId=:category and SubCategoryId=:subcategory Order by Name');
			 $sth->bindParam(':category', $category);
			 $sth->bindParam(':subcategory', $subcategory);
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

    $Allstates = $obj_find->countrystates($category,$subcategory);
    $numrw = count($Allstates);
	if($numrw != '0'){
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     <div class="col-sm-3">
				<input type="checkbox" name="facility[]" class="minimal" value="<?php echo $Allstates[$i]['Id']?>" /> <?php echo $Allstates[$i]['Name']?>
				</div>
       <?php }}else
	 {?>
	  <input type="hidden" class="form-control " name="facility[]" value="" placeholder="">
				    <span class="red-color">Sorry You Have no Facility Option For This Category and Sub category Add Facility In Other Facility Box </span>
	<?php }?>

