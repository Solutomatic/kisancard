<?php require_once("../dbconfig.php");

 $FilterCategory= implode(',',$_POST['FilterCategory']);
  $FilterCourse= implode(',',$_POST['FilterCourse']);
 
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
	
	
	
	
	public function countrystates($CategoryId,$FilterCourse)
	{
		try 
		{  
		//echo 'SELECT GROUP_CONCAT(Id) as InternshipIds FROM `internship` Where CourseTypeId!=3 and CategoryId IN ('.$city.') order by Id desc';
		 $sth2 = $this->conn->prepare('SELECT GROUP_CONCAT(Id) as InternshipIds FROM `internship` Where  `CourseTypeId` IS NULL and `CourseCategoryId` IS NULL and CategoryId IN ('.$CategoryId.') order by Id desc'); 
			 $sth2->execute();
		     $row2 = $sth2->fetch(PDO::FETCH_ASSOC);	
		     $InternshipId = $row2['InternshipIds'];
			// echo $InternshipId;
			//echo 'SELECT * FROM `internship_courses` Where InternshipId IN ('.$InternshipId.') order by Id desc';
			 $sth = $this->conn->prepare('SELECT GROUP_CONCAT(Id) as coursesIds FROM `internship_courses` Where InternshipId IN ('.$InternshipId.') order by Id desc'); 
			 $sth->execute();
			$row = $sth->fetch(PDO::FETCH_ASSOC);
			$coursesIds = $row['coursesIds'];
			 $sth3 = $this->conn->prepare('SELECT * FROM `internship_course_level` Where CourseId IN ('.$coursesIds.') order by Heading ASC'); 
			 $sth3->execute();
			while($row3 = $sth3->fetch(PDO::FETCH_ASSOC)){  $categori[]=$row3;  }  
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

    $Allstates = $obj_find->countrystates($FilterCategory,$FilterCourse);
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

