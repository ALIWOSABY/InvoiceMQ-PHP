<?php
$conn = new mysqli("localhost","root", "", "mysql_db");
mysqli_query($conn,"SET CHARACTER SET 'utf8'");
mysqli_query($conn,"SET SESSION collation_connection ='utf8_unicode_ci'");
if($conn->connect_error)
{
	die("connection faild".$conn->connect_error);
}

?>