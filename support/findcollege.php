<?php require_once("../dbconfig.php");
 $CollegeCity=$_GET['CollegeCity'];
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
	
	
	
	
	public function countrystates($CollegeCity)
	{
		try 
		{  	
		echo "SELECT * FROM `user` Where CollegeCity='$CollegeCity' and College!='' Group By College order by College Asc";	
			 $sth = $this->conn->prepare("SELECT * FROM `user` Where CollegeCity='$CollegeCity' and College!='' Group By College order by College Asc");
			
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

    $Allstates = $obj_find->countrystates($CollegeCity);
    $numrw = count($Allstates);
	if($numrw != '0'){
		echo '<option value="">All College</option>';
    for($i=0;$i<$numrw;$i++)
     {
     ?>
     <option value="<?php echo $Allstates[$i]['College']; ?>"><?php echo $Allstates[$i]['College']; ?></option>
      <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no Workshop Venue">';
	 }?>

