<?php
$conn = getdb();


if (isset($_POST["Import"])) {

	echo $filename = $_FILES["file"]["tmp_name"];
	if ($_FILES["file"]["size"] > 0) {
		$file = fopen($filename, "r");
		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
			$sql = "INSERT into cust (`CUST_ID`, `CUST_NAME`, `CUST_PHONE`, `CUST_EMAIL`, `CUST_INS_USER`, `CUST_INS_DATE`,`CUST_FREEZE`) 
			values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]')";
			$result = mysqli_query($conn, $sql);
			if (!$result) {
				echo "<script type=\"text/javascript\">
								  alert(\"ملف غير صالح: الرجاء تحميل ملف CSV.\");
								  window.location = \"/../InvoiceMQ-PHP/Views/2c69946de37$31ec0\"
							  </script>";
			}
		}
		fclose($file);
		//throws a message if data successfully imported to mysql database from excel file
		echo "<script type=\"text/javascript\">
							  alert(\"تم استيراد ملف CSV بنجاح.\");
							  window.location = \"/../InvoiceMQ-PHP/Views/2c69946de37$31ec0\"
						  </script>";

		//close of connection
		mysqli_query($conn, $sql);
	}
}


function getdb()
{
	$servername = "localhost";
	$username = "root";
	$password = "";
	$db = "mysql_db";

	try {

		$conn = mysqli_connect($servername, $username, $password, $db);
		//echo "Connected successfully"; 
	} catch (exception $e) {
		echo "Connection failed: " . $e->getMessage();
	}
	return $conn;
}
