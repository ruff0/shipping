<?php
require_once("dbcontroller.php");
$db_handle = new DBController();


 //if(!empty($_POST["sltRole"])) {
  //$query = mysql_query("SELECT count(*) FROM tbl_role_per WHERE role_id='" . $_POST["sltRole"] . "'");
if (($_GET["x"]) == '1')
{
 	$query= mysql_query("SELECT tbl_role_per.per_id, tbl_permission.name FROM tbl_role_per INNER JOIN tbl_permission ON tbl_role_per.per_id = tbl_permission.id WHERE tbl_role_per.role_id = '1' ORDER BY tbl_role_per.per_id");
}
else if(($_GET["x"]) == '2')  
{
  $query= mysql_query("SELECT tbl_role_per.per_id, tbl_permission.name FROM tbl_role_per INNER JOIN tbl_permission ON tbl_role_per.per_id = tbl_permission.id WHERE tbl_role_per.role_id = '2' ORDER BY tbl_role_per.per_id");
}
else if(($_GET["x"]) == '3')  
{
  $query= mysql_query("SELECT tbl_role_per.per_id, tbl_permission.name FROM tbl_role_per INNER JOIN tbl_permission ON tbl_role_per.per_id = tbl_permission.id WHERE tbl_role_per.role_id = '3' ORDER BY tbl_role_per.per_id");
}  

  if(mysql_num_rows($query) == 0){
  	echo "No Data";
  }
  else{
  	$array = array();

while($row = mysql_fetch_assoc($query)) {
   $array['per_id'] = $row['per_id'];
   $array['name'] = $row['name'];
   echo json_encode($array).',';
  }
  }
  //echo $_GET["x"];
?>