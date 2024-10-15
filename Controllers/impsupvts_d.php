<?php
$conn = getdb();


if (isset($_POST["Import_d"])) {

	echo $file_dname = $_FILES["file"]["tmp_name"];
	if ($_FILES["file"]["size"] > 0) {
		$file_d = fopen($file_dname, "r");
		while (($emapDatad = fgetcsv($file_d, 10000, ",")) !== FALSE) {

			$sql_d = "INSERT into tn_s (`TS_V_ID`, `TS_SER`, `TS_DY`, `TSDAT`, `VS_CUSTID`, `TS_NUM`, `TS_PRC`, `TS_TOT`, `TS_DISC`, `TSTOTDISC`, `TSNT`) 
			values('$emapDatad[0]','$emapDatad[1]','$emapDatad[2]','$emapDatad[3]','$emapDatad[4]','$emapDatad[5]','$emapDatad[6]','$emapDatad[7]','$emapDatad[8]','$emapDatad[9]','$emapDatad[10]')";
			$rest_d = mysqli_query($conn, $sql_d);



			if (!$rest_d) {
				echo "<script type=\"text/javascript\">
								  alert(\"ملف غير صالح: الرجاء تحميل ملف CSV.\");
								  window.location = \"/../InvoiceMQ-PHP/Views/User/?page=p_m_supp\"
							  </script>";
			}
		}
		fclose($file_d);
		//throws a message if data successfully imported to mysql database from excel file
		echo "<script type=\"text/javascript\">
							  alert(\"تم استيراد ملف CSV بنجاح.\");
							  window.location = \"/../InvoiceMQ-PHP/Views/User/?page=p_m_supp\"
						  </script>";

		//close of connection
		mysqli_query($conn, $sql_d);
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
