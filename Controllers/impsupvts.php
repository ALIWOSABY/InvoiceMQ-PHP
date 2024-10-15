<?php
$conn = getdb();


if (isset($_POST["Import"])) {

	echo $filename = $_FILES["file"]["tmp_name"];
	if ($_FILES["file"]["size"] > 0) {
		$file = fopen($filename, "r");
		while (($emapData = fgetcsv($file, 10000, ",")) !== FALSE) {
			$sql = "INSERT into v_s (`VS_ID`, `VS_TYP_ID`, `VS_TYP_NO`, `VS_DAT`, `VOU_USE_ID`, `VS_BENF`, `VS_NT`, `VS_ST`, `VS_Count_Print`, `TSTOTDYCOM`, `TSITOTRET`, `TSTOTAMOU`, `TSTOTSALE`, `TSMUS`, `TSHISREMD`, `TSONREMD`) 
			values('$emapData[0]','$emapData[1]','$emapData[2]','$emapData[3]','$emapData[4]','$emapData[5]','$emapData[6]','$emapData[7]','$emapData[8]','$emapData[9]','$emapData[10]','$emapData[11]','$emapData[12]','$emapData[13]','$emapData[14]','$emapData[15]')";
			$result = mysqli_query($conn, $sql);
			if (!$result) {
				echo "<script type=\"text/javascript\">
								  alert(\"ملف غير صالح: الرجاء تحميل ملف CSV.\");
								  window.location = \"/../InvoiceMQ-PHP/Views/User/?page=p_m_supp\"
							  </script>";
			}
		}
		fclose($file);
		//throws a message if data successfully imported to mysql database from excel file
		echo "<script type=\"text/javascript\">
							  alert(\"تم استيراد ملف CSV بنجاح.\");
							  window.location = \"/../InvoiceMQ-PHP/Views/User/?page=p_m_supp\"
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
