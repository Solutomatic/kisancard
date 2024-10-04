<?php require_once("../dbconfig.php");

 $FilterCategory= implode(',',$_POST['FilterCategory']);
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
		//echo 'SELECT GROUP_CONCAT(Id) as InternshipIds FROM `internship` Where CourseTypeId!=3 and CategoryId IN ('.$city.') order by Id desc';
		 $sth2 = $this->conn->prepare('SELECT GROUP_CONCAT(Id) as InternshipIds FROM `internship` Where  `CourseTypeId` IS NULL and `CourseCategoryId` IS NULL and CategoryId IN ('.$city.') order by Id desc'); 
			 $sth2->execute();
		     $row2 = $sth2->fetch(PDO::FETCH_ASSOC);	
		     $InternshipId = $row2['InternshipIds'];
			// echo $InternshipId;
			//echo 'SELECT * FROM `internship_courses` Where InternshipId IN ('.$InternshipId.') order by Id desc';
			 $sth = $this->conn->prepare('SELECT * FROM `internship_courses` Where InternshipId IN ('.$InternshipId.') order by Id desc'); 
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

    $Allstates = $obj_find->countrystates($FilterCategory);
    $numrw = count($Allstates);
	if($numrw != '0'){ 
    for($i=0;$i<$numrw;$i++)
     {
     ?>
<option value="<?php echo $Allstates[$i]['Id']; ?>"><?php echo $Allstates[$i]['Heading']; ?></option>
      <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no Workshop Venue City">';
	 }?>

