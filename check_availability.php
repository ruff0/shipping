<?php
require_once("dbcontroller.php");
$db_handle = new DBController();


 if(!empty($_POST["booking_no"])) {
  $result = mysql_query("SELECT count(*) FROM tbl_booking_order WHERE booking_no='" . $_POST["booking_no"] . "'");
  $row = mysql_fetch_row($result);
  $user_count = $row[0];

  if($user_count>0) {
      echo "<span class='status-not-available' >Booking ID Not Available</span>";

  }
  else {
      echo "<span class='status-available'>Booking ID Available</span>";   
  	}
  }

?>