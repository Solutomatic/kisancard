<?php require_once("../dbconfig.php");  $Structuredata = $_POST['Structure']; $InternShipId = $_POST['InternShipId'];
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
	public function countrystates($Structure,$InternShipId)
	{
		try 
		{  
		
			 $sth = $this->conn->prepare('SELECT * FROM `course_module` Where CourseModuleCategoryId=:Structure and InternShipId=:InternShipId order by Id desc');
			 $sth->bindParam(':Structure', $Structure, PDO::PARAM_INT); 
			 $sth->bindParam(':InternShipId', $InternShipId, PDO::PARAM_INT); 
			 $sth->execute();
			while($row = $sth->fetch(PDO::FETCH_ASSOC)){  $categori[]=$row;  }  
			return $categori;
     }
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}				
	}
	public function Getcoumnbyiddesc($table, $require, $column, $value)
    {
        try
        {
            $sql = $this
                ->conn
                ->prepare("SELECT $require FROM $table Where `$column`='$value' order by Id Desc");
            $sql->execute();
            $data = $sql->fetch(PDO::FETCH_ASSOC);
            if (!empty($data)) return $data[$require];

        }
        catch(PDOException $e)
        {
            echo 'Query failed' . $e->getMessage();
        }

    }
	
} 

$obj_find = new FIND();
foreach($Structuredata  as $Structure)
{	
	echo '<h4>Module of '.$obj_find->Getcoumnbyiddesc('course_module_category','Heading','Id', $Structure).'</h4>';
	echo '<div class="form-group">';
	$Allmodule = $obj_find->countrystates($Structure,$InternShipId);
	if(!empty($Allmodule)){ 
    for($i=0;$i<count($Allmodule);$i++)
     {
		 ?>
         <div class="col-md-6">
                <label>
                  <input type="checkbox" name="Module[]"  value="<?php echo $Allmodule[$i]['Id']; ?>">
                  <?php echo $Allmodule[$i]['Heading'];?></label>
              </div>
         <?php
	 }
	}
	echo '</div>';
}
    
 ?>

