<?php require_once("../dbconfig.php"); $category=intval($_GET['category']);?>

<?php
require_once("../classes/class.settings.php"); $GenSet=new Settings();
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
	
	
	
	
	public function countrystates($category)
	{
		try 
		{  
		$active ='1';
			 $sth = $this->conn->prepare('SELECT * FROM `default_faq` Where Id=:Id and  Active=:active order by Id');
			 $sth->bindParam(':Id', $category, PDO::PARAM_INT); 
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
<label style="color:red">Choose Faq </label><br />  
<?php 

    $Allstates = $obj_find->countrystates($category);
    $numrw = count($Allstates);
	if($numrw != '0'){
    for($z=0;$z<$numrw;$z++)
     {
     ?>
      <?php 
           $AllFeatures = $GenSet->select_all_data_by_given_order_by_status_find_in_set('default_faq','FaqCategoryId',$Allstates[$z]['FaqCategoryId'],'Active','1','Id','Desc'); $count=1;
          for($i=0;$i<count($AllFeatures);$i++)
            { ?>                                  
         <?php echo $count++;?>.     <input name="Question[]" type="text" class="form-control" style="display:inline-block; width:80%" value="<?php echo $AllFeatures[$i]['Question']; ?>">  <input name="Seq[]" type="text" class="onlynumeric" value="<?php if(isset($error)){echo $FeaturesSeq;} ?>" style="width:50px"></label><br />&nbsp;
           <textarea name="Answer[]" class="form-control" rows="5"><?php echo $AllFeatures[$i]['Answer']; ?></textarea>
              <br />&nbsp;
                  <?php }?>
       <?php } }else
	 {
	 echo '<optgroup label="Sorry There is no FAQ">';
	 }?>

